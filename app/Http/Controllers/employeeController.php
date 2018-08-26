<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;
use App\Shift;
use App\Job;
use \Illuminate\Foundation\Validation\ValidatesRequests;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
     $this->middleware('auth');
     
    }
    public function index()
    {
        //
        $employees = Employee::with('Jobs')->with('shifts')->orderBy('name')->get();
        
        return view('employee.index',compact('employees',$employees));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $shifts= Shift::all();
        $jobs = Job::all();
        return view('employee.employee_form')->with('jobs',$jobs)->with('shifts',$shifts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        date_default_timezone_get('russia/moscow');
        $in=  strtotime($request->sign_in_time);
        $out=  strtotime($request->sign_out_time);
        $this->validate($request,[
            'id'=>'bail|unique:Employees|required|numeric',
            'name'=>'bail|unique:employees|required',
            'job_id'=>'bail|required',
            'sign_in_time'=>'bail|required',
            'sign_out_time'=>'bail|required'
        ]);
//        $request->validate([
//            'id'=>'required|number',
//            'name'=>'required',
//            'job_id'=>'required',
//            'sign_in_time'=>'required',
//            'sign_out_time'=>'required'
//        ]);
        
        $employee= new Employee;
        $employee->id=$request->id;
        $employee->name=$request->name;
        $employee->job_id=$request->job_id;
        $employee->shift_id=$request->shift_id;
        $employee->gender=$request->gender_id;
        $employee->hired_at=\Carbon\Carbon::now();
        $employee->sign_in_time=date("Y-m-d H:i:s", $in);
        $employee->sign_out_time=date("Y-m-d H:i:s", $out);
        $employee->save();
        
        return redirect()->to("/employee/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $emp=Employee::find($id);
        if(isset($emp)){
            // default
            
        }else{
            $emp=Employee::find(session()->get('id'));
            
        }
        
        
        $job=$emp->jobs()->get()[0];
        $shift=$emp->shifts()->get()[0];
        return view('employee.employee_detail')->with('job',$job[0])->with('job',$job)->with('employee',$emp)->with('shift',$shift);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shifts= Shift::all();
        $jobs = Job::all();
        $emp=Employee::where('id',$id)->with('shifts')->with('jobs')->first();
        return view('employee.employee_form_update')->with('employee',$emp)->with('jobs',$jobs)->with('shifts',$shifts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        date_default_timezone_get('russia/moscow');
        $in=  strtotime($request->sign_in_time);
        $out=  strtotime($request->sign_out_time);
        $employee= Employee::find($request->id);
        $employee->id=$request->id;
        $employee->name=$request->name;
        $employee->job_id=$request->job_id;
        $employee->shift_id=$request->shift_id;
        $employee->gender=$request->gender_id;
        $employee->hired_at=\Carbon\Carbon::now();
        $employee->sign_in_time=date("Y-m-d H:i:s", $in);
        $employee->sign_out_time=date("Y-m-d H:i:s", $out);
        
        $employee->save();
        
        
        return redirect()->to("/employee/".  request()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Employee::find($id)->delete();
        return back();
    }
    
}
