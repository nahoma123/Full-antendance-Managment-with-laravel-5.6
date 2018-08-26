@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
                
        
                    <div class="col-md-8 panel panel-success">
                        <div style="height:650px !important;overflow: scroll;" class="row">
                        <table class="table table-striped col-md-4">
                            <thead>
                                 <tr>
                                    <th>Name</th>
                                    <th>Sign In Time</th>
                                    <th>Signed at</th>
                                    <th>Shift</th>
                                    <th>Sign out TIme</th>
                                    
                               </tr>
                            </thead>
                            <tbody>
                                {{$errors->first('id')}}
                                @foreach($attendance as $attendance)
                                <tr class="
                                    @if(isset($attendance->signout_time))
                                        success
                                    @else
                                        @if(new DateTime(date('h:i A',strtotime($attendance->signing_time)))<new DateTime(date('h:i A',strtotime($attendance->employees->sign_in_time))))
                                            info
                                        @else
                                            danger
                                        @endif
                                    @endif
                                    ">
                                    <td>{{$attendance->employees->name}} </td>
                                    <td>{{date('h:i A',strtotime($attendance->employees->sign_in_time))}}</td>
                                    <td>{{date('h:i A',strtotime($attendance->signing_time))}}</td>
                                    <td>{{$attendance->employees->shifts->time}} </td>
                                    <td>{{date('h:i A',strtotime($attendance->employees->sign_out_time))}} </td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
        <form  action='temp/' style="height:100%" class="col-md-4 panel-info success">
                        <div  style="padding-top: 15%" class="form-group" method="post" >
                            <div class="panel panel-default "><h3 class="text-muted text-center"> Please Enter Your Id</h3></div>
                            
                            <div style="padding-top: 1em;;" class="form-group form-group-lg">
                                <div class="col-md-offset-1 col-sm-10">
                                    <input required  id='empid' name="id" placeholder="Enter number" class="form-control input-lg" type="text" id="lg" autofocus/>
                                </div>
                            </div>
                        </div>
        </form>
</div>
@endsection
