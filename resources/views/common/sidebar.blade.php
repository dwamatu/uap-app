<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="/farmers"><i class="fa fa-users"></i><span>Farmers</span></a></li>


            <li class="treeview {!! Route::is('claims.confirmed') ||  Route::is('claims.reported') ?'active' :null !!}">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Loss Assessment</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li{!! Route::is('claims.reported') ? 'class=current' :null !!}><a href="/reported/claims"><i
                                    class="fa fa-star-half-empty"></i>Reported Claim</a></li>
                    <li {!! Route::is('claims.confirmed') ? 'class=current' :null !!}><a href="/confirmed/claims"><i
                                    class="fa fa-anchor"></i>Confirmed Claims</a></li>

                </ul>
            </li>
            <li>
                <a href="/loss/report"><i class="fa fa-calculator"></i><span>Reports</span></a>
            </li>
            <li class="treeview {!! Route::is('watchtower.user.index') || Route::is('watchtower.user.create')|| Route::is('view_inspector_details') || Route::is('inspector.create') || Route::is('inspectors')  || Route::is('watchtower.user.edit')  ||
            Route::is('watchtower.role.index') || Route::is('watchtower.partials.create') || Route::is('watchtower.user.update') || Route::is('watchtower.role.permission.edit')|| Route::is('watchtower.user.destroy')|| Route::is('watchtower.user.role.edit')|| Route::is('watchtower.user.show')|| Route::is('watchtower.user.edit') ||Route::is('watchtower.role.matrix') || Route::is('watchtower.partials.edit') ||   Route::is('watchtower.permission.index') ? 'active' :null !!} ">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Administration</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url::route('inspectors')}}"><i class="fa fa-user-md"></i>Inspectors</a></li>
                    <li><a href="{{url::route('watchtower.user.index')}}"><i class="fa fa-users"></i>Users</a></li>
                    <li><a href="{{url::route('watchtower.role.index')}}"><i class="fa fa-dashcube"></i>Roles</a></li>
                    <li><a href="{{url::route('watchtower.permission.index')}}"><i class="fa fa-key"></i>Permissions</a>
                    </li>

                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>