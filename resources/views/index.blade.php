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

        <!-- Heading Row -->
        <div class="row align-items-center my-5">
            <div class="col-lg-8">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ url('/') }}/hq/images/nsd.jpg" alt="">
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
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
                                    <input type="submit" name="login-submit" id="login-submit" class="form-control btn btn-success" value="Log In">
                                </div>
                                <div class="form-group">
                                    <a href="https://phpoll.com/recover" class="forgot-password">Forgot Password?</a>
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
                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-info" value="Register Now">
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <!-- Call to Action Well -->
        <div class="card text-white bg-secondary my-5 text-center">
            <div class="card-body">
                <marquee class="text-white m-0">Deadline for submission of Monetization application will be on December XX, 2020</marquee>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card One</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-sm">More Info</a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Two</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-sm">More Info</a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Card Three</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-sm">More Info</a>
                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->

        </div>
        <!-- /.row -->

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
