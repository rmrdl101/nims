@extends('dashboard.layouts.main')

@section('page_css')
    <style>
        .small-pad {
            padding: 5px!important;
            font-size: xx-small;
        }
        .right-height{
            height: 30px
        }
    </style>
@endsection

@section('main-content')
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2" style="width: 130px"><img src="{{ url('/') }}/uploads/images/CSMC.png" alt="" width="105px"></td>
                                <td style="text-align: center"><h2>CEBU SOUTH MEDICAL CENTER</h2></td>
                                <td rowspan="2" style="width: 130px"><img src="{{ url('/') }}/uploads/images/DOH.png" alt="" width="105px"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center">
                                    INSPECTION AND ACCEPTANCE REPORT
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="col-md-12">
                <div class="box box-solid">
                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <td class="small-pad" style="width: 25%">Supplier:</td>
                            <td class="small-pad"  style="width: 40%"></td>
                            <td class="small-pad"  style="width: 15%">IAR No.:</td>
                            <td class="small-pad"  style="width: 20%"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">PO No./ Date:</td>
                            <td class="small-pad"></td>
                            <td class="small-pad">Date:</td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">Requisitioning Office/Dept.:</td>
                            <td class="small-pad"></td>
                            <td class="small-pad">Invoice No.:</td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">Responsibility Center Code:</td>
                            <td class="small-pad"></td>
                            <td class="small-pad">Date:</td>
                            <td class="small-pad"></td>
                        </tr>
                        </thead>
                    </table>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th class="text-center small-pad" style="width: 20%">Stock/ Property No.</th>
                            <th class="text-center small-pad" style="width: 50%">Description</th>
                            <th class="text-center small-pad" style="width: 10%">Unit</th>
                            <th class="text-center small-pad" style="width: 20%">Quantity</th>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                        <tr>
                            <td class="right-height small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                            <td class="small-pad"></td>
                        </tr>
                    </table>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th colspan="2" class="text-center small-pad right-height" style="width: 50%">Stock/ Property No.</th>
                            <th colspan="2" class="text-center small-pad" style="width: 50%">Description</th>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="small-pad right-height">Date Inspected:</td>
                            <td></td>
                            <td style="width: 15%" class="small-pad">Date Received:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="small-pad" colspan="2"><input type="checkbox"> Inspected, verified and found in order as to quantity and specifications</td>
                            <td class="small-pad" colspan="2"><input type="checkbox"> Complete</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="small-pad">Chairman:</td>
                            <td class="text-center small-pad"><u>STEVEN C. GEONZON, RN, MSN, CHA</u></td>
                            <td class="small-pad" colspan="2"><input type="checkbox"> Partial (Please specify quantity</td>
                        </tr>
                        <tr>
                            <td style="width: 15%" class="small-pad" rowspan="2">Vice Chairman:</td>
                            <td class="text-center small-pad"><u>ENGR. NEMESIO G. TEJANO, JR.</u></td>
                            <td class="small-pad" colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="text-center small-pad"><u>MANUELITO D. TAPARAN</u></td>
                            <td class="small-pad" colspan="2"></td>
                        </tr>
                    </table>
                    <table class="table table-sm table-bordered">
                        <tr>
                            <td class="small-pad" colspan="2">MEMBERS</td>
                            <td class="small-pad" colspan="2" rowspan="9"></td>
                        </tr>
                        <tr>
                            <td style="width: 30%" class="small-pad">ERWIN TARRAJA:</td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">SEAN GERARD SOLANA:</td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">MARIE ROSE C. ANDRIN:</td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">MYRASOL O. MENDOZA:</td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">DIOGENES OBAOB:</td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">ARTEMIO CALINAWAN:</td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">WAIRLEY VON CABILUNA:</td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">ROLAND MARK RODEL D. LAGOS, RN:</td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td class="small-pad">CELINE G. ACUÑA:</td>
                            <td class="text-center"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
