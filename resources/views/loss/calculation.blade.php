@extends('common.master')

@section('content')
    <div class="mainbar">

        <!-- Page heading -->
        <div class="page-head">
            <h2 class="pull-left"><i class="fa fa-home"></i> Loss Calculation</h2>

            <!-- Breadcrumb -->
            <div class="bread-crumb pull-right">
                <a href="#"><i class="fa fa-home"></i> Loss</a>
                <span class="divider">/</span>
                <a href="#" class="bread-current">
                    Loss Calculation
                </a>

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
                            <div class="pull-left">Loss Calculation</div>
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


                                        <table id="lossCalculationTable"
                                               class="table table-striped table-bordered dataTable" cellspacing="0"
                                               width="100%">
                                            <thead>
                                            <tr>
                                                {{--<th>Id</th>--}}
                                                <th>Farmer BAT Code</th>
                                                <th>Farmer Name</th>
                                                <th>Crop Inspector</th>
                                                <th>Cause Of Loss</th>
                                                {{--<th>Type Of Loss</th>--}}
                                                {{--<th>Farm Id</th>--}}
                                                {{--<th>Average Useful Sa</th>--}}
                                                {{--<th>Normal Leaf Sa</th>--}}
                                                {{--<th>Average-Leaves No</th>--}}
                                                {{--<th>Normal Leaves No</th>--}}
                                                {{--<th>Average Plant No</th>--}}
                                                {{--<th>Established Plant No</th>--}}
                                                {{--<th>Leaf Stage</th>--}}
                                                {{--<th>Agricultural Practices</th>--}}
                                                {{--<th>Area Staff Comment</th>--}}
                                                {{--<th>Crop Inspector Comment</th>--}}
                                                <th>Longitude</th>
                                                <th>Latitude</th>
                                                {{--<th>Is Confirmed</th>--}}
                                                <th>Percentage Loss</th>
                                                <th>Inspection Date</th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                {{--<th>Id</th>--}}
                                                <th>Farmer BAT Code</th>
                                                <th>Farmer Name</th>
                                                <th>User Id</th>
                                                <th>Cause Of Loss</th>
                                                {{--<th>Type Of Loss</th>--}}
                                                {{--<th>Farm Id</th>--}}
                                                {{--<th>Average Useful Sa</th>--}}
                                                {{--<th>Normal Leaf Sa</th>--}}
                                                {{--<th>Average-Leaves No</th>--}}
                                                {{--<th>Normal Leaves No</th>--}}
                                                {{--<th>Average Plant No</th>--}}
                                                {{--<th>Established Plant No</th>--}}
                                                {{--<th>Leaf Stage</th>--}}
                                                {{--<th>Agricultural Practices</th>--}}
                                                {{--<th>Area Staff Comment</th>--}}
                                                {{--<th>Crop Inspector Comment</th>--}}
                                                <th>Longitude</th>
                                                <th>Latitude</th>
                                                {{--<th>Is Confirmed</th>--}}
                                                <th>Percentage Loss</th>
                                                <th>Inspection Date</th>
                                                <th>Action</th>

                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($loss_calculations as $loss_calculation)
                                                <tr role="row" class="even">
                                                    {{--<td>{{$loss_calculation->id}}</td>--}}
                                                    <td>{{$loss_calculation->farmer->account_number}}</td>
                                                    <td>{{$loss_calculation->farmer->farmer_name}}</td>
                                                    <td>{{$loss_calculation->user->first_name. ' '.$loss_calculation->user->last_name}}</td>
                                                    <td>{{$loss_calculation->cause_of_loss_id}}</td>
                                                    {{--<td>{{$loss_calculation->type_of_loss}}</td>--}}
                                                    {{--<td>{{$loss_calculation->farm->farm_name}}</td>--}}
                                                    {{--<td>{{$loss_calculation->average_useful_sa}}</td>--}}
                                                    {{--<td>{{$loss_calculation->normal_leaf_sa}}</td>--}}
                                                    {{--<td>{{$loss_calculation->average_leaves_no}}</td>--}}
                                                    {{--<td>{{$loss_calculation->normal_leaves_no}}</td>--}}
                                                    {{--<td>{{$loss_calculation->average_plant_no}}</td>--}}
                                                    {{--<td>{{$loss_calculation->established_plant_no}}</td>--}}
                                                    {{--<td>{{$loss_calculation->leaf_stage}}</td>--}}
                                                    {{--<td>{{$loss_calculation->agricultural_practices}}</td>--}}
                                                    {{--<td>{{$loss_calculation->area_staff_comment}}</td>--}}
                                                    {{--<td>{{$loss_calculation->crop_inspector_comment}}</td>--}}
                                                    <td>{{$loss_calculation->longitude}}</td>
                                                    <td>{{$loss_calculation->latitude}}</td>
                                                    {{--<td>{{$loss_calculation->is_confirmed}}</td>--}}
                                                    <td>{{$loss_calculation->percentage_loss}}%</td>
                                                    <td>{{date('d-M-Y',strtotime($loss_calculation->inspection_date))}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button data-toggle="dropdown"
                                                                    class="btn btn-link btn-sm dropdown-toggle "
                                                                    href="#"> Action <i class="fa fa-caret-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">

                                                                <li>

                                                                    <a href="{{route('assessnote.download',['assessment_id'=>$loss_calculation->id])}}" class="download_las" target="_blank" data-lossid="{{$loss_calculation->id}} ">Download LAS</a>

                                                                </li>

                                                                <li>

                                                                    <a href="#" class="scanned_las">Scanned LAS</a>
                                                                </li>


                                                            </ul>
                                                        </div>
                                                    </td>
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
