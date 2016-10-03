var yearlyGraphData = [],
    yearlyGraphDataTicks = [],
    dailyHistoricalGraphData = [],
    dailyByYearGraphData = [],
    dailyBySourceGraphData = [],
    isDailyComparedByYear = false,
    isDailyComparedBySource = false,
    isDailyComparedByYearAndSource = false,
    selectedComparisonYear,
    selectedComparisonSource;

function getYearlySingleGraphOptions() {
    var options = {
        series: {
            bars: {
                show: true
            }
        },
        bars: {
            align: "center",
            barWidth: 0.5
        },
        yaxis: {
            tickFormatter: function(v, axis) {
                return v + " mm";
            },
            axisLabel: "Total Yearly Average Rainfall",
            axisLabelUseCanvas: false,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto',
            axisLabelPadding: 3
        },
        xaxis: {
            axisLabel: "Year",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto',
            axisLabelPadding: 3,
            ticks: yearlyGraphDataTicks
        },
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#000000",
            labelFormatter: legendFormatter,
            container: $('#yearly-legend-container'),
            margin: 5,
            position: "nw"
        },
        grid: {
            hoverable: true,
            borderWidth: 1,
            borderColor: "#111111",
            backgroundColor: {
                colors: ["#ffffff", "#EDF5FF"]
            }
        }
    };

    return options;
}

function getDailySingleGraphOptions() {
    var options = {
        series: {
            lines: {
                show: true
            },
            points: {
                show: false
            }
        },
        xaxis: {
            mode: "time",
            tickSize: [1, "month"],
            tickLength: 0,
            axisLabel: "Month of Year",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20
        },
        yaxis: {
            axisLabel: "Historical Daily Average Rainfall",
            axisLabelUseCanvas: false,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20,
            tickFormatter: function(v, axis) {
                return v + " mm";
            }
        },
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#000000",
            labelFormatter: legendFormatter,
            container: $('#daily-legend-container'),
            margin: 5,
            position: "ne"
        },
        grid: {
            hoverable: true,
            borderWidth: 1,
            borderColor: "#111111",
            backgroundColor: {
                colors: ["#ffffff", "#EDF5FF"]
            }
        }
    };

    return options;
}

function getDailyYearComparisonGraphOptions() {
    var options = {
        series: {
            lines: {
                show: true
            },
            points: {
                show: false
            }
        },
        xaxis: {
            mode: "time",
            tickSize: [1, "month"],
            tickLength: 0,
            axisLabel: "Month of Year",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20
        },
        yaxes: [{
            axisLabel: "Historical Daily Average Rainfall",
            axisLabelUseCanvas: false,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20,
            tickFormatter: function(v, axis) {
                return v + " mm";
            }
        }, {
            position: "right",
            axisLabel: selectedComparisonYear + " Daily Average Rainfall",
            axisLabelUseCanvas: false,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20
        }],
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#000000",
            labelFormatter: legendFormatter,
            container: $('#daily-legend-container'),
            margin: 5,
            position: "ne"
        },
        grid: {
            hoverable: true,
            borderWidth: 1,
            borderColor: "#111111",
            backgroundColor: {
                colors: ["#ffffff", "#EDF5FF"]
            }
        }
    };

    return options;
}

function getDailySourceComparisonGraphOptions() {
    var options = {
        series: {
            lines: {
                show: true
            },
            points: {
                show: false
            }
        },
        xaxis: {
            mode: "time",
            tickSize: [1, "month"],
            tickLength: 0,
            axisLabel: "Month of Year",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20
        },
        yaxes: [{
            axisLabel: "Historical Daily Average Rainfall",
            axisLabelUseCanvas: false,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20,
            tickFormatter: function(v, axis) {
                return v + " mm";
            }
        }, {
            position: "right",
            axisLabel: selectedComparisonSource + " Historical Daily Average Rainfall",
            axisLabelUseCanvas: false,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20
        }],
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#000000",
            labelFormatter: legendFormatter,
            container: $('#daily-legend-container'),
            margin: 5,
            position: "ne"
        },
        grid: {
            hoverable: true,
            borderWidth: 1,
            borderColor: "#111111",
            backgroundColor: {
                colors: ["#ffffff", "#EDF5FF"]
            }
        }
    };

    return options;
}

function getDailyYearAndSourceComparisonGraphOptions() {
    var options = {
        series: {
            lines: {
                show: true
            },
            points: {
                show: false
            }
        },
        xaxis: {
            mode: "time",
            tickSize: [1, "month"],
            tickLength: 0,
            axisLabel: "Month of Year",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20
        },
        yaxis: {
            axisLabel: "Historical Daily Average Rainfall",
            axisLabelUseCanvas: false,
            axisLabelFontSizePixels: 10,
            axisLabelFontFamily: 'Roboto, sans-serif',
            axisLabelPadding: 20,
            tickFormatter: function(v, axis) {
                return v + " mm";
            }
        },
        legend: {
            noColumns: 0,
            labelBoxBorderColor: "#000000",
            labelFormatter: legendFormatter,
            container: $('#daily-legend-container'),
            margin: 5,
            position: "ne"
        },
        grid: {
            hoverable: true,
            borderWidth: 1,
            borderColor: "#111111",
            backgroundColor: {
                colors: ["#ffffff", "#EDF5FF"]
            }
        }
    };

    return options;
}

function plotHistoricalYearlyGraph(yearlyRainfallData) {
    var key;

    for (key in yearlyRainfallData) {
        yearlyGraphData.push([parseInt(key), parseFloat(yearlyRainfallData[key])]);
        yearlyGraphDataTicks.push([parseInt(key), String(key)]);
    }

    drawYearlySingleGraph(yearlyGraphData);
}

function populateDataComparisonYears() {
    var now = new Date(),
        i, year;

    for (i = -40; i < 1; i++) {
        year = now.getFullYear() + i;
        $('#comparison-year').append($('<option/>').val(year).text(year));
    }
}

function populateDataComparisonsDataSources() {
    var link = "http://api.pricing.netcengroup.com/index.php/admin/companies?where=company_type&equals=weather%20source&all=true?callback=parseResponse";

    $.ajax({
        type: "GET",
        url: link,
        dataType: "jsonp",
        success: function(data) {
            var options = '';
            var d = data.results;

            for (var i = 0; i < d.length; i++) {
                options += '<option value="' + d[i].company_id + '">' + d[i].company_name + '</option>';
            }

            $('#comparison-data-source').append(options);
        }
    });
}

function resetComparisonYearSelector() {
    $('#comparison-year').val("0");
}

function resetComparisonSourceSelector() {
    $('#comparison-data-source').val("0");
}

function legendFormatter(label, series) {
    return '<div class="space-right-10">' + label + '</div>';
}

function plotHistoricalDailyGraph(dailyRainfallData) {
    var key;

    for (key in dailyRainfallData) {
        if (dailyRainfallData.hasOwnProperty(key)) {
            dailyHistoricalGraphData.push([parseInt(key), parseFloat(dailyRainfallData[key])]);
        }
    }

    drawDailyHistoricalGraph(dailyHistoricalGraphData);
}

function handleDataComparisonYearChangePricing(weather_point_id) {
    var selectedYear;

    $('#comparison-year').on('change', function(e) {
        selectedYear = parseInt($('#comparison-year').val());

        if (selectedYear !== null && typeof selectedYear !== 'undefined' && selectedYear !== 0) {
            $('#loading-modal .selected-comparison-parameter').html(selectedYear);
            $('#loading-modal').modal('show');
            $('#selected-comparison-parameter').html(selectedYear);

            // Refresh graph
            $.ajax({
                type: "GET",
                url: "/pricing/quotation/contract/graph/year/" + weather_point_id + '/' + selectedYear,
                success: function(response) {
                    var d = $.parseJSON(response).data;

                    var result = [];

                    for (var i in d) {
                        result.push([parseInt(i), d[i]]);
                    }

                    if (result.length === 0) {
                        showMissingComparisonDataError('year');
                        hideCompareByYearToggle();
                        resetComparisonYearSelector();
                        $('.selected-comparison-year').html("None Selected");

                        if (isDailyComparedByYear === true) {
                            hideYearComparisonGraph();
                        }
                    } else {
                        $('.selected-comparison-year').html(selectedYear);
                        compareByYearToggleOn();

                        $('#loading-modal').delay(5000).modal('hide');

                        // Set values for current graph state
                        dailyByYearGraphData = result;
                        isDailyComparedByYear = true;
                        selectedComparisonYear = selectedYear;

                        if (isDailyComparedBySource === true) {
                            drawDailyYearAndSourceComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData, dailyBySourceGraphData);
                        } else if (isDailyComparedBySource === false) {
                            drawDailyYearComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData);
                        }
                    }
                }
            });
        } else {
            hideCompareByYearToggle();
            $('.selected-comparison-year').html("None Selected");

            if (isDailyComparedByYear === true) {
                hideYearComparisonGraph();
            }
        }
    });
}

function handleDataComparisonYearChange(weather_report_entry_id) {
    var selectedYear;

    $('#comparison-year').on('change', function(e) {
        selectedYear = parseInt($('#comparison-year').val());

        if (selectedYear !== null && typeof selectedYear !== 'undefined' && selectedYear !== 0) {
            $('#loading-modal .selected-comparison-parameter').html(selectedYear);
            $('#loading-modal').modal('show');
            $('#selected-comparison-parameter').html(selectedYear);

            // Refresh graph
            $.ajax({
                type: "GET",
                url: "/data/report/entry/graph/" + weather_report_entry_id + '/' + selectedYear,
                success: function(data) {
                    var d = $.parseJSON(data);

                    var result = [];

                    for (var i in d) {
                        result.push([parseInt(i), d[i]]);
                    }

                    if (result.length === 0) {
                        showMissingComparisonDataError('year');
                        hideCompareByYearToggle();
                        resetComparisonYearSelector();
                        $('.selected-comparison-year').html("None Selected");

                        if (isDailyComparedByYear === true) {
                            hideYearComparisonGraph();
                        }
                    } else {
                        $('.selected-comparison-year').html(selectedYear);
                        compareByYearToggleOn();

                        $('#loading-modal').delay(5000).modal('hide');

                        // Set values for current graph state
                        dailyByYearGraphData = result;
                        isDailyComparedByYear = true;
                        selectedComparisonYear = selectedYear;

                        if (isDailyComparedBySource === true) {
                            drawDailyYearAndSourceComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData, dailyBySourceGraphData);
                        } else if (isDailyComparedBySource === false) {
                            drawDailyYearComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData);
                        }
                    }
                }
            });
        } else {
            hideCompareByYearToggle();
            $('.selected-comparison-year').html("None Selected");

            if (isDailyComparedByYear === true) {
                hideYearComparisonGraph();
            }
        }
    });
}

function handleDataComparisonSourceChangePricing(weather_point_id) {
    var selectedSource, selectedSourceId;

    $('#comparison-data-source').on('change', function(e) {
        selectedSource = $('#comparison-data-source :selected').text();
        selectedSourceId = parseInt($('#comparison-data-source').val());

        if (selectedSource !== null && typeof selectedSource !== 'undefined' && selectedSourceId !== 0) {
            $('#loading-modal .selected-comparison-parameter').html(selectedSource);
            $('#loading-modal').modal('show');

            // Refresh graph
            $.ajax({
                type: "GET",
                url: "/pricing/quotation/contract/graph/year/" + weather_point_id + '/1985',
                success: function(response) {
                    var d = $.parseJSON(response).data;

                    var result = [];

                    for (var i in d) {
                        result.push([parseInt(i), d[i]]);
                    }

                    if (result.length === 0) {
                        showMissingComparisonDataError('dataSource');
                        hideCompareBySourceToggle();
                        resetComparisonSourceSelector();
                        $('.selected-data-source-caption').html("None Selected");

                        if (isDailyComparedBySource === true) {
                            hideDataSourceComparisonGraph();
                        }
                    } else {
                        $('.selected-data-source-caption').html(selectedSource);
                        $('.selected-data-source-label').html(selectedSource);
                        compareByDataSourceToggleOn();

                        $('#loading-modal').delay(5000).modal('hide');

                        // Set values for current graph state
                        dailyBySourceGraphData = result;
                        selectedComparisonSource = selectedSource;

                        if (isDailyComparedByYear === true) {
                            drawDailyYearAndSourceComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData, dailyBySourceGraphData);
                        } else if (isDailyComparedByYear === false) {
                            drawDailySourceComparisonGraph(dailyHistoricalGraphData, dailyBySourceGraphData);
                        }
                    }
                }
            });
        } else {
            hideCompareBySourceToggle();

            $('.selected-data-source-caption').html("None Selected");

            if (isDailyComparedBySource === true) {
                hideDataSourceComparisonGraph();
            }
        }
    });
}

function handleDataComparisonSourceChange(weather_report_entry_id) {
    var selectedSource, selectedSourceId;

    $('#comparison-data-source').on('change', function(e) {
        selectedSource = $('#comparison-data-source :selected').text();
        selectedSourceId = parseInt($('#comparison-data-source').val());

        if (selectedSource !== null && typeof selectedSource !== 'undefined' && selectedSourceId !== 0) {
            console.log("1: " + selectedSourceId);
            $('#loading-modal .selected-comparison-parameter').html(selectedSource);
            $('#loading-modal').modal('show');

            // Refresh graph
            $.ajax({
                type: "GET",
                url: "/data/report/entry/graph/" + weather_report_entry_id + '/1985',
                success: function(data) {
                    var d = $.parseJSON(data);

                    var result = [];

                    for (var i in d) {
                        result.push([parseInt(i), d[i]]);
                    }

                    if (result.length === 0) {
                        showMissingComparisonDataError('dataSource');
                        hideCompareBySourceToggle();
                        resetComparisonSourceSelector();
                        $('.selected-data-source-caption').html("None Selected");

                        if (isDailyComparedBySource === true) {
                            hideDataSourceComparisonGraph();
                        }
                    } else {
                        $('.selected-data-source-caption').html(selectedSource);
                        $('.selected-data-source-label').html(selectedSource);
                        compareByDataSourceToggleOn();

                        $('#loading-modal').delay(5000).modal('hide');

                        // Set values for current graph state
                        dailyBySourceGraphData = result;
                        selectedComparisonSource = selectedSource;

                        if (isDailyComparedByYear === true) {
                            drawDailyYearAndSourceComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData, dailyBySourceGraphData);
                        } else if (isDailyComparedByYear === false) {
                            drawDailySourceComparisonGraph(dailyHistoricalGraphData, dailyBySourceGraphData);
                        }
                    }
                }
            });
        } else {
            hideCompareBySourceToggle();

            $('.selected-data-source-caption').html("None Selected");

            if (isDailyComparedBySource === true) {
                hideDataSourceComparisonGraph();
            }
        }
    });
}

function hideCompareByYearToggle() {
    if (!$('#toggle-year-comparison-graph').hasClass('hide')) {
        $('#toggle-year-comparison-graph').addClass('hide');
    }
}

function hideCompareBySourceToggle() {
    if (!$('#toggle-data-source-comparison-graph').hasClass('hide')) {
        $('#toggle-data-source-comparison-graph').addClass('hide');
    }
}

function compareByYearToggleOn() {
    if ($('#toggle-year-comparison-graph').hasClass('hide')) {
        $('#toggle-year-comparison-graph').removeClass('hide');
    }

    if ($('#toggle-year-comparison-display').prop('checked') !== true) {
        $('#toggle-year-comparison-display').bootstrapToggle('on');
    }

    if ($('#toggle-year-comparison-graph .form-control-label').hasClass('inactive')) {
        $('#toggle-year-comparison-graph .form-control-label').removeClass('inactive');
    }

    $('#toggle-year-comparison-graph .form-control-label').addClass('active');
}

function compareByYearToggleOff() {
    if ($('#toggle-year-comparison-display').prop('checked') === true) {
        $('#toggle-year-comparison-display').bootstrapToggle('off');
    }
}

function compareByDataSourceToggleOn() {
    if ($('#toggle-data-source-comparison-graph').hasClass('hide')) {
        $('#toggle-data-source-comparison-graph').removeClass('hide');
    }

    if ($('#toggle-data-source-comparison-display').prop('checked') !== true) {
        $('#toggle-data-source-comparison-display').bootstrapToggle('on');
    }

    if ($('#toggle-data-source-comparison-graph .form-control-label').hasClass('inactive')) {
        $('#toggle-data-source-comparison-graph .form-control-label').removeClass('inactive');
    }

    $('#toggle-data-source-comparison-graph .form-control-label').addClass('active');
}

function compareByDataSourceToggleOff() {
    if ($('#toggle-data-source-comparison-display').prop('checked') === true) {
        $('#toggle-data-source-comparison-display').bootstrapToggle('off');
    }
}

function showMissingComparisonDataError(comparisonType) {
    $('#loading-modal').delay(5000).modal('hide');

    if (comparisonType === 'year') {
        $('#comparison-data-error .message').html("<p>There is no data recorded for this location in " + selectedComparisonYear + ".</p>");
    } else if (comparisonType === 'dataSource') {
        $('#comparison-data-error .message').html("<p>There is no data recorded for this location from the " + selectedComparisonSource + " weather source.</p>");
    }

    $('#comparison-data-error').modal('show');
}

function handleTabChange() {
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        if (e.target.href.indexOf("bar") >= 0) {
            drawYearlySingleGraph(yearlyGraphData);
        } else if (e.target.href.indexOf("curve") >= 0) {
            if (isDailyComparedByYear === true && isDailyComparedBySource === false) {
                drawDailyYearComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData);
            } else if (isDailyComparedByYear === false && isDailyComparedBySource === true) {
                drawDailySourceComparisonGraph(dailyHistoricalGraphData, dailyBySourceGraphData);
            } else if (isDailyComparedByYearAndSource === true) {
                drawDailyYearAndSourceComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData, dailyBySourceGraphData);
            } else if (isDailyComparedByYear === false && isDailyComparedBySource === false && isDailyComparedByYearAndSource === false) {
                drawDailyHistoricalGraph(dailyHistoricalGraphData);
            }
        }
    });
}

function drawYearlySingleGraph(data) {
    var dataset = [{
        label: "Historical Yearly Total Average Rainfall",
        data: data,
        color: "#ff6c24"
    }];

    $.plot($("#bar-chart"), dataset, getYearlySingleGraphOptions());
    $("#bar-chart").UseTooltip();
}

function drawDailyHistoricalGraph(historicalDailyData) {
    var dataset = [{
        label: "Historical Daily Average Rainfall",
        data: historicalDailyData,
        color: "#ff6c24"
    }];

    isDailyComparedByYear = false;
    isDailyComparedBySource = false;
    isDailyComparedByYearAndSource = false;

    $.plot($("#curve-chart"), dataset, getDailySingleGraphOptions());
}

function drawDailyYearComparisonGraph(historicalDailyData, yearComparisonData) {
    var dataset = [{
        label: "Historical Daily Average Rainfall",
        data: historicalDailyData,
        color: "#ff6c24"
    }, {
        label: selectedComparisonYear + " Historical Daily Average Rainfall",
        data: yearComparisonData,
        color: "#5CB85C"
    }];

    isDailyComparedByYear = true;

    $.plot($("#curve-chart"), dataset, getDailyYearComparisonGraphOptions());
}

function drawDailySourceComparisonGraph(historicalDailyData, sourceComparisonData) {
    var dataset = [{
        label: "Historical Daily Average Rainfall",
        data: historicalDailyData,
        color: "#ff6c24"
    }, {
        label: selectedComparisonSource + " Historical Daily Average Rainfall",
        data: sourceComparisonData,
        color: "#428BCA"
    }];

    isDailyComparedBySource = true;

    $.plot($("#curve-chart"), dataset, getDailySourceComparisonGraphOptions());
}

function drawDailyYearAndSourceComparisonGraph(historicalDailyData, yearComparisonData, sourceComparisonData) {
    var dataset = [{
        label: "Historical Daily Average Rainfall",
        data: historicalDailyData,
        color: "#ff6c24"
    }, {
        label: selectedComparisonYear + " Historical Daily Average Rainfall",
        data: yearComparisonData,
        color: "#5CB85C"
    }, {
        label: selectedComparisonSource + " Historical Daily Average Rainfall",
        data: sourceComparisonData,
        color: "#428BCA"
    }];

    isDailyComparedByYear = true;
    isDailyComparedBySource = true;
    isDailyComparedByYearAndSource = true;

    $.plot($("#curve-chart"), dataset, getDailyYearAndSourceComparisonGraphOptions());
}

var previousPoint = null,
    previousLabel = null;

$.fn.UseTooltip = function() {
    $(this).bind("plothover", function(event, pos, item) {
        if (item) {
            if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                previousPoint = item.dataIndex;
                previousLabel = item.series.label;
                $("#tooltip").remove();

                var x = item.datapoint[0];
                var y = item.datapoint[1];

                var color = item.series.color;
                var ticks = item.series.xaxis.ticks;

                showTooltip(item.pageX,
                    item.pageY,
                    color,
                    "<strong>" + item.series.label + "</strong><br>" + item.series.xaxis.ticks[item.dataIndex].label + " : <strong>" + y + "</strong> mm");
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
};

function showTooltip(x, y, color, contents) {
    $('<div id="tooltip">' + contents + '</div>').css({
        position: 'absolute',
        top: '7%',
        left: '30%',
        border: '2px solid ' + color,
        padding: '3px',
        'font-size': '9px',
        'border-radius': '5px',
        'background-color': '#fff',
        'font-family': 'Roboto, sans-serif',
        opacity: 0.9
    }).appendTo("#bar-chart").fadeIn(200);
}

function hideYearComparisonGraph() {
    isDailyComparedByYear = false;
    isDailyComparedByYearAndSource = false;

    if (isDailyComparedBySource === true) {
        drawDailySourceComparisonGraph(dailyHistoricalGraphData, dailyBySourceGraphData);
    } else {
        drawDailyHistoricalGraph(dailyHistoricalGraphData);
    }
}

function hideDataSourceComparisonGraph() {
    isDailyComparedBySource = false;
    isDailyComparedByYearAndSource = false;

    if (isDailyComparedByYear === true) {
        drawDailyYearComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData);
    } else if (isDailyComparedBySource === false) {
        drawDailyHistoricalGraph(dailyHistoricalGraphData);
    }
}

function activateGraphComparisonControls() {
    $('#toggle-year-comparison-display').change(function() {
        if ($(this).prop('checked') === true && (dailyByYearGraphData !== null && typeof dailyByYearGraphData !== 'undefined')) {
            if ($('#toggle-year-comparison-graph .form-control-label').hasClass('inactive')) {
                $('#toggle-year-comparison-graph .form-control-label').removeClass('inactive');
            }

            $('#toggle-year-comparison-graph .form-control-label').addClass('active');

            if (isDailyComparedBySource === true) {
                drawDailyYearAndSourceComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData, dailyBySourceGraphData);
            } else if (isDailyComparedBySource === false) {
                drawDailyYearComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData);
            }
        } else if ($(this).prop('checked') === false) {
            if ($('#toggle-year-comparison-graph .form-control-label').hasClass('active')) {
                $('#toggle-year-comparison-graph .form-control-label').removeClass('active');
            }

            $('#toggle-year-comparison-graph .form-control-label').addClass('inactive');

            hideYearComparisonGraph();
        }
    });

    $('#toggle-data-source-comparison-display').change(function() {
        if ($(this).prop('checked') === true && (dailyBySourceGraphData !== null && typeof dailyBySourceGraphData !== 'undefined')) {
            if ($('#toggle-data-source-comparison-graph .form-control-label').hasClass('inactive')) {
                $('#toggle-data-source-comparison-graph .form-control-label').removeClass('inactive');
            }

            $('#toggle-data-source-comparison-graph .form-control-label').addClass('active');

            if (isDailyComparedByYear === true) {
                drawDailyYearAndSourceComparisonGraph(dailyHistoricalGraphData, dailyByYearGraphData, dailyBySourceGraphData);
            } else if (isDailyComparedByYear === false) {
                drawDailySourceComparisonGraph(dailyHistoricalGraphData, dailyBySourceGraphData);
            }
        } else {
            if ($('#toggle-data-source-comparison-graph .form-control-label').hasClass('active')) {
                $('#toggle-data-source-comparison-graph .form-control-label').removeClass('active');
            }

            $('#toggle-data-source-comparison-graph .form-control-label').addClass('inactive');

            hideDataSourceComparisonGraph();
        }
    });
}