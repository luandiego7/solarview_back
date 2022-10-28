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
        $users = User::where(function($query) use($request){
            $query
                ->orWhere('name', 'like', '%'.$request->search.'%')
                ->orWhere('cpf', 'like', '%'.$request->search.'%')
                ->orWhere('email', 'like', '%'.$request->search.'%');
        })->paginate($request->per_page, ['*'], 'page', $request->page);

        return response()->json(['users' => $users]);
    }

    public function getUser($id)
    {
        $user  = User::getUsers(['id' => $id])->first();
        return response()->json(['error' => '', 'user' => $user]);
    }

    public function checkParam(Request $request)
    {
        return response()->json(User::where('id', '!=', $request->id)->where($request->param, '=', $request->value)->exists());
    }

    
    public function create(SaveRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->except('token');

            $data['password'] = Hash::make($request->email.date('Y'));
            User::create($data);

            DB::commit();

            return response()->json(['error' => '', 'message' => 'Criado com sucesso']);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function update(SaveRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $data = $request->except('token');

            User::where('id', $id)->update($data);

            DB::commit();

            return response()->json(['error' => '', 'message' => 'Salvo com sucesso']);
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
            if($user->getLogs->count()) throw new \Exception('Este usuário não pode ser excluído. Existem registros atrelados a este usuário.');
            $user->delete();   
            DB::commit();
            return response()->json(['error' => '', 'message' => 'Excluído com sucesso']);

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
