<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ ($tree == 'Dashboard') ? 'active':'' }} treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ ($branch == 'Profile') ? 'active':'' }}"><a href="{{ url('dashboard/profile') }}"><i class="fa fa-user"></i> Profile</a></li>
            <li class="{{ ($branch == 'Mail') ? 'active':'' }}"><a href="#"><i class="fa fa-envelope"></i> Mail</a></li>


{{--            @if(Auth::user()->hasPosition('admin'))--}}
                <!-- Admin Navigation Here -->
                <li class="{{ ($branch == 'Admin') ? 'active':'' }} treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Admin</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ ($twig == 'Index') ? 'active':'' }}"><a href="{{ url('dashboard/admin') }}"><i class="fa fa-home"></i>Home</a></li>
                         <li class="{{ ($twig == 'User Management') ? 'active':'' }} treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>User Management</span>
                                <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ ($leaves == 'User') ? 'active':'' }}"><a href="{{ url('dashboard/admin/users') }}"><i class="fa fa-user"></i>Users</a></li>
                                <li class="{{ ($leaves == 'Department') ? 'active':'' }}"><a href="{{ url('dashboard/admin/departments') }}"><i class="fa fa-sitemap"></i>Departments</a></li>
                                <li class="{{ ($leaves == 'Position') ? 'active':'' }}"><a href="{{ url('dashboard/admin/positions') }}"><i class="fa fa-users"></i>Positions</a></li>
                                <li class="{{ ($leaves == 'Page') ? 'active':'' }}"><a href="{{ url('dashboard/admin/pages') }}"><i class="fa fa-files-o"></i>Pages</a></li>
                                <li class="{{ ($leaves == 'Permission') ? 'active':'' }}"><a href="{{ url('dashboard/admin/permissions') }}"><i class="fa fa-key"></i>Permissions</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
{{--            @endif--}}

        </ul>
    </li>

    @if(Auth::user()->hasPosition('admin'))
        <li class="{{ ($branch == 'Schedules') ? 'active':'' }}">
            <a href="{{ url('dashboard/schedules') }}">
                <i class="fa fa-calendar"></i> <span>Schedule Manager</span>
                <span class="pull-right-container">
              {{--<small class="label pull-right bg-red">3</small>--}}
              {{--<small class="label pull-right bg-blue">17</small>--}}
            </span>
            </a>
        </li>
        <li class="{{ ($branch == 'Key Performance Indicators') ? 'active':'' }}">
            <a href="{{ url('dashboard/key-performance-indicators') }}">
                <i class="fa fa-calendar"></i> <span>KPI</span>
                <span class="pull-right-container">
              {{--<small class="label pull-right bg-red">3</small>--}}
              {{--<small class="label pull-right bg-blue">17</small>--}}
            </span>
            </a>
        </li>
        <li class="{{ ($branch == 'Bed Occupancy') ? 'active':'' }}">
            <a href="{{ url('dashboard/bed-occupancy') }}">
                <i class="fa fa-bed"></i> <span>Bed Occupancy</span>
            </a>
        </li>
    @endif
    <li class="header">Common Forms</li>
    <li><a href="{{ url('user-panel/leave-form') }}"><i class="fa fa-circle-o text-red"></i> <span>Leave Forms</span></a></li>
</ul>
