<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    public $timestamps=false;
    public function employees(){
        return $this->hasMany("App\Employee",'id');
    }
}
