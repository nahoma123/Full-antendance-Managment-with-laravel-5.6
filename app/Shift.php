<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Shift extends Model
{
    //
    public $timestamps=false;
    public function employees(){
        return $this->hasMany(Employee::class,'id');
    }
}
