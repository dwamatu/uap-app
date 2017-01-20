@extends('common.master')

@section('content')
    <div class="mainbar">

        <!-- Page heading -->
        <div class="page-head">
            <h2 class="pull-left"><i class="fa fa-home"></i> Loss Type</h2>

            <!-- Breadcrumb -->
            <div class="bread-crumb pull-right">
                <a href="#"><i class="fa fa-home"></i> Loss Type</a>

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
                            <div class="pull-left">Loss Type</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-content">
                            <div class="padd invoice">

                                <hr>

                                <div class="padd">
                                    <div class="row">
                                        <table id="example" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Loss Name</th>
                                                <th>Description</th>
                                                <th>Deleted</th>
                                                <th>Creation Date</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Loss Name</th>
                                                <th>Description</th>
                                                <th>Deleted</th>
                                                <th>Creation Date</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($causes as $cause)
                                            <tr>
                                            <td>{{$cause->id}}</td>
                                            <td>{{$cause->loss_name}}</td>
                                            <td>{{$cause->description}}</td>
                                            <td>{{$cause->deleted}}</td>
                                            <td>{{$cause->creation_date}}</td>
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
