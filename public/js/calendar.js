var d = new Date();
var c = new Date();
var strMonths = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
var textMonth = document.getElementById('month');
var textYear = document.getElementById('year');
var monthID = document.getElementById('monthID');
var yearID = document.getElementById('yearID');
var textToday = document.getElementById('text-today');

var mID = d.getMonth();
var cYear = d.getFullYear();
monthID.value = mID;
yearID.value = cYear;


textMonth.innerText = strMonths[mID];
textYear.innerText = cYear;
textToday.innerText = c.getMonth() + 1 + "-" + c.getDate() + "-" + c.getFullYear();

var spc = 0;
var lastDay;

updateDays();


function prevMonth() {
    d.setMonth(mID - 1);
    updateDate();
}

function nextMonth() {
    d.setMonth(mID + 1);
    updateDate();
}

function updateDate() {
    cYear = d.getFullYear();
    textYear.innerText = d.getFullYear();
    yearID.value = cYear;

    mID = d.getMonth();
    textMonth.innerText = strMonths[mID];
    monthID.value = mID;

    updateDays();
}

function updateDays() {
    document.getElementById("days").innerHTML = "";
    lastDay = new Date(d.getFullYear(), (d.getMonth() + 1), 0).getDate();
    var nd = new Date(d.getFullYear(), d.getMonth(), 1);
    var weekDay = nd.getDay();
    for (var i = 0; i < lastDay; i++) {
        if (i == 0) {
            switch (weekDay) {
                case 0:
                    spc = 6;
                    break;
                case 1:
                    spc = 0;
                    break;
                case 2:
                    spc = 1;
                    break;
                case 3:
                    spc = 2;
                    break;
                case 4:
                    spc = 3;
                    break;
                case 5:
                    spc = 4;
                    break;
                case 6:
                    spc = 5;
                    break;
            }
            for (var j = 0; j < spc; j++) {
                var currnode = document.createElement("li");
                var subtextnode = document.createTextNode(" ");
                currnode.appendChild(subtextnode);
                document.getElementById("days").appendChild(currnode);
            }
        }
        if (i == c.getDate() && c.getMonth() == d.getMonth() && c.getFullYear() == d.getFullYear()) {
            node.classList.add('active');
        }
        var node = document.createElement("li");
        node.classList.add('list-day');
        var textnode = document.createTextNode(i + 1);
        node.appendChild(textnode);
        document.getElementById("days").appendChild(node);
    }
}

function updateToday() {
    d.setMonth(c.getMonth());
    d.setFullYear(c.getFullYear());
    updateDate();
    updateDays();
}