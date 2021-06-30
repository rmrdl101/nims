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
        .new-orange {
            color: #ff5d44;
            font-weight: bold;
        }
        .new-orange-bg {
             background: #ff5d44;
             color: white;
         }
        .card-body{
            padding: 0.5rem!important;
        }
        .table
        {
            margin-bottom: 0rem!important;
        }
        .mb-5
        {
            margin-bottom: 2rem!important;
        }
        .small-box{
            margin-bottom: 0px!important;
        }
        .small-box .icon {
            top:-15px
        }
    </style>
@endsection

@section('header')
    <!-- Header -->
    <header class="bg-success py-3 mb-5">
    </header>
@endsection

@section('mainContent')
    <!-- Page Content -->
    <div class="container">

        <!-- Content Row -->

        <div class="row">
            <!-- ER -->
            <div class="col-sm-4 mb-5">
                <div class="card h-100 new-orange-bg">
                    <div class="card-body">
                        <h4 class="kt-widget24__title">
                            EMERGENCY ROOM
                        </h4>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id="emergency-room2">0</h3>
                                <p>Census</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <table class="table table-sm table-border">
                            <tr>
                                <td class="text-center text-white">Actual Beds</td>
                                <td class="text-center text-white">Referral</td>
                                <td class="text-center text-white">Trans-Out</td>
                            </tr>
                            <tr>
                                <td id="emergency-room1" class="text-center text-white">0</td>
                                <td id="emergency-room3" class="text-center text-white">0</td>
                                <td id="emergency-room4" class="text-center text-white">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- OR -->
            <div class="col-sm-4 mb-5">
                <div class="card h-100 new-orange-bg">
                    <div class="card-body">
                        <h4 class="kt-widget24__title">
                            OPERATING ROOM
                        </h4>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3  id="surgical-complex1">0</h3>
                                <p>Census</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <table class="table table-sm table-border">
                            <tr>
                                <td class="text-center text-white">Trans-In</td>
                                <td class="text-center text-white">Ongoing Surgeries</td>
                                <td class="text-center text-white">Trans-Out</td>
                            </tr>
                            <tr>
                                <td id="surgical-complex2" class="text-center text-white">0</td>
                                <td id="surgical-complex3" class="text-center text-white">0</td>
                                <td id="surgical-complex4" class="text-center text-white">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- LRDR -->
            <div class="col-sm-4 mb-5">
                <div class="card h-100 new-orange-bg">
                    <div class="card-body">
                        <h4 class="kt-widget24__title">
                            LABOR ROOM & DELIVERY ROOM
                        </h4>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id="obstetrical-complex1">0</h3>
                                <p>Census</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <table class="table table-sm table-border">
                            <tr>
                                <td class="text-center text-white">Trans-In</td>
                                <td class="text-center text-white">On Labor</td>
                                <td class="text-center text-white">Trans-Out</td>
                            </tr>
                            <tr>
                                <td id="obstetrical-complex2" class="text-center text-white">0</td>
                                <td id="obstetrical-complex2" class="text-center text-white">0</td>
                                <td id="obstetrical-complex4" class="text-center text-white">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- CCU -->
            <div class="col-sm-4 mb-5">
                <div class="card h-100 new-orange-bg">
                    <div class="card-body">
                        <h4 class="kt-widget24__title">
                            CITICAL CARE UNIT
                        </h4>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id="critical-care-unit2">0<span style="font-size: small;">/ 10 actual beds</span></h3>
                                <p>Census</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <table class="table table-sm table-border">
                            <tr>
                                <td class="text-center text-white">Trans-in</td>
                                <td class="text-center text-white">MGH</td>
                                <td class="text-center text-white">Discharge</td>
                            </tr>
                            <tr>
                                <td id="critical-care-unit1" class="text-center text-white">0</td>
                                <td id="critical-care-unit3" class="text-center text-white">0</td>
                                <td id="critical-care-unit4" class="text-center text-white">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- MedW -->
            <div class="col-sm-4 mb-5">
                <div class="card h-100 new-orange-bg">
                    <div class="card-body">
                        <h4 class="kt-widget24__title">
                            MEDICAL WARD
                        </h4>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3  id="medical-ward2">0</h3>
                                <p>Census</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <table class="table table-sm table-border">
                            <tr>
                                <td class="text-center text-white">Actual Beds</td>
                                <td class="text-center text-white">MGH</td>
                                <td class="text-center text-white">Discharge</td>
                            </tr>
                            <tr>
                                <td id="medical-ward1" class="text-center text-white">0</td>
                                <td id="medical-ward3" class="text-center text-white">0</td>
                                <td id="medical-ward4" class="text-center text-white">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- SurgW  -->
            <div class="col-sm-4 mb-5">
                <div class="card h-100 new-orange-bg">
                    <div class="card-body">
                        <h4 class="kt-widget24__title">
                            SURGICAL WARD
                        </h4>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id="surgical-ward2">0</h3>
                                <p>Census</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <table class="table table-sm table-border">
                            <tr>
                                <td class="text-center text-white">Actual Beds</td>
                                <td class="text-center text-white">MGH</td>
                                <td class="text-center text-white">Discharge</td>
                            </tr>
                            <tr>
                                <td id="surgical-ward1" class="text-center text-white">0</td>
                                <td id="surgical-ward3" class="text-center text-white">0</td>
                                <td id="surgical-ward4" class="text-center text-white">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- PedW -->
            <div class="col-sm-4 mb-5">
                <div class="card h-100 new-orange-bg">
                    <div class="card-body">
                        <h4 class="kt-widget24__title">
                            PEDIA WARD
                        </h4>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id="pediatric-ward2">0</h3>
                                <p>Census</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <table class="table table-sm table-border">
                            <tr>
                                <td class="text-center text-white">Actual Beds</td>
                                <td class="text-center text-white">MGH</td>
                                <td class="text-center text-white">Discharge</td>
                            </tr>
                            <tr>
                                <td id="pediatric-ward1" class="text-center text-white">0</td>
                                <td id="pediatric-ward3" class="text-center text-white">0</td>
                                <td id="pediatric-ward4" class="text-center text-white">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- OBHR -->
            <div class="col-sm-4 mb-5">
                <div class="card h-100 new-orange-bg">
                    <div class="card-body">
                        <h4 class="kt-widget24__title">
                            OB HIGH RISK
                        </h4>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3  id="obstetrical-high-risk2">0</h3>
                                <p>Census</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <table class="table table-sm table-border">
                            <tr>
                                <td class="text-center text-white">Actual Beds</td>
                                <td class="text-center text-white">MGH</td>
                                <td class="text-center text-white">Discharge</td>
                            </tr>
                            <tr>
                                <td id="obstetrical-high-risk1" class="text-center text-white">0</td>
                                <td id="obstetrical-high-risk3" class="text-center text-white">0</td>
                                <td id="obstetrical-high-risk4" class="text-center text-white">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- OBLR  -->
            <div class="col-sm-4 mb-5">
                <div class="card h-100 new-orange-bg">
                    <div class="card-body">
                        <h4 class="kt-widget24__title">
                            OB LOW RISK
                        </h4>
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id="obstetrical-low-risk2">0</h3>
                                <p>Census</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <table class="table table-sm table-border">
                            <tr>
                                <td class="text-center text-white">Actual Beds</td>
                                <td class="text-center text-white">MGH</td>
                                <td class="text-center text-white">Discharge</td>
                            </tr>
                            <tr>
                                <td id="obstetrical-low-risk1" class="text-center text-white">0</td>
                                <td id="obstetrical-low-risk3" class="text-center text-white">0</td>
                                <td id="obstetrical-low-risk4" class="text-center text-white">0</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
@endsection

@section('page_js')
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-database.js"></script>

    <script>
        // Initialize Firebase
        firebase.initializeApp({!! $fbConf !!});
        // firebase.initializeApp(fb);

        //initialize
        var dbRef = firebase.database();

        //create table
        var userRef = dbRef.ref('bedvac');


        var fields = '';

        var url = "bed-occupancy";

        {{--$('#ad').change(function(){--}}
        {{--console.log('ok')--}}
        {{--$('#a').val({{ $dataA->val1 }}).fadeIn(300);--}}
        {{--$('#cen').val({{ $dataA->val2 }}).fadeIn(300);--}}
        {{--$('#mgh').val({{ $dataA->val3 }}).fadeIn(300);--}}
        {{--$('#dis').val({{ $dataA->val4 }}).fadeIn(300);--}}
        {{--});--}}

        //retrieve data
        userRef.on('child_added',function(snapshot){
            var data = snapshot.val();

            $('#'+data.varF1).fadeOut(700);
            $('#'+data.varF2).fadeOut(700);
            $('#'+data.varF3).fadeOut(700);
            $('#'+data.varF4).fadeOut(700);
            setTimeout(function () {
                $('#'+data.varF1).html(data.varV1).fadeIn(300);
                $('#'+data.varF2).html(data.varV2).fadeIn(300);
                $('#'+data.varF3).html(data.varV3).fadeIn(300);
                $('#'+data.varF4).html(data.varV4).fadeIn(300);
            },500);
        });
    </script>
@endsection
