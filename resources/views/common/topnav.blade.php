<header>
	<!-- Navigation -->
	<nav class="navbar navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<div class="logo" >
						<a href="/">
							{{--<img src="{{ URL::asset('img/logo.png') }}" height="20" style="display:inline" alt="UAP Africa">--}}
						</a>
					</div>
				</div>
				<div class="col-md-2
				 col-md-offset-3">
					<div class="app-title">UAP Old Mutual </div>
				</div>
				@if( Auth::check())
				<div class="col-md-3 col-md-offset-2">
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown pull-right">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"> <i class="fa fa-user"> {{Auth::user()->firstname." ".Auth::user()->secondname}}</i> <b class="caret"></b></a> <!-- Dropdown menu -->
							<ul class="dropdown-menu">
								<li><a href="{{ url('logout' ) }}"><i class="fa fa-sign-out"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
				@endif
			</div>
		</div>
	</nav>
</header>
