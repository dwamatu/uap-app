<script src="{{ URL::asset('js/jquery.min.js') }}"></script> <!-- jQuery -->
<script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script> <!-- jQuery -->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script> <!-- Bootstrap -->
<script src="{{ URL::asset('js/datatables.min.js') }}"></script>
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src=" https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
{{--@unless ( ! Auth::check() )--}}

<script src="{{ URL::asset('js/custom.js') }}"></script> <!-- Custom codes -->

@stack('scripts')
{{--

@endunless--}}
