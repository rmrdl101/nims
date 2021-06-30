@extends('dashboard.layouts.main')

@section('main-content')
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2" style="width: 100px"><img src="{{ url('/') }}/uploads/images/CSMC.png" alt="" width="100px"></td>
                                <td style="text-align: center"><h2>CEBU SOUTH MEDICAL CENTER</h2></td>
                                <td rowspan="2" style="width: 130px"><img src="{{ url('/') }}/uploads/images/NSD Maroon.png" alt="" width="130px"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center">
                                    KEY PERFORMANCE INDICATORS MONITORING TOOL<br>
                                    for the Month of December 2020
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="2"> Division: Nursing Servince</td>
                            <td> Area: Outpatient Department</td>
                        </tr>
                        <tr>
                            <td>
                                Prepared by:<br>
                                <br>
                                <br>
                                SILVETTE A. SABIDO, RN<br>
                                Unit Manager
                            </td>
                            <td>
                                Reviewed by:<br>
                                <br>
                                <br>
                                MARIA LEONORA A. LASOLA, RN<br>
                                Department Manager
                            </td>
                            <td>
                                Approved by:<br>
                                <br>
                                <br>
                                HARBY O. ABELLANOSA, MSN, RN<br>
                                Division Chief
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Functional Objective</h3>
                        <div>
                            To provide immediate medical and supportive care management to ambulatory, non-emergent to ambulatory, non-emergent patient in the most effective and efficient way possible through health promotion and disease prevention.
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive-sm">

                        <div class="col-md-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">CPU Traffic</span>
                                    <span class="info-box-number">90<small>%</small></span>
                                    <div class="progress-group">
                                        <span class="progress-text">Add Products to Cart</span>
                                        <span class="progress-number"><b>160</b>/200</span>

                                        <div class="progress sm">
                                            <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 250px">Formula</th>
                                    <th style="width: 250px">Operational Objectives</th>
                                    <th style="width: 250px">Target / Tolerance</th>
                                    <th style="width: 40px">Present</th>
                                    <th style="width: 40px">Previous</th>
                                    <th style="width: 250px">Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Total Waiting Time / Total Number of Patients</td>
                                    <td>To ensure that patients are seen by nurse within 30 minutes upon arrival to pre-consultation time.</td>
                                    <td>Pre-consultation waiting time < 30 minutes</td>
                                    <td>6.85 minutes</td>
                                    <td>12.72 minutes</td>
                                    <td>none</td>
                                </tr>
                                <tr>
                                    <td>Frequency</td>
                                    <td>To achieve immunization vaccination accuracy for 2018.</td>
                                    <td>0 incidence of vaccine related complications.</td>
                                    <td>
                                        (0 / 1,014) <br>
                                        0%
                                    </td>
                                    <td>
                                        (0 / 866) <br>
                                        0%
                                    </td>
                                    <td>none</td>
                                </tr>
                                <tr>
                                    <td>Incidence / Frequency of medication administration</td>
                                    <td>Promote patient safety by instituting safe and quality nursing interventions</td>
                                    <td>0% incidence of medication variance</td>
                                    <td>
                                        (0 / 1,175) <br>
                                        0%
                                    </td>
                                    <td>
                                        (0 / 999) <br>
                                        0%
                                    </td>
                                    <td>
                                        Wrong Patient: <br>
                                        Wrong Drug: <br>
                                        Wrong Timing: <br>
                                        Omission: <br>
                                        Under Dosage: <br>
                                        Over Dosage: <br>
                                        Near Misses: <br>
                                        Others: Incorrect Procedure on skin testing<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Incidence / Total Outpatient served</td>
                                    <td></td>
                                    <td>0% incidence of fall</td>
                                    <td>
                                        (0 / 2,224) <br>
                                        0%
                                    </td>
                                    <td>
                                        (0 / 2,029) <br>
                                        0%
                                    </td>
                                    <td>
                                        Age: <br>
                                        Diagnosis: <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Incidence / Number of Staff x 100%</td>
                                    <td>Institute measure to prevent sharp injury among staff</td>
                                    <td>0% incidence of sharp injury</td>
                                    <td>
                                        (0 / 0) <br>
                                        0%
                                    </td>
                                    <td>
                                        (0 / 0) <br>
                                        0%
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Number of availability / total number of supplies x 100%</td>
                                    <td>Maintain adequate urgent supply of medicines and medical supplies</td>
                                    <td>80% Availability of Medical Supplies and medicine</td>
                                    <td>
                                        100%
                                    </td>
                                    <td>
                                        100%
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Number of staff sent for trainings / total number of OPD staff x 100%</td>
                                    <td>to ensure that OPD personnel undergo related trainings for professional development</td>
                                    <td>at least 8 hours related training for each personnel.</td>
                                    <td>
                                        100%
                                    </td>
                                    <td>
                                        100%
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Satisfaction rating on Patient-Focused Care Survey</td>
                                    <td>Satisfaction rating on Patient-Focused Care Survey</td>
                                    <td>
                                        4.85
                                    </td>
                                    <td>
                                        4.98
                                    </td>
                                    <td>
                                        Very Satisfied
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>Note: Pre-consultation is the time when the nurse takes vital signs and fundamental health history of the patient. This is also the period where the nurse provides initial assessment of the patient's health status. Through this, efficiency and effectivity would be achieved since the patient would be equiped and prepared during the actual consultation with the doctor</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
