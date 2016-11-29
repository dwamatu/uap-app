@extends('common.master')
@section('title')
    UAP Old Mutual Africa
@endsection

@section('content')
    <div class="mainbar">
        <div class="page-head">
            <h2 class="pull-left">
                Permissions
            </h2>

            <!-- Breadcrumb -->
            <div class="bread-crumb pull-right">
                <a href="#"><i class="fa fa-home"></i>Home</a>
                <span class="divider">/</span>
                <a class="bread-current" href="#">Admin</a>
                <span class="divider">/</span>
                <a class="bread-current" href="#">Permissions</a>
            </div>

            <div class="clearfix"></div>

        </div>
        <div class="container">

            <div class="widget">
                <div class="widget-head">
                    <div class="pull-left"><h4>View Permissions</h4></div>
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

                                            <h1>Permissions
                                                <div class="btn-group pull-right" role="group" aria-label="...">
                                                    @if ( Shinobi::can( config('watchtower.acl.role.viewmatrix', false) ) )
                                                        <a href="{{ route('watchtower.role.matrix') }}">
                                                            <button type="button" class="btn btn-default">
                                                                <i class="fa fa-th fa-fw"></i>
                                                                <span class="hidden-xs hidden-sm">Role Matrix</span>
                                                            </button>
                                                        </a>
                                                    @endif

                                                    {{--@if ( Shinobi::can( config('watchtower.acl.permission.create', false) ) )--}}
                                                        {{--<a href="{{ route( config('watchtower.route.as') .'permission.create') }}">--}}
                                                            {{--<button type="button" class="btn btn-info">--}}
                                                                {{--<i class="fa fa-plus fa-fw"></i>--}}
                                                                {{--<span class="hidden-xs hidden-sm">Add New Permission</span>--}}
                                                            {{--</button>--}}
                                                        {{--</a>--}}
                                                    {{--@endif--}}
                                                </div>
                                            </h1>

                                            <!-- search bar -->
                                            @include( config('watchtower.views.layouts.search'), [ 'search_route' => config('watchtower.route.as') .'permission.index', 'items' => $permissions, 'acl' => 'permission' ] )

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
                                                    @forelse($permissions as $item)
                                                        <tr>
                                                            <td>{{ $item->id }}</td>

                                                            <td>
                                                                <a href="{{ route( config('watchtower.route.as') .'permission.show', $item->id) }}">{{ $item->name }}</a>
                                                            </td>

                                                            <td>
                                                                @if ( Shinobi::can( config('watchtower.acl.permission.role', false)) )
                                                                    <a href="{{ route( config('watchtower.route.as') .'permission.role.edit', $item->id) }}">
                                                                        <button type="button"
                                                                                class="btn btn-primary btn-xs">
                                                                            <i class="fa fa-users fa-fw"></i>
                                                                            <span class="hidden-xs hidden-sm">Roles</span>
                                                                        </button>
                                                                    </a>
                                                                @endif

                                                                @if ( Shinobi::can( config('watchtower.acl.permission.edit', false)) )
                                                                    <a href="{{ route( config('watchtower.route.as') .'permission.edit', $item->id) }}">
                                                                        <button type="button"
                                                                                class="btn btn-default btn-xs">
                                                                            <i class="fa fa-pencil fa-fw"></i>
                                                                            <span class="hidden-xs hidden-sm">Update</span>
                                                                        </button>
                                                                    </a>
                                                                @endif

                                                                {{--@if ( Shinobi::can( config('watchtower.acl.permission.destroy', false) ) )--}}
                                                                    {{--{!! Form::open(['method'=>'delete','route'=> [ config('watchtower.route.as') .'permission.destroy',$item->id], 'style' => 'display:inline']) !!}--}}
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
                                                            <td>There are no permissions</td>
                                                        </tr>
                                                    @endforelse

                                                    <!-- pagination -->
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-center small">
                                                            {!! $permissions->render() !!}
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