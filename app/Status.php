<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    public function tasks(){
        return $this->belongsToMany('App\Task', 'task_statuses', 'status_id', 'tasks_id');
    }
}
