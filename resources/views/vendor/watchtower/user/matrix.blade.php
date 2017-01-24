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

                    <div class="row">


                        <div class="row">
                                <div class="row taller-10">
                                    <div class="col-md-6">

                                        <a class="btn btn-primary" id="create_street" href="/watchtower/user">Back To
                                            Users</a>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div>
                                            <!-- Table Page -->
                                            <div class="row">
                                                <!-- Table -->
                                                <div class="container">
                                                    @include(config('watchtower.views.layouts.flash'))


                                                </div>

                                                <h1>Role Matrix
                                                    <small class="hidden-xs">Users that are on each role</small>
                                                </h1>

                                                <div class="visible-xs alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-hidden="true">&times;</button>
                                                    This page might not be formatted properly for this screen due to the
                                                    complexity of Role Based Access Control
                                                    permissioning.
                                                </div>

                                                {!! Form::open( [ 'route' => [ 'watchtower.user.matrix' ], 'class' => 'form-horizontal'] ) !!}
                                                <div class="table"
                                                     style="max-height:350px; overflow:auto; border: 1px dashed;">
                                                    <table class="table table-bordered table-striped table-hover"
                                                           style=" margin-bottom:0">
                                                        <thead>
                                                        <tr class="alert-infro">
                                                            <th class="text-center">
                    <span class="pull-left"><span class="sr-only">Users</span>
                      <i class="fa fa-arrow-down"></i>
                      <i class="fa fa-user fa-lg"></i>
                    </span>

                                                                <span class="pull-right"><span
                                                                            class="sr-only">Roles</span>
                    <i class="fa fa-users" title="Roles"></i>
                    <i class="fa fa-arrow-right"></i>
                    </span>
                                                            </th>
                                                            @foreach ($roles as $r)
                                                                <th> {{ $r->name }} <a
                                                                            href="{{ route('watchtower.role.show',$r->id) }}">
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
                                                        @foreach($users as $u)
                                                            <tr>
                                                                <th>
                                                                    <a href="{{ route('watchtower.user.show',$u->id) }}">
                                                                        <button type="button"
                                                                                class="btn btn-warning btn-xs"><span
                                                                                    class="glyphicon glyphicon-link"></span>
                                                                        </button>
                                                                    </a>
                                                                    {{ $u->firstname .' '. $u->secondname }}
                                                                </th>
                                                                @for ($i=0; $i < $roles->count(); $i++ )
                                                                    <td data-container="body" data-trigger="focus"
                                                                        data-toggle="popover" data-placement="left"
                                                                        data-content="Role: {{$roles[$i]->name}}, User: {{$u->email}}">
                                                                        {!! Form::checkbox('role_user[]', $roles[$i]->id.":".$u->id, ( in_array( ($roles[$i]->id.":".$u->id), $pivot ) ? true : false ) ) !!}
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

                                                @if ( Shinobi::can( config('watchtower.acl.user.usermatrix', false)) )
                                                    <div class="form-group">
                                                        <div class="col-sm-3">
                                                            {!! Form::submit('Save User Role Changes', ['class' => 'btn btn-primary form-control']) !!}
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="alert alert-danger lead">
                                                        <i class="fa fa-exclamation-triangle fa-1x"></i> You are not
                                                        permitted to sync user roles.
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


            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>


@endsection