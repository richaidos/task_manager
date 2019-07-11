<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    //

     public function index(){
/*
        $tasks = Task::with(['favorite' => function($q) {
                $q->where('user_id', Auth::user()->id);
            }])->get();
*/

        return view('tasks.main', [
           'tasks' => Task::get()
        ]);
    }

    public function getTasks(Request $request){
/*        return response()->json([
                'tasks' => json_encode(Task::paginate(), JSON_UNESCAPED_UNICODE),
                'msg'    => 'Good',
            ], 201);*/
        $tasks = Task::with('status');
        if($request->input('res')){
            $params = json_decode($request->input('res'));
            if($params->role_id != 0){
                $tasks = $tasks->where('role', $params->role_id);
            }
            if($params->responsible != null){
                $arr = explode(',', $params->responsible);
                $resp = '';
                foreach($arr as $ar){
                    $resp = $ar;
                    $tasks = $tasks->with(['responsible' => function($q) {
                        $q->where('name', 'like', '%' . self::$resp . '%');
                    }]);
                }
            }
        }

        $tasks = $tasks->paginate();

        return response()->json([
            'tasks' => $tasks,
            'status' => 'success'
        ], 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }
}
