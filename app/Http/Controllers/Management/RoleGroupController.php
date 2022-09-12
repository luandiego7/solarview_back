<?php


namespace App\Http\Controllers\Management;

use App\Helpers\Format;
use App\Http\Controllers\Controller;
use App\Models\Management\Permission;
use App\Models\Management\RoleGroup;
use Illuminate\Http\Request;

class RoleGroupController extends Controller
{
    public function getGroups(Request $request)
    {
        if($request->has('select2')){
            $groups = Format::formatSelect2(RoleGroup::all());
        }else{
            $groups = RoleGroup::paginate($request->per_page, ['*'], 'page', $request->page);
        }
        return response()->json(['error' => '', 'groups' => $groups]);
    }


}
