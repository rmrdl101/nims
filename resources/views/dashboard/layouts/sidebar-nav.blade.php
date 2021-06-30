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
            <li class="{{ ($branch == 'Profile') ? 'active':'' }}"><a href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a></li>
            @if(Auth::user()->hasPosition('admin'))
            <li class="{{ ($branch == 'Mail') ? 'active':'' }}"><a href="#"><i class="fa fa-envelope"></i> Mail</a></li>
            @endif
            <li class="{{ ($branch == 'Announcement') ? 'active':'' }}"><a href="{{ route('announcement') }}"><i class="fa fa-bullhorn"></i> Announcement</a></li>

            @if(Auth::user()->hasPosition('admin'))
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
                            <li class="{{ ($leaves == 'User') ? 'active':'' }}"><a href="{{ route('user') }}"><i class="fa fa-user"></i>Users</a></li>
                            <li class="{{ ($leaves == 'Department') ? 'active':'' }}"><a href="{{ route('department') }}"><i class="fa fa-sitemap"></i>Departments</a></li>
                            <li class="{{ ($leaves == 'Position') ? 'active':'' }}"><a href="{{ route('position') }}"><i class="fa fa-users"></i>Positions</a></li>
                            <li class="{{ ($leaves == 'Page') ? 'active':'' }}"><a href="{{ route('page') }}"><i class="fa fa-files-o"></i>Pages</a></li>
                            <li class="{{ ($leaves == 'Permission') ? 'active':'' }}"><a href="{{ route('permission') }}"><i class="fa fa-key"></i>Permissions</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </li>

    @if(Auth::user()->hasPosition('admin'&&'standard-user'))
        @if(Auth::user()->hasPosition('admin'))
            <li class="{{ ($branch == 'Schedules') ? 'active':'' }} treeview">
                <a href="{{ url('dashboard/schedules') }}">
                    <i class="fa fa-calendar"></i> <span>Schedule Manager (maint.)</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('user-panel/leave-form') }}"><i class="fa fa-circle-o"></i> <span>Leave Forms</span></a></li>
                </ul>
            </li>
        @endif

        <li class="{{ ($branch == 'Document View') ? 'active':'' }}">
            <a href="{{ route('document-manager') }}">
                <i class="fa fa-archive"></i> <span>Document Manager</span>
            </a>
        </li>
    @endif
    <!-- Accomplishment -->
    <li class="{{ ($tree == 'Accomplishment Report') ? 'active':'' }} treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Accomplishment Reports</span>
            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ ($branch == 'Bed Occupancy') ? 'active':'' }}">
                <a href="{{ url('accomplishment-reports/bed-occupancy') }}">
                    <i class="fa fa-bed"></i> <span>Bed Occupancy</span>
                </a>
            </li>
            <li class="{{ ($branch == 'Key Performance Indicators') ? 'active':'' }}">
                <a href="{{ route('key-performance-indicators') }}">
                    <i class="fa fa-edit"></i> <span>KPI</span>
                    <span class="pull-right-container">
                  {{--<small class="label pull-right bg-red">3</small>--}}
                        {{--<small class="label pull-right bg-blue">17</small>--}}
                </span>
                </a>
            </li>
            <li class="{{ ($branch == 'Document View') ? 'active':'' }}">
                <a href="{{ route('document-manager') }}">
                    <i class="fa fa-edit"></i> <span>End Shift Report</span>
                </a>
            </li>
        </ul>
    </li>

    @if(
        Auth::user()->hasPosition('admins')
        || Auth::user()->hasPosition('triage-officer')
        || Auth::user()->hasDepartment('outpatient-department')
        )
        <!-- OPD -->
        <li class="{{ ($tree == 'OPD') ? 'active':'' }} treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>OPD</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <!-- Admin Navigation Here -->
                <li class="{{ ($branch == 'Virtual Consultation') ? 'active':'' }} treeview">
                    <a href="{{ route('virutal-consult') }}">
                        <i class="fa fa-bed"></i> <span>Virtual Consultation</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(Auth::user()->hasPosition('admin') || Auth::user()->hasPosition('triage-officer'))
                            <li class="{{ ($twig == 'Triage') ? 'active':'' }}"><a href="{{ route('virutal-consult') }}"><i class="fa fa-circle-o"></i> <span>Triage</span></a></li>
                        @endif
                        @if(Auth::user()->hasPosition('admin') || Auth::user()->hasPosition('triage-officer') || Auth::user()->hasDepartment('mps-opd-surgery-department'))
                            <li class="{{ ($branch == 'Surgery') ? 'active':'' }}"><a href="{{ route('vc-surgery') }}"><i class="fa fa-circle-o"></i> <span>Surgery</span></a></li>
                        @endif
                        @if(Auth::user()->hasPosition('opd-triage') || Auth::user()->hasDepartment('mps-opd-pediatric-department'))
                            <li class="{{ ($branch == 'Triage') ? 'active':'' }}"><a href="{{ route('virutal-consult') }}"><i class="fa fa-circle-o"></i> <span>Pediatrics</span></a></li>
                        @endif
                        @if(Auth::user()->hasPosition('opd-triage') || Auth::user()->hasDepartment('mps-opd-internal-medicine-department'))
                            <li class="{{ ($branch == 'Triage') ? 'active':'' }}"><a href="{{ route('virutal-consult') }}"><i class="fa fa-circle-o"></i> <span>Internal Medicine</span></a></li>
                        @endif
                        @if(Auth::user()->hasPosition('opd-triage') || Auth::user()->hasDepartment('mps-opd-obstetrics-and-gynecology-department'))
                            <li class="{{ ($branch == 'Triage') ? 'active':'' }}"><a href="{{ route('virutal-consult') }}"><i class="fa fa-circle-o"></i> <span>Obstetrics and Gynecology</span></a></li>
                        @endif
                        @if(Auth::user()->hasPosition('opd-triage') || Auth::user()->hasDepartment('mps-opd-family-medicine-department'))
                            <li class="{{ ($branch == 'Triage') ? 'active':'' }}"><a href="{{ route('virutal-consult') }}"><i class="fa fa-circle-o"></i> <span>Family Medicine</span></a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </li>
    @endif
    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-share"></i> <span>Admin</span>--}}
            {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu" style="display: none;">--}}
            {{--<li class="{{ ($branch == 'Inspection Acceptance Report') ? 'active':'' }}"><a href="{{ url('dashboard/common-forms/nso/inspection-acceptance-report') }}"><i class="fa fa-user"></i> Inspection Acceptance Report</a></li>--}}
            {{--<li class="treeview">--}}
                {{--<a href="#"><i class="fa fa-circle-o"></i> Level One--}}
                    {{--<span class="pull-right-container">--}}
                  {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu" style="display: none;">--}}
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
                    {{--<li class="treeview">--}}
                        {{--<a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
                            {{--<span class="pull-right-container">--}}
                      {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                        {{--</a>--}}
                        {{--<ul class="treeview-menu">--}}
                            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}
</ul>
