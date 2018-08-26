<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Employee;
use App\Job;
use App\Shift;
use App\Attendance;

class attendanceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

     
     // $this->middleware('guest')->only(['show','index','store']);
     $this->middleware('auth')->except(['show','store','index']);
    }
    public function index() {
        //
        $today = \Carbon\Carbon::now()->toDateString();
        $attendedStatus = Attendance::whereRaw('Date(signing_time) = ?', [$today])->with('employees.shifts')->orderBy('signing_time', 'DESC')->get();
        return view('attendance.index')->withAttendance($attendedStatus);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $this->validate($request,[
           'id'=>'required|numeric'
       ]);
        $today = \Carbon\Carbon::now()->toDateString();

        $attendedStatus = Attendance::whereRaw('Date(signing_time) = ?', [$today])->where('employee_id', request()->id)->get();
        echo $attendedStatus;
        if (count($attendedStatus)) {
            $att = Attendance::where('employee_id', $request->id)->get()[0];
            $att->signout_time = \Carbon\Carbon::now();
            $att->save();
        } else {
            $att = new \App\Attendance;
            $att->employee_id = $request->id;
            $att->isAvailable = true;
            $att->signing_time = \Carbon\Carbon::now();

            $att->save();
        }
        Session::flash('Saved','Your attendance was applied.');
        return redirect('/attendance');
        // return back();
        //Attendance::where('','','');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        //
        $id=request()->attendance;
        $emp = Employee::find($id);
        $job = $emp->jobs()->get()[0];
        $shift = $emp->shifts()->get()[0];
        return view('attendance.employee_detail')->with('job', $job)->with('employee', $emp)->with('shift', $shift);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    public function confirmAttendance(Request $request) {
        $this->validate($request, [
            "f_date"=>'required|Date',
            'l_date'=>'required|Date|after:f_date',
            'reason'=>'required'
        ]);
        Session::flash('warning', 'Please check your setting before pressing \'Ok\', you can change the values by going back!!');
        $id = request()->name;

        $f_date = request()->f_date;
        $l_date = request()->l_date;
        $reason = request()->reason;
        return view('/attendance/confirm_permission')->with('name', Employee::find($id)->name)->with('f_date', $f_date)->with('l_date', $l_date)->with('reason', $reason)->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    public function addpermission() {
        
        $employee = Employee::all();
        return view('attendance.permission_form')->with('employee', $employee);
    }
    public function permissionshow(Employee $employee){
        return view("attendance.permission_view",  compact('employee',$employee));
    }

    public function permissionview(Employee $employee) {
        $this->validate(request(),
        [
            'f_date' => 'required|Date',
            'l_date' => 'required|Date|after:f_date'
            
        ]
            
        );
        $fday = date('Y-m-d', strtotime(request()->b_date));
        $lday = date('Y-m-d', strtotime(request()->l_date));
        $id =  $employee->id;
        $temp = \App\Attendance::whereDate('signing_time', ">=", $fday)->whereDate('signing_time', "<=", $lday)->where('employee_id', $id)->where('isAvailable', 0)->get();
        $unavailableWithPermissionDays=[];
        if(isset($temp)){
        foreach ($temp as $temp1) {
            if (count($temp)) {
                array_push($unavailableWithPermissionDays, $temp1);
            } 
        }
        }
        return view('report.unavailable_with_permission')->with('result',$unavailableWithPermissionDays)->with('employee_name',$employee->employee_name);
    }

    public function permissionstore() {
        $id = request()->id;

        $f_date = request()->f_date;
        $l_date = request()->l_date;
        $reason = request()->reason;

        $current_date = $f_date;

        while ($current_date < $l_date) {
            $att = new Attendance;
            $att->employee_id = $id;
            $att->signing_time = $current_date;
            $att->isAvailable = 0;
            $att->absent_reason = $reason;
            $att->save();

            $current_date = date('Y-m-d', strtotime('+1 day', strtotime($current_date)));
        }
        return redirect('attendance/permission/add');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
