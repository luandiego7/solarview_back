<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Helpers\Format;
use App\Http\Requests\Profile\UpdateRequest;
use App\Models\City;
use App\Models\State;
use App\Models\User\User;
use App\Notifications\Profile\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use Notifiable;
    private $email;

    public function profile()
    {
        $user   = User::getUsers(['id' => auth()->user()->id])->first();
        $states = Format::formatSelect2(State::all());
        $cities = Format::formatSelect2(City::getCities(['state_id' => $user->getCity->state_id])->get());

        return response()->json(['states' => $states, 'cities' => $cities, 'profile' => $user]);
    }

    public function checkParam(Request $request)
    {
        return response()->json(User::where('id', '!=', $request->id)->where($request->param, '=', $request->value)->exists());
    }

    public function update(UpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except('token', 'state_id');
            $data['cpf']      = Format::removeSymbols($data['cpf']);
            $data['cep']      = Format::removeSymbols($data['cep']);
            $data['contact']  = Format::removeSymbols($data['contact']);
            $data['birthday'] = Format::dateUs($data['birthday']);

            $profile = User::updateOrCreate(['id' => $request->id], $data);

            DB::commit();

            return response()->json(['error' => '', 'msg' => 'Salvo com sucesso', 'profile' => $profile]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updatePhoto(Request $request)
    {
        try {

            DB::beginTransaction();

            $user        = User::find($request->id);
            $company_id  = is_null($request->company_id) ? (auth()->user()->isSuperadmin() ? 0 : auth()->user()->getCompanyUser->company_id) : $request->company_id;

            if(is_null($request->photo) && is_null($user->photo)){
                File::delete(public_path(explode('public/', $user->photo)[1]));
            }

            if($request->hasFile('photo') && $request->file('photo')->isValid()){
                if(!is_null($user->photo)){
                    File::delete(public_path(explode('public/', $user->photo)[1]));
                }
                if($user->isSuperadmin()){
                    $path = 'images/users';
                }else{
                    $path = 'images/company-'.$company_id.'/users';
                }
                $user->photo =  url(FileHelper::uploadPhoto($request, 'photo', $path, true, 600, 600));
                $user->save();
            }

            DB::commit();
            return response()->json(['error' => '', 'message' => 'Atualizado com sucesso', 'user' => $user]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function support(Request $request)
    {
        try {
            $this->email = env('MAIL_USERNAME');
            $this->notify(new Support(auth()->user(), $request));

            return response()->json(['error' => '', 'message' => 'Enviado com sucesso']);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function checkPassword(Request $request)
    {
        return response()->json(Hash::check($request->password, auth()->user()->password));
    }

    public function changePassword(Request $request)
    {
        try {
            DB::beginTransaction();

            User::where('id', auth()->user()->id)->update(['password' => Hash::make($request->password)]);

            DB::commit();

            return response()->json(['error' => '', 'message' => 'Atualizado com sucesso']);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
