@extends('common.master')
@section('title')
    UAP Old Mutual Africa
@endsection

@section('content')
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Users
                    <small>panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Users</li>
                </ol>
            </section>
            <section class="content">
                <div>

                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left"><h4>Create Users</h4></div>
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

                                        <a class="btn btn-primary" id="create_street" href="/watchtower/user">Back To
                                            Users</a>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="padd">
                                            <div>
                                                <!-- Table Page -->
                                                <div class="page-tables">
                                                    <!-- Table -->
                                                    <div class="container">
                                                        @include(config('watchtower.views.layouts.flash'))


                                                    </div>

                                                    <h1>'{{ $permission->name }}' Roles</h1>
                                                    <hr/>

                                                    {!! Form::model($permission, [ 'route' => [ config('watchtower.route.as') .'permission.role.update', $permission->id ], 'class' => 'form-horizontal']) !!}

                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="panel panel-primary">
                                                                <div class="panel-heading clearfix">
                                                                    <h2 class="panel-title"><i
                                                                                class="fa fa-users fa-lg"></i>
                                                                        Current Roles
                                                                        <small>({{$roles->count()}})</small>
                                                                    </h2>
                                                                </div>

                                                                <div class="panel-body">
                                                                    @forelse($roles->chunk(6) as $c)
                                                                        @foreach ($c as $p)
                                                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                                                <label class="checkbox-inline"
                                                                                       title="{{ $p->slug }}">
                                                                                    <input type="checkbox" name="slug[]"
                                                                                           value="{{$p->id}}"
                                                                                           checked=""> {{ $p->name }}
                                                                                    @if ($p->special == 'all-access')
                                                                                        <i class="fa fa-star text-success"></i>
                                                                                    @elseif ($p->special == 'no-access')
                                                                                        <i class="fa fa-ban text-danger"></i>
                                                                                    @endif

                                                                                </label>
                                                                            </div>
                                                                        @endforeach
                                                                    @empty
                                                                        <span class="text-warning"><i
                                                                                    class="fa fa-warning text-warning"></i> This permission does not have any defined roles.</span>
                                                                    @endforelse
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="panel panel-primary">
                                                                <div class="panel-heading clearfix">
                                                                    <h2 class="panel-title"><i class="fa fa-users"></i>
                                                                        Available Roles
                                                                        <small>({{$available_roles->count()}})</small>
                                                                    </h2>
                                                                </div>

                                                                <div class="panel-body">
                                                                    @forelse($available_roles->chunk(6) as $chunk)
                                                                        @foreach ($chunk as $perm)
                                                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                                                <label class="checkbox-inline"
                                                                                       title="{{ $perm->slug }}">
                                                                                    <input type="checkbox" name="slug[]"
                                                                                           value="{{$perm->id}}"> {{ $perm->name }}
                                                                                    @if ($perm->special == 'all-access')
                                                                                        <i class="fa fa-star text-success"></i>
                                                                                    @elseif ($perm->special == 'no-access')
                                                                                        <i class="fa fa-ban text-danger"></i>
                                                                                    @endif
                                                                                </label>
                                                                            </div>
                                                                        @endforeach
                                                                    @empty
                                                                        <span class="text-danger"><i
                                                                                    class="fa fa-warning text-danger"></i> There aren't any available roles.</span>
                                                                    @endforelse
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-sm-3">
                                                            {!! Form::submit('Update roles', ['class' => 'btn btn-primary form-control']) !!}
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}

                                                    <div class="clearfix"></div>
                                                </div>


                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget-foot">
                        </div>
                    </div>
                </div>
            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>
@endsection