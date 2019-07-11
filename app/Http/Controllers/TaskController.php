<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{

     public function index(){
        return view('tasks.main', [
           'tasks' => Task::get()
        ]);
    }

    public function getTasks(Request $request){
        $tasks = Task::with('status')->with('responsible');
        if($request->input('res')){
            $params = json_decode($request->input('res'));
            if($params->role_id != 0){
                $tasks = $tasks->where('role', $params->role_id);
            }
            if($params->responsible != null){
                $arr = explode(',', $params->responsible);
                foreach($arr as $ar){
                    $tasks = $tasks->whereHas('responsible', function($q) use ($ar){
                        $q->where('name', 'like', '%' . $ar . '%');
                    });
                }
            }
            if($params->producer != null){
                $arr = explode(',', $params->producer);
                foreach($arr as $ar){
                    $tasks = $tasks->whereHas('producer', function($q) use ($ar){
                        $q->where('name', 'like', '%' . $ar . '%');
                    });
                }
            }
            if($params->title != null){
                $tasks = $tasks->where('title', 'like', '%' . $params->title . '%');
            }
            if($params->status != null){
                $arr = explode(',', $params->status);
                foreach($arr as $ar){
                    $tasks = $tasks->whereHas('status', function($q) use ($ar){
                        $q->where('title', 'like', '%' . $ar . '%');
                    });
                }
            }
            if($params->last_date != null){
                $tasks = $tasks->whereDate('deadline', '<', date($params->last_date));
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
