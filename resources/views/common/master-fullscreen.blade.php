<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<!-- Title and other stuffs -->
	<title>Acre Africa Pricing Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- X-CSRF-TOKEN -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Stylesheets -->
	<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Roboto Font -->
	<link rel="stylesheet" href="{{ URL::asset('fonts/Roboto/roboto.css') }}">

	<!-- Font awesome icon -->
	<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">

	@unless ( ! Auth::check() )
	<!-- jQuery UI -->
	<link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css') }}">
	<!-- Calendar -->
	<link rel="stylesheet" href="{{ URL::asset('css/fullcalendar.css') }}">
	<!-- prettyPhoto -->
	<link rel="stylesheet" href="{{ URL::asset('css/prettyPhoto.css') }}">
	<!-- Star rating -->
	<link rel="stylesheet" href="{{ URL::asset('css/rateit.css') }}">
	<!-- Date picker -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}">
	<!-- CLEditor -->
	<link rel="stylesheet" href="{{ URL::asset('css/jquery.cleditor.css') }}">
	<!-- Bootstrap toggle -->
	<link rel="stylesheet" href="{{ URL::asset('css/jquery.onoff.css') }}">
	<!-- Widgets stylesheet -->
	<link href="{{ URL::asset('css/widgets.css') }}" rel="stylesheet">

	<script src="{{ URL::asset('js/respond.min.js') }}"></script>

	@endunless

	<!-- Main stylesheet -->
	<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="{{ URL::asset('js/html5shiv.js') }}"></script>
	<![endif]-->

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ URL::asset('img/favicon/favicon.ico') }}">

	@stack('styles')

</head>

<body>

	@unless ( ! Auth::check() )

	@include('common.topnav')

	<div id="content">@yield('content')</div>

	@endunless

	@yield('login-content')

	@include('common.footer')

</body>
</html>
