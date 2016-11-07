@extends('common.master')

@push('styles')
<link href="{{ URL::asset('css/datatables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/custom-datatables.css') }}" rel="stylesheet">
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

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="farmers-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                {{--<th>Action</th>--}}
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
                                {{--<th>Action</th>--}}
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
<script>
    $(document).ready(function () {
        var dataTable = $('#farmers-table').DataTable({
            dom: "<'row table-controls'<'col-sm-4 col-md-2 page-length'l><'col-sm-4 col-md-8 search'f><'col-sm-4 col-md-2 text-right'B>><'row'<'col-md-12'rt>><'row space-up-10'<'col-md-6'i><'col-md-6'p>>",
            processing: true,
            serverSide: false,
            language: {"search": ""},
            ajax: '{!! route("fetch_loss_calculation") !!}',
            "columns": [
                {data: 'bat_acc_no'},
                {data: 'farmer_name'},
                {data: 'crop_inspector_name'},
                {data: 'cause_of_loss'},
                {data: 'latitude'},
                {data: 'longitude'},
                {data: 'inspection_date'},
                {data: 'percentage_loss'}
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
                            title: 'Employees'
                        },
                        {
                            extend: 'pdf',
                            text: 'Export as PDF',
                            title: 'Employees',
                            download: 'open',
                            orientation: 'landscape'
                        },
                        {
                            extend: 'csv',
                            text: 'Export as CSV',
                            title: 'Employees'
                        }
                    ]
                }],
            "columnDefs": [{
                render: function (data, type, row) {
                    return "<a class='btn btn-link link btn-xs' href='/download/loss/assessment/" + row.loss_assessment_id + "'>" + row.bat_acc_no + "</a>";
                },
                "targets": 0
            },
                {
                    render: function (data, type, row) {
                        var crop_inspector = row.crop_inspector_name;
                        var output = null !== crop_inspector && 'undefined' !== crop_inspector && $.trim(crop_inspector) ? crop_inspector : "<span class='text-missing'>Crop Inspector. not Set</span>";

                        return output;
                    },
                    "targets": 2
                },
                {
                    render: function (data, type, row) {
                        var typeOfLoss = row.cause_of_loss;
                        var output = null !== typeOfLoss && 'undefined' !== typeOfLoss && $.trim(typeOfLoss) ? typeOfLoss : "<span class='text-missing'>Cause of Loss                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          . not set</span>";

                        return output;
                    },
                    "targets": 3
                },
                {
                    render: function (data, type, row) {
                        var latitude = row.latitude;
                        var output = null !== latitude && 'undefined' !== latitude && $.trim(latitude) ? latitude : "<span class='text-missing'>Latitude. not Set</span>";

                        return output;
                    },
                    "targets": 4
                },

                {
                    render: function (data, type, row) {
                        var longitude = row.longitude;
                        var output = null !== longitude && 'undefined' !== longitude && $.trim(longitude) ? longitude : "<span class='text-missing'>Longitude. not Set</span>";

                        return output;
                    },
                    "targets": 5
                },
                {
                    render: function (data, type, row) {
                        var percentageLoss = row.percentage_loss;
                        var output = null !== percentageLoss && 'undefined' !== percentageLoss && $.trim(percentageLoss) ? percentageLoss : "<span class='text-missing'>Percentage Loss. not Set</span>";

                        return output;
                    },
                    "targets": 6
                },
                {
                    render: function (data, type, row) {
                        var inspectionDate = row.inspection_date;
                        var output = null !== inspectionDate && 'undefined' !== inspectionDate && $.trim(inspectionDate) ? inspectionDate : "<span class='text-missing'>Inspection Date. not Set</span>";

                        return output;
                    },
                    "targets": 7
                }]
        });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');
    });
</script>
@endpush
