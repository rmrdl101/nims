@extends('layouts.nims')

@section('pageTitle')
    Home |
@endsection

@section('page_css')
    <style>
        .active {
            background-color: maroon;
            color: white;
        }
        .btn:focus {
            box-shadow: none!important;
        }
    </style>
@endsection

@section('header')
    <!-- Header -->
    <header class="bg-success py-3 mb-5">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="banner mt-5">
                        <img src="{{ url('/') }}/hq/images/banner.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('mainContent')
    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row align-items-center my-5">
            <div class="col-lg-8">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ url('/') }}/hq/images/nsd.jpg" alt="">
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <row>
                    <a href="{{ route('opdreg') }}" style="text-decoration: none"><button type="button" style="background-color: orange;color: white;" class="btn btn-default btn-block">OPD VIRTUAL CONSULTATION</button></a>
                    <hr>
                </row>
                <row>
                    <div class="card">
                        <div class="card-header">
                            <a href="#" class="btn active" id="login-form-link">Login</a>
                            <a href="#" class="btn pull-right" id="register-form-link">Register</a>
                        </div>
                        <div class="card-body">
                            <form id="login-form" action="{{ url('login') }}" method="post" role="form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login-submit" id="login-submit" class="form-control btn" style="background-color: maroon;color: white;" value="Log In">
                                </div>
                                <div class="form-group">
                                    <a href="#" class="forgot-password">Forgot Password?</a>
                                </div>
                            </form>
                            <form id="register-form" action="{{ url('register') }}" method="POST" role="form" style="display: none;">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="" type="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn" style="background-color: maroon;color: white;" value="Register Now">
                                </div>
                            </form>
                        </div>
                    </div>
                </row>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <!-- Call to Action Well -->
        <div class="card text-white bg-secondary my-5 text-center">
            <div class="card-body">
                <marquee class="text-white m-0">{{ $announce->first()->contents }}</marquee>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="fb-post" data-href="https://www.facebook.com/TDHNursingService/posts/1007348243406363" data-width="auto" data-show-text="true"><blockquote cite="https://www.facebook.com/TDHNursingService/posts/1007348243406363" class="fb-xfbml-parse-ignore"><p>June 10-11, 2021 - a very productive session for our Admin and other NSD Personnel as they embarked on an interactive...</p>Posted by <a href="https://www.facebook.com/TDHNursingService/">Cebu South Medical Center Nursing Service</a> on&nbsp;<a href="https://www.facebook.com/TDHNursingService/posts/1007348243406363">Sunday, June 13, 2021</a></blockquote></div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="fb-post" data-href="https://www.facebook.com/TDHNursingService/posts/1004755066999014" data-width="auto" data-show-text="true"><blockquote cite="https://www.facebook.com/TDHNursingService/posts/1004755066999014" class="fb-xfbml-parse-ignore"><p>June 9, 2021 - CSMC Nursing Service was invited to share best practices on the division’s COVID-19 Response in a collaborative activity with the Western Visayas Sanitarium Nursing Service Division.</p>Posted by <a href="https://www.facebook.com/TDHNursingService/">Cebu South Medical Center Nursing Service</a> on&nbsp;<a href="https://www.facebook.com/TDHNursingService/posts/1004755066999014">Wednesday, June 9, 2021</a></blockquote></div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="fb-post" data-href="https://www.facebook.com/TDHNursingService/posts/997595691048285" data-width="auto" data-show-text="true"><blockquote cite="https://www.facebook.com/TDHNursingService/posts/997595691048285" class="fb-xfbml-parse-ignore"><p>May 27, 2021 - Advanced Cardiac Life Support (ACLS) Training by the Americal Heart Association (AHA).</p>Posted by <a href="https://www.facebook.com/TDHNursingService/">Cebu South Medical Center Nursing Service</a> on&nbsp;<a href="https://www.facebook.com/TDHNursingService/posts/997595691048285">Saturday, May 29, 2021</a></blockquote></div>
            </div>
            <!-- /.col-md-4 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection

@section('footer')
    <footer class="py-md-3 bg-dark footer">
        <div class="container">
            <font class="text-white">Copyright &copy; CSMC iHOMP 2021</font>
        </div>
        <!-- /.container -->
    </footer>
@endsection

@section('page_js')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="KPMExV8O"></script>
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
