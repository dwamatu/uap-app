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


                                        <table id="loss-grid"
                                               class="table table-striped table-bordered dataTable" cellspacing="0"
                                               width="100%">
                                            <thead>
                                            <tr>
                                                {{--<th>Id</th>--}}
                                                <th>Farmer BAT Code</th>
                                                <th>Farmer Name</th>
                                                <th>User Id</th>
                                                <th>Cause Of Loss Id</th>
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
                                                <th>Cause Of Loss Id</th>
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


    </script>

@endsection
