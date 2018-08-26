<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    protected $job_id;
    protected $shift_id;
   

    //
    
    public $timestamps=false;
   
    public function shifts(){
    
        return $this->belongsTo("App\Shift",'shift_id','id');
    }
    public function jobs(){
    
        return $this->belongsTo("App\Job",'job_id','id');
    }
    public function attendances(){
        return $this->hasMany("App\Attendance",'employee_id','id');
    }
    
}
