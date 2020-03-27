@extends('layouts.app')
@section('header', 'Yearly Statistics')

@section('content')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script> --}}
{{-- <script src="C:\Users\Vince\node_modules\chartjs\dist\Chart.js"></script> --}}
<script src="{{ asset('js/chart.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    function opChangefr(){
        var x = document.getElementById("datefr").value;
        var op = document.getElementById("dateto").getElementsByTagName("option");
        for (var i = 0; i < op.length; i++) {
        // lowercase comparison for case-insensitivity
        (op[i].value.toLowerCase() < x) 
            ? op[i].disabled = true
            : op[i].disabled = false;
        }
    }

    function opChangeto(){
        var x = document.getElementById("dateto").value;
        var op = document.getElementById("datefr").getElementsByTagName("option");
        for (var i = 0; i < op.length; i++) {
        // lowercase comparison for case-insensitivity
        (op[i].value.toLowerCase() > x) 
            ? op[i].disabled = true
            : op[i].disabled = false;
        }
    }

    var g1D=[];

    var g2D=[];

    var g3D=[];

    var g4D=[];

    var g5D=[];

    var g6D=[];

    function g1Data(d) {
            g1D.push(d);
        }

    function g2Data(d) {
            g2D.push(d);
        }

    function g3Data(d) {
            g3D.push(d);
        }

    function g4Data(d) {
            g4D.push(d);
        }

    function g5Data(d) {
            g5D.push(d);
        }

    function g6Data(d) {
            g6D.push(d);
        }

</script>
    <div class="container-fluid statistics">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card history-chart py-4">
                    <div class="container-fluid header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h4 class="chart-label m-4">Visits By Year</h4>
                            </div>
  
                        </div>
   
                    </div>
                    <div class="date-input ml-4">
                            <span>FROM: </span>
                            <select id="datefr" onchange="opChangefr();">
                                @for($x=2018;$x<=date('Y');$x++)
                                    <option>{{$x}}</option>
                                @endfor
                            </select>
                            <span>TO: </span>
                            <select id="dateto" onchange="opChangeto();">
                                @for($y=2018;$y<=date('Y');$y++)
                                    <option>{{$y}}</option>
                                @endfor
                            </select>
                            <input class="btn btn-success" type="button" id="update" value="update">
                    </div>
                    <div class="body isResizable">
                        <div class="container-fluid chart-containter">
                            <canvas id="chart" height="256"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($counter as $count)
        @if (($count['grade_level']==1))
            <script>g1Data({{ date('Y',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==2))
            <script>g2Data({{ date('Y',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==3))
            <script>g3Data({{ date('Y',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==4))
            <script>g4Data({{ date('Y',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==5))
            <script>g5Data({{ date('Y',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==6))
            <script>g6Data({{ date('Y',strtotime($count['created_at'])) }});</script>

        @endif
    @endforeach
    <script>
        var dt = new Date();
        document.getElementById("datefr").value=dt.getFullYear();
        document.getElementById("dateto").value=dt.getFullYear();
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
    var fr=document.getElementById('datefr').value;
    var to=document.getElementById('dateto').value;
    var i;
    var ctr=0;
    while(fr<=to){
        done=false;
        for(i=0;i<g1D.length;i++){
            if(g1D[i]==fr){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,fr,ctr,0);
        else
            addData(window.myLine,fr,0,0);

        ctr=0;
        for(i=0;i<g2D.length;i++){
            if(g2D[i]==fr){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,fr,ctr,1);
        else
            addData(window.myLine,fr,0,1);

        ctr=0;
        for(i=0;i<g3D.length;i++){
            if(g3D[i]==fr){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,fr,ctr,2);
        else
            addData(window.myLine,fr,0,2);

        ctr=0;
        for(i=0;i<g4D.length;i++){
            if(g4D[i]==fr){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,fr,ctr,3);
        else
            addData(window.myLine,fr,0,3);

        ctr=0;
        for(i=0;i<g5D.length;i++){
            if(g5D[i]==fr){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,fr,ctr,4);
        else
            addData(window.myLine,fr,0,4);

        ctr=0;
        for(i=0;i<g6D.length;i++){
            if(g6D[i]==fr){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,fr,ctr,5);
        else
            addData(window.myLine,fr,0,5);

        ctr=0;
        fr++;
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