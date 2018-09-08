@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
	@ability('admin,staff', 'full-control',['client-list','client-create','client-edit'])
		<passport-clients></passport-clients>
	@endability

	<passport-authorized-clients></passport-authorized-clients>
	<passport-personal-access-tokens></passport-personal-access-tokens>
@stop