<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sara Supermarket Attendance Managment System</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="/css/font-lato.css" >
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/att-style.css"

              <!-- Styles -->
              <link rel="stylesheet" href="/css/bootstrap.min.css" >
        <link rel='stylesheet' href='/css/bootstrap-datepicker3.css'>

        <style>
            body {
                height: 100%;
                font-family: 'Helvetica Neue",Helvetica,Arial,sans-serif';
                background: url("/images/content.png");
                background-color: rgba(0, 0, 0, 0);
                background-image: url("/images/content.png");
                background-repeat: repeat;
                background-attachment: scroll;
                background-clip: border-box;
                background-origin: padding-box;
                background-position-x: 0%;
                background-position-y: 0%;
                background-size: auto auto;
            }
            #content{
                margin-top: 140px;
            }
            li > .dropdown-menu::after {
                content: '';
                display: inline-block;
                border-left: 6px solid transparent;
                border-right: 6px solid transparent;
                border-bottom: 6px solid black;
                position: absolute;
                top: -6px;
                left: 120px;
            }

            .alert{
                background-color: #ff9900;
                color: white;
            }
            a{
                background-color: transparent;
            }
            .fa-btn {
                margin-right: 6px;
            }
            .nav a{
                color: #ffffff;
            }
            a.topnav_html:hover{
                border-top-style: box;
                border-radius: 0px !important;
                color: blue;
                background-color: white !important;
            }
            div.dropdown-menu:hover{
                color: whitesmoke;
                border-top: 0px solid transparent;
                text-shadow: none;
                font-size: 14px;
                padding: 12px 20px;
                padding: 12px 10px \9;
                -webkit-transition: all 0.4s ease-in-out;
                -moz-transition: all 0.4s ease-in-out;
                -o-transition: all 0.4s ease-in-out;
                -ms-transition: all 0.4s ease-in-out;
                transition: all 0.4s ease-in-out;
                box-sizing: border-box;
            }

            a.topnav_html{
                border-radius: 0px !important;
                float:right;
                color: whitesmoke;
                border-top: 0px solid transparent;
                text-shadow: none;
                font-size: 14px;
                padding: 12px 20px;
                padding: 12px 10px \9;
                -webkit-transition: all 0.4s ease-in-out;
                -moz-transition: all 0.4s ease-in-out;
                -o-transition: all 0.4s ease-in-out;
                -ms-transition: all 0.4s ease-in-out;
                transition: all 0.4s ease-in-out;
                box-sizing: border-box;
            }
            .topnavContainer{
                background-color: #337ab7;
                margin-top: 30px;
                padding-left: 70px;
                padding-bottom: 0px !important;
                margin-bottom: 0px !important;
            }
            #welcometxt{
                font-size: 15px;
                color: beige;
                padding-top:4.5px;
                text-align: left;
                display: inline-block;
                vertical-align: middle;
            }
            .reg-in {
                padding-right: 70px !important;
            }
            .top{
                background-color: black;
                //background-color: rgb(95,95,95);
                padding-bottom: 0px !important;
                height: 90px;
                
            }

            #leftNav{
                background-color: rgb(235,235,235) !important;
                height: auto 100% !important;
            }
            .dropdown-menu>li>a:hover  {
            	background-color: #0088cc;;
            }
            #topdiv{
                background-image: url("/images/sarawebsite.png") ;
				background-size: contain;
            }
            .open{
                background-color: black !important;
            }
            .dropdown.open~a{
                background-color: black !important; 
            }
            
        </style>
    </head>
    <body id="app-layout">
        <div  class="container-fluid" style="padding:0px;margin:0px;">
            <div id='topdiv' class="top" >
                
                <div class="topnavContainer">
                    <ul class="nav nav-pills topnav">

                        <!-- Collapsed Hamburger 
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
        
                        <!-- Branding Image
                        <a class="navbar-brand" href="{{ url('/') }}">
                              Sara Supermarket 
                        </a>
                        -->


                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        
                        <!--<li class="reg-in pull-right"><a class='topnav_html' href="{{ url('/register') }}">Register</a></li>
                        <li class='log-in pull-right'><a class='topnav_html' href="{{ url('/login') }}">LogIn</a></li>
                           -->
                        @else
                        <li  class="dropdown">
                            <a class=""></a>
<!--                            <a href="{{url('/attendance')}}" class=" topnav_html">
                                Take Attendance
                            </a>-->
                        </li>
                        <li  class="dropdown">
                            <a class=""></a><a></a>
<!--                            <a href="{{url('/attendance')}}" class=" topnav_html">
                                Take Attendance
                            </a>-->
                        </li>
                        <li  class="dropdown">
                            <a class=""></a><a></a>
<!--                            <a href="{{url('/attendance')}}" class=" topnav_html">
                                Take Attendance
                            </a>-->
                        </li>
                        <li  class="dropdown">
<!--                            <a href="{{url('/attendance')}}" class=" topnav_html">
                                Take Attendance
                            </a>-->
                        </li>
                        <li  class="dropdown">
                            <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                Report<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a class="" href="{{ url('/report/permission_list') }}">Permission Report</a></li>
                                <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Detail and General Report</a></li>
                            </ul>
                        </li>
                        <li  class="dropdown">
                            <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                Permission<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a class="dropdown-menu-left " href="{{ url('/attendance/permission/add') }}">Give Permission</a></li>
								<li><a class="dropdown-menu-left " href="{{ url('/report/permission_list') }}">View Permissions</a></li>
                            </ul>
                        </li>
                        <li  class="dropdown">
                            <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                View and Manage Employees <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a class="" href="{{ url('/employee') }}">View Employee</a></li>
                                <li><a class="" href="{{ url('/employee/create') }}">Register Employee</a></li>
                                <li><a class="" href="{{ url('/employee') }}">Update Employee</a></li>
                                <li><a class="" href="{{ url('/employee') }}">Terminate Employee</a></li>
                            </ul>
                        </li>
                        <li  class="dropdown">
                            <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                User Account Management <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a class="" href="{{ url('/register') }}">Register Account</a></li>
                            </ul>
                        </li>
                        <li  class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="{{ url('/logout') }}"  >Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div style="height: 100%;" class="container-fluid">


            <div id='content' class="row">

                <div  class="col-md-12">

                    <br/>
                    @yield('content')
                </div>
            </div>
        </div>





        <!-- JavaScripts -->
        <script src="/scripts/jquery.min.js" ></script>
        <script src="/scripts/bootstrap.min.js" ></script>
        <script src='/scripts/bootstrap-datepicker.min.js'></script>

        <script type="text/javascript">
$(".form_datetime").datetimepicker({
format: "dd mm yyyy -hh:ii"
});
        </script>
        <script type="text/javascript">
            @yield('scripts')
        </script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}


</body>
</html>
