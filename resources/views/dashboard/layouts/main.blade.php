<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            @if($leaves != "")
                {{ $leaves }}s
            @elseif($twig != "")
                {{ $twig }}
            @elseif($branch != "")
                {{ $branch }}
            @elseif($tree != "")
                {{ $tree }}
            @endif | CSMC - Nursing Information Management System</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ url('/') }}/dash/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield('page_css')
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="{{ url('/dashboard') }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>C</b>N</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>CSMC</b>NIMS</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->fname }}+{{ Auth::user()->lname }}" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{ Auth::user()->lname }}, {{ Auth::user()->fname }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->fname }}+{{ Auth::user()->lname }}" class="img-circle" alt="User Image">

                                        <p>
                                            {{ Auth::user()->lname }}, {{ Auth::user()->fname }}
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ url('dashboard/profile') }}" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ url('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->fname }}+{{ Auth::user()->lname }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{ Auth::user()->initials }}</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    @include('dashboard.layouts.sidebar-nav')
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        @if($leaves != "")
                            {{ $leaves }}s
                        @elseif($twig != "")
                            {{ $twig }}s
                        @elseif($branch != "")
                            {{ $branch }}s
                        @elseif($tree != "")
                            {{ $tree }}s
                        @endif

                    </h1>
                    <ol class="breadcrumb">
                        @if ($tree != "")
                            <li><a href="#"><i class="fa fa-dashboard"></i> {{ $tree }}</a></li>

                            @if ($branch != "")
                                <li class="active">{{ $branch }}</li>
                                @if ($twig != "")
                                    <li class="active">{{ $twig }}</li>
                                    @if ($leaves != "")
                                        <li class="active">{{ $leaves }}s</li>
                                    @endif
                                @endif
                            @endif
                        @endif
                    </ol>
                </section>

                <!-- Main content -->
                @yield('main-content')
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.1
                </div>
                <strong>Copyright &copy; 2020-2021 <a href="{{ url('/') }}">CSMC-NIMS</a>.</strong> All rights
                reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="{{ url('/') }}/dash/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ url('/') }}/dash/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ url('/') }}/dash/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ url('/') }}/dash/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="{{ url('/') }}/dash/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="{{ url('/') }}/dash/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('/') }}/dash/dist/js/adminlte.min.js"></script>
        {{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
        {{--<script src="{{ url('/') }}/dist/js/pages/dashboard.js"></script>--}}
        <!-- AdminLTE for demo purposes -->
        <script src="{{ url('/') }}/dash/dist/js/demo.js"></script>

        <!-- Toastr -->
        <script src="{{ url('/') }}/dash/plugins/toastr/toastr.min.js"></script>
        <!-- SweetAlert2 -->
        <script src="{{ url('/') }}/dash/dist/sweetalert/sweetalert2.min.js"></script>
        <script  type="text/javascript">
            @if(Session::has('success'))
            Swal.fire(
                'Success!',
                '{!! Session::get('success') !!}',
                'success'
            )
            @endif
            @if(Session::has('warning'))
            Swal.fire(
                'Warning!',
                '{!! Session::get('warning') !!}',
                'warning'
            )
            @endif
            @if(Session::has('error'))
            Swal.fire(
                'Error!',
                '{!! Session::get('error') !!}',
                'error'
            )
            @endif
        </script>

        @yield('page_js')
    </body>
</html>
