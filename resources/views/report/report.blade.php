@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><b style="font-size: 115%; color: silver;text-align: center;">Attendance Report</b></div>
                <table class="table table-striped">
                    <thead>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td>{{$employee->name}}</td>
                    </tr>
                    <tr>
                        <td>From:</td>
                        <td>{{$fday}}</td>
                    </tr>
                    <tr>
                        <td>To:</td>
                        <td>{{$lday}}</td> 
                    </tr>
                    <tr>
                        <td>Sign In time:</td>
                        <td>{{date('h:i A',strtotime($employee->sign_in_time))}}</td>
                    </tr>
                    <tr>
                        <td>Sign Out Time:</td>
                        <td>{{date('h:i A',strtotime($employee->sign_out_time))}}</td>
                    </tr>
                    <tr>
                        <td>Available Days:</td>
                        <td>{{count($employee->attendances)}}</td>
                    </tr>
                    <tr>
                        <td>Total Absent :</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    {{count($unavailableWithOutPermission)}}
                                </div>
                                <div class="col-md-6">
                                    <form method="post" action="/report/viewunavailablewithoutpermission/">
                                        {{csrf_field()}}
                                        <input type='hidden' name='id' value="{{$employee->id}}"/>
                                        <input type='hidden' name='b_date' value="{{$fday}}"/>
                                        <input type='hidden' name='l_date' value="{{$lday}}"/>
                                        <input  type="submit" class="btn-xs btn-danger" value="View">
                                    </form>
                                </div>
                            </div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Permission Days:</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    {{count($unavailableWithPermission)}}
                                </div>
                                <div class="col-md-6">
                                    <form method="post" action="/report/viewunavailablewithpermission/">
                                        {{csrf_field()}}
                                        <input type='hidden' name='id' value="{{$employee->id}}"/>
                                        <input type='hidden' name='b_date' value="{{$fday}}"/>
                                        <input type='hidden' name='l_date' value="{{$lday}}"/>
                                        <input type='hidden' name='array' value="{{$employee->date}}"/>
                                        <input  type="submit" class="btn-xs btn-primary" value="View">
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
                
                </table>

                <div class="panel-body">
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><b style="font-size: 115%; color: blue;">[AVAILABLE DAYS: ] </b>Attendance report for <b style="color: red">{{$employee->name}}</b> from  <b style="color: red">{{$fday}}</b> to <b style="color: red">{{$lday}}</b></div>

                <div class="panel-body">
                    <table class="table table-striped col-md-4">
                            <thead>
                                 <tr>
                                    <th>Date</th>
                                    <th>Time signed in</th>
                                    <th>Time signed out</th>
                                    <th>Sign in status</th>
                                    <th>Sign out status</th>
                                    
                                    
                               </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($employee->attendances as $attendance)
                                <tr class="
                                        
                                    ">
                                    <td>{{date('Y-m-d',strtotime($attendance->signing_time))}} </td>
                                    <td>{{date('h:i A',strtotime($attendance->signing_time))}}</td>
                                    <td>{{date('h:i A',strtotime($attendance->signout_time))}}</td>
                                    <td class=' 
                                        @if(strtotime($employee->sign_in_time)>=strtotime($attendance->signing_time))
                                            success
                                        @else
                                            danger
                                        @endif
                                        '>
                                     @if(strtotime($employee->sign_in_time)>=strtotime($attendance->signing_time))
                                            OK
                                        @else
                                            Check
                                        @endif
                                    </td>
                                    <td class="
                                        @if(strtotime($employee->sign_out_time)<=strtotime($attendance->signout_time))
                                            success
                                        @else
                                            danger
                                        @endif
                                        "> 
                                    @if(strtotime($employee->sign_out_time)<=strtotime($attendance->signout_time))
                                            success
                                    @else
                                            Check
                                    @endif
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
