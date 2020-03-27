function toggleSidebar() {
    var side = document.getElementById('sidebar');
    var main = document.getElementById('content');
    side.classList.toggle('active');
    main.classList.toggle('active');
    var over = document.getElementsByClassName('overlay');
    over[0].classList.toggle('active');


    var drop = document.getElementsByClassName('collapse list-unstyled');
    for(var i = 0; i < drop.length; i++) {
        drop[i].classList.remove('show');
    }
}




// //////////////////////////////////////////////////////////////


window.chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
};

window.randomScalingFactor = function () {
    return Math.round(Math.random() * 90) + 10;
};



//////////////////////////////////////////////////////////////////////////
//Draw chart
window.onload = function () {
    var ctx = document.getElementById("chart").getContext("2d");
    window.myLine = new Chart(ctx, config);
};



function checkValid(g){
    if(g==0 || document.getElementById("grade"+g).checked==true)
        document.getElementById("selectSection").disabled=false;
    else
        document.getElementById("selectSection").disabled = true;

    if (document.getElementById("selectSection").value != "Select Section")
        document.getElementById("submitEntry").disabled = false;
    else
        document.getElementById("submitEntry").disabled = true;
}

//////////////////////////////////////////////////////////////////////////

function tempAlert(msg, duration) {
    var el = document.createElement("div");
    el.classList.add('alert-style')
    el.innerHTML = msg;
    setTimeout(function () {
        el.parentNode.removeChild(el);
    }, duration);
    document.body.appendChild(el);
}