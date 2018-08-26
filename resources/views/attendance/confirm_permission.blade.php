@extends('layouts.app')
@section('scripts')
    $('form').submit(function(e){
        $(':disabled').each(function(e){
            $(this).removeAttr('disabled');
            })
            });
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Permission Form </div>
                @if (Session::has('warning'))
                <div class="alert">
                <p class='text-center'>{{Session::get('warning')}}</p>
                </div>
                @endif
                <div class="panel-body">
                    <form action='/attendance/permission/store' role="form" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name='id' value="{{$id}}"/>
                        <div class="form-group">
                            <label for="name">Employee Name:</label>
                            <select name='name' class="form-control" id="name" disabled >
                                
                                <option value="{{$name}}" selected="">{{$name}}</option>
                                
                                        
                            </select>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="f_date" >From:</label>
                            <input name='f_date' type="date" id="f_date" class="form-control" value="{{$f_date}}" disabled/>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="l_date">To:</label>
                            <input name='l_date' type="date" class="form-control" id="f_date" value="{{$l_date}}" disabled/>
                        </div>
                        <div class="form-group">
                            <label for="Reason">Reason:</label>
                            <textarea name="reason" type="text" class="form-control" id="Reason" disabled>
                                {{$reason}}
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
