<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Employee;

class reportController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
     $this->middleware('auth');
     
    }

    public function index() {
        //
    }

    public function generalreportResult() {
        $fday = date('Y-m-d', strtotime(request()->b_date));
        $lday = date('Y-m-d', strtotime(request()->l_date));
        
        if(session()->has('lday')){
            session()->remove('day');
        }
        if(session()->has('fday')){
            session()->remove('fday');
        }
        session()->put('fday',$fday);
        session()->put('lday',$lday);
        
        $checkDate = $fday;
        $result = [];
        $employees = Employee::where('isRetired',0)->get();
        
        $unavailableWithOutPermissionDays = [];
        $warningDays=[];
        $checkDate2=$fday;
        foreach ($employees as $employee) {
            $row = [];
            array_push($row,$employee->id);
            array_push($row, $employee->name);
            array_push($row, $employee->hired_at); //3

            for ($checkDate = $fday; $checkDate <= $lday; $checkDate) {
                //return dd($lday);
                if (!\App\Attendance::whereDate('signing_time', '=', [$checkDate])->where('employee_id', $employee->id)->where('isAvailable', 1)->exists()) {
                    array_push($unavailableWithOutPermissionDays, $checkDate);
                }
                
                $checkDate = date('Y-m-d', strtotime('+1 day', strtotime($checkDate)));
            }
            $warniningDate = date('Y-m-d', strtotime('-4 day', strtotime($lday)));
            
            array_push($row, count($unavailableWithOutPermissionDays));
            array_push($row,count(\App\Attendance::whereDate('signing_time', ">=", $fday)->whereDate('signing_time', "<=", $lday)->where('employee_id', $employee->id)->where('isAvailable', 0)->get()));
            
            
            $unavailableWithOutPermissionDays=[]; 
            for ($checkDate2 = $warniningDate; $checkDate2 <= $lday; $warniningDate) {
                //return dd($lday);
                
                if (!\App\Attendance::whereDate('signing_time', '=', [$checkDate2])->where('employee_id', $employee->id)->exists()) {
                    array_push($warningDays, $checkDate2);
                }
                
                $checkDate2 = date('Y-m-d', strtotime('+1 day', strtotime($checkDate2)));
            }
            array_push($row, count($warningDays));
            $checkDate = $fday;
            $warningDays=[];
            $checkDate2 = $warniningDate;
            array_push($result, $row);
            
            //array_push($row,count(\App\Attendance::whereDate('signing_time', ">=", $wariningDate)->whereDate('signing_time', "<=", $lday)->where('employee_id', $employee->id)->where('isAvailable', 0)->get()));
            
        }

        return view('report.all_employees')->with('fday',$fday)->with('lday',$lday)->with('result',$result);
    }
    
    
    public function generalreportform(){
     return view('report.generalreport');   
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Employee $employee) {
        //
        return view("report/report_form", compact('employee', $employee));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    public function generateReport($employeeId) {
        
//        $fday = date('Y-m-d', strtotime(request()->b_date));
//        $lday = date('Y-m-d', strtotime(request()->l_date));
       
        $employee = Employee::find($employeeId);
        
        $fday=  session()->get('fday');       
        $lday=  session()->get('lday');        
        
        $AvailableDays = $employee->where('id',$employeeId)->with(['attendances' =>
                    function ($query) {
                        $fday = date('Y-m-d', strtotime(session()->get('fday')));
                        $lday = date('Y-m-d', strtotime(session()->get('lday')));
                        $query->whereDate('signing_time', ">=", $fday)->whereDate('signing_time', "<=", $lday)->where('isAvailable', 1);
                    }])->with('shifts')->first();
        $checkDate = $fday;
        $unavailableWithPermissionDays = [];
        $unavailableWithOutPermissionDays = [];

        
        for ($checkb = $fday; $checkDate <= $lday; $checkDate) {
            if (!\App\Attendance::whereDate('signing_time', '=', [$checkDate])->where('employee_id', $employee)->exists()) {
                array_push($unavailableWithOutPermissionDays, $checkDate);
            }
            $checkDate = date('Y-m-d', strtotime('+1 day', strtotime($checkDate)));
        }
        $temp = \App\Attendance::whereDate('signing_time', ">=", $fday)->whereDate('signing_time', "<=", $lday)->where('employee_id', $employee->id)->where('isAvailable', 0)->get();
        foreach ($temp as $temp1) {
            if (count($temp)) {
                array_push($unavailableWithPermissionDays, $temp1);
            }
        }
        if (session()->has('unavailableWithPermissionDays')) {
            session()->remove('unavailableWithPermissionDays');
            session()->remove('unavailableWithOutPermissionDays');
        }
        session()->put('unavailableWithPermissionDays', collect($unavailableWithPermissionDays));
        session()->put('unavailableWithOutPermissionDays',collect($unavailableWithOutPermissionDays));
        
        return view('report.report')->with('employee', $AvailableDays)->with('fday', $fday)->with('lday', $lday)->with('unavailableWithOutPermission', $unavailableWithOutPermissionDays)->with('unavailableWithPermission', $unavailableWithPermissionDays);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id) {
        
    }
    public function employeeListForPermission(){
        $employees = Employee::with('Jobs')->with('shifts')->get();
        
        return view('report.permission_view',compact('employees',$employees));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function unavailablewithoutpermission(Request $request) {
        
        $employee_name = Employee::find(request()->id)->name;
        return view('report.unavailable_no_permission')->with('employee_name', $employee_name);
    }

    public function unavailablewithpermission(Request $request) {

        //$result=\App\Attendance::whereDate('signing_time',">=",  request()->b_date)->whereDate('signing_time',"<=",  request()->l_date)->where('employee_id',  intval(request()->id))->where('isAvailable',0)->get();
        $result = session()->get('unavailableWithPermissionDays');
        $employee_name = Employee::find(request()->id)->name;
        return view('report.unavailable_with_permission')->with('result', $result)->with('employee_name', $employee_name);
    }
    
}
