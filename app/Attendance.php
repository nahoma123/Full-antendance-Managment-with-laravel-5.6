<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
class Attendance extends Model
{
    //
    protected $primaryKey='employee_id';
    protected $employee_id;
    
    public $timestamps=false;
    public function employees(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
}
