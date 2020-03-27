@extends('layouts.app')

@section('header', 'Monthly Statistics')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
{{-- <script src="{{ asset('js/chart.js') }}"></script> --}}
<script>
var d = new Date();
var month = new Array();
month[0] = "Jan";
month[1] = "Feb";
month[2] = "Mar";
month[3] = "Apr";
month[4] = "May";
month[5] = "Jun";
month[6] = "Jul";
month[7] = "Aug";
month[8] = "Sep";
month[9] = "Oct";
month[10] = "Nov";
month[11] = "Dec";
var m = month[d.getMonth()];

    var g1D=[];
    g1D[0]=new Array;
    g1D[1]=new Array;
    g1D[2]=new Array;

    var g2D=[];
    g2D[0]=new Array;
    g2D[1]=new Array;
    g2D[2]=new Array;

    var g3D=[];
    g3D[0]=new Array;
    g3D[1]=new Array;
    g3D[2]=new Array;

    var g4D=[];
    g4D[0]=new Array;
    g4D[1]=new Array;
    g4D[2]=new Array;

    var g5D=[];
    g5D[0]=new Array;
    g5D[1]=new Array;
    g5D[2]=new Array;

    var g6D=[];
    g6D[0]=new Array;
    g6D[1]=new Array;
    g6D[2]=new Array;

    function g1Data(y,m,d) {
            g1D[0].push(m);
            g1D[1].push(y);
            g1D[2].push(d);
        }

    function g2Data(y,m,d) {
            g2D[0].push(m);
            g2D[1].push(y);
            g2D[2].push(d);
        }

    function g3Data(y,m,d) {
            g3D[0].push(m);
            g3D[1].push(y);
            g3D[2].push(d);
        }

    function g4Data(y,m,d) {
            g4D[0].push(m);
            g4D[1].push(y);
            g4D[2].push(d);
        }

    function g5Data(y,m,d) {
            g5D[0].push(m);
            g5D[1].push(y);
            g5D[2].push(d);
        }

    function g6Data(y,m,d) {
            g6D[0].push(m);
            g6D[1].push(y);
            g6D[2].push(d);
        }
</script>
    <div class="container-fluid statistics">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card history-chart py-4">
                    <div class="container-fluid header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h4 class="chart-label m-4">Visits By Month</h4>
                            </div>
  
                        </div>
   
                    </div>
                    <div class="date-input ml-4">
                            <select id="month">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <select id="year">
                                @for($x=2018;$x<=date('Y');$x++)
                                    <option>{{$x}}</option>
                                @endfor
                            </select>
                            <input class="btn btn-success" type="button" id="update" value="update">
                    </div>
                    <div class="body isResizable">
                        <div class="container-fluid chart-containter">
                            <canvas id="chart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($counter as $count)
        @if (($count['grade_level']==1))
            <script>g1Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==2))
            <script>g2Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==3))
            <script>g3Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==4))
            <script>g4Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==5))
            <script>g5Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==6))
            <script>g6Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }});</script>

        @endif
    @endforeach
    <span id="test"></span>
    <script>
        
        var dt = new Date();
        if(dt.getMonth()==11)
            document.getElementById("month").value=dt.getMonth()-11;
        else
            document.getElementById("month").value=dt.getMonth()+1;
        document.getElementById("year").value=dt.getFullYear();

        var config = {
    type: 'line',
    data: {
        labels: [],
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
            text: 'Statistics'
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
};

document.getElementById("update").addEventListener("click", function(){
    removeData(window.myLine);
    var yr=document.getElementById('year').value;
    var mo=month[parseInt(document.getElementById('month').value)-1];
    var mn=document.getElementById('month').value;
    var date;
    var i;
    var days=1;
    var ctr=0;
    while(days<=daysInMonth(mn,yr)){
        done=false;
        date=mo+"-"+days;
        ctr=0;
        for(i=0;i<g1D[0].length;i++){
            if(g1D[0][i]==mn && g1D[1][i]==yr && g1D[2][i]==days){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,date,ctr,0);
        else
            addData(window.myLine,date,0,0);

        ctr=0;
        for(i=0;i<g2D[0].length;i++){
            if(g2D[0][i]==mn && g2D[1][i]==yr && g2D[2][i]==days){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,date,ctr,1);
        else
            addData(window.myLine,date,0,1);

        ctr=0;
        for(i=0;i<g3D[0].length;i++){
            if(g3D[0][i]==mn && g3D[1][i]==yr && g3D[2][i]==days){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,date,ctr,2);
        else
            addData(window.myLine,date,0,2);

        ctr=0;
        for(i=0;i<g4D[0].length;i++){
            if(g4D[0][i]==mn && g4D[1][i]==yr && g4D[2][i]==days){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,date,ctr,3);
        else
            addData(window.myLine,date,0,3);

        ctr=0;
        for(i=0;i<g5D[0].length;i++){
            if(g5D[0][i]==mn && g5D[1][i]==yr && g5D[2][i]==days){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,date,ctr,4);
        else
            addData(window.myLine,date,0,4);

        ctr=0;
        for(i=0;i<g6D[0].length;i++){
            if(g6D[0][i]==mn && g6D[1][i]==yr && g6D[2][i]==days){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,date,ctr,5);
        else
            addData(window.myLine,date,0,5);

        days++;
    }
});
// function updateChart(){
//     var fr=document.getElementById('datefr').value;
//     var to=document.getElementById('dateto').value;
//     var i;
//     addData(config[],'2000','55');
//     while(fr<=to){
//         for(i=0;g1D[i]!=null;i++){
//             if(g1D[i]==fr)
//                 addData(config,'2000','55');
//         }
//         fr++;
//     }
// }

function daysInMonth (month, year) { 
                return new Date(year, month, 0).getDate(); 
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

function removeData(chart) {
    chart.data.labels = [];
    chart.data.datasets.forEach((dataset) => {
        dataset.data = [];
    });
}
    </script>
@endsection