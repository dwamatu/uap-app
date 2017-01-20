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
                    Create
                </h1>

            </section>
            <section class="content">
                <div>


                    <div class="row">
                        <div class="col-md-12">


                            <!-- Table Page -->
                            <div class="page-tables">
                                <!-- Table -->
                                <div class="container">
                                    @include(config('watchtower.views.layouts.flash'))


                                </div>

                                <h1>Create New {{ $route }}</h1>
                                <hr/>

                                {!! Form::open( ['route' => config('watchtower.route.as') . $route .'.store', 'class' => 'form-horizontal']) !!}

                                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                    {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                                    <div class="col-sm-6">
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                    {!! $errors->first('name', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
                                    {!! Form::label('slug', 'Slug: ', ['class' => 'col-sm-3 control-label']) !!}
                                    <div class="col-sm-6">
                                        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                                    </div>
                                    {!! $errors->first('slug', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                </div>

                                <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                    {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3 control-label']) !!}
                                    <div class="col-sm-6">
                                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                    </div>
                                    {!! $errors->first('description', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                </div>

                                @if ($route == "role")
                                    <div class="form-group">
                                        {!! Form::label('special', 'Special Access: ', ['class' => 'col-sm-3 control-label']) !!}
                                        <div class="col-sm-6">
                                            {!! Form::select('special', array('all-access' => 'All Access', 'no-access' => 'No Access '), null, ['placeholder' => 'No special access.', 'class' => 'form-control'] ) !!}
                                        </div>
                                        {!! $errors->first('special', '<div class="col-sm-6 col-sm-offset-3 text-danger">:message</div>') !!}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-3">
                                        {!! Form::submit('Create '.$route, ['class' => 'btn btn-primary form-control']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}

                                <div class="clearfix"></div>
                            </div>


                            <div class="clearfix"></div>
                        </div>
                    </div>


                </div>
            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>


@endsection