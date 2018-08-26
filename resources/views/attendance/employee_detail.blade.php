@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item text-muted"> 
                             <h2 class="text-center text-uppercase">{{$employee->name}}</h2>
                        </li>
                    </ul>
                    <table class="table table-striped ">
                        <tr > 
                            <td>
                                <p style='font-size:15px;' class="text-left">
                           Employee Id.
                                </p>
                            </td>
                            <td>
                                <p style='font-size:15px;' class="text-left">{{$employee->id}}</p>
                            </td>
                        </tr>
                        <tr > 
                            <td>
                                <p style='font-size:15px;' class="text-left">
                           Employee's job.
                                </p>
                            </td>
                            <td>
                                <p style='font-size:15px;' class="text-left">{{$job->job_name}}</p>
                            </td>
                        </tr>
                        <tr > 
                            <td>
                                
                                <p style='font-size:15px;' class="text-left">
                           Employee's Shift.
                                </p>
                           </td>
                           <td>
                               <p style='font-size:15px;' class="text-left">
                           {{$shift->time}}
                               </p>
                           </td>
                        </tr>
                        <tr > 
                            <td>
                                <p style='font-size:15px;' class="text-left">
                           Date hired.
                                </p>
                           </td>
                           <td>
                               <p style='font-size:15px;' class="text-left">
                           {{date('d-m-Y ',strtotime($employee->hired_at))}}
                               </p>
                           </td>
                        </tr>
                        <tr > 
                            <td>
                                <p style='font-size:15px;' class="text-left">
                           Employee's status.
                                </p>
                            </td>
                            <td>
                                <p style='font-size:15px;' class="text-left">
                                    @if(!$employee->isRetired)
                                        Available
                                    @endif
                                </p>
                            </td>
                        </tr>
                        
                        <tr > 
                            <td>
                                <p style='font-size:15px;' class="text-left">
                           Employee's Sign in time.
                                </p>
                            </td>
                            
                            <td>
                                <p style='font-size:15px;' class="text-left">
                                    
                                        
                                    
                           {{date('h:i:s A',strtotime($employee->sign_in_time))}}
                                </p>
                            </td>
                           
                        </tr> 
                        <tr > 
                            <td>
                                <p style='font-size:15px;' class="text-left">
                           Employee's sign out time.
                                </p>
                            </td>
                            
                            <td>
                                <p style='font-size:15px;' class="text-left">
                                    
                                        
                           {{date('h:i:s A',strtotime($employee->sign_out_time))}}

                                </p>
                            </td>
                           
                        </tr> 
                        <tr > 
                            <td>
                                <p style='font-size:15px;' class="text-left">
                           Employee's Gender.
                                </p>
                            </td>
                            
                            <td>
                                <p style='font-size:15px;' class="text-left">
                                    
                                        
                                    @if (!$employee->gender)
                                        Female
                                    @else
                                        Male
                                    @endif
                                </p> 
                            </td> 
                        </tr> 
                    </table>
                    <form action='/attendance' method="post">
                        {{csrf_field()}}
                        <input type="hidden" name='id' value="{{$employee->id}}">
                        <input value="OK" type="submit" class="btn btn-primary btn-block" autofocus>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
