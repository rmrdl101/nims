<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jimmy Parker">
    <link rel="icon" href="{{ url('/') }}/hq/images/favicon.png" sizes="16x16" type="image/png">
    <title>CSMC - NIMS</title>
    <!-- Custom styles for this template -->
    <link href="{{ url('/') }}/hq/css/bootstrap.css" rel="stylesheet">
    <link href="{{ url('/') }}/hq/css/font-awesome.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
@include('layouts.nims-nav')

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

<!-- Page Content -->
<div class="wrapper pb-5">
    @yield('mainContent')
{{--    <div class="container">--}}
{{--        <h2 class="text-success title-header">Blank <small class="text-muted">Empty Page</small></h2>--}}
{{--    </div>--}}
</div>

<!-- /.container -->
<!-- Footer -->
<footer class="py-md-3 bg-dark footer">
    <div class="container">
        <font class="text-white">Copyright &copy; CSMC iHOMP 2021</font>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
{{--<!-- Bootstrap core JavaScript -->--}}
{{--<script src="hq/js/jquery.min.js"></script>--}}
{{--<script src="hq/js/bootstrap.bundle.min.js"></script>--}}

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

@yield('page_js')
</body>

</html>

