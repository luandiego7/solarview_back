<?php


namespace App\Http\Controllers\Management;

use App\Helpers\FileHelper;
use App\Helpers\Format;
use App\Http\Controllers\Controller;
use App\Http\Requests\Management\Company\SaveRequest;
use App\Models\Management\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class CompanyController extends Controller
{

    public function getCompanies(Request $request)
    {
        if($request->has('select2')){
            $companies = Format::formatSelect2(Company::getCompanies()->get(), 'fantasy_name');
        }else{
            $companies = Company::where(function($query) use($request){
                $query
                    ->orWhere('fantasy_name', 'like', '%'.$request->search.'%')
                    ->orWhere('cnpj', 'like', '%'.$request->search.'%')
                    ->orWhere('email', 'like', '%'.$request->search.'%')
                    ->orWhere('status', 'like', '%'.$request->search.'%');
            })->paginate($request->per_page, ['*'], 'page', $request->page);
        }

        return response()->json(['companies' => $companies]);
    }

    public function checkParam(Request $request)
    {
        return response()->json(Company::where('id', '!=', $request->id)->where($request->param, '=', $request->value)->exists());
    }

    public function save(SaveRequest $request)
    {
        try{
            DB::beginTransaction();
            $data            = $request->except('_token', 'logo');
            $data['cnpj']    = Format::removeSymbols($data['cnpj']);
            $data['cep']     = Format::removeSymbols($data['cep']);
            $data['contact'] = Format::removeSymbols($data['contact']);

            if(!is_null($request->id)){
                //$data['status'] = $request->status == Company::STATUS_ATIVO ? 1 : 0;
            }

            $company = Company::updateOrCreate(['id' => $request->id],  $data);

            if($request->hasFile('logo') && $request->file('logo')->isValid()){
                if(!is_null($company->logo)){
                    File::delete(public_path(explode('public/', $company->logo)[1]));
                }
                $path       = 'images/company-'.$company->id.'/logo';
                $company->logo =  url(FileHelper::uploadPhoto($request, 'logo', $path, true, 200, 200));
                $company->save();
            }

            DB::commit();

            return response()->json(['error' => '', 'message' => 'Salvo com sucesso']);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getCompany($id)
    {
        $company = Company::getCompanies(['id' => $id])->first();
        return response()->json(['error' => '', 'company' => $company]);
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            Company::where('id', $id)->delete();

            DB::commit();
            return response()->json(['error' => '', 'message' => 'Excluído com sucesso']);
        }catch(\Exception$e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
