@extends('adminlte::page')

@section('title', 'Permission')

@section('content_header')
    <h3>Permission</h3>
@stop

@section('content')
	
	<div class="box-header with-border">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.permissions.index') }}"> Back</a>
        </div>
	</div>

	<div class="box">
		<div class="box-body">
			<table class="table table-bordered table-hover" id="">
				<tr>
					<td><strong>Name:</strong></td>
					<td>{{ $permission->name }}</td>
				</tr>
				<tr>
					<td><strong>Display Name:</strong></td>
					<td>{{ $permission->display_name }}</td>
				</tr>
				<tr>
					<td><strong>Description:</strong></td>
					<td>{{ $permission->description }}</td>
				</tr>
			</table>
		</div>
	</div>

@stop