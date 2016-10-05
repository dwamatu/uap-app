@extends('common.master')
@section('title')
    UAP Old Mutual Africa
@endsection

@section('content')
    <div class="mainbar">
        <div class="page-head">
            <h2 class="pull-left">
                Users
            </h2>

            <!-- Breadcrumb -->
            <div class="bread-crumb pull-right">
                <a href="#"><i class="fa fa-home"></i>Home</a>
                <span class="divider">/</span>
                <a class="bread-current" href="#">Users</a>
            </div>

            <div class="clearfix"></div>

        </div>
        <div class="container">

            <div class="widget">
                <div class="widget-head">
                    <div class="pull-left"><h4>Edit User</h4></div>
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

                                <a class="btn btn-primary" id="create_street" href="/watchtower/user">Back To Users</a>
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

                                            <h1>Edit '{{ $resource->first_name }}'</h1>
                                            <hr/>

                                            {!! Form::model($resource, ['method' => 'PATCH', 'route' => [ 'watchtower.user.update', $resource->id ], 'class' => 'form-horizontal']) !!}

                                            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                                                {!! Form::label('first_name', 'First Name: ', ['class' => 'col-sm-3 control-label']) !!}
                                                <div class="col-sm-6">
                                                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                                                </div>
                                                {!! $errors->first('first_name', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                            </div>
                                            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                                                {!! Form::label('last_name', 'Last Name: ', ['class' => 'col-sm-3 control-label']) !!}
                                                <div class="col-sm-6">
                                                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                                </div>
                                                {!! $errors->first('last_name', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                                {!! Form::label('email', 'Email Address: ', ['class' => 'col-sm-3 control-label']) !!}
                                                <div class="col-sm-6">
                                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                                </div>
                                                {!! $errors->first('email', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                            </div>

                                            @if ($show == '0')

                                                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                                    {!! Form::label('password', 'Password: ', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control" name="password">
                                                        {!! $errors->first('password', '<div class="text-danger">:message</div>') !!}
                                                    </div>
                                                </div>

                                                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                                                    {!! Form::label('password_confirmation', 'Confirm Password: ', ['class' => 'col-sm-3 control-label']) !!}
                                                    <div class="col-md-6">
                                                        <input type="password" class="form-control"
                                                               name="password_confirmation">
                                                        {!! $errors->first('password_confirmation', '<div class="text-danger">:message</div>') !!}
                                                    </div>
                                                </div>

                                                @if ( Shinobi::can( config('watchtower.acl.user.edit', false) ) )

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-3">
                                                            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                                                        </div>

                                                        @else

                                                            <div class="col-sm-6 col-sm-offset-3 alert alert-danger lead">
                                                                <i class="fa fa-exclamation-triangle fa-1x"></i> You are
                                                                not permitted
                                                                to {{ ( ($show == '0') ? 'edit' : 'view' ) }} users.
                                                            </div>

                                                        @endif
                                                    </div>

                                                @else
                                                    <div class="form-group">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <a href="{{ route('watchtower.user.edit', $resource->id) }}"
                                                               class="pull-right"
                                                               title="Edit this User">
                                                                <i class="fa fa-pencil fa-fw"></i>
                                                                <span class="hidden-xs hidden-sm">Edit</span>
                                                            </a>

                                                            <a href="{{ route('watchtower.user.role.edit', $resource->id) }}"
                                                               title="Roles for this user">
                                                                <i class="fa fa-key fa-fw"></i>
                                                                <span class="hidden-xs hidden-sm">Roles</span>
                                                            </a>
                                                        </div>
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
    </div>

@endsection