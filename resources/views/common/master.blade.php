<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<!-- Title and other stuffs -->
	<title>UAP Africa Portal</title>
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
	<link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.css')}}">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

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
		<link rel="stylesheet" href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}">
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

	<script src="//code.jquery.com/jquery-1.12.3.js"></script>
	{{--custom Javascript--}}
	<script src="{{ URL::asset('js/custom.js') }}"></script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ URL::asset('img/favicon/favicon.ico') }}">

	@stack('styles')

</head>

<body>

	@unless(! Auth::check())

	@include('common.topnav')

	<div id="content"> @include('common.sidebar') @yield('content')</div>

	@endunless

	@yield('login-content')

	@include('common.footer')


	<script src="{{URL::to('js/jquery.dataTables.min.js')}}"></script>
	<!-- Latest compiled and minified JavaScript -->
	{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.0/js/bootstrap-select.min.js"></script>--}}
	{{--<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>--}}
	{{--<script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>--}}
	{{--<script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>--}}
	{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>--}}
	{{--<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>--}}
	{{--<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>--}}
	{{--<script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>--}}
	<script src="{{URL::to('js/dataTables.js')}}"></script>
</body>
</html>
