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
                                            {!! Form::open( ['route' => 'watchtower.user.store', 'class' => 'form-horizontal']) !!}

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
                                            <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
                                                {!! Form::label('username', 'Username: ', ['class' => 'col-sm-3 control-label']) !!}
                                                <div class="col-sm-6">
                                                    {!! Form::text('username', null, ['class' => 'form-control']) !!}
                                                </div>
                                                {!! $errors->first('username', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                            </div>


                                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                                {!! Form::label('email', 'Email Address: ', ['class' => 'col-sm-3 control-label']) !!}
                                                <div class="col-sm-6">
                                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                                </div>
                                                {!! $errors->first('email', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                            </div>

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
                                                    <input type="password" class="form-control" name="password_confirmation">
                                                    {!! $errors->first('password_confirmation', '<div class="text-danger">:message</div>') !!}
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
                                                {!! Form::label('role_id', 'Role: ', ['class' => 'col-sm-3 control-label']) !!}
                                                <div class="col-md-6">
                                                    <select name="role_id" id="role_id" class="form-control">

                                                    </select>
                                                    {!! $errors->first('role_id', '<div class="text-danger">:message</div>') !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-6">
                                                    {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{URL::to('/js/app.js')}}"></script>

@endsection