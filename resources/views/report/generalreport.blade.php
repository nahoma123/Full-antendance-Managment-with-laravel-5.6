@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    
                    
                    <p class="pull-right"><b>Generate Attendance Report</b> </p> 
                    <p></p>
                </div>
                <div class="panel-body">
                    <form action="{{ url('/report/generateReport/post_generalreport')}}" method="post">
                        {{csrf_field()}}
                        <ul style="padding: 1.5em" class="list-group " >
                            <li class="list-group-item ">  <b>BEGINNING DATE</b>  </li>
                            <li class="list-group-item">  <input placeholder="YYYY-MM-DD" name="b_date" type="date" class="date datepicker-dropdown form-control col-md-2"/>   </li>
                        </ul>
                        
                        <ul class="list-group">
                            <li class="list-group-item">  <b>LAST DATE </b> </li>
                            <li class="list-group-item">  <input placeholder="YYYY-MM-DD" name="l_date" type="date" class="date datepicker-dropdown form-control col-md-2"/>   </li>
                        </ul>
                        <hr/>
                        
                        <div style="padding: 2em">
                            
                        <button type="submit"  class="btn btn-success center-block pull-left" >
                            <span class="glyphicon glyphicon-user"></span>
                        Generate Report  
                        </button>
                        </div>
                        
                    </ul>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
