@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dates that the employee was given permission  <b style="color:blue;">[{{$employee_name}}] </b></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>Date</th>
                        <th>Reason</th>
                        </thead>
                        <tbody>
                            
                            @foreach($result as $res)
                            <tr>
                                <td >{{date('D (Y-m-d)',strtotime($res->signing_time))}}</td>
                                <td class="danger">{{$res->absent_reason}}</td>
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
