<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Roles extends Model
{
    protected $fillable = ['id', 'name','slug'];


    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function users(){
        return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id');
    }
}
