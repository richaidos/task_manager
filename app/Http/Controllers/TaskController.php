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

    }
}
