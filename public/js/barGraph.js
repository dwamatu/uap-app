/*Bar Graph Data*/

var data = [];

(function () {
    $.ajax({
        method: 'Get',
        url: '/fetch/chart/data',
        dataType: "json",
        success: function (results) {
            $.each(results, function (entry, k) {
                data.push({

                    title: k.mnth.substring(0, 3) + ' ' + k.yr.substring(2, 4),
                    value: k.entries

                })

            });
            DrawChart();


        }
    });

})();
function DrawChart() {

    var svg = d3.select("svg"),
        margin = {top: 20, right: 20, bottom: 50, left: 40},
        width = +svg.attr("width") - margin.left - margin.right,
        height = +svg.attr("height") - margin.top - margin.bottom;

    var x = d3.scaleBand().rangeRound([0, width]).padding(0.2),
        y = d3.scaleLinear().rangeRound([height, 0]);

    var g = svg.append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");


    x.domain(data.map(function (d) {
        return d.title;
    }));
    y.domain([0, d3.max(data, function (d) {
        return d.value;
    })]);


    g.append("g")
        .attr("class", "xaxis axis--x")
        .attr("transform", "translate(0," + height + ")")
        .call(d3.axisBottom(x));

    g.append("g")
        .attr("class", "axis axis--y")
        .call(d3.axisLeft(y).ticks(5, "d"))
        .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("dy", "0.41em")
        .attr("text-anchor", "end")
        .text("Claims");
    /* Append Text on The X axis*/

    g.append("text")
        .attr("class", "x label")
        .attr("text-anchor", "end")
        .attr("x", width)
        .attr("y", height + 45)
        .text("Month <Year>");
/* Append Text on the Y Axis*/
    svg.append("text")
        .attr("class", "y label")
        .attr("text-anchor", "end")
        .attr("y", 6)
        .attr("dy", ".75em")
        .attr("transform", "rotate(-90)")
        .text("Claim Per Month (years)");
/*Transform the X axis labels to a 45 Degree angle*/
    g.selectAll(".xaxis text")  // select all the text elements for the xaxis
        .attr("transform", function(d) {
            return "translate(" + this.getBBox().height*-2 + "," + this.getBBox().height + ")rotate(-30)";
        });

    g.selectAll(".bar")
        .data(data)
        .enter().append("rect")
        .attr("class", "bar")
        .attr("x", function (d) {
            return x(d.title);
        })
        .attr("y", function (d) {
            return y(d.value);
        })
        .attr("width", x.bandwidth())
        .attr("height", function (d) {
            return height - y(d.value);
        });


}
