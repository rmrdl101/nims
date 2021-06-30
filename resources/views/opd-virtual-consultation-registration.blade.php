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
<div class="wrapper pb-5">
    <div class="container">
        <h2 class="text-success title-header">Virtual Consultation<small class="text-muted"> Registration</small></h2>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Registration Form</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{route('regpt')}}" method="post" role="form">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="lname">Last Name <small>Apeliedo</small></label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="last name" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="fname">First Name <small>Pangalan</small></label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="first name" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="mname">Middle Name <small>Tungatunga nga ngalan</small></label>
                                    <input type="text" name="mname" id="mname" class="form-control" placeholder="middle name" value="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="age">Age <small>Edad</small></label>
                                    <input type="number" name="age" id="age" class="form-control" placeholder="edad" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Birthday <small>Adlawng natawhan</small></label>
                                    <input type="date" name="birthday" id="birthday" class="form-control" placeholder="birthday" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="sex">Sex <small>Katawohon</small></label>
                                    <select class="form-control" name="sex" id="sex">
                                        <option value="Male">Male</option>
                                        <option value="Male">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address <small>Adres</small></label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="address" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="contactnum">Contact Info(cellphone number preferred) <small>Telepono</small></label>
                                    <input type="text" name="contactnum" id="contactnum" class="form-control" placeholder="contact number" value="" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="oldnew">Patient Status</label>
                                    <select class="form-control" name="oldnew" id="oldnew">
                                        <option value="Old">Old</option>
                                        <option value="New">New</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="chiefcomplaint">Chief Complaint <small>Rason sa pagkonsulta</small></label>
                                    <textarea type="text" name="chiefcomplaint" id="chiefcomplaint" class="form-control" placeholder="chief complaint" value="" required></textarea>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="submit" name="role-submit" id="add-data" tabindex="4" class="form-control btn btn-info" data-id="" value="Register">
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Kabahin Sa OPD Virtual Consultation <small>(GIYA)</small></h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <ul>
                                <li>Ang <b><i>OPD Virtual Consultation</i></b> ginama sa Cebu South Medical Center para sa pagkunhod sa gidaghanon sa pasyente nga mag pa konsulta sa opsital para malikayan ang pag kalap sa virus nga Covid-19.</li>
                                <li>Ang <b><i>OPD Virtual Consultation</i></b> available lang sa adlaw nga <b>Lunes</b> hantud sa <b>Byernes</b></li>
                                <li>Ang pag dawat sa mga ni <i>register</i> mag sugod sa alas <i><b>siete</b>(7)</i> sa buntag <b>hantud</b> sa alas <i><b>dies</b>(10)</i> sa buntag lamang.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box -->


                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Unsaon pag gamit sa <b><i>OPD Virtual Consultation</i></b> <small>(GIYA)</small></h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <ul>
                                <li>Kompletohon ang mga detalye nga gikinahanlan sa <b><i>Registration Form</i></b></li>
                                <li>Pinduton ang <b>Register</b> button ana.a mahimutang sa kina-ubsan sa <b><i>Registration Form</i></b></li>
                                <li>Inig submit nimo sa imong registration form, ang <i>system</i> mo hatag og <b><i>APPOINTMENT CODE</i></b>.</li>
                                <li>Ang <b><i>APPOINTMENT CODE</i></b> pwede nimo gamiton sa atong appoinment tracker aron makita nimo ang <i>status</i> kung naa naba ka schedule sa pag pa konsulta</li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
    @endsection
