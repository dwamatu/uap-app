/*Bar Graph Data*/


var randomColorGenerator = function () {
    return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
};

var quantity = [];
var title = [];
(function () {
        $.ajax({
            method: 'Get',
            url: '/fetch/chart/data',
            dataType: "json",
            success: function (results) {
                $.each(results, function (entry, k) {
                    quantity.push(
                        k.entries
                    );
                    title.push(

                         k.mnth.substring(0,3)  + ' ' + k.yr.substring(2,4)
                    )
                    ;

                });
             // console.log(quantity);
                DrawChart();


            }
        });

    })();
function DrawChart() {
    var ctx = document.getElementById('myChart').getContext('2d');
    ctx.canvas.width = 550;
    ctx.canvas.height = 450;

    var chart = {
        labels: title,
        datasets: [{
            backgroundColor: randomColorGenerator(),
            borderColor: getRandomColor(),
            borderWidth: 1,
            data: quantity,

            label: 'Claims' // for legend

        }]
    };


    var myNewChart = new Chart(ctx, {
        type: "bar",
        data: chart,
        bezierCurve: false,
        options: {
            responsive: false,
            maintainAspectRatio: true,
            title: {
            display: true,
            text: 'Claims per Month'
        },
            legend: {
                display: true,
                labels: {
                    fontColor: 'rgb(255, 99, 132)'
                }
            },
            scales: {
                yAxes: [{ ticks: {
                    beginAtZero:true,
                    display:true,
                    steps: 10,
                    stepValue: 2,
                    max: 50
                } }],
                xAxes: [{
                    categoryPercentage: 1.8,
                    barPercentage: 0.5,
                    display: false,
                    suggestedMin:0,

                        }]
            }
        }
    });
    function getRandomColor() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

}
