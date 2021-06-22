<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .table
            {
                width: 100%;
                border-collapse: collapse;
            }
            .bordered-top-t
            {
                border-top:2px #000000 solid;
            }
            .bordered-bottom-t
            {
                border-bottom:2px #000000 solid;
            }
            .bordered-bottom
            {
                border-bottom:1px #000000 solid;
            }
            .bordered-left-t
            {
                border-left:2px #000000 solid;
            }
            .bordered-right-t
            {
                border-right:2px #000000 solid;
            }
            .bordered-right
            {
                border-right:1px #000000 solid;
            }
            /*.table-bordered-bottom*/
            /*{*/
            /*    border-top:none;*/
            /*    border-bottom:2px #000000 solid;*/
            /*}*/
            .align-items-center
            {
                text-align: center;
            }
            #tbody1 td, #tbody1 th
            {
                border-left: 1px solid #000;
                border-right: 1px solid #000;
                border-bottom: 1px solid #000;
            }
            .right-height
            {
                height: 20px;
            }
            .small-pad {
                padding: 5px!important;
                font-size: xx-small;
            }
        </style>
    </head>

    <body style="padding: 9px">
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
        <!-- Demographics -->
        <table id="tbody1" class="table bordered-top-t bordered-left-t bordered-right-t">
            <tr>
                <td class="small-pad" style="width: 8%">Supplier:</td>
                <td class="small-pad" style="width: 52%"></td>
                <td class="small-pad" style="width: 40%" colspan="2">IAR No.:</td>
            </tr>
        </table>
        <table id="tbody1" class="table bordered-left-t bordered-right-t">
            <tr>
                <td class="small-pad" style="width: 15%">PO No./ Date:</td>
                <td class="small-pad" style="width: 46%"></td>
                <td class="small-pad" style="width: 49%" colspan="2">Date:</td>
            </tr>
        </table>
        <table id="tbody1" class="table bordered-left-t bordered-right-t">
            <tr>
                <td class="small-pad" style="width: 20%">Requisitioning Office/Dept.:</td>
                <td class="small-pad" style="width: 41%"></td>
                <td class="small-pad" style="width: 49%" colspan="2">Invoice No.:</td>
            </tr>
        </table>
        <table id="tbody1" class="table bordered-left-t bordered-right-t">
            <tr>
                <td class="small-pad" style="width: 20%">Responsibility Center Code:</td>
                <td class="small-pad" style="width: 41%"></td>
                <td class="small-pad" style="width: 49%" colspan="2">Date:</td>
            </tr>
        </table>
        <!-- Stocks -->
        <table id="tbody1" class="table bordered-top-t bordered-right-t bordered-left-t bordered-bottom-t">
            <thead class="bordered-bottom-t">
                <tr>
                    <th class="text-center small-pad" style="width: 20%">Stock/ Property No.</th>
                    <th class="text-center small-pad" style="width: 50%">Description</th>
                    <th class="text-center small-pad" style="width: 10%">Unit</th>
                    <th class="text-center small-pad" style="width: 20%">Quantity</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
        <!-- Inspector View -->
        <table class="table bordered-right-t bordered-left-t">
            <thead class="bordered-bottom-t">
                <tr>
                    <th class="bordered-right-t small-pad" colspan="2" style="width: 50%">INSPECTION</th>
                    <th class="small-pad" colspan="2" style="width: 50%">ACCEPTANCE</th>
                </tr>
            </thead>
        </table>
        <table class="table bordered-right-t bordered-left-t">

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
        <table class="table table-sm bordered-right-t bordered-left-t bordered-bottom-t">
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
        <p class="small-pad" style="font-size: x-small;font-family: 'Times New Roman'">This form shall be accomplished in triplicate, the original of which to be attached to the Acounting Report and the duplicate to the COA.  All acceptance personnel are required to print their full name & affix their signature.</p>
    </body>
</html>
