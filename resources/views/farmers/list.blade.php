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
                {data: 'bat_acc_no'},
                {data: 'farmer_name'},
                {data: 'farmer_zone'},
                {data: 'alm_manager'},
                {data: 'expected_kg'}
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
                }]


                });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');
    });
</script>
@endpush
