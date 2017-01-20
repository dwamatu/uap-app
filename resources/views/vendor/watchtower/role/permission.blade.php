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
                    Permissions
                    <small>panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Role</a></li>
                    <li class="active">Permissions</li>
                </ol>
            </section>
            <section class="content">
                <div>
                    <div class="row">
                        <div class="col-md-12">

                                <div>
                                    <!-- Table Page -->
                                    <div class="page-tables">
                                        <!-- Table -->
                                        <div class="container">
                                            @include(config('watchtower.views.layouts.flash'))


                                        </div>

                                        <h1>'{{ $role->name }}' Permissions</h1>
                                        <hr/>

                                        {!! Form::model($role, [ 'route' => [ config('watchtower.route.as') .'role.permission.update', $role->id ], 'class' => 'form-horizontal']) !!}

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading clearfix">
                                                        <h2 class="panel-title"><i class="fa fa-key fa-lg"></i>
                                                            Current Permissions
                                                            <small>({{$permissions->count()}})</small>
                                                        </h2>
                                                    </div>

                                                    <div class="panel-body">
                                                        @forelse($permissions->chunk(6) as $c)
                                                            @foreach ($c as $p)
                                                                <div class="col-md-2 col-sm-3 col-xs-4">
                                                                    <label class="checkbox-inline"
                                                                           title="{{ $p->slug }}">
                                                                        <input type="checkbox" name="slug[]"
                                                                               value="{{$p->id}}"
                                                                               checked=""> {{ $p->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @empty
                                                            <span class="text-warning"><i
                                                                        class="fa fa-warning text-warning"></i> This role does not have any defined permissions.</span>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading clearfix">
                                                        <h2 class="panel-title"><i class="fa fa-key"></i> Available
                                                            Permissions
                                                            <small>({{$available_permissions->count()}})</small>
                                                        </h2>
                                                    </div>

                                                    <div class="panel-body">
                                                        @forelse($available_permissions->chunk(6) as $chunk)
                                                            @foreach ($chunk as $perm)
                                                                <div class="col-md-2 col-sm-3 col-xs-4">
                                                                    <label class="checkbox-inline"
                                                                           title="{{ $perm->slug }}">
                                                                        <input type="checkbox" name="slug[]"
                                                                               value="{{$perm->id}}"> {{ $perm->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @empty
                                                            <span class="text-danger"><i
                                                                        class="fa fa-warning text-danger"></i> There aren't any available permissions.</span>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                {!! Form::submit('Sync Role Permissions', ['class' => 'btn btn-primary form-control']) !!}
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

            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>


@endsection