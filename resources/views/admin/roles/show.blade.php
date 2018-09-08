@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
    <h3>Role</h3>
@stop

@section('content')
	
	<div class="box-header with-border">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
        </div>
	</div>

	<div class="box">
		<div class="box-body">
			<table class="table table-bordered table-hover" id="">
				<tr>
					<td><strong>Name:</strong></td>
					<td>{{ $role->name }}</td>
				</tr>
				<tr>
					<td><strong>Display Name:</strong></td>
					<td>{{ $role->display_name }}</td>
				</tr>
				<tr>
					<td><strong>Description:</strong></td>
					<td>{{ $role->description }}</td>
				</tr>
				<tr>
					<td><strong>Permissions:</strong></td>
					<td>
						@if(!empty($rolePermissions))
							@foreach($rolePermissions as $v)
								<label class="label label-success">{{ $v->display_name }}</label>
							@endforeach
						@endif
					</td>
				</tr>

			</table>
		</div>
	</div>

@stop