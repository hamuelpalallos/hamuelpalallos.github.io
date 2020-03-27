@extends('layouts.app')

@section('header', 'Dashboard')


@section('content')
<script>
    var g1D=0;
    var g2D=0;
    var g3D=0;
    var g4D=0;
    var g5D=0;
    var g6D=0;

    var ind;

    var g1M=new Array();
    for(ind=0;ind<12;ind++){
        g1M[ind]=0;
    }

    var g2M=new Array();
    for(ind=0;ind<12;ind++){
        g2M[ind]=0;
    }

    var g3M=new Array();
    for(ind=0;ind<12;ind++){
        g3M[ind]=0;
    }

    var g4M=new Array();
    for(ind=0;ind<12;ind++){
        g4M[ind]=0;
    }

    var g5M=new Array();
    for(ind=0;ind<12;ind++){
        g5M[ind]=0;
    }

    var g6M=new Array();
    for(ind=0;ind<12;ind++){
        g6M[ind]=0;
    }

    function g1Data(d) {
            g1M[d-1]++;
        }

    function g2Data(d) {
            g2M[d-1]++;
        }

    function g3Data(d) {
            g3M[d-1]++;
        }

    function g4Data(d) {
            g4M[d-1]++;
        }

    function g5Data(d) {
            g5M[d-1]++;
        }

    function g6Data(d) {
            g6M[d-1]++;
        }
</script>
<div class="container-fluid">
    {{-- <div class="block-header">
        <h4>DASHBOARD</h4><br>
    </div> --}}
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons"></i>
                </div>
                <div class="content">
                    <div class="text">Daily Total</div>
                    <div class="number count-to" data-from="0" data-to="125">
                        {{ $daily }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons"></i>
                </div>
                <div class="content">
                    <div class="text">Weekly AVG</div>
                    <div class="number count-to" data-from="0" data-to="257">
                        {{ number_format($weekly/7) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons"></i>
                </div>
                <div class="content">
                    <div class="text">Monthly AVG</div>
                    <div class="number count-to" data-from="0" data-to="243">
                        {{ number_format($monthly/date('t')) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons"></i>
                </div>
                <div class="content">
                    <div class="text">Yearly AVG</div>
                    <div class="number count-to" data-from="0" data-to="1225">
                        {{ number_format($yearly/365) }}
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="row clearfix mb-4">
        <div class="col-md-5 col-lg-5 col-sm-6">
            <div class="card history-chart py-4">
                <div class="container-fluid header">
                    <div class="row clearfix">
                        <div class="offset-1">
                            <h6>Grade level statistics</h6>
                        </div>
                    </div>
                </div>
                <div class="body isResizable">
                    <div class="container-fluid chart-containter">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-7 col-lg-7 col-sm-6">
            {{--  CALENDAR  --}}
            <div class="calendar mt-4 mt-sm-0" id="calendar">
                <div class="month">
                    <ul>
                        <li class="prev" onclick="prevMonth()">&#10094;</li>
                        <li class="next" onclick="nextMonth()">&#10095;</li>
                        <li class="month-label">
                            <input type="hidden" value="1" id="monthID">
                            <input type="hidden" value="2000" id="yearID">
                            <p id="month">JANUARY</p>
                            <span id="year">2000</span>
                        </li>
                    </ul>
                </div>
                <div class="date">
                    <ul class="weekdays">
                        <li class="mon">Mon</li>
                        <li class="tue">Tue</li>
                        <li class="wed">Wed</li>
                        <li class="thu">Thu</li>
                        <li class="fri">Fri</li>
                        <li class="sat">Sat</li>
                        <li class="sun">Sun</li>
                    </ul>
                    
                    <ul class="days" id="days">
                    </ul>
                </div>

                <div class="today">
                    <button id="today" onclick="updateToday()">Today</button>
                    <div class="curr-date" id="text-today">00-00-0000</div>
                </div>
            </div>
            <script src="{{ asset('public/js/calendar.js') }} "></script>
            {{--  END CALENDAR  --}}

        </div>
    </div>


    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card history-chart py-4">
                <div class="container-fluid header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h6>Visits Per Month of Current Year</h6>
                        </div>
                    </div>
                </div>
                <div class="body isResizable">
                    <div class="container-fluid chart-containter">
                        <canvas id="chart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix py-4">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="body trend bg-pink">
                    <div class="today date">
                        <div class="grade-level">
                            <h6>Total number of students visited library</h6>
                            <hr>
                            <h6>Today</h6>
                        </div>
                        <div class="student-total number">
                            <ul>
                                <li>{{ $daily }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="yesterday date">
                        <div class="grade-level">
                            <h6>Yesterday</h6>
                        </div>
                        <div class="student-total number">
                            <ul>
                            <li>{{ $yday }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="last-week date">
                        <div class="grade-level">
                            <h6>Last Week</h6>
                        </div>
                        <div class="student-total number">
                            <ul>
                                <li>{{ $weekly }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4 ">
                <div class="body trend bg-cyan">
                    <div class="today date">
                        <div class="grade-level">
                            <h6>Grade level that has most visited</h6>
                            <hr>
                            <h6>Today</h6>
                        </div>
                        <div class="student-total number">
                            <ul>
                                @if(max($g1t,$g2t,$g3t,$g4t,$g5t,$g6t)==0)
                                    <li>Empty</li>
                                @elseif(max($g1t,$g2t,$g3t,$g4t,$g5t,$g6t)==$g1t)
                                    <li>Grade 1</li>
                                @elseif(max($g1t,$g2t,$g3t,$g4t,$g5t,$g6t)==$g2t)
                                    <li>Grade 2</li>
                                @elseif(max($g1t,$g2t,$g3t,$g4t,$g5t,$g6t)==$g3t)
                                    <li>Grade 3</li>
                                @elseif(max($g1t,$g2t,$g3t,$g4t,$g5t,$g6t)==$g4t)
                                    <li>Grade 4</li>
                                @elseif(max($g1t,$g2t,$g3t,$g4t,$g5t,$g6t)==$g5t)
                                    <li>Grade 5</li>
                                @elseif(max($g1t,$g2t,$g3t,$g4t,$g5t,$g6t)==$g6t)
                                    <li>Grade 6</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="yesterday date">
                        <div class="grade-level">
                            <h6>Yesterday</h6>
                        </div>
                        <div class="student-total number">
                            <ul>
                                @if(max($g1y,$g2y,$g3y,$g4y,$g5y,$g6y)==0)
                                    <li>Empty</li>
                                @elseif(max($g1y,$g2y,$g3y,$g4y,$g5y,$g6y)==$g1y)
                                    <li>Grade 1</li>
                                @elseif(max($g1y,$g2y,$g3y,$g4y,$g5y,$g6y)==$g2y)
                                    <li>Grade 2</li>
                                @elseif(max($g1y,$g2y,$g3y,$g4y,$g5y,$g6y)==$g3y)
                                    <li>Grade 3</li>
                                @elseif(max($g1y,$g2y,$g3y,$g4y,$g5y,$g6y)==$g4y)
                                    <li>Grade 4</li>
                                @elseif(max($g1y,$g2y,$g3y,$g4y,$g5y,$g6y)==$g5y)
                                    <li>Grade 5</li>
                                @elseif(max($g1y,$g2y,$g3y,$g4y,$g5y,$g6y)==$g6y)
                                    <li>Grade 6</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="last-week date">
                        <div class="grade-level">
                            <h6>Last Week</h6>
                        </div>
                        <div class="student-total number">
                            <ul>
                                @if(max($g1lw,$g2lw,$g3lw,$g4lw,$g5lw,$g6lw)==0)
                                    <li>Empty</li>
                                @elseif(max($g1lw,$g2lw,$g3lw,$g4lw,$g5lw,$g6lw)==$g1lw)
                                    <li>Grade 1</li>
                                @elseif(max($g1lw,$g2lw,$g3lw,$g4lw,$g5lw,$g6lw)==$g2lw)
                                    <li>Grade 2</li>
                                @elseif(max($g1lw,$g2lw,$g3lw,$g4lw,$g5lw,$g6lw)==$g3lw)
                                    <li>Grade 3</li>
                                @elseif(max($g1lw,$g2lw,$g3lw,$g4lw,$g5lw,$g6lw)==$g4lw)
                                    <li>Grade 4</li>
                                @elseif(max($g1lw,$g2lw,$g3lw,$g4lw,$g5lw,$g6lw)==$g5lw)
                                    <li>Grade 5</li>
                                @elseif(max($g1lw,$g2lw,$g3lw,$g4lw,$g5lw,$g6lw)==$g6lw)
                                    <li>Grade 6</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card mb-4">
                <div class="body trend bg-teal">
                    <div class="today date">
                        <div class="grade-level">
                            <h6>Sections the visited the library the most</h6>
                            <hr>
                            <h6>Today</h6>
                        </div>
                        <div class="student-total number">
                            <ul>
                                @if(max($g1t,$g2t,$g3t,$g4t,$g5t,$g6t)==0)
                                    <li>Empty</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g1ta)
                                    <li>Grade 1 Section A</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g2ta)
                                    <li>Grade 2 Section A</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g3ta)
                                    <li>Grade 3 Section A</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g4ta)
                                    <li>Grade 4 Section A</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g5ta)
                                    <li>Grade 5 Section A</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g6ta)
                                    <li>Grade 6 Section A</li>

                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g1tb)
                                    <li>Grade 1 Section B</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g2tb)
                                    <li>Grade 2 Section B</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g3tb)
                                    <li>Grade 3 Section B</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g4tb)
                                    <li>Grade 4 Section B</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g5tb)
                                    <li>Grade 5 Section B</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g6tb)
                                    <li>Grade 6 Section B</li>

                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g1tc)
                                    <li>Grade 1 Section C</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g2tc)
                                    <li>Grade 2 Section C</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g3tc)
                                    <li>Grade 3 Section C</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g4tc)
                                    <li>Grade 4 Section C</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g5tc)
                                    <li>Grade 5 Section C</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g6tc)
                                    <li>Grade 6 Section C</li>

                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g1td)
                                    <li>Grade 1 Section D</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g2td)
                                    <li>Grade 2 Section D</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g3td)
                                    <li>Grade 3 Section D</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g4td)
                                    <li>Grade 4 Section D</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g5td)
                                    <li>Grade 5 Section D</li>
                                @elseif(max($g1ta,$g2ta,$g3ta,$g4ta,$g5ta,$g6ta,$g1tb,$g2tb,$g3tb,$g4tb,$g5tb,$g6tb,$g1tc,$g2tc,$g3tc,$g4tc,$g5tc,$g6tc,$g1td,$g2td,$g3td,$g4td,$g5td,$g6td)==$g6td)
                                    <li>Grade 6 Section D</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="yesterday date">
                        <div class="grade-level">
                            <h6>Yesterday</h6>
                        </div>
                        <div class="student-total number">
                            <ul>
                                @if(max($g1t,$g2t,$g3t,$g4t,$g5t,$g6t)==0)
                                    <li>Empty</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g1ya)
                                    <li>Grade 1 Section A</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g2ya)
                                    <li>Grade 2 Section A</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g3ya)
                                    <li>Grade 3 Section A</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g4ya)
                                    <li>Grade 4 Section A</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g5ya)
                                    <li>Grade 5 Section A</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g6ya)
                                    <li>Grade 6 Section A</li>

                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g1yb)
                                    <li>Grade 1 Section B</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g2yb)
                                    <li>Grade 2 Section B</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g3yb)
                                    <li>Grade 3 Section B</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g4yb)
                                    <li>Grade 4 Section B</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g5yb)
                                    <li>Grade 5 Section B</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g6yb)
                                    <li>Grade 6 Section B</li>

                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g1yc)
                                    <li>Grade 1 Section C</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g2yc)
                                    <li>Grade 2 Section C</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g3yc)
                                    <li>Grade 3 Section C</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g4yc)
                                    <li>Grade 4 Section C</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g5yc)
                                    <li>Grade 5 Section C</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g6yc)
                                    <li>Grade 6 Section C</li>

                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g1yd)
                                    <li>Grade 1 Section D</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g2yd)
                                    <li>Grade 2 Section D</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g3yd)
                                    <li>Grade 3 Section D</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g4yd)
                                    <li>Grade 4 Section D</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g5yd)
                                    <li>Grade 5 Section D</li>
                                @elseif(max($g1ya,$g2ya,$g3ya,$g4ya,$g5ya,$g6ya,$g1yb,$g2yb,$g3yb,$g4yb,$g5yb,$g6yb,$g1yc,$g2yc,$g3yc,$g4yc,$g5yc,$g6yc,$g1yd,$g2yd,$g3yd,$g4yd,$g5yd,$g6yd)==$g6yd)
                                    <li>Grade 6 Section D</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="last-week date">
                        <div class="grade-level">
                            <h6>Last Week</h6>
                        </div>
                        <div class="student-total number">
                            <ul>
                                @if(max($g1lw,$g2lw,$g3lw,$g4lw,$g5lw,$g6lw)==0)
                                    <li>Empty</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g1lwa)
                                    <li>Grade 1 Section A</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g2lwa)
                                    <li>Grade 2 Section A</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g3lwa)
                                    <li>Grade 3 Section A</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g4lwa)
                                    <li>Grade 4 Section A</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g5lwa)
                                    <li>Grade 5 Section A</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g6lwa)
                                    <li>Grade 6 Section A</li>

                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g1lwb)
                                    <li>Grade 1 Section B</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g2lwb)
                                    <li>Grade 2 Section B</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g3lwb)
                                    <li>Grade 3 Section B</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g4lwb)
                                    <li>Grade 4 Section B</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g5lwb)
                                    <li>Grade 5 Section B</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g6lwb)
                                    <li>Grade 6 Section B</li>

                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g1lwc)
                                    <li>Grade 1 Section C</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g2lwc)
                                    <li>Grade 2 Section C</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g3lwc)
                                    <li>Grade 3 Section C</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g4lwc)
                                    <li>Grade 4 Section C</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g5lwc)
                                    <li>Grade 5 Section C</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g6lwc)
                                    <li>Grade 6 Section C</li>

                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g1lwd)
                                    <li>Grade 1 Section D</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g2lwd)
                                    <li>Grade 2 Section D</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g3lwd)
                                    <li>Grade 3 Section D</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g4lwd)
                                    <li>Grade 4 Section D</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g5lwd)
                                    <li>Grade 5 Section D</li>
                                @elseif(max($g1lwa,$g2lwa,$g3lwa,$g4lwa,$g5lwa,$g6lwa,$g1lwb,$g2lwb,$g3lwb,$g4lwb,$g5lwb,$g6lwb,$g1lwc,$g2lwc,$g3lwc,$g4lwc,$g5lwc,$g6lwc,$g1lwd,$g2lwd,$g3lwd,$g4lwd,$g5lwd,$g6lwd)==$g6lwd)
                                    <li>Grade 6 Section D</li>
                                @endif
                            </ul>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @foreach ($counter as $count)
        <script>addData();</script>
    @endforeach  --}}
</div>
{{-- for monthly data --}}
@foreach ($counter as $count)
        @if(date('Y',strtotime($count['created_at'])) == date('Y'))
            @if (($count['grade_level']==1) && date('m', strtotime($count['created_at']))==1)
                <script>g1Data(1);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==2)
                <script>g1Data(2);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==3)
                <script>g1Data(3);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==4)
                <script>g1Data(4);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==5)
                <script>g1Data(5);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==6)
                <script>g1Data(6);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==7)
                <script>g1Data(7);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==8)
                <script>g1Data(8);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==9)
                <script>g1Data(9);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==10)
                <script>g1Data(10);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==11)
                <script>g1Data(11);</script>
            @elseif(($count['grade_level']==1) && date('m', strtotime($count['created_at']))==12)
                <script>g1Data(12);</script>    
            @endif

            @if (($count['grade_level']==2) && date('m', strtotime($count['created_at']))==1)
                <script>g2Data(1);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==2)
                <script>g2Data(2);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==3)
                <script>g2Data(3);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==4)
                <script>g2Data(4);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==5)
                <script>g2Data(5);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==6)
                <script>g2Data(6);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==7)
                <script>g2Data(7);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==8)
                <script>g2Data(8);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==9)
                <script>g2Data(9);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==10)
                <script>g2Data(10);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==11)
                <script>g2Data(11);</script>
            @elseif(($count['grade_level']==2) && date('m', strtotime($count['created_at']))==12)
                <script>g2Data(12);</script>    
            @endif

            @if (($count['grade_level']==3) && date('m', strtotime($count['created_at']))==1)
                <script>g3Data(1);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==2)
                <script>g3Data(2);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==3)
                <script>g3Data(3);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==4)
                <script>g3Data(4);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==5)
                <script>g3Data(5);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==6)
                <script>g3Data(6);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==7)
                <script>g3Data(7);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==8)
                <script>g3Data(8);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==9)
                <script>g3Data(9);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==10)
                <script>g3Data(10);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==11)
                <script>g3Data(11);</script>
            @elseif(($count['grade_level']==3) && date('m', strtotime($count['created_at']))==12)
                <script>g3Data(12);</script>    
            @endif

            @if (($count['grade_level']==4) && date('m', strtotime($count['created_at']))==1)
                <script>g4Data(1);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==2)
                <script>g4Data(2);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==3)
                <script>g4Data(3);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==4)
                <script>g4Data(4);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==5)
                <script>g4Data(5);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==6)
                <script>g4Data(6);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==7)
                <script>g4Data(7);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==8)
                <script>g4Data(8);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==9)
                <script>g4Data(9);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==10)
                <script>g4Data(10);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==11)
                <script>g4Data(11);</script>
            @elseif(($count['grade_level']==4) && date('m', strtotime($count['created_at']))==12)
                <script>g4Data(12);</script>    
            @endif

            @if (($count['grade_level']==5) && date('m', strtotime($count['created_at']))==1)
                <script>g5Data(1);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==2)
                <script>g5Data(2);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==3)
                <script>g5Data(3);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==4)
                <script>g5Data(4);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==5)
                <script>g5Data(5);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==6)
                <script>g5Data(6);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==7)
                <script>g5Data(7);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==8)
                <script>g5Data(8);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==9)
                <script>g5Data(9);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==10)
                <script>g5Data(10);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==11)
                <script>g5Data(11);</script>
            @elseif(($count['grade_level']==5) && date('m', strtotime($count['created_at']))==12)
                <script>g5Data(12);</script>    
            @endif

            @if (($count['grade_level']==6) && date('m', strtotime($count['created_at']))==1)
                <script>g6Data(1);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==2)
                <script>g6Data(2);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==3)
                <script>g6Data(3);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==4)
                <script>g6Data(4);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==5)
                <script>g6Data(5);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==6)
                <script>g6Data(6);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==7)
                <script>g6Data(7);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==8)
                <script>g6Data(8);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==9)
                <script>g6Data(9);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==10)
                <script>g6Data(10);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==11)
                <script>g6Data(11);</script>
            @elseif(($count['grade_level']==6) && date('m', strtotime($count['created_at']))==12)
                <script>g6Data(12);</script>    
            @endif
        @endif
    @endforeach

    {{-- for daily data (pie chart) --}}
    @foreach ($counter as $count)
         @if (($count['grade_level']==1) && date('Y-m-d',strtotime($count['created_at']))==date('Y-m-d'))
            <script>g1D++;</script>

        @elseif (($count['grade_level']==2) && date('Y-m-d',strtotime($count['created_at']))==date('Y-m-d'))
            <script>g2D++;</script>

        @elseif (($count['grade_level']==3) && date('Y-m-d',strtotime($count['created_at']))==date('Y-m-d'))
            <script>g3D++</script>

        @elseif (($count['grade_level']==4) && date('Y-m-d',strtotime($count['created_at']))==date('Y-m-d'))
            <script>g4D++</script>

        @elseif (($count['grade_level']==5) && date('Y-m-d',strtotime($count['created_at']))==date('Y-m-d'))
            <script>g5D++</script>

        @elseif (($count['grade_level']==6) && date('Y-m-d',strtotime($count['created_at']))==date('Y-m-d'))
            <script>g6D++</script>

        @endif
    @endforeach
<script>
    var ctx = document.getElementById("chart").getContext("2d");
    var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        //labels: ["jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
        // labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
            label: "Grade 1",
            fill: false,
            backgroundColor: window.chartColors.red,
            borderColor: window.chartColors.red,
            lineTension: 0,
            borderWidth: 1,
            // borderDash: [2, 2],
            data: [],
        }, {
            label: "Grade 2",
            fill: false,
            backgroundColor: window.chartColors.orange,
            borderColor: window.chartColors.orange,
            lineTension: 0,
            borderWidth: 1,
            borderDash: [4, 1],
            data: [],
        }, {
            label: "Grade 3",
            backgroundColor: window.chartColors.yellow,
            borderColor: window.chartColors.yellow,
            lineTension: 0,
            borderWidth: 1,
            borderDash: [8, 1],
            data: [],
            fill: false,
        }, {
            label: "Grade 4",
            backgroundColor: window.chartColors.green,
            borderColor: window.chartColors.green,
            lineTension: 0,
            borderWidth: 1,
            borderDash: [8, 1],
            data: [],
            fill: false,
        }, {
            label: "Grade 5",
            backgroundColor: window.chartColors.blue,
            borderColor: window.chartColors.blue,
            lineTension: 0,
            borderWidth: 1,
            borderDash: [8, 1],
            data: [],
            fill: false,
        }, {
            label: "Grade 6",
            backgroundColor: window.chartColors.purple,
            borderColor: window.chartColors.purple,
            lineTension: 0,
            borderWidth: 1,
            borderDash: [8, 1],
            data: [],
            fill: false,
        }
    ]
    },
    options: {
        maintainAspectRatio: false,
        responsive: true,
        // legend: {
        //     position: 'top'
        // },
        title: {
            // position: 'bottom',
            display: true,
            // text: 'Statistics'
            text: 'Grade level'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false
                }
            }]
        }
    }
});



// Doughnut and Pie Chart
var ctx = document.getElementById('myPieChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6'],
        datasets: [{
            label: '# of Votes',
            data: [g1D, g2D, g3D, g4D, g5D, g6D],
            backgroundColor: [
              '#0088FF',
              '#FFAA00',
              '#FF7700',
              '#FF0033',
              '#9911AA',
              '#AADD22'
            ],
            borderWidth: 1
        }]
    }
});

/* 0088FF */
/* FFAA00 */
/* FF7700 */
/* FF0033 */
/* 9911AA */
/* AADD22 */


var i;
for(i=0;i<12;i++){
    addData(myLineChart,months[i],g1M[i],0);
    addData(myLineChart,months[i],g2M[i],1);
    addData(myLineChart,months[i],g3M[i],2);
    addData(myLineChart,months[i],g4M[i],3);
    addData(myLineChart,months[i],g5M[i],4);
    addData(myLineChart,months[i],g6M[i],5);
}

function addData(chart, label, data, i) {
    var j;
    var labelExist=false;
    for(j=0;j<chart.data.labels.length;j++){
        if(label==chart.data.labels[j])
            labelExist=true;
    }
    if(!labelExist)
        chart.data.labels.push(label);
    chart.data.datasets[i].data.push(data);
    // chart.data.datasets.forEach(('Grade 1',1,dataset) => {
    //     dataset.data.push(data);
    // });
    chart.update();
}
// document.getElementById("test").innerHTML = d.getDate();
</script>

@endsection
