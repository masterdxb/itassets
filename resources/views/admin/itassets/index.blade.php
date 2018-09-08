@extends('adminlte::page')

@section('title', 'ITAssets')

@section('content_header')
    <h3>ITAssets</h3>
@stop

@section('content')
	
	<div class="box-header with-border">
        <div class="pull-right">
        	{{-- @permission('role-create') --}}
            <a class="btn btn-success" href="{{ route('admin.itassets.create') }}"> Create New ITAsset</a>
            {{-- @endpermission --}}
        </div>
	</div>
	
	<table class="table table-bordered table-hover display showsorting" id="table_grid" cellspacing="0">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Type</th>
			<th>Owner</th>
			<th>Purchase Date</th>
			<th>Status</th>
			<th width="166px" class="nosortingbg">Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($itassets as $key => $itasset)
		<tr>
			<td>{{ ++$i }}</td>
			<td>{{ $itasset->name }}</td>
			<td>{{ $itasset->type }}</td>
			<td>{{ $itasset->user->name }}</td>
			<td>{{ $itasset->purchase_date }}</td>
			<td>{{ $itasset->status }}</td>
			<td>
				<a href="{{ route('admin.itassets.show', $itasset->id) }}" class="icon" title="Details"><span class="glyphicon glyphicon-file btn-lg" aria-hidden="true"></span></a>
				{{-- @permission('full-control') --}}
				<a href="{{ route('admin.itassets.edit',$itasset->id) }}" class="" title="Edit"><span class="glyphicon glyphicon-edit btn-lg" aria-hidden="true"></span></a>
	        	{!! Form::open(['method' => 'DELETE', 'route' => ['admin.itassets.destroy', $itasset->id], 'id' => 'form-delete-itasset-' . $itasset->id, 'class' => 'delete-form']) !!}
				    <a href="" class="data-delete remove" data-form="itasset-{{ $itasset->id }}"><i class="glyphicon glyphicon-remove btn-lg"></i></a>
				{!! Form::close() !!}
	        	{{-- @endpermission --}}
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! $itassets->render() !!}

@stop