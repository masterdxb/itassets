@extends('adminlte::page')

@section('title', 'Asset Details')

@section('content_header')
    <h3>Asset Details</h3>
@stop

@section('content')
	
	<div class="box-header with-border">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.itassets.index') }}"> Back</a>
        </div>
	</div>

	<div class="box">
		<div class="box-body">
			<table class="table table-bordered table-hover" id="">
				<tr>
					<td><strong>Name:</strong></td>
					<td>{{ $itasset->name }}</td>
				</tr>
				<tr>
					<td><strong>Description:</strong></td>
					<td>{{ $itasset->description }}</td>
				</tr>
				<tr>
					<td><strong>Type:</strong></td>
					<td>{{ $itasset->type}}</td>
				</tr>
				<tr>
					<td><strong>Owner:</strong></td>
					<td>{{ $itasset->user->name }}</td>
				</tr>
				<tr>
					<td><strong>Purchase Date:</strong></td>
					<td>{{ $itasset->purchase_date }}</td>
				</tr>
				<tr>
					<td><strong>Status:</strong></td>
					<td>{{ $itasset->status }}</td>
				</tr>
			</table>
		</div>
	</div>

@stop