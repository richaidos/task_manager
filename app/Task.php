<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Task extends Model
{
    protected $fillable = ['id', 'title','slug', 'role', 'deadline'];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function responsible(){
        return $this->belongsToMany('App\User', 'responsibles', 'tasks_id', 'responsible_id');
    }

    public function producer(){
        return $this->belongsToMany('App\User', 'producers', 'tasks_id', 'producer_id');
    }

    public function status(){
        return $this->belongsToMany('App\Status', 'task_statuses', 'tasks_id', 'status_id');
    }









}
