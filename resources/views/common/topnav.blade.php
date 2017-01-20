<div class="top">

</div>
<div class="top2">
{{--<div >--}}
		{{--<span class="logosu"><img src="{{url::asset('img/uap/uap.png')}}" alt="Uap logo"></span>--}}
		{{--<span class="logoso"><img src="{{url::asset('img/uap/old.png')}}" alt="Old mutual logo"></span>--}}
{{--</div>--}}



</div>
<header class="main-header top3" id="topnavbar" >
@if( Auth::check())
	<!-- Logo -->
	<a href="/" class="logo" style="padding-top: 10px;">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>u</b>PT</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>UAP OLM</b> Portal</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">

		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">

					<li class="dropdown " style="padding-top: 20px">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true"> <i
									class="fa fa-user"> {{Auth::user()->email}}</i> <b class="caret"></b></a>
						<!-- Dropdown menu -->
						<ul class="dropdown-menu">
							<li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>



	</nav>
	@endif
</header>
