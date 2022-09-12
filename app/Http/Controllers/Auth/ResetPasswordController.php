<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\PasswordReset;
use App\Models\User\User;
use App\Notifications\Auth\SendEmailResetPassword;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    use Notifiable;
    private $email;

    public function sendEmailResetPassword(Request $request)
    {
        $token = md5(date('Y-m-d H:i:s'));
        try{
            DB::beginTransaction();

            $user        = User::where('email', $request->email)->first();
            $this->email = $request->email;

            PasswordReset::where('email', $request->email)->delete();
            PasswordReset::create([
                'email'      => $request->email,
                'token'      => $token,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $this->notify(new SendEmailResetPassword($user, $token));
            DB::commit();

            return response()->json(['error' => '', 'message' => 'Foi enviado um link para recuperação da senha para o seu e-mail']);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getResetPassword(Request $request)
    {
        $reset = PasswordReset::where('token', $request->recoveryToken)->first();

        if(is_null($reset)){
            return response()->json(['error' => 'Token inválido']);
        }
        if(date('Y-m-d H:i:s', strtotime($request->created_at. " +2 days")) < date('Y-m-d H:i:s')){
            return response()->json(['error' => 'Token expirado']);
        }

        return response()->json(['error' => '', 'reset' => $reset]);
    }

    public function resetPassword(Request $request)
    {
        try {
            DB::beginTransaction();

            User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
            PasswordReset::where('email', $request->email)->delete();

            DB::commit();
            return response()->json(['error' => '', 'message' => 'Atualizado com sucesso']);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
