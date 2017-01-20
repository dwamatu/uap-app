@extends('common.master')
@section('content')
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Portal panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
            @can('can.view.dashboard')
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua-gradient">
                            <div class="inner">
                                <h3>#{!! $pageData['total_no_farmers'] !!} </h3>

                                <p>Total Farmers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-funnel"></i>
                            </div>
                            <p class="small-box-footer" style="padding: 6%"> <i class=""></i></p>                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green-active">
                            <div class="inner">
                                <h3 >#{!! $pageData['total_no_claims'] !!}</h3>

                                <p > Total Losses</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <p class="small-box-footer" style="padding: 6%"> <i class=""></i></p>                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-navy-active">
                            <div class="inner">
                                <h3 >{!! $pageData['average_loss'] !!} %</h3>



                                <p >Average % Loss</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-globe"></i>
                            </div>
                            <p class="small-box-footer" style="padding: 6%"> <i class=""></i></p>                    </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-acre">
                            <div class="inner">
                                <h3>{!! $pageData['highest_loss'] !!} %</h3>

                                <p>Highest % Loss</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <p class="small-box-footer" style="padding: 6%"> <i class=""></i></p>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">


                    <div class="col-md-6">

                        <svg width="500" height="450"></svg>


                    </div>



                    <section class="col-md-6">


                        <div id="map" style="height: 450px ;">

                        </div>



                        <!-- /.box -->

                    </section>
                    <!-- right col -->
                </div>
            </section>
            @endcan
        </div>
        <!-- /.content-wrapper -->


    </div>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?libraries=drawing,geometry&key=AIzaSyAHSZHfNanEI64wMO0M6URymVBIGOh3wSA&callback=initMap">
    </script>
    <script src="{{URL::to('/js/map.js')}}"></script>
    <script src="{{ URL::to('/js/d3.min.js') }}"></script> <!-- jQuery -->
    <script src="{{url::to('/js/barGraph.js')}}"></script>
@endsection
