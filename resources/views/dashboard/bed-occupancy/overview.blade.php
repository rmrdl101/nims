@extends('layouts.nims')

@section('pageTitle')
    Home |
@endsection

@section('page_css')
    <style>
        .active {
            background-color: blue;
            color: white;
        }
    </style>
@endsection

@section('mainContent')
    <!-- Page Content -->
    <div class="container">

        <!-- Content Row -->
        <div class="row my-2"></div>
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body  bg-yellow">
                        <h4 class="card-title">Emergency Room</h4>
                        <table class="table text-center">
                                <tr>
                                    <th colspan="3">CENSUS</th>
                                </tr>
                                <tr>
                                    <td colspan="3">0</td>
                                </tr>
                                <tr>
                                    <th>ACTUAL BEDS</th>
                                    <th>MGH</th>
                                    <th>DISCHARGE</th>
                                </tr>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                        </table>
                    </div>
{{--                    <div class="card-footer">--}}
{{--                        <a href="#" class="btn btn-primary btn-sm">More Info</a>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Two</h2>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-sm">More Info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Three</h2>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-sm">More Info</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
@endsection

@section('page_js')
    <script>
        $(function() {
            $('#login-form-link').click(function(e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function(e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
        });
    </script>
@endsection
