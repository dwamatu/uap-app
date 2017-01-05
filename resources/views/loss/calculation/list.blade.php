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
<script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>

<script src="{{ URL::asset('js/utilities.js') }}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var dataTable = $('#farmers-table').DataTable({
            dom: "<'row table-controls'<'col-sm-4 col-md-3 page-length'l><'col-sm-4 col-md-5 search'f><'col-sm-4 col-md-2 col-md-offset-2 pull-right'B>><'row'<'col-md-12'rt>><'row space-up-10'<'col-md-6'i><'col-md-6'p>>",
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
            "columnDefs": [{
                render: function (data, type, row) {
                    if(row.confirmed === true) {
                        return "<a  target='_blank' class='btn btn-success btn-block' href='/download/loss/assessment/" + row.loss_assessment_id + "'>Download LAS</a>";
                    }
                    else {
                        return "<a  class='btn btn-info btn-block' href='/confirm/loss/assessment/" + row.uuid + "'>Confirm LAS</a>";

                    }
                },
                "targets": 8
            },{
            render: function (data,type,row) {
                data = row.inspection_date
                return (moment(data).format('LL'));
            },
            "targets": 7
        }]
        });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');
    });
</script>
@endpush
