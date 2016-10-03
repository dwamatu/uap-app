@extends('common.master')

@section('content')
    <div class="mainbar">

        <!-- Page heading -->
        <div class="page-head">
            <h2 class="pull-left"><i class="fa fa-home"></i> Farmers</h2>

            <!-- Breadcrumb -->
            <div class="bread-crumb pull-right">
                <a href="#"><i class="fa fa-home"></i> Farmers</a>

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
                                <div class="pull-left">Farmers</div>
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
                                                <th>Account Number</th>
                                                <th>Season Id</th>
                                                <th>Id Number</th>
                                                <th>Farmer Name</th>
                                                <th>Cell Group</th>
                                                <th>Cell Leader</th>
                                                <th>Farmer Zone</th>
                                                <th>Area Staff</th>
                                                <th>Alm Manager</th>
                                                <th>Category</th>
                                                <th>Target</th>
                                                <th>Target Planted Land</th>
                                                <th>Plant Count</th>
                                                <th>Planted Land</th>
                                                <th>Ltay</th>
                                                <th>Expected Kg</th>
                                                <th>User Status Id</th>
                                                <th>Deleted</th>
                                                <th>Creation Date</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Account Number</th>
                                                <th>Season Id</th>
                                                <th>Id Number</th>
                                                <th>Farmer Name</th>
                                                <th>Cell Group</th>
                                                <th>Cell Leader</th>
                                                <th>Farmer Zone</th>
                                                <th>Area Staff</th>
                                                <th>Alm Manager</th>
                                                <th>Category</th>
                                                <th>Target</th>
                                                <th>Target Planted Land</th>
                                                <th>Plant Count</th>
                                                <th>Planted Land</th>
                                                <th>Ltay</th>
                                                <th>Expected Kg</th>
                                                <th>User Status Id</th>
                                                <th>Deleted</th>
                                                <th>Creation Date</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($farmers as $farmer)
                                                <tr role="row" class="even">
                                                    <td>{{$farmer->id}}</td>
                                                    <td>{{$farmer->account_number}}</td>
                                                    <td>{{$farmer->season_id}}</td>
                                                    <td>{{$farmer->id_number}}</td>
                                                    <td>{{$farmer->farmer_name}}</td>
                                                    <td>{{$farmer->cell_group}}</td>
                                                    <td>{{$farmer->cell_leader}}</td>
                                                    <td>{{$farmer->farmer_zone}}</td>
                                                    <td>{{$farmer->area_staff}}</td>
                                                    <td>{{$farmer->alm_manager}}</td>
                                                    <td>{{$farmer->category}}</td>
                                                    <td>{{$farmer->target}}</td>
                                                    <td>{{$farmer->target_planted_land}}</td>
                                                    <td>{{$farmer->plant_count}}</td>
                                                    <td>{{$farmer->planted_land}}</td>
                                                    <td>{{$farmer->ltay}}</td>
                                                    <td>{{$farmer->expected_kg}}</td>
                                                    <td>{{$farmer->user_status_id}}</td>
                                                    <td>{{$farmer->deleted}}</td>
                                                    <td>{{$farmer->creation_date}}</td>
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
