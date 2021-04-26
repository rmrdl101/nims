@extends('dashboard.layouts.main')

@section('main-content')
    <section class="content">

        <div class="row">
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h3>
                            <h5 class="widget-user-desc">Nurse I | Surgical Complex</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="https://ui-avatars.com/api/?name={{ Auth::user()->fname }}+{{ Auth::user()->lname }}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">3,200</h5>
                                        <span class="description-text">SALES</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">13,000</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">35</h5>
                                        <span class="description-text">PRODUCTS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
        <!-- /.row -->

    </section>
@endsection
