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
                    <small>panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Roles</li>
                </ol>
            </section>
            <section class="content">
                <div >
                    <div class="row">
                        <div class="col-md-12">
                        <div class="row taller-10">
                            <div class="col-md-6">

                                <a class="btn btn-primary" id="create_street" href="/watchtower/user">Back To Users</a>
                            </div>
                        </div>

                        <hr>



                            <div class="row">
                                <div class="col-md-12">
                                        <!-- Table -->
                                        <div class="container">
                                            @include(config('watchtower.views.layouts.flash'))


                                        </div>

                                        <h1>'{{ $role->name }}' Users</h1>
                                        <hr/>

                                        {!! Form::model($role, [ 'route' => [ config('watchtower.route.as') .'role.user.update', $role->id ], 'class' => 'form-horizontal']) !!}

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading clearfix">
                                                        <h2 class="panel-title"><i class="fa fa-user fa-lg"></i>
                                                            Current Users
                                                            <small>({{$users->count()}})</small>
                                                        </h2>
                                                    </div>

                                                    <div class="panel-body">
                                                        @forelse($users->chunk(6) as $c)
                                                            @foreach ($c as $u)
                                                                <div class="col-md-2 col-sm-3 col-xs-4">
                                                                    <label class="checkbox-inline"
                                                                           title="{{ $u->slug }}">
                                                                        <input type="checkbox" name="slug[]"
                                                                               value="{{$u->id}}"
                                                                               checked=""> {{ $u->firstname }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @empty
                                                            <span class="text-warning"><i
                                                                        class="fa fa-warning text-warning"></i> This role does not have any defined users.</span>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading clearfix">
                                                        <h2 class="panel-title"><i class="fa fa-user"></i> Available
                                                            Users
                                                            <small>({{$available_users->count()}})</small>
                                                        </h2>
                                                    </div>

                                                    <div class="panel-body">
                                                        @forelse($available_users->chunk(6) as $chunk)
                                                            @foreach ($chunk as $au)
                                                                <div class="col-md-2 col-sm-3 col-xs-4">
                                                                    <label class="checkbox-inline"
                                                                           title="{{ $au->slug }}">
                                                                        <input type="checkbox" name="slug[]"
                                                                               value="{{$au->id}}"> {{ $au->firstname }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @empty
                                                            <span class="text-danger"><i
                                                                        class="fa fa-warning text-danger"></i> There aren't any available users.</span>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                {!! Form::submit('Update Users', ['class' => 'btn btn-primary form-control']) !!}
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

            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>

@endsection