@extends('dashboard.layouts.main')

@section('page_js')
    <!-- Morris.js charts -->
    <script src="{{ url('/') }}/bower_components/raphael/raphael.min.js"></script>
    <script src="{{ url('/') }}/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ url('/') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{ url('/') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ url('/') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('/') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ url('/') }}/bower_components/moment/min/moment.min.js"></script>
    <script src="{{ url('/') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{ url('/') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endsection


@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Inventory</span>

                        <div class="progress-group">
                            <span class="progress-text">Add Products to Cart</span>
                            <span class="progress-number"><b>160</b>/200</span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                            </div>
                        </div>
                        <span class="progress-description">
                            50% Increase in 30 Days
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Mentions</span>
                        <span class="info-box-number">92,050</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                        </div>
                        <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Downloads</span>
                        <span class="info-box-number">114,381</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Direct Messages</span>
                        <span class="info-box-number">163,921</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </section>
@endsection
