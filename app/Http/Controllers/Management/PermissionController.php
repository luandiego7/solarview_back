<?php


namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Management\Permission\SaveRequest;
use App\Models\Management\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{

    public function getUserPermissions()
    {
        return response()->json(['permissions' => Permission::getPermissionsLoggedUser()->pluck('route')->toArray()]);
    }

    public function getPermissions(Request $request)
    {
        $permissions = Permission::getPermissions()
            ->where(function($query) use($request){
                $query
                    ->orWhere('name', 'like', '%'.$request->search.'%')
                    ->orWhere('route', 'like', '%'.$request->search.'%')
                    ->orWhere('description', 'like', '%'.$request->search.'%');
            })
            ->paginate($request->per_page, ['*'], 'page', $request->page);
        return response()->json(['error' => '', 'permissions' => $permissions]);
    }

    public function getPermission($id)
    {
        $permission = Permission::getPermissions(['id' => $id])->first();
        return response()->json(['error' => '', 'permission' => $permission]);
    }

    public function checkParam(Request $request)
    {
        return response()->json(Permission::where('id', '!=', $request->id)->where($request->param, '=', $request->value)->exists());
    }

    public function save(SaveRequest $request)
    {
        try {
            $data = $request->except('_token');

            DB::beginTransaction();

            Permission::updateOrCreate(['id' => $request->id], $data);

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

            Permission::where('id', $id)->delete();

            DB::commit();

            return response()->json(['error' => '', 'message' => 'Excluído com sucesso']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
