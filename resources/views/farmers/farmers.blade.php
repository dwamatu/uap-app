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
                                <th class="first">Farmer BAT Account No.</th>
                                <th> Farmer Name</th>
                                <th>Farmer Zone</th>
                                <th>ALM Manger</th>
                                <th class="last"> Expected KG</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>

                                <th class="first">Farmer BAT Account No.</th>
                                <th> Farmer Name</th>
                                <th>Farmer Zone</th>
                                <th>ALM Manger</th>
                                <th class="last"> Expected KG</th>
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
            ajax: '{!! route("fetch_farmers") !!}',
            "columns": [
                {data: 'bataccountNumber'},
                {data: 'farmerName'},
                {data: 'farmerZone'},
                {data: 'almmanager'},
                {data: 'expectedKg'}
            ],
//            order: [[1, "asc"]],
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
                    var accountNumber = row.bataccountNumber;
                    var output = null !== accountNumber && 'undefined' !== accountNumber && $.trim(accountNumber) ? accountNumber : "<span class='text-missing'>Account  No. not Set</span>";

                    return output;
                },
                "targets": 0
            },
                {
                    render: function (data, type, row) {
                        var farmerName = row.farmerName;
                        var output = null !== farmerName && 'undefined' !== farmerName && $.trim(farmerName) ? farmerName : "<span class='text-missing'>Farmer Name. not Set</span>";

                        return output;
                    },
                    "targets": 1
                },
                {
                    render: function (data, type, row) {
                        var farmerZone = row.farmerZone;
                        var output = null !== farmerZone && 'undefined' !== farmerZone && $.trim(farmerZone) ? farmerZone : "<span class='text-missing'>Farmer Zone. not set</span>";

                        return output;
                    },
                    "targets": 2
                },
                {
                    render: function (data, type, row) {
                        var almManager = row.almmanager;
                        var output = null !== almManager && 'undefined' !== almManager && $.trim(almManager) ? almManager : "<span class='text-missing'>Alm Manager. not Set</span>";

                        return output;
                    },
                    "targets": 3
                },
                {
                    render: function (data, type, row) {
                        var expectedKg = row.expectedKg;
                        var output = null !== expectedKg && 'undefined' !== expectedKg && $.trim(expectedKg) ? expectedKg : "<span class='text-missing'>Expected Kg. not Set</span>";

                        return output;
                    },
                    "targets": 4
                }]
                });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');
    });
</script>
@endpush
