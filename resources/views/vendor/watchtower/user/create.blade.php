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

                                                    <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
                                                        {!! Form::label('firstname', 'First Name: ', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-6">
                                                            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                        {!! $errors->first('firstname', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                                    </div>
                                                    <div class="form-group {{ $errors->has('secondname') ? 'has-error' : ''}}">
                                                        {!! Form::label('secondname', 'Second Name: ', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-6">
                                                            {!! Form::text('secondname', null, ['class' => 'form-control']) !!}
                                                        </div>
                                                        {!! $errors->first('secondname', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
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
                                                            <input type="password" class="form-control"
                                                                   name="password_confirmation">
                                                            {!! $errors->first('password_confirmation', '<div class="text-danger">:message</div>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group {{ $errors->has('password_updated_at') ? 'has-error' : ''}}">
                                                        {{--{!! Form::label('password_updated_at', 'Created At: ', ['class' => 'col-sm-3 control-label']) !!}--}}
                                                        <div class="col-md-6">
                                                            <input type="hidden" class="form-control" name="password_updated_at" id="password_updated_at" value="{{  \Carbon\Carbon::now()->subMonth(3) }}">

                                                            {!! $errors->first('password_updated_at', '<div class="text-danger">:message</div>') !!}
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
            </section>



            <!-- /.content -->
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script>
        /*To put a date instance in the Create*/

        function getDate()
        {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm}
            today = yyyy+""+mm+""+dd;

            $('#u').val(today);
        }

        //call getDate() when loading the page
        getDate();
    </script>
    <script src="{{URL::to('/js/app.js')}}"></script>

@endsection