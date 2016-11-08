@extends('common.master')

@section('content')
    <div class="mainbar content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3 class="center">{!! $pageData['total_no_farmers'] !!} </h3>

                            <p class="center">Total Number of Farmers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 class="center">{!! $pageData['total_no_claims'] !!}</h3>

                            <p class="center"> Total Reported Losses</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3 class="center">{!! $pageData['average_loss'] !!}</h3>


                            <p class="center">Average % Loss</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3 class="center">{!! $pageData['highest_loss'] !!}</h3>

                            <p class="center">Highest % Loss</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable ui-sortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="map" style="cursor: move; height: 350px">
                        <!-- Tabs within a box -->


                    </div>


                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable ui-sortable">

                    <!-- Map box -->
                    <div class="box box-solid bg-light-blue-gradient">
                        <div id="map" style="height: 400px;">

                        </div>

                    </div>


                    <!-- /.box -->

                </section>
                <!-- right col -->
            </div>
        </div>
    </div>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?libraries=drawing,geometry&key=AIzaSyAHSZHfNanEI64wMO0M6URymVBIGOh3wSA&callback=initMap">
    </script>
    <script src="{{URL::to('/js/map.js')}}"></script>
@endsection
