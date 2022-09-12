<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\PasswordReset;
use App\Models\Management\Permission;
use App\Models\User\User;
use App\Notifications\Auth\SendEmailResetPassword;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['create', 'login', 'unauthorized']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token       = auth()->attempt($credentials);
        $user        = auth()->user();
        if(!$token){
            return response()->json(['error' => 'Usuário e/ou senha inválidos']);
        }

        $permissions = Permission::getPermissionsLoggedUser()->pluck('route')->toArray();
        return response()->json(['error' => '', 'token' => $token, 'user' => $user, 'permissions' => $permissions]);
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
