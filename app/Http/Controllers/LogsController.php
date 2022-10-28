<?php

namespace App\Http\Controllers;

use \App\Models\Logs;
use App\Models\User\User;
use Illuminate\Http\Request;

class LogsController extends Controller
{

    public function dashboard()
    {
        $chart = Logs::selectRaw("DATE_FORMAT(logs.created_at, '%H') as hour, count(logs.user_id) as qtd")
            ->join('users', 'users.id', '=', 'logs.user_id')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();
        foreach($chart as $item){
            $item['hour'] = $item['hour'].':00';
        }
        
        $last_logs = Logs::with(['getUser'])->orderBy('created_at', 'DESC')->limit(5)->get();
        $total = User::all()->count();

        return response()->json(['chart' => $chart, 'last_logs' => $last_logs, 'total' => $total]);
    }

    public function getLogs(Request $request)
    {
        $logs = Logs::with(['getUser'])
            ->select('logs.*')
            ->join('users', 'users.id', '=', 'logs.user_id')
            ->where(function ($query) use ($request) {
                $query
                    ->orWhere('users.name', 'like', '%' . $request->search . '%')
                    ->orWhere('logs.created_at', 'like', '%' . $request->search . '%');
            })->paginate($request->per_page, ['*'], 'page', $request->page);

        return response()->json(['logs' => $logs]);
    }
}
