@extends('adminlte::page')

@section('title', 'Scope Details')

@section('content_header')
    <h3>Scope Details</h3>
@stop

@section('content')
	
	<div class="box-header with-border">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.scopes.index') }}"> Back</a>
        </div>
	</div>

	<div class="box">
		<div class="box-body">
			<table class="table table-bordered table-hover" id="">
				<tr>
					<td><strong>Name:</strong></td>
					<td>{{ $scope->name }}</td>
				</tr>
				<tr>
					<td><strong>Slug:</strong></td>
					<td>{{ $scope->slug }}</td>
				</tr>
				<tr>
					<td><strong>Description:</strong></td>
					<td>{{ $scope->description}}</td>
				</tr>
				<tr>
					<td><strong>Status:</strong></td>
					<td>{{ $scope->status }}</td>
				</tr>
			</table>
		</div>
	</div>

@stop