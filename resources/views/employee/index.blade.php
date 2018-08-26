@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">


                @if(count($employees))
                
                <table class="table table-hover table-condensed ">
                    <h3>
                        <thead class="panel-heading">
                            <tr>
                                <th>Name</th>
                                <th>Hired at</th>
                                <th>Job</th>
                                <th>Shift</th>
                                <th></th>
                            </tr>
                        </thead>
                    </h3>
                    
                    @foreach($employees as $employee)
                    <tbody>
                        <tr >
                            <td>{{$employee->name}}</td>
                            <td>{{date("Y-m-d",strtotime($employee->hired_at))}}</td>
                            <td>{{$employee->jobs->job_name}}</td>
                            <td>
                                {{$employee->shifts->time}}
                            </td>
                            <td>  
                                <a   href="employee/{{$employee->id}}" class="btn btn-xs btn-primary"> View Detail </a>          
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
