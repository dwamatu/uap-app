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
                {data: 'percentage_loss'},
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
                    return "<a  target='_blank' class='btn btn-primary btn-block' href='/download/loss/assessment/" + row.loss_assessment_id + "'>Download LAS</a>";
                },
                "targets": 8
            }]
        });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');
    });
</script>
@endpush
