<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('pageTitle')CSMC - Nursing Information Management System</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/small-business.css" rel="stylesheet">

        <!-- SweetAlert2 -->
        <script src="dist/sweetalert/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

        <style>
            body{
                background-color: #F0F2F5;
            }
            .fb-blue{
                background-color: #1877F2;
            }
            .doh-green{
                background-color: #2cc185;
            }

            .white-text{
                color: #ffffff;
            }

            .navbar-toggler{
                border: #fff 2px solid;
            }
            .navbar-toggler-icon{
                color: #fff;
            }
            input:invalid {
                border: none;
                box-shadow: 0 0 5px 1px rgb(255,0,0,0.3);
            }
            input:valid {
                border: 1px rgb(0,0,255,0.1) solid;
                box-shadow: 0 0 5px 1px rgb(0,255,0,0.3);
            }
            .active {
                border-radius: 5px;
                background-color: white!important;
                color: #2cc185!important;
            }
        </style>

        @yield('page_css')
    </head>

    <body>

        <!-- Navigation -->
        @include('layouts.nims-nav')

        <!-- Content -->
        @yield('mainContent')

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; CSMC - Nursing Information Management System 2020</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Toastr -->
        <script src="plugins/toastr/toastr.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="plugins/sweetalert2/sweetalert2.min.js"></script>

        @yield('page_js')

        <script type="text/javascript">
            $(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        $(function captor() {
                            toastr.error('{{ $error }}')
                        });
                    @endforeach
                @endif
            });
        </script>

        <script  type="text/javascript">
            @if(Session::has('success'))
            Swal.fire(
                'Success!',
                '{!! Session::get('success') !!}',
                'success'
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

    </body>

</html>
