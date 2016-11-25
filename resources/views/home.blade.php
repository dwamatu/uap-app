@extends('common.master')

@section('content')


    <div class="mainbar content">
        <style>

            .bar {
                fill: steelblue;
            }

            .bar:hover {
                fill: brown;
            }

            .axis--x path {
                display: none;
            }

        </style>
        <div class="col-md-6">

            <svg width="500" height="450"></svg>
        </div>


    </div>

    <script src="{{ URL::asset('/js/d3.min.js') }}"></script> <!-- jQuery -->



    <script type="text/javascript">
        var data = [
                {"title": "Aug 05", "value": 4},
            {"title": "Aug 12", "value": 3}, {
            "title": "Dec 00",
            "value": 1
        }, {"title": "Dec 05", "value": 1}, {"title": "Dec 06", "value": 1}, {
            "title": "Dec 08",
            "value": 2
        }, {"title": "Dec 09", "value": 1}, {"title": "Dec 11", "value": 2}, {
            "title": "Dec 12",
            "value": 1
        }, {"title": "Nov 05", "value": 2}, {"title": "Nov 09", "value": 3}, {
            "title": "Oct 05",
            "value": 1
        }, {"title": "Oct 16", "value": 1}, {"title": "Sep 05", "value": 1}]
        var svg = d3.select("svg"),
                margin = {top: 20, right: 20, bottom: 30, left: 40},
                width = +svg.attr("width") - margin.left - margin.right,
                height = +svg.attr("height") - margin.top - margin.bottom;

        var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
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
                .attr("class", "axis axis--x")
                .attr("transform", "translate(0," + height + ")")
                .call(d3.axisBottom(x));

        g.append("g")
                .attr("class", "axis axis--y")
                .call(d3.axisLeft(y).ticks(10, "%"))
                .append("text")
                .attr("transform", "rotate(-90)")
                .attr("y", 6)
                .attr("dy", "0.71em")
                .attr("text-anchor", "end")
                .text("Claims");

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


    </script>

@endsection
