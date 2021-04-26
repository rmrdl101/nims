@extends('dashboard.layouts.main')

@section('page_css')
    <style>
        body {
            font-family: Tahoma;
        }



        /* declare a 7 column grid on the table */
        #calendar {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        #calendar tr, #calendar tbody {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            width: 100%;
        }

        caption {
            text-align: center;
            grid-column: 1 / -1;
            font-size: 130%;
            font-weight: bold;
            padding: 10px 0;
        }

        #calendar a {
            color: #8e352e;
            text-decoration: none;
        }

        #calendar td, #calendar th {
            padding: 5px;
            box-sizing:border-box;
            border: 1px solid #ccc;
        }

        #calendar .weekdays {
            background: #8e352e;
        }


        #calendar .weekdays th {
            text-align: center;
            text-transform: uppercase;
            line-height: 20px;
            border: none !important;
            padding: 10px 6px;
            color: #fff;
            font-size: 13px;
        }

        #calendar td {
            min-height: 180px;
            display: flex;
            flex-direction: column;
        }

        #calendar .days li:hover {
            background: #d3d3d3;
        }

        #calendar .date {
            text-align: center;
            margin-bottom: 5px;
            padding: 4px;
            background: #333;
            color: #fff;
            width: 20px;
            border-radius: 50%;
            flex: 0 0 auto;
            align-self: flex-end;
        }

        #calendar .event {
            flex: 0 0 auto;
            font-size: 13px;
            border-radius: 4px;
            padding: 5px;
            margin-bottom: 5px;
            line-height: 14px;
            background: #e4f2f2;
            border: 1px solid #b5dbdc;
            color: #009aaf;
            text-decoration: none;
        }

        #calendar .event-desc {
            color: #666;
            margin: 3px 0 7px 0;
            text-decoration: none;
        }

        #calendar .other-month {
            background: #f5f5f5;
            color: #666;
        }

        /* ============================
                        Mobile Responsiveness
           ============================*/


        @media(max-width: 768px) {

            #calendar .weekdays, #calendar .other-month {
                display: none;
            }

            #calendar li {
                height: auto !important;
                border: 1px solid #ededed;
                width: 100%;
                padding: 10px;
                margin-bottom: -1px;
            }

            #calendar, #calendar tr, #calendar tbody {
                grid-template-columns: 1fr;
            }

            #calendar  tr {
                grid-column: 1 / 2;
            }

            #calendar .date {
                align-self: flex-start;
            }
        }
    </style>
@endsection


@section('main-content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header text-center">
                        <h2>January 2021</h2>
                        <span>1-15</span>
                    </div>
                    <div class="box-body">

                        <table id="calendar">
                            <tr class="days">
                                <td class="day">
                                    <div class="date">1</div>
                                    <div class="event">
                                        <div class="event-time">
                                            New Year
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">2</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            Day Off
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">3</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            Day Off
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">4</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            7AM-5PM
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">5</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            7AM-5PM
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">6</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            7AM-5PM
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">7</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            7AM-5PM
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="day">
                                    <div class="date">8</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            Day Off
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">9</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            Day Off
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">10</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            Day Off
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">11</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            7AM-5PM
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">12</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            7AM-5PM
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">13</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            7AM-5PM
                                        </div>
                                    </div>
                                </td>
                                <td class="day">
                                    <div class="date">14</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            7AM-5PM
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="day">
                                    <div class="date">15</div>
                                    <div class="event">
                                        <div class="event-desc">
                                            Roland Mark Rodel Lagos
                                        </div>
                                        <div class="event-time">
                                            Day Off
                                        </div>
                                    </div>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page_js')
    <!-- Morris.js charts -->
    {{--<script src="{{ url('/') }}/bower_components/raphael/raphael.min.js"></script>--}}
    {{--<script src="{{ url('/') }}/bower_components/morris.js/morris.min.js"></script>--}}
    <!-- Sparkline -->
    {{--<script src="{{ url('/') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>--}}
    <!-- jvectormap -->
    {{--<script src="{{ url('/') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>--}}
    {{--<script src="{{ url('/') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>--}}
    <!-- jQuery Knob Chart -->
    {{--<script src="{{ url('/') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>--}}
    <!-- daterangepicker -->
    {{--<script src="{{ url('/') }}/bower_components/moment/min/moment.min.js"></script>--}}
    {{--<script src="{{ url('/') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>--}}
    <!-- datepicker -->
    {{--<script src="{{ url('/') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>--}}
@endsection
