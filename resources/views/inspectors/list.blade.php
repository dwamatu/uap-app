@extends('common.master')

@push('styles')
<link href="{{ URL::asset('css/datatables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/custom-datatables.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="mainbar content">
        <div class="page-head">
            <h2 class="pull-left">Inspectors</h2>

            <div class="bread-crumb pull-right">
                <a href="{{ URL::route('dashboard') }}"><i class="fa fa-home"></i> Home</a>
                <span class="divider">/</span>
                <a href="{{ URL::route('inspectors') }}">Inspectors</a>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="matter">
            <div class="container">
                <div class="row tools-table">
                    <div class="col-xs-6 col-md-6">

                                            <a id="add-company" class="btn btn-primary" href="{{ url('/inspector/create') }}">Add Inspector</a>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="crop-inspectors-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Inspector Name</th>
                                <th>Username</th>
                                <th>Email</th>

                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Inspector Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
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
<script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>

<script src="{{ URL::asset('js/utilities.js') }}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var dataTable = $('#crop-inspectors-table').DataTable({
            dom: "<'row table-controls'<'col-sm-4 col-md-3 page-length'l><'col-sm-4 col-md-6 text-center search'f><'col-sm-4 col-md-3 text-right'B>><'row'<'col-md-12'rt>><'row space-up-10'<'col-md-6'i><'col-md-6'p>>",
            processing: true,
            serverSide: false,
            language: {"search": ""},
            ajax: '{!! route("fetch.inspectors") !!}',
            "columns": [

                {data: 'first_name'},
                {data: 'username'},
                {data: 'email'},
                {data: 'role_id'},
                {data: 'username'}

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
                            title: 'Loss Assessment Details',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7]
                            }                        },
                        {
                            extend: 'pdf',
                            text: 'Export as PDF',
                            title: 'Loss Assessment Details',
                            download: 'open',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7]
                            }
                        },
                        {
                            extend: 'csv',
                            text: 'Export as CSV',
                            title: 'Loss Assessment Details',
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7]
                            }
                        }
                    ]
                }],
            "columnDefs": [
                    {
                render: function (data, type, row) {
                    return "<a git  class='btn btn-primary btn-block' href='/inspector/details/" + row.id + "'>Update Details</a>";
                },
                "targets": 4
            }]
        });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');
    });
</script>
@endpush
