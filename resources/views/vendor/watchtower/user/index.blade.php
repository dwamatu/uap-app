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
                            <div class="pull-left"><h4>Users</h4></div>
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
                                                    <h1>Users
                                                        <div class="btn-group pull-right" role="group" aria-label="...">
                                                            <a href="{{ route('watchtower.user.matrix') }}">
                                                                <button type="button" class="btn btn-default">
                                                                    <i class="fa fa-th fa-fw"></i>
                                                                    <span class="hidden-xs hidden-sm">User Matrix</span>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('watchtower.user.create') }}">
                                                                <button type="button" class="btn btn-info">
                                                                    <i class="fa fa-plus fa-fw"></i>
                                                                    <span class="hidden-xs hidden-sm">Add New User</span>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </h1>

                                                    <!-- search bar -->
                                                    @include(config('watchtower.views.layouts.search'), [ 'search_route' => 'watchtower.user.index', 'items' => $users, 'acl' => 'user' ] )

                                                    <div class="table">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>First Name</th>
                                                                <th>Second Name</th>
                                                                <th>Email</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @forelse($users as $item)
                                                                <tr>
                                                                    <td>{{ $item->id }}</td>

                                                                    <td>
                                                                        <a href="{{ route('watchtower.user.show', $item->id) }}">{{ $item->firstname }}  </a>
                                                                    </td>
                                                                    <td>
                                                                        <p>{{$item->secondname }}</p>
                                                                    </td>
<td>
                                                                        <p>{{$item->email}}</p>
                                                                    </td>

                                                                    <td>
                                                                        @if ( Shinobi::can( config('watchtower.acl.user.role', false)) )
                                                                            <a href="{{ route('watchtower.user.role.edit', $item->id) }}">
                                                                                <button type="button"
                                                                                        class="btn btn-primary btn-xs">
                                                                                    <i class="fa fa-users fa-fw"></i>
                                                                                    <span class="hidden-xs hidden-sm">Roles</span>
                                                                                </button>
                                                                            </a>
                                                                        @endif

                                                                        @if ( Shinobi::can( config('watchtower.acl.user.edit', false)) )
                                                                            <a href="{{ route('watchtower.user.edit', $item->id) }}">
                                                                                <button type="button"
                                                                                        class="btn btn-default btn-xs">
                                                                                    <i class="fa fa-pencil fa-fw"></i>
                                                                                    <span class="hidden-xs hidden-sm">Update</span>
                                                                                </button>
                                                                            </a>
                                                                        @endif


                                                                        {{--@if ( Shinobi::can( config('watchtower.acl.user.destroy', false)) )--}}
                                                                        {{--{!! Form::open(['method'=>'delete','route'=> ['watchtower.user.destroy',$item->id], 'style' => 'display:inline']) !!}--}}
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
                                                                    <td>There are no users</td>
                                                                </tr>
                                                            @endforelse

                                                            <!-- pagination -->
                                                            <tfoot>
                                                            <tr>
                                                                <td colspan="3" class="text-center small">
                                                                    {!! $users->render() !!}
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
            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



    </div>


@endsection