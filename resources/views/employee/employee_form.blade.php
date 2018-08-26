@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Employee Form</div>
                <div class="panel-body">

                    <form action="/employee" role="form" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="id">Employee Id</label>
                                    <input name='id' type="number" class="form-control" id="id" placeholder="Enter Id Number">
                                    <div class="resize" >
                                        @if(count($errors->first('id')))
                                        <p style="color: red;margin-left: 7%;" class="center danger"><i > {{$errors->first('id')}} *</i></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Employee Name</label>
                                    <input name ='name' type="text" class="form-control" id="name" placeholder="Enter Name">
                                    <div class="resize" >
                                        @if(count($errors->first('name')))
                                        <p style="color: red;margin-left: 7%;" class="center danger"><i >{{$errors->first('name')}} *</i></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="job_id">Job</label>
                                    <select name='job_id' class="form-control" id='job_id'>
                                        @foreach($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->job_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shift_id">Shift</label>
                                    <select name='shift_id' class="form-control" id='shift_id'>
                                        @foreach($shifts as $shift)
                                        <option value="{{$shift->id}}">{{$shift->time}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="gender_id">Gender</label>
                                    <select name='gender_id' class="form-control" id='gender_id'>
                                        <option value="0">Female</option>
                                        <option value="1">Male</option>
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
                                    <input name='sign_in_time'type="time" class="form-control" id="sign_in_time" placeholder="Enter Name">
                                    <div class="resize" >
                                        @if(count($errors->first('sign_in_time')))
                                        <p style="color: red;margin-left: 7%;" class="center danger"><i >{{$errors->first('sign_in_time')}} *</i></p>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="sign_out_time">Sign Out Time</label>
                                    <input name = 'sign_out_time' type="time" class="form-control" id="sign_out_time" placeholder="Enter Name">
                                    <div class="resize" >
                                        @if(count($errors->first('sign_out_time')))
                                        <p style="color: red;margin-left: 7%;" class="center danger"><i >{{$errors->first('sign_out_time')}} *</i></p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                <br/><br/>

                <button type="submit" class="btn btn-success btn-block ">Save</button>
                </form>


            </div>
        </div>
    </div>
</div>
@endsection