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
                <div>


                    <div class="col-md-6">

                        <a class="btn btn-primary" id="create_street" href="/watchtower/user">back to users</a>

                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="padd">
                            <div>
                                <!-- table page -->
                                <div class="page-tables">
                                    <!-- table -->
                                    <div class="container">
                                        @include(config('watchtower.views.layouts.flash'))


                                    </div>

                                    <h1>'{{ $user->firstname }}' roles</h1>
                                    <hr/>

                                    {!! Form::model($user, [ 'route' => [ 'watchtower.user.role.update', $user->id ], 'class' => 'form-horizontal']) !!}

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading clearfix">
                                                    <h2 class="panel-title"><i class="fa fa-lg fa-users"></i>
                                                        current roles
                                                        <small>({{$roles->count()}})</small>
                                                    </h2>
                                                </div>

                                                <div class="panel-body">
                                                    @forelse($roles->chunk(6) as $c)
                                                        @foreach ($c as $r)
                                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                                <label class="checkbox-inline"
                                                                       title="{{ $r->id }}">
                                                                    <input type="checkbox" name="ids[]"
                                                                           value="{{$r->id}}"
                                                                           checked=""> {{ $r->name }}
                                                                    @if ($r->special == 'all-access')
                                                                        <i class="fa fa-star text-success"></i>
                                                                    @elseif ($r->special == 'no-access')
                                                                        <i class="fa fa-ban text-danger"></i>
                                                                    @endif
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @empty
                                                        <span class="text-warning"><i
                                                                    class="fa fa-warning text-warning"></i> this user does not have any defined roles.</span>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading clearfix">
                                                    <h2 class="panel-title">
                                                        <i class="fa fa-users"></i> available roles
                                                        <small>({{$available_roles->count()}})</small>
                                                    </h2>
                                                </div>

                                                <div class="panel-body">
                                                    @forelse($available_roles->chunk(6) as $chunk)
                                                        @foreach ($chunk as $ar)
                                                            <div class="col-md-2 col-sm-3 col-xs-4">
                                                                <label class="checkbox-inline"
                                                                       title="{{ $ar->id }}">
                                                                    <input type="checkbox" name="ids[]"
                                                                           value="{{$ar->id}}"> {{ $ar->name }}
                                                                    @if ($ar->special == 'all-access')
                                                                        <i class="fa fa-star text-success"></i>
                                                                    @elseif ($ar->special == 'no-access')
                                                                        <i class="fa fa-ban text-danger"></i>
                                                                    @endif
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @empty
                                                        <span class="text-danger"><i
                                                                    class="fa fa-warning text-danger"></i> there aren't any available roles.</span>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            {!! Form::submit('update roles', ['class' => 'btn btn-primary form-control']) !!}
                                        </div>
                                        <div class="col-sm-9">
                                            <button class="btn btn-info pull-right" type="button"
                                                    data-toggle="collapse"
                                                    data-target="#collapsepermissions" aria-expanded="false"
                                                    aria-controls="collapsepermissions">
                                                toggle permissions
                                            </button>
                                        </div>
                                    </div>

                                    {!! Form::close() !!}

                                    <div class="row panel-collapse collapse" id="collapsepermissions">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-info">
                                                <div class="panel-heading clearfix">
                                                    <h2 class="panel-title"><i
                                                                class="fa fa-key"></i> {{$user->name}}'s
                                                        permissions (from current
                                                        roles)</small></h2>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <ul class="list-unstyled">
                                                            @forelse($roles as $prole)
                                                                <li><strong>{{$prole->name}}</strong></li>
                                                                <ul>
                                                                    @if ($prole->special == 'all-access')
                                                                        <li>
                                                                            <i class="fa fa-fw fa-star text-success"></i>
                                                                            all access
                                                                        </li>
                                                                    @elseif ($prole->special == 'no-access')
                                                                        <li>
                                                                            <i class="fa fa-fw fa-ban text-danger"></i>
                                                                            no access
                                                                        </li>
                                                                    @else
                                                                        @forelse($prole->permissions as $p)
                                                                            <li>{{$p->name}} <em>({{ $p->slug }}
                                                                                    )</em></li>
                                                                        @empty
                                                                            <li>this role has no defined
                                                                                permissions
                                                                            </li>
                                                                        @endforelse
                                                                    @endif
                                                                </ul>
                                                            @empty
                                                                <span class="text-danger"><i
                                                                            class="fa fa-warning text-danger"></i> there are no permissions defined for this user.</span>
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
    </div>
    <!-- /.content-wrapper -->





@endsection