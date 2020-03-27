@extends('layouts.app')
@section('header', 'Daily Statistics')

@section('content')

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script> --}}
{{-- <script src="{{ asset('js/chart.js') }}"></script> --}}
<script>
        var g1D=[];
        g1D[0]=new Array;
        g1D[1]=new Array;
        g1D[2]=new Array;
        g1D[3]=new Array;

        var g2D=[];
        g2D[0]=new Array;
        g2D[1]=new Array;
        g2D[2]=new Array;
        g2D[3]=new Array;

        var g3D=[];
        g3D[0]=new Array;
        g3D[1]=new Array;
        g3D[2]=new Array;
        g3D[3]=new Array;

        var g4D=[];
        g4D[0]=new Array;
        g4D[1]=new Array;
        g4D[2]=new Array;
        g4D[3]=new Array;

        var g5D=[];
        g5D[0]=new Array;
        g5D[1]=new Array;
        g5D[2]=new Array;
        g5D[3]=new Array;

        var g6D=[];
        g6D[0]=new Array;
        g6D[1]=new Array;
        g6D[2]=new Array;
        g6D[3]=new Array;

        function g1Data(y,m,d,t) {
                g1D[0].push(m);
                g1D[1].push(y);
                g1D[2].push(d);
                g1D[3].push(t);
            }

        function g2Data(y,m,d,t) {
                g2D[0].push(m);
                g2D[1].push(y);
                g2D[2].push(d);
                g2D[3].push(t);
            }

        function g3Data(y,m,d,t) {
                g3D[0].push(m);
                g3D[1].push(y);
                g3D[2].push(d);
                g3D[3].push(t);
            }

        function g4Data(y,m,d,t) {
                g4D[0].push(m);
                g4D[1].push(y);
                g4D[2].push(d);
                g4D[3].push(t);
            }

        function g5Data(y,m,d,t) {
                g5D[0].push(m);
                g5D[1].push(y);
                g5D[2].push(d);
                g5D[3].push(t);
            }

        function g6Data(y,m,d,t) {
                g6D[0].push(m);
                g6D[1].push(y);
                g6D[2].push(d);
                g6D[3].push(t);
            }

</script>
    <div class="container-fluid statistics">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card history-chart py-4">
                    <div class="container-fluid header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h4 class="chart-label m-4">Visits on a specific day</h4>
                            </div>
  
                        </div>
   
                    </div>
                    <div class="date-input ml-4">
                            <input type="date" id="date">
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
            <script>g1Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }},{{ date('G',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==2))
            <script>g2Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }},{{ date('G',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==3))
            <script>g3Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }},{{ date('G',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==4))
            <script>g4Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }},{{ date('G',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==5))
            <script>g5Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }},{{ date('G',strtotime($count['created_at'])) }});</script>

        @elseif (($count['grade_level']==6))
            <script>g6Data({{ date('Y',strtotime($count['created_at'])) }},{{ date('m',strtotime($count['created_at'])) }},{{ date('j',strtotime($count['created_at'])) }},{{ date('G',strtotime($count['created_at'])) }});</script>

        @endif
    @endforeach
    <span id="test"></span>
    <script>
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
        });

        var dt = new Date();
        document.getElementById("date").value=dt.toDateInputValue();
        document.getElementById("date").setAttribute("max",dt.toDateInputValue());

        console.log(g1D);
        var config = {
    type: 'line',
    data: {
        labels: [],
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
    var str=document.getElementById('date').value;
    var res=str.replace(/-/g, "/");
    var date=new Date(res);
    var month=date.getMonth()+1;
    var year=date.getFullYear();
    var day=date.getDate();
    var time;
    var i;
    var hours=0;
    var ctr=0;
    while(hours<=23){
        done=false;
        if(hours<12){
            if(hours==0)
                time="12 am";
            else
                time=(hours)+" am";
        }
        else{
            if(hours==12)
                time="12 pm";
            else
                time=(hours-12)+"pm";
        }
        for(i=0;i<g1D[0].length;i++){
            if(g1D[0][i]==month && g1D[1][i]==year && g1D[2][i]==day && g1D[3][i]==hours){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,time,ctr,0);
        else
            addData(window.myLine,time,0,0);

        ctr=0;
        for(i=0;i<g2D.length;i++){
            if(g2D[0][i]==month && g2D[1][i]==year && g2D[2][i]==day && g2D[3][i]==hours){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,time,ctr,1);
        else
            addData(window.myLine,time,0,1);

        ctr=0;
        for(i=0;i<g3D.length;i++){
            if(g3D[0][i]==month && g3D[1][i]==year && g3D[2][i]==day && g3D[3][i]==hours){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,time,ctr,2);
        else
            addData(window.myLine,time,0,2);

        ctr=0;
        for(i=0;i<g4D.length;i++){
            if(g4D[0][i]==month && g4D[1][i]==year && g4D[2][i]==day && g4D[3][i]==hours){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,time,ctr,3);
        else
            addData(window.myLine,time,0,3);

        ctr=0;
        for(i=0;i<g5D.length;i++){
            if(g5D[0][i]==month && g5D[1][i]==year && g5D[2][i]==day && g5D[3][i]==hours){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,time,ctr,4);
        else
            addData(window.myLine,time,0,4);

        ctr=0;
        for(i=0;i<g6D.length;i++){
            if(g6D[0][i]==month && g6D[1][i]==year && g6D[2][i]==day && g6D[3][i]==hours){
                ctr++;
            }
        }
        if(ctr>0)
            addData(window.myLine,time,ctr,5);
        else
            addData(window.myLine,time,0,5);

        ctr=0;
        hours++;
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