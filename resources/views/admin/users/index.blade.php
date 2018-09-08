
@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h3>All Users</h3>
@stop

@section('content')

	@ability('admin', 'full-control')
	<div class="box-header with-border">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Create New User</a>
        </div>
	</div>
	@endability
	
	<table class="table table-bordered table-hover display showsorting" id="table_grid" cellspacing="0">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th width="166px" class="nosortingbg">Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($users as $key => $user)
		<tr>
			<td>{{ $user->id+1 }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>
				@ability('admin,staff', 'full-control,user-list')
				<a href="{{ route('admin.users.show', $user->id) }}" class="icon" title="Details"><span class="glyphicon glyphicon-file btn-lg" aria-hidden="true"></span></a>
				@endability
				@ability('admin', 'full-control')
				<a href="{{ route('admin.users.edit',$user->id) }}" class="" title="Edit"><span class="glyphicon glyphicon-edit btn-lg" aria-hidden="true"></span></a>
	        	{!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user->id], 'id' => 'form-delete-users-' . $user->id, 'class' => 'delete-form']) !!}
				    <a href="" class="data-delete remove" data-form="users-{{ $user->id }}"><i class="glyphicon glyphicon-remove btn-lg"></i></a>
				{!! Form::close() !!}
	        	@endability
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
@stop