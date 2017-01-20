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
                    Permissions
                    <small>panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                    <li class="active">Permissions</li>
                </ol>
            </section>
            <section class="content">
                <div>


                    <div class="row">
                        <div class="col-md-12">

                            <div>
                                <!-- Table Page -->
                                <div class="page-tables">
                                    <!-- Table -->
                                    <div class="container">
                                        @include(config('watchtower.views.layouts.flash'))


                                    </div>

                         
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


            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>


@endsection