
@extends('adminlte::page')

@section('title', 'Permissions')

@section('content_header')
    <h3>Permissions</h3>
@stop

@section('content')
	
	<div class="box-header with-border">
        <div class="pull-right">
        	{{-- @permission('permission-create') --}}
            <a class="btn btn-success" href="{{ route('admin.permissions.create') }}"> Create New Permission</a>
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
	@foreach ($permissions as $key => $permission)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $permission->display_name }}</td>
			<td>{{ $permission->description }}</td>
			<td>
				{{-- @permission('full-control') --}}
				@ability('admin,staff', 'full-control,list-permission')
	        		<a href="{{ route('admin.permissions.show', $permission->id) }}" class="icon" title="Details"><span class="glyphicon glyphicon-file btn-lg" aria-hidden="true"></span></a>
	        	@endability
	        	@ability('admin', 'full-control')
					<a href="{{ route('admin.permissions.edit',$permission->id) }}" class="" title="Edit"><span class="glyphicon glyphicon-edit btn-lg" aria-hidden="true"></span></a>
	        		{!! Form::open(['method' => 'DELETE', 'route' => ['admin.permissions.destroy', $permission->id], 'id' => 'form-delete-roles-' . $permission->id, 'class' => 'delete-form']) !!}
				    <a href="" class="data-delete remove" data-form="roles-{{ $permission->id }}"><i class="glyphicon glyphicon-remove btn-lg"></i></a>
				@endability
				{!! Form::close() !!}
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! $permissions->render() !!}

@stop