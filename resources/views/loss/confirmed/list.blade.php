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
                    Confirmed
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
                    @can('can.view.confirmed')
                    <div class="row">

                        <div class="col-md-12">
                            <table id="confirmedClaims-grid" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    {{--<th>Farmer BAT Code</th>--}}
                                    <th>Farmer Name</th>
                                    <th>Zone</th>
                                    <th>Inspector</th>
                                    <th>Cause Of Loss</th>
                                    <th>Lat/Lng</th>
                                    <th>% Loss</th>
                                    <th>Inspection</th>
                                    <th>Inspection Date</th>
                                    <th>Action</th>


                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    {{--<th>Farmer BAT Code</th>--}}
                                    <th>Farmer Name</th>
                                    <th>Zone</th>
                                    <th>Inspector</th>
                                    <th>Cause Of Loss</th>
                                    <th>Lat/Lng</th>
                                    <th>% Loss</th>
                                    <th>Inspection</th>
                                    <th>Inspection Date</th>
                                    <th>Action</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    @endcan
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
<script src="{{ URL::asset('js/numberToWords.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>

<script src="{{ URL::asset('js/utilities.js') }}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var dataTable = $('#confirmedClaims-grid').DataTable({

            dom: "<'row table-controls'<'col-sm-4 col-md-3 page-length'l><'col-sm-4 col-md-5 search'f><'col-sm-4 col-md-2 col-md-offset-2 pull-right'B>><'row'<'col-md-12'rt>><'row space-up-10'<'col-md-6'i><'col-md-6'p>>",

            processing: true,
            serverSide: false,
            language: {"search": ""},
            ajax: '{!! route("fetch.confirmed.claims") !!}',
            "columns": [

//                {data: 'bat_acc_no'},
                {data: 'farmer_name'},
                {data: 'farmer_zone'},
                {data: 'crop_inspector_name'},
                {data: 'cause_of_loss'},
                {data: 'latitude'},
                {data: 'percentage_loss'},
                {data: 'inspection_number'},
                {data: 'inspection_date'},
                {data: 'loss_assessment_id'},

            ],
            order: [[6, "desc"]],
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Export as Excel',
                            title: 'Confirmed Claims',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: 'Export as PDF',
                            title: 'Confirmed Claims',
                            download: 'open',
                            orientation: 'landscape',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'csv',
                            text: 'Export as CSV',
                            title: 'Confirmed Claims',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7]
                            }
                        }
                    ]
                }]
            ,
            "columnDefs": [{
                render: function (data, type, row) {

                    return "<p>" + toTitleCase(row.farmer_name) + "</p>"

                },
                "targets": 0
            }, {
                render: function (data, type, row) {

                    return "<p>" + toTitleCase(row.farmer_zone) + "</p>"

                },
                "targets": 1
            }
            ,
                {
                render: function (data, type, row) {

                    return "<p>"+ Number(row.latitude).toFixed(4) + " / " + Number(row.longitude).toFixed(4)+ "</p>"

                },
                "targets": 4
            },
                {
                    render: function (data, type, row) {
                        data = numberToWords.toWordsOrdinal(parseInt(row.inspection_number));

                        return  toTitleCase(data);

                    },
                    "targets": 6
                },
                {
                    render: function (data, type, row) {
                        data = row.inspection_date;
                        return (moment(data).format('lll'));
                    },
                    "targets": 7
                },
                {
                render: function (data, type, row) {



                    return "<a  target='_blank' class='btn btn-uap btn-block' href='/download/loss/assessment/" + row.loss_assessment_id + "'>Download LAS</a>"

                },
                "targets": 8
            }
               ]
        });

        // Add placeholder to search box
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Search by name...');
    });
</script>
@endpush
