@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Form</div>

                <div class="panel-body">

                    <form action="/employee/{{$employee->id}}" role="form" method="POST">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="id">Employee Id</label>
                                    <input name='id' type="number" class="form-control" id="id" placeholder="Enter Name" value="{{$employee->id}}" >
                                </div>
                                <div class="form-group">
                                    <label for="name">Employee Name</label>
                                    <input name ='name' type="text" class="form-control" id="name" placeholder="Enter Name" value="{{$employee->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="job_id">Job</label>
                                    <select name='job_id' class="form-control" id='job_id' >
                                        @foreach($jobs as $job)
                                        <option 
                                            @if($employee->job_id==$job->id)
                                                selected
                                            @endif
                                            value="{{$job->id}}">{{$job->job_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shift_id">Shift</label>
                                    <select name='shift_id' class="form-control" id='shift_id'>
                                        @foreach($shifts as $shift)
                                        <option 
                                            @if($employee->shift_id==$shift->id)
                                                selected
                                            @endif
                                            value="{{$shift->id}}">{{$shift->time}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gender_id">Gender</label>
                                    <select name='gender_id' class="form-control" id='gender_id'>
                                        <option @if($employee->gender)
                                                    selected
                                                @endif
                                                 value="0" >Female</option>
                                        <option @if($employee->gender)
                                                    selected
                                                @endif
                                            value="1">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name='gender_id' class="form-control" id='status'>
                                        <option value="0">Active</option>
                                        <option value="1">Left</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sign_in_time">Sign In Time</label>
                                    <input name='sign_in_time'type="time" class="form-control" id="sign_in_time" placeholder="Enter Name" value="{{date('H:i',strtotime($employee->sign_in_time))}}">
                                </div>
                                <div class="form-group">
                                    <label for="sign_out_time">Sign Out Time</label>
                                    <input name = 'sign_out_time' type="time" class="form-control" id="sign_out_time" placeholder="Enter Name" value="{{date('H:i',strtotime($employee->sign_out_time))}}">
                                </div>
                                
                            </div>
                        </div>
                </div>
                <br/><br/>
                <button type="submit" class="btn btn-success col-md-2 col-md-offset-2 ">Save</button>
                </form>


            </div>
        </div>
    </div>
</div>
@endsection