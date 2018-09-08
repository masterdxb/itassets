@extends('adminlte::page')

@section('css')
    <link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/datepicker.css') }}" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.css">
@stop

@section('js')
    {{-- <script src="{{ URL::asset('site/js/moment.js') }}"></script>
    <script src="{{ URL::asset('site/js/daterangepicker.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('vendor/adminlte/dist/js/adminlte.js') }}"></script> --}}
    <script type="text/javascript" src="http://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.js"></script>
    {{-- <script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.16/filtering/row-based/range_dates.js"></script> --}}
    <script src="{{ URL::asset('js/admin/site.js') }}"></script>
    <script src="{{ URL::asset('js/admin/datepicker.js') }}"></script>
    @yield('customscripts')
@stop
