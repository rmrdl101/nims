@extends('dashboard.layouts.main')

@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">User</span>
                        <span class="info-box-number">{{ $users->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-briefcase"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Roles</span>
                        <span class="info-box-number">{{ $roles->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-key"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Permissions</span>
                        <span class="info-box-number">{{ $permissions->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-ticket"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tickets</span>
                        <span class="info-box-number">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tickes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>User</th>
                                    <th>Reason</th>
                                    <th style="width: 40px">Status</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>User 1</td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.
                                    </td>
                                    <td><span class="badge bg-orange">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>User 2</td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.
                                    </td>
                                    <td><span class="badge bg-orange">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>User 3</td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.
                                    </td>
                                    <td><span class="badge bg-orange">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>User 4</td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.
                                    </td>
                                    <td><span class="badge bg-orange">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Resolved Tickes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>User</th>
                                    <th>Reason</th>
                                    <th style="width: 40px">Status</th>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>User 1</td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.
                                    </td>
                                    <td><span class="badge bg-green">Done</span></td>
                                </tr>
                                <tr>
                                    <td>23</td>
                                    <td>User 2</td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.
                                    </td>
                                    <td><span class="badge bg-green">Done</span></td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td>User 3</td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.
                                    </td>
                                    <td><span class="badge bg-green">Done</span></td>
                                </tr>
                                <tr>
                                    <td>25</td>
                                    <td>User 4</td>
                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.
                                    </td>
                                    <td><span class="badge bg-green">Done</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
