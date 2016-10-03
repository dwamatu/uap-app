@extends('common.master')

@section('content')
    <div class="mainbar">

        <!-- Page heading -->
        <div class="page-head">
            <h2 class="pull-left"><i class="fa fa-home"></i> Status</h2>

            <!-- Breadcrumb -->
            <div class="bread-crumb pull-right">
                <a href="#"><i class="fa fa-home"></i> Status</a>

            </div>

            <div class="clearfix"></div>

        </div>
        <!-- Page heading ends -->



        <!-- Matter -->

        <div class="matter">
            <div class="container">

                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-head">
                                <div class="pull-left">Status</div>
                                <div class="widget-icons pull-right">
                                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget-content">
                                <div class="padd invoice">
                                    <div class="row taller-10">
                                        <div class="col-md-6">

                                        </div>
                                    </div>

                                    <hr>

                                    <div class="padd">
                                    <div class="row">
                                        <table id="example" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Status Name</th>
                                                <th>Status Description</th>
                                                <th>Deleted</th>
                                                <th>Creation Date</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Status Name</th>
                                                <th>Status Description</th>
                                                <th>Deleted</th>
                                                <th>Creation Date</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($statuses as $status)
                                                <tr>
                                                    <td>$status->id</td>
                                                    <td>$status->status_name</td>
                                                    <td>$status->staus_description</td>
                                                    <td>$status->deleted</td>
                                                    <td>$status->creation_date</td>
                                                </tr>


                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>




                                </div>
                                <div class="widget-foot">
                                    <!-- Footer goes here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- Matter ends -->

    </div>
@endsection
