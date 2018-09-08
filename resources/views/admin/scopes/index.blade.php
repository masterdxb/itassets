@extends('adminlte::page')

@section('title', 'Scopes')

@section('content_header')
    <h3>Scopes</h3>
@stop

@section('content')
	
	<div class="box-header with-border">
        <div class="pull-right">
        	{{-- @permission('role-create') --}}
            <a class="btn btn-success" href="{{ route('admin.scopes.create') }}"> Create New Scope</a>
            {{-- @endpermission --}}
        </div>
	</div>
	
	<table class="table table-bordered table-hover display showsorting" id="table_grid" cellspacing="0">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Slug</th>
			<th>Status</th>
			<th width="166px" class="nosortingbg">Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($scopes as $key => $scope)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $scope->name }}</td>
			<td>{{ $scope->slug }}</td>
			<td>{{ $scope->status }}</td>
			<td>
				<a href="{{ route('admin.scopes.show', $scope->id) }}" class="icon" title="Details"><span class="glyphicon glyphicon-file btn-lg" aria-hidden="true"></span></a>
				{{-- @permission('full-control') --}}
				<a href="{{ route('admin.scopes.edit',$scope->id) }}" class="" title="Edit"><span class="glyphicon glyphicon-edit btn-lg" aria-hidden="true"></span></a>
	        	{!! Form::open(['method' => 'DELETE', 'route' => ['admin.scopes.destroy', $scope->id], 'id' => 'form-delete-scope-' . $scope->id, 'class' => 'delete-form']) !!}
				    <a href="" class="data-delete remove" data-form="scope-{{ $scope->id }}"><i class="glyphicon glyphicon-remove btn-lg"></i></a>
				{!! Form::close() !!}
	        	{{-- @endpermission --}}
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! $scopes->render() !!}

@stop