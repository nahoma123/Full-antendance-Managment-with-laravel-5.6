@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dates that the employee was absent with out permission <b style="color:blue;">[{{$employee_name}}] </b></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>Date</th>
                        <th>Status</th>
                        </thead>
                        <tbody>
                            
                            @if(session()->has('unavailableWithOutPermissionDays'))
                            @foreach(session()->get('unavailableWithOutPermissionDays') as $res)
                            <tr> 
                                <td>{{date('Y-m-d',strtotime($res))}}</td>
                                <td class="danger">Employee was absent with out permission</td>
                            </tr>
                            @endforeach
                            @else
                                None 
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
