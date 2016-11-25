@extends('common.master')

@push('styles')
<link href="{{ URL::asset('css/datatables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/custom-datatables.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/slider.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>


@endpush

@section('content')

    <div class="mainbar content">
        <div class="page-head">
            <h2 class="pull-left">Farmers</h2>

            <div class="bread-crumb pull-right">
                <a href="{{ URL::route('dashboard') }}"><i class="fa fa-home"></i> Home</a>
                <span class="divider">/</span>
                <a href="{{ URL::route('farmers') }}">Farmers</a>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="matter">
            <div class="container">
                <div class="row tools-table">
                    <header class="panel¡-heading center">

                        <form action="#" method="" accept-charset="utf-8" class="form-inline" role="form"
                              enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <div id="reportrange" class="pull-right"
                                     style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                                    <span></span> <b class="caret"></b>
                                </div>
                                <input type="hidden" name="date_start" id="date_start">
                                <input type="hidden" name="date_end" id="date_end">
                            </div>
                            <div class="form-group">
                                <select name="ext_area" class="form-control" id="ext_area">

                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="season" id="season">

                                </select>
                            </div>
                            <div class="form-group">
                                <select name="cause_of_loss" class="form-control" id="cause_of_loss">

                                </select>

                            </div>

                            <div class="form-group">
                                <select class="form-control" name="crop_inspector" id="crop_inspector">

                                </select>
                            </div>
                            <div class="form-group">
                                <b>% 0</b> <input id="range" name="range" type="text" class="span2" value=""
                                                  data-slider-min="0" data-slider-max="100" data-slider-step="5"
                                                  data-slider-value="[0,100]" style="background-color: green;"/>
                                <b>%100</b>
                            </div>
                            <button type="button" id="searchreport" class="btn btn-warning btn-sm"><i
                                        class="fa fa-search"></i>&nbsp;&nbsp;Search
                            </button>
                        </form>
                    </header>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="reports-table" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Farmer BAT Code</th>
                                <th>Farmer Name</th>
                                <th>Crop Inspector</th>
                                <th>Cause Of Loss</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Percentage Loss</th>
                                <th>Inspection Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Farmer BAT Code</th>
                                <th>Farmer Name</th>
                                <th>Crop Inspector</th>
                                <th>Cause Of Loss</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Percentage Loss</th>
                                <th>Inspection Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

@endsection

@push('scripts')
<script src="{{ URL::asset('js/datatables.min.js') }}"></script>
<script src="{{ URL::asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('js/utilities.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>
<script src="{{ URL::asset('js/bootstrap-slider.js') }}"></script>
<script src="{{ URL::asset('js/reportFieldSelectInputs.js') }}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

<script>
    var token = '{{Session::token()}}';
    var postReportDataURL = '{{route('report.data')}}';

</script>

<script>
    var dataSet = [];
    console.log(dataSet);
    /*Post Data To The API and MAP RESPONSE ON TABLE*/
    $("#searchreport").on("click", function (event) {
        event.preventDefault();
        $.ajax({
            method: 'POST',
            url: postReportDataURL,
            dataType: 'json',
            data: {
                date_start: $("#date_start").val(),
                date_end: $("#date_end").val(),
                ext_area: $("#ext_area").val(),
                crop_inspector: $("#crop_inspector").val(),
                season: $("#season").val(),
                cause_of_loss: $("#cause_of_loss").val(),
                range: $("#range").val(),
                _token: token
            },
            success: function (data) {

                dataSet = data;
                console.log(dataSet);
                var dataTable = $('#reports-table').DataTable({
                    dom: "<'row table-controls'<'col-sm-4 col-md-2 page-length'l><'col-sm-4 col-md-8 search'f><'col-sm-4 col-md-2 text-right'B>><'row'<'col-md-12'rt>><'row space-up-10'<'col-md-6'i><'col-md-6'p>>",
                    destroy: true,
                    processing: true,
                    serverSide: false,
                    data: dataSet,
                    "columns": [

                        {data: 'bat_acc_no'},
                        {data: 'farmer_name'},
                        {data: 'crop_inspector_name'},
                        {data: 'cause_of_loss'},
                        {data: 'latitude'},
                        {data: 'longitude'},
                        {data: 'percentage_loss'},
                        {data: 'inspection_date'},
                        {data: 'loss_assessment_id'}
                    ],
                    order: [[1, "asc"]],
                    buttons: [
                        {
                            extend: 'collection',
                            text: 'Export',
                            buttons: [
                                {
                                    extend: 'excel',
                                    text: 'Export as Excel',
                                    title: 'Loss Assessment Reports',
                                    exportOptions: {
                                        columns: [0,1,2,3,4,5,6,7]
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: 'Export as PDF',
                                    title: 'Loss Assessment Reports',
                                    download: 'open',
                                    orientation: 'landscape',
                                    exportOptions: {
                                        columns: [0,1,2,3,4,5,6,7]
                                    }
                                },
                                {
                                    extend: 'csv',
                                    text: 'Export as CSV',
                                    title: 'Loss Assessment Reports',
                                    exportOptions: {
                                        columns: [0,1,2,3,4,5,6,7]
                                    }
                                }
                            ]
                        }],
                    "columnDefs": [{
                        render: function (data, type, row) {
                            return "<a  target='_blank' class='btn btn-primary btn-block' href='/download/loss/assessment/" + row.loss_assessment_id + "'>Download LAS</a>";
                        },
                        "targets": 8
                    }, {
                        render: function (data, type, row) {
                            data = row.inspection_date
                            return (moment(data).format('LL'));
                        },
                        "targets": 7
                    }]
                });


                // Add placeholder to search box
                $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');


            }
        });


    });


    /*Date Range Picker*/
    $(function () {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('#date_start').val(start.format('YYYY-MM-DD'));
            $('#date_end').val(end.format('YYYY-MM-DD'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });

    /* RANGE SLIDER */
    var mySlider = $("#range").slider();

    var ex2 = $("#range");


</script>
@endpush
