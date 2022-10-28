<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Logs;
use App\Models\Management\Permission;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['create', 'login', 'register', 'unauthorized']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token       = auth()->attempt($credentials);
        $user        = auth()->user();
        if(!$token){
            return response()->json(['error' => 'Usuário e/ou senha inválidos']);
        }

        Logs::create([
            'user_id' => $user->id,
            'ip'      => request()->ip()
        ]);

        return response()->json(['error' => '', 'token' => $token, 'user' => $user]);
    }

    public function register(Request $request)
    {
        $data = $request->except('token');
        $data['password'] = Hash::make($request->password);
        User::create($data);

        $credentials = $request->only('email', 'password');
        $token       = auth()->attempt($credentials);
        $user        = auth()->user();
        if(!$token){
            return response()->json(['error' => 'Usuário e/ou senha inválidos']);
        }

        Logs::create([
            'user_id' => $user->id,
            'ip'      => request()->ip()
        ]);

        return response()->json(['error' => '', 'token' => $token, 'user' => $user]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['error' => '']);
    }

    public function refresh()
    {
        try{
            $token = auth()->refresh();
            $user  = auth()->user();

            $permissions = Permission::getPermissionsLoggedUser()->pluck('rota')->toArray();
            return response()->json(['error' => '', 'token' => $token, 'user' => $user, 'permissions' => $permissions ]);
        }catch(\Exception $exception){
            return response()->json(['error' => $exception->getMessage()]);
        }

    }

    public function unauthorized()
    {
        return response()->json(['error' => 'Não autorizado'], 401);
    }
}
