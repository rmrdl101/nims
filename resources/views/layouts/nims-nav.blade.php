
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">CSMC - Nursing Information Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ ($branch == 'Home') ? 'active':'' }}">
                    <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="nav-item {{ ($branch == 'Bed Occupancy Overview') ? 'active':'' }}">
                    <a class="nav-link" href="{{ url('bed-occupancy-overview') }}"><i class="fa fa-th"></i> Bed Tracker</a>
                </li>
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="charts.html"><i class="fa fa-pie-chart"></i> Charts</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">--}}
                {{--                        <i class="fa fa-laptop"></i> UI Elements--}}
                {{--                    </a>--}}
                {{--                    <div class="dropdown-menu">--}}
                {{--                        <a class="dropdown-item" href="general.html"><i class="fa fa-circle-o mr-1"></i> General</a>--}}
                {{--                        <a class="dropdown-item" href="icons.html"><i class="fa fa-circle-o mr-1"></i> Icons</a>--}}
                {{--                        <a class="dropdown-item" href="buttons.html"><i class="fa fa-circle-o mr-1"></i> Buttons</a>--}}
                {{--                        <a class="dropdown-item" href="modals.html"><i class="fa fa-circle-o mr-1"></i> Modals</a>--}}
                {{--                        <a class="dropdown-item" href="treeview.html"><i class="fa fa-circle-o mr-1"></i> Treeview</a>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="forms.html"><i class="fa fa-edit"></i> Forms</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">--}}
                {{--                        <i class="fa fa-table"></i> Tables--}}
                {{--                    </a>--}}
                {{--                    <div class="dropdown-menu">--}}
                {{--                        <a class="dropdown-item" href="simple.html"><i class="fa fa-circle-o mr-1"></i> Simple Tables</a>--}}
                {{--                        <a class="dropdown-item" href="datatable.html"><i class="fa fa-circle-o mr-1"></i> Data Tables</a>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">--}}
                {{--                        <i class="fa fa-folder"></i> Examples--}}
                {{--                    </a>--}}
                {{--                    <div class="dropdown-menu">--}}
                {{--                        <a class="dropdown-item" href="login.html"><i class="fa fa-circle-o mr-1"></i> Login</a>--}}
                {{--                        <a class="dropdown-item" href="register.html"><i class="fa fa-circle-o mr-1"></i> Register</a>--}}
                {{--                        <a class="dropdown-item" href="404.html"><i class="fa fa-circle-o mr-1"></i> 404 Page</a>--}}
                {{--                        <a class="dropdown-item" href="blank.html"><i class="fa fa-circle-o mr-1"></i> Blank Page</a>--}}
                {{--                        <a class="dropdown-item" href="loader.html"><i class="fa fa-circle-o mr-1"></i> Loader</a>--}}
                {{--                        <a class="dropdown-item" href="calendar.html"><i class="fa fa-circle-o mr-1"></i> Calendar</a>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>
