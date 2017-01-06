@extends('common.master')

@push('styles')
<link href="{{ URL::asset('css/datatables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/custom-datatables.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Farmers
                    <small>List</small>
                </h1>
                <ol class="breadcrumb">
                    <li> <a href="{{ URL::route('dashboard') }}"><i class="fa fa-home"></i> Home</a>
                        <span class="divider">/</span>
                    <li class="active">Dashboard   <a href="{{ URL::route('farmers') }}">Farmers</a></li>

                </ol>
            </section>
            <section class="content">
                <div>
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
            </section>



            <!-- /.content -->
        </div>


    </div>



    <div class="clearfix"></div>

@endsection

@push('scripts')
<script src="{{ URL::asset('js/datatables.min.js') }}"></script>
<script src="{{ URL::asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>
<script src="{{ URL::asset('js/utilities.js') }}"></script>
<script>
    $(document).ready(function () {
        var dataTable = $('#farmers-table').DataTable({
            dom: "<'row table-controls'<'col-sm-4 col-md-3 page-length'l><'col-sm-4 col-md-5 search'f><'col-sm-4 col-md-2 col-md-offset-2 pull-right'B>><'row'<'col-md-12'rt>><'row space-up-10'<'col-md-6'i><'col-md-6'p>>",
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
                            title: 'Farmers',
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: 'Export as PDF',
                            title: 'Farmers',
                            download: 'open',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        },
                        {
                            extend: 'csv',
                            text: 'Export as CSV',
                            title: 'Farmers',
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        }
                    ]
                }]


                });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');
    });
</script>
@endpush
