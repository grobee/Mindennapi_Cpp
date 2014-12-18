window.onload = function () {
    var correct = document.getElementsByClassName('hidden')[0].innerHTML;
    var incorrect = document.getElementsByClassName('hidden')[1].innerHTML;

    var colour = "#666";

    if(correct == 0 && incorrect == 0){
        correct = 100;
        colour = "#fff";
    }

    var chart = new CanvasJS.Chart("chartContainer",
        {
            title:{
                text: ""
            },
            theme: "theme1",
            data: [
                {
                    type: "doughnut",
                    indexLabelFontFamily: "Verdana",
                    indexLabelFontSize: 15,
                    startAngle:0,
                    indexLabelFontColor: colour,
                    indexLabelLineColor: colour,
                    toolTipContent: "{y} %",

                    dataPoints: [
                        {  y: correct, label: "helyes {y}%" },
                        {  y: incorrect, label: "helytelen {y}%" },
                    ]
                }
            ]
        });
    chart.render();
}
