<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>UAP  | Portal </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link  href="{{URL::asset('/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{url::asset('css/font-awesome.min.css')}}">	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{url::asset('css/AdminLTE.min.css')}}">

	<link rel="stylesheet" href="{{url::asset('')}}">

	<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{url::asset('/css/skins/_all-skins.min.css')}}">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>

	<script src="{{url::to('/js/html5shiv.js')}}"></script>
	<script src="{{url::to('/js/respond.min.js')}}"></script>
	<![endif]-->

	@stack('styles')
</head>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<script src="{{url::to('/js/jquery-2.2.3.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{url::to('/js/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url::to('bootstrap/js/bootstrap.min.js')}}"></script>


<body class="login-page">

{{--@unless ( ! Auth::check() )--}}

	@include('common.topnav')

	<div id="content">

		@yield('content')</div>

{{--@endunless--}}


@yield('login-content')

{{--@include('common.footer') --}}

</body>
</html>