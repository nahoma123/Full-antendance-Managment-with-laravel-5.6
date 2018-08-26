<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('temp',function(){
    return redirect()->to('/attendance/'.request()->id);
});
Route::post('/report/generate/{employee}',function(){
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
    session()->put('','');
    return redirect()->to('/report/generate/'.request()->employee);
});
Route::post('attendance/{attendance}/edit ','attendanceController@create');
Route::auth();
Route::resource('employee','employeeController');
Route::get('/home', 'HomeController@index');
Route::get('report/create/{employee}','reportController@create');

Route::resource('attendance','attendanceController');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/report/viewunavailablewithoutpermission/','reportController@unavailablewithoutpermission');
Route::post('/report/viewunavailablewithpermission/','reportController@unavailablewithpermission');
Route::get('/attendance/permission/add','attendanceController@addpermission');
Route::post('/attendance/permission/confirm','attendanceController@confirmAttendance');
Route::post('/attendance/permission/store','attendanceController@permissionstore');
Route::get('/attendance/permission/view/{employee}','attendanceController@permissionshow');
Route::post('/attendance/permission/show/{employee}','attendanceController@permissionview');
Route::get('/report/generate/generalreport_form','reportController@generalreportform');
Route::post('/report/generateReport/post_generalreport','reportController@generalreportResult');
Route::get('/report/generate/{employee}','reportController@generateReport');
Route::get('/report/permission_list', 'reportController@employeeListForPermission');