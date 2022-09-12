<?php


namespace App\Http\Controllers\Management;

use App\Helpers\Format;
use App\Http\Controllers\Controller;
use App\Http\Requests\Management\User\SaveRequest;
use App\Models\Management\CompanyUser;
use App\Models\Management\Role;
use App\Models\Management\RoleUser;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getUsers(Request $request)
    {
        if($request->has('select2')){
            $users = Format::formatSelect2(User::getUsers()->get(), 'name');
        }else{
            $users = User::where(function($query) use($request){
                $query
                    ->orWhere('name', 'like', '%'.$request->search.'%')
                    ->orWhere('cpf', 'like', '%'.$request->search.'%')
                    ->orWhere('email', 'like', '%'.$request->search.'%');
            })->paginate($request->per_page, ['*'], 'page', $request->page);
        }

        return response()->json(['users' => $users]);
    }

    public function getUser($id)
    {
        $user  = User::getUsers(['id' => $id])->first();
        $roles = Role::join('roles_users', 'roles_users.role_id', '=', 'roles.id')->select('roles.*')->where('user_id', $id)->get();
        $roles = Format::formatSelect2($roles);
        return response()->json(['error' => '', 'user' => $user, 'roles' => $roles]);
    }

    public function checkParam(Request $request)
    {
        return response()->json(User::where('id', '!=', $request->id)->where($request->param, '=', $request->value)->exists());
    }

    public function save(SaveRequest $request)
    {
        try {
            DB::beginTransaction();

            $data            = $request->except('_token', 'role_id');
            $data['profile'] = User::PROFILE_COMPANY;
            $data['cpf']     = Format::removeSymbols($data['cpf']);
            $company_id      = is_null($request->company_id) ? auth()->user()->getCompanyUser->company_id : $request->company_id;

            if(is_null($request->id)){
                $data['password'] = Hash::make($request->email.date('Y'));
                $user             = User::create($data);

                CompanyUser::create([
                    'company_id' => $company_id,
                    'user_id'    => $user->id
                ]);
                //commons permissions
                RoleUser::create([
                    'user_id' => $user->id,
                    'role_id' => 1
                ]);
            }else{
                $user = User::updateOrCreate(['id' => $request->id], $data);

               /* if(!auth()->user()->isSuperadmin()){
                    CompanyUser::where('company_id', Company::getEmpresaLogada()->id)
                        ->where('fk_usuario', $request->id)
                        ->update([
                            'status' => $request->status == User::STATUS_ACTIVE ? 1 : 0
                        ]);
                }*/
            }

            //roles
            if($request->has('role_id') && count($request->role_id)){
                $rolesId = [];
                foreach($request->role_id as $role){
                    $rolesId[] = $role['value'];
                    if(!RoleUser::where('user_id', $user->id)->where('role_id', $role['value'])->exists()){
                        RoleUser::create([
                            'user_id' => $user->id,
                            'role_id' => $role['value']
                        ]);
                    }
                }
                RoleUser::where('user_id', $request->id)->whereNotIn('role_id', $rolesId)->delete();
            }else{
                RoleUser::where('user_id', $user->id)->where('role_id', '!=', 1)->delete();
            }

            //photo
            /*if($request->hasFile('foto') && $request->file('foto')->isValid()){
                if(!is_null($usuario->foto)){
                    File::delete(public_path(explode('public/', $usuario->foto)[1]));
                }
                if($usuario->isSuperadmin()){
                    $caminho = 'images/user';
                }else{
                    $caminho = 'images/empresa-'.$fk_empresa.'/usuarios';
                }
                $usuario->foto =  url(ArquivosHelper::uploadFoto($request, 'foto', $caminho, true, 600, 600));
                $usuario->save();
            }*/

            DB::commit();

            return response()->json(['error' => '', 'message' => 'Salvo com sucesso', 'rolesId', $rolesId]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try{
            DB::beginTransaction();
            $user = User::find($id);
            //$photo    = $usuario->photo;
            $user->getCompanyUser->delete();
            RoleUser::where('user_id', $id)->delete();
            $user->delete();

           /* if(!is_null($photo)){
                if(!is_null($user->photo)){
                    File::delete(public_path(explode('public/', $user->photo)[1]));
                }
            }*/

            DB::commit();
            return response()->json(['error' => '', 'Excluído com sucesso']);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function user()
    {
        return response()->json(['user' => auth()->user()]);
    }

}
