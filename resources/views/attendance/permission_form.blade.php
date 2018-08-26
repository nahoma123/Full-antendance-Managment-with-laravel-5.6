@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Permission Form </div>

                <div class="panel-body">
                    <form action='/attendance/permission/confirm' role="form" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Employee Name:</label>
                            <select name='name' class="form-control" id="name">
                                @foreach($employee as $emp)
                                <option value="{{$emp->id}}">{{$emp->name}}</option> 
                                @endforeach
                            </select>
                            <i style="color: red;"> {{$errors->first('name')}}</i>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="f_date">From:</label>
                            <input name='f_date' type="date" id="f_date" class="form-control"/>
                            <i style="color: red;"> {{$errors->first('f_date')}}</i>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="l_date">To:</label>
                            <input name='l_date' type="date" class="form-control" id="f_date"/>
                            <i style="color: red;"> {{$errors->first('l_date')}}</i>
                        </div>
                        <div class="form-group">
                            <label for="Reason">Reason:</label>
                            <textarea name='reason' type="text" class="form-control" id="Reason"></textarea>
                            <i style="color: red;"> {{$errors->first('reason')}}</i>
                        </div>
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
