<!-- Sidebar starts -->
<div class="sidebar">
    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav">
        <li>
            <a href="/dashboard"><i class="fa fa-home"></i>Dashboard</a>
        </li>
        <li>
            <a href="/farmers"><i class="fa fa-th-list"></i>Farmers</a>
        </li>
        {{--	<li >
                <a href="/farms"><i class="fa fa-th-list"></i>Farms</a>
            </li>
            <li >
                <a href="/status"><i class="fa fa-h-square"></i>Status</a>
            </li>
            <li >
                <a href="/loss"><i class="fa fa-anchor"></i>Loss</a>
            </li>--}}

        <li class="has_sub {!! Route::is('claims.confirmed') ||  Route::is('claims.reported') ?'open' :null !!}">
            <a href=""><i class="fa fa-thumb-tack"></i> Loss Assessment <span class="pull-right"> <i
                            class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li {!! Route::is('claims.reported') ? 'class=current' :null !!}><a href="/reported/claims"><i
                                class="fa fa-anchor"></i>Reported Claims</a></li>
                <li {!! Route::is('claims.confirmed') ? 'class=current' :null !!}><a href="/confirmed/claims"><i
                                class="fa fa-anchor"></i>Confirmed Claims</a></li>
            </ul>
        </li>
        <li>

        </li>
        <li>
            <a href="/loss/report"><i class="fa fa-calculator"></i>Reports</a>
        </li>
        {{--<li >--}}
        {{--<a href="/home"><i class="fa fa-anchor"></i>Home</a>--}}
        {{--</li>--}}
        {{--<li >--}}
        {{--<a href="/loss/type"><i class="fa fa-anchor"></i>Type of Loss</a>--}}
        {{--</li>--}}
        <li class="has_sub {!! Route::is('watchtower.user.index') || Route::is('watchtower.user.create')|| Route::is('view_inspector_details') || Route::is('inspector.create') || Route::is('inspectors')  ? 'open' : null !!}  || Route::is('watchtower.user.edit')  ? 'open' : null !!} ||
			{!! Route::is('watchtower.role.index') || Route::is('watchtower.partials.create') || Route::is('watchtower.partials.edit')  ? 'open' : null !!} ||
			{!! Route::is('watchtower.permission.index') || Route::is('watchtower.partials.create') || Route::is('watchtower.partials.edit')  ? 'open' : null !!} ||
			{!! Route::is('get.loss.types') ? 'open' :null !!} ">
            <a href="#"><i class="fa fa-file-o"></i> Administration <span class="pull-right"><i
                            class="fa fa-chevron-right"></i></span></a>
            <ul>
                <li {!! Route::is('inspectors') || Route::is('view_inspector_details')|| Route::is('inspector.create')   ? 'class="current"' : null !!}>
                    <a href="{{url::route('inspectors')}}">Crop Inspectors</a></li>
                <li {!! Route::is('watchtower.user.index') || Route::is('watchtower.user.create') || Route::is('watchtower.user.edit')  ? 'class="current"' : null !!} >
                    <a href="{{url::route('watchtower.user.index')}}">Users</a></li>
                <li {!! Route::is('watchtower.role.index') || Route::is('watchtower.partials.create') || Route::is('watchtower.partials.edit')  ? 'class="current"' : null !!}>
                    <a href="{{url::route('watchtower.role.index')}}">Roles</a></li>
                <li {!! Route::is('watchtower.permission.index') || Route::is('watchtower.partials.create') || Route::is('watchtower.partials.edit')  ? 'class="current"' : null !!}>
                    <a href="{{url::route('watchtower.permission.index')}}">Permissions</a></li>
                {{--<li {!! Route::is('get.loss.types') ?  'class="current"' :null !!} ><a href="{{url::route('get.loss.types') }}"></i>Type of Loss</a></li>--}}


            </ul>
        </li>

    </ul>

    <div id="sidebar-copy-content">
        <div class="copy-content">
            <p class="rights">© 2016 UAP Old Mutual Africa</p>
            <p class="partner">Powered by Netcen Group.</p>
        </div>
    </div>
</div>
<!-- Sidebar ends -->
