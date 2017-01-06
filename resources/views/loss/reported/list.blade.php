@extends('common.master')

@push('styles')
<link href="{{ URL::asset('css/datatables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/custom-datatables.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
@endpush

@section('content')

    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Reported
                    <small>Claims panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Claim</a></li>
                    <li class="active">Assessment</li>
                </ol>
            </section>
            <section class="content">
                <div>
                    <div class="row tools-table">

                    </div>

                    <div class="row">

                        <table id="reportedClaims-grid" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                {{--<th>Farmer BAT Code</th>--}}
                                <th>Farmer Name</th>
                                <th>Zone</th>
                                <th>Inspector</th>
                                <th>Cause Of Loss</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>% Loss</th>
                                <th>Inspection Date</th>
                                <th>Action</th>
                                <th>Status</th>

                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                {{--<th>Farmer BAT Code</th>--}}
                                <th>Farmer Name</th>
                                <th>Zone</th>
                                <th>Inspector</th>
                                <th>Cause Of Loss</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>% Loss</th>
                                <th>Inspection Date</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </section>


            <!-- /.content -->
        </div>


    </div>




    <div class="clearfix"></div>
@include('loss.reported.confirm')
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
        var dataTable = $('#reportedClaims-grid').DataTable({


            dom: "<'row table-controls'<'col-sm-4 col-md-3 page-length'l><'col-sm-4 col-md-5 search'f><'col-sm-4 col-md-2 col-md-offset-2 pull-right'B>><'row'<'col-md-12'rt>><'row space-up-10'<'col-md-6'i><'col-md-6'p>>",
            processing: true,
            serverSide: false,
            language: {"search": ""},
            ajax: '{!! route("fetch.reported.claims") !!}',
            "columns": [

//                {data: 'bat_acc_no'},
                {data: 'farmer_name'},
                {data: 'farmer_zone'},
                {data: 'crop_inspector_name'},
                {data: 'cause_of_loss'},
                {data: 'latitude'},
                {data: 'longitude'},
                {data: 'percentage_loss'},
                {data: 'inspection_date'},
                {data: 'loss_assessment_id'},
                {data: 'uuid'}
            ],
            order: [[7, "desc"]],
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Export as Excel',
                            title: 'Reported Claims',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: 'Export as PDF',
                            title: 'Reported Claims',
                            download: 'open',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'csv',
                            text: 'Export as CSV',
                            title: 'Reported Claims',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        }
                    ]
                }],
            "columnDefs": [
                {
                    render: function (data, type, row) {

                        return "<p>"+toTitleCase(row.farmer_name)+"</p>"

                    },
                    "targets": 0
                },
                {
                    render: function (data, type, row) {

                        return "<p>"+toTitleCase(row.farmer_zone)+"</p>"

                    },
                    "targets": 1
                },{
                render: function (data, type, row) {

                    return "<a  target='_blank' class='btn btn-success btn-sm'  href='/download/loss/assessment/" + row.loss_assessment_id + "'>Download LAS</a>"

                },
                "targets": 8
            }, {
                render: function (data, type, row) {
                    data = row.inspection_date;
                    return (moment(data).format('LL'));
                },
                "targets": 7
            },
                {
                    render: function (data, type, row) {
                        data = row.confirmed;
                        if (data != true) {
                            return "<a data-toggle='modal' type='button' class='btn btn-sm btn-info' id='confirmlossclaims' data-target='#confirmloss' href='#' data-uuid='"+row.uuid+"'>Confirm LAS</a>";

                        }
                        else {
                            return "<p class='btn btn-link btn-sm'> Confirmed </p>"
                        }
                    },
                    "targets": 9
                }]
        });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');
    });
</script>
<script src="{{ URL::asset('js/confirmloss.js') }}"></script>
@endpush
