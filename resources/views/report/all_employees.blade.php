@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
                
        
                    <div class="col-md-12 panel panel-success">
                        <div style="height:650px !important;overflow: scroll;" class="row">
                        <table class="table table-striped col-md-4">
                            <thead>
                                 <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Hired at </th>
                                    <th>Absent with out permission</th>
                                    <th>Absent with permission </th>
                                    <th>Absent in the last 5 days </th>
                                    <th></th>
                               </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($result as $res)
                                <tr class="
                                        @if($res[5]==5)
                                            danger
                                        @endif
                                    ">
                                    <td>{{$res[0]}}</td>
                                    <td>{{$res[1]}}</td>
                                    <td>{{date('d-m-Y',strtotime($res[2]))}}</td>
                                    <td>{{$res[3]}}</td>
                                    <td>{{$res[4]}}</td>
                                    <td>{{$res[5]}}</td>
                                    <td><a href='{{url('/report/generate/'.$res[0])}}' class="btn btn-primary btn-xs">Show Detail</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
        
</div>
@endsection
