@extends('common.master')
@section('title')
    UAP Old Mutual Africa
@endsection

@section('content')
    <div class="mainbar">
        <div class="page-head">
            <h2 class="pull-left">
                Roles
            </h2>

            <!-- Breadcrumb -->
            <div class="bread-crumb pull-right">
                <a href="#"><i class="fa fa-home"></i>Home</a>
                <span class="divider">/</span>
                <a class="bread-current" href="#">Roles</a>
            </div>

            <div class="clearfix"></div>

        </div>
        <div class="container">

            <div class="widget">
                <div class="widget-head">
                    <div class="pull-left"><h4>View Roles</h4></div>
                    <div class="widget-icons pull-right">
                        <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                    <div class="padd invoice">
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

                                            <h1>Roles
                                                <div class="btn-group pull-right" role="group" aria-label="...">
                                                    @if ( Shinobi::can( config('watchtower.acl.role.viewmatrix', false) ) )
                                                        <a href="{{ route( config('watchtower.route.as') .'role.matrix') }}">
                                                            <button type="button" class="btn btn-default">
                                                                <i class="fa fa-th fa-fw"></i>
                                                                <span class="hidden-xs hidden-sm">Role Matrix</span>
                                                            </button>
                                                        </a>
                                                    @endif

                                                    @if ( Shinobi::can( config('watchtower.acl.role.create', false) ) )
                                                        <a href="{{ route( config('watchtower.route.as') .'role.create') }}">
                                                            <button type="button" class="btn btn-info">
                                                                <i class="fa fa-plus fa-fw"></i>
                                                                <span class="hidden-xs hidden-sm">Add New Role</span>
                                                            </button>
                                                        </a>
                                                    @endif
                                                </div>
                                            </h1>

                                            <!-- search bar -->
                                            @include( config('watchtower.views.layouts.search'), [ 'search_route' => config('watchtower.route.as') .'role.index', 'items' => $roles, 'acl' => 'role' ] )

                                            <div class="table">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @forelse($roles as $item)
                                                        <tr>
                                                            <td>{{ $item->id }}</td>

                                                            <td>
                                                                <a href="{{ route( config('watchtower.route.as') .'role.show', $item->id) }}">{{ $item->name }}</a>
                                                                @if ($item->special == 'all-access')
                                                                    <i class="fa fa-star text-success"></i>
                                                                @elseif ($item->special == 'no-access')
                                                                    <i class="fa fa-ban text-danger"></i>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if ( Shinobi::can( config('watchtower.acl.role.permission', false)) )
                                                                    <a href="{{ route( config('watchtower.route.as') .'role.permission.edit', $item->id) }}">
                                                                        <button type="button"
                                                                                class="btn btn-primary btn-xs">
                                                                            <i class="fa fa-key fa-fw"></i>
                                                                            <span class="hidden-xs hidden-sm">Permissions</span>
                                                                        </button>
                                                                    </a>
                                                                @endif

                                                                @if ( Shinobi::can( config('watchtower.acl.role.user', false)) )
                                                                    <a href="{{ route( config('watchtower.route.as') .'role.user.edit', $item->id) }}">
                                                                        <button type="button"
                                                                                class="btn btn-primary btn-xs">
                                                                            <i class="fa fa-user fa-fw"></i>
                                                                            <span class="hidden-xs hidden-sm">Users</span>
                                                                        </button>
                                                                    </a>
                                                                @endif

                                                                @if ( Shinobi::can( config('watchtower.acl.role.edit', false)) )
                                                                    <a href="{{ route( config('watchtower.route.as') .'role.edit', $item->id) }}">
                                                                        <button type="button"
                                                                                class="btn btn-default btn-xs">
                                                                            <i class="fa fa-pencil fa-fw"></i>
                                                                            <span class="hidden-xs hidden-sm">Update</span>
                                                                        </button>
                                                                    </a>
                                                                @endif

                                                                {{--@if ( Shinobi::can( config('watchtower.acl.role.destroy', false)) )--}}
                                                                    {{--{!! Form::open(['method'=>'delete','route'=> [ config('watchtower.route.as') .'role.destroy',$item->id], 'style' => 'display:inline']) !!}--}}
                                                                    {{--<button type="submit" class="btn btn-danger btn-xs">--}}
                                                                        {{--<i class="fa fa-trash-o fa-lg"></i>--}}
                                                                        {{--<span class="hidden-xs hidden-sm">Delete</span>--}}
                                                                    {{--</button>--}}
                                                                    {{--{!! Form::close() !!}--}}
                                                                {{--@endif--}}
                                                            </td>
                                                        </tr>

                                                    @empty
                                                        <tr>
                                                            <td>There are no roles</td>
                                                        </tr>
                                                    @endforelse

                                                    <!-- pagination -->
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-center small">
                                                            {!! $roles->render() !!}
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                    </tbody>
                                                </table>
                                            </div>
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