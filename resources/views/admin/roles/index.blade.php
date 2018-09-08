@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h3>Roles</h3>
@stop

@section('content')
	
	<div class="box-header with-border">
        <div class="pull-right">
        	{{-- @permission('role-create') --}}
            <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> Create New Role</a>
            {{-- @endpermission --}}
        </div>
	</div>
	
	<table class="table table-bordered table-hover display showsorting" id="table_grid" cellspacing="0">
	<thead>
		<tr>
			<th>No</th>
			<th>Display Name</th>
			<th>Description</th>
			<th width="166px">Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($roles as $key => $role)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $role->display_name }}</td>
			<td>{{ $role->description }}</td>
			<td>
				@ability('admin,staff', 'full-control,role-list')
	        		<a href="{{ route('admin.roles.show', $role->id) }}" class="icon" title="Details"><span class="glyphicon glyphicon-file btn-lg" aria-hidden="true"></span></a>
	        	@endability
				{{-- @permission('full-control') --}}
				@ability('admin', 'full-control')
				<a href="{{ route('admin.roles.edit',$role->id) }}" class="" title="Edit"><span class="glyphicon glyphicon-edit btn-lg" aria-hidden="true"></span></a>
	        	{!! Form::open(['method' => 'DELETE', 'route' => ['admin.roles.destroy', $role->id], 'id' => 'form-delete-roles-' . $role->id, 'class' => 'delete-form']) !!}
				    <a href="" class="data-delete remove" data-form="roles-{{ $role->id }}"><i class="glyphicon glyphicon-remove btn-lg"></i></a>
				{!! Form::close() !!}
				@endability
	        	{{-- @endpermission --}}
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! $roles->render() !!}

@stop