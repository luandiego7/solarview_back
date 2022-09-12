<?php


namespace App\Http\Controllers\Management;

use App\Helpers\Format;
use App\Http\Controllers\Controller;
use App\Http\Requests\Management\Role\SaveRequest;
use App\Models\Management\Permission;
use App\Models\Management\Role;
use App\Models\Management\RoleGroup;
use App\Models\Management\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function getRoles(Request $request)
    {
        if($request->has('select2')){
            $roles = Format::formatSelect2(Role::getRoles()->get());
        }else{
            $roles = Role::getRoles() ->where(function($query) use($request){
                $query->orWhere('name', 'like', '%'.$request->search.'%');
            })->paginate($request->per_page, ['*'], 'page', $request->page);
        }
        return response()->json(['error' => '', 'roles' => $roles]);
    }

    public function getRole($id)
    {
        $role = Role::getRoles(['id' => $id])->first();
        return response()->json(['error' => '', 'role' => $role]);
    }

    public function save(SaveRequest $request)
    {
        try {
            $data = $request->except('_token');

            DB::beginTransaction();

            Role::updateOrCreate(['id' => $request->id], $data);

            DB::commit();

            return response()->json(['error' => '', 'message' => 'Salvo com sucesso']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            Role::where('id', $id)->delete();

            DB::commit();

            return response()->json(['error' => '', 'message' => 'Excluído com sucesso']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getRolePermissions($id)
    {

        $role        = Role::getRoles(['id' => $id])->first();
        $role_groups = RoleGroup::with(['getPermissions'])->get();
        $permissions = $role->getPermissions->pluck('permission_id')->toArray();

        $totals = [];
        foreach($role_groups as $group){
            $totals[$group->id] = RoleGroup::getTotalPermissions($group, $role->id);
        }

        return response()->json(['error' => '', 'role' => $role, 'role_groups' => $role_groups, 'permissions' => $permissions, 'totals' => $totals]);
    }

    public function updateRolePermissions(Request $request, $id)
    {
        try{
            DB::beginTransaction();

            if($request->has('permissions')){
                RolePermission::where('role_id', $id)->whereNotIn('permission_id', $request->permissions)->delete();
                foreach($request->permissions as $permission_id){
                    if(!RolePermission::where('role_id', $id)->where('permission_id', $permission_id)->exists()){
                        RolePermission::create([
                            'role_id'       => $id,
                            'permission_id' => $permission_id
                        ]);
                    }
                }
            }
            if(!$request->has('permissions') or count($request->permissions) <= 0){
                RolePermission::where('role_id', $id)->delete();
            }

            DB::commit();

            return response()->json(['error' => '', 'message' => 'Atualizado com sucesso']);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
