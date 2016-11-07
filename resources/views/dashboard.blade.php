@extends('common.master')

@section('content')
    <div class="mainbar content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
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
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
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
                            <h3>44</h3>

                            <p>User Registrations</p>
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
                            <h3>65</h3>

                            <p>Unique Visitors</p>
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
                    <div class="nav-tabs-custom" style="cursor: move;">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right ui-sortable-handle">
                            <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                            <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                            <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="revenue-chart"
                                 style="position: relative; height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

                                <div class="morris-hover morris-default-style"
                                     style="left: 315.235px; top: 120px; display: none;">
                                    <div class="morris-hover-row-label">2012 Q2</div>
                                    <div class="morris-hover-point" style="color: #a0d0e0">
                                        Item 1:
                                        5,670
                                    </div>
                                    <div class="morris-hover-point" style="color: #3c8dbc">
                                        Item 2:
                                        4,293
                                    </div>
                                </div>
                            </div>
                            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">

                            </div>
                        </div>
                    </div>


                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable ui-sortable">

                    <!-- Map box -->
                    <div class="box box-solid bg-light-blue-gradient">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-primary btn-sm daterange pull-right"
                                        data-toggle="tooltip" title="Date range">
                                    <i class="fa fa-calendar"></i></button>
                                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                            <!-- /. tools -->

                            <i class="fa fa-map-marker"></i>

                            <h3 class="box-title">
                                Visitors
                            </h3>
                        </div>
                        <div class="box-body">
                            <div id="world-map" style="height: 300px; width: 100%;">
                                <div class="jvectormap-container"
                                     style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: transparent;">

                                    <div class="jvectormap-zoomin">+</div>
                                    <div class="jvectormap-zoomout">−</div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- /.box -->

                </section>
                <!-- right col -->
            </div>
        </div>
    </div>
@endsection
