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
                    Roles
                    <small>Matrix</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Role Matrix </li>
                </ol>
            </section>
            <section class="content">
                <div>

                    <div class="widget">
                        <div class="widget-head">
                            <div class="pull-left"><h4>View Role Matrix</h4></div>
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

                                        <a class="btn btn-primary" id="" href="/watchtower/role">Back To Roles</a>
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

                                                    <h1>Role Matrix
                                                        <small class="hidden-xs">Permissions that are on each role</small>
                                                    </h1>

                                                    <div class="visible-xs alert alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-hidden="true">&times;</button>
                                                        This page might not be formatted properly for this screen due to the
                                                        complexity of Role Based Access Control
                                                        permissioning.
                                                    </div>

                                                    {!! Form::open( [ 'route' => [ config('watchtower.route.as') .'role.matrix' ], 'class' => 'form-horizontal'] ) !!}
                                                    <div class="table"
                                                         style="max-height:350px; overflow:auto; border: 1px dashed;">
                                                        <table class="table table-bordered table-striped table-hover"
                                                               style=" margin-bottom:0">
                                                            <thead>
                                                            <tr class="alert-info">
                                                                <th class="text-center">
                    <span class="pull-left"><span class="sr-only">Permissions</span>
                      <i class="fa fa-arrow-down"></i>
                      <i class="fa fa-key fa-lg"></i>
                    </span>

                                                                    <span class="pull-right"><span class="sr-only">Roles</span>
                    <i class="fa fa-users" title="Roles"></i>
                    <i class="fa fa-arrow-right"></i>
                    </span>
                                                                </th>
                                                                @foreach ($roles as $r)
                                                                    <th> {{ $r->name }} <a
                                                                                href="{{ route( config('watchtower.route.as') .'role.show',$r->id) }}">
                                                                            <button type="button"
                                                                                    class="btn btn-warning btn-xs"><span
                                                                                        class="glyphicon glyphicon-link"></span>
                                                                            </button>
                                                                        </a>
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @foreach($perms as $p)
                                                                <tr>
                                                                    <th >
                                                                        <a href="{{ route('watchtower.permission.show',$p->id) }}">
                                                                            <button type="button"
                                                                                    class="btn btn-warning btn-xs"><span
                                                                                        class="glyphicon glyphicon-link"></span>
                                                                            </button>
                                                                        </a>
                                                                        {{ $p->name }}
                                                                    </th>
                                                                    @for ($i=0; $i < $roles->count(); $i++ )
                                                                        <td data-container="body" data-trigger="focus"
                                                                            data-toggle="popover" data-placement="left"
                                                                            data-content="Role: {{$roles[$i]->name}}, Permission: {{$p->slug}}">
                                                                            {!! Form::checkbox('perm_role[]', $roles[$i]->id.":".$p->id, ( in_array( ($roles[$i]->id.":".$p->id), $pivot ) ? true : false ) ) !!}
                                                                        </td>
                                                                    @endfor
                                                                </tr>
                                                            @endforeach

                                                            <!-- table footer -->
                                                            <tfoot>
                                                            </tfoot>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    @if ( Shinobi::can( config('watchtower.acl.role.rolematrix', false) ) )
                                                        <div class="form-group">
                                                            <div class="col-sm-3">
                                                                {!! Form::submit('Save Role Permission Changes', ['class' => 'btn btn-primary form-control']) !!}
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="alert alert-danger lead">
                                                            <i class="fa fa-exclamation-triangle fa-1x"></i> You are not
                                                            permitted to sync role permissions.
                                                        </div>
                                                    @endif
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