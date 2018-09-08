@extends('adminlte::page')

@section('title', 'User Details')

@section('content_header')
    <h3>User Details</h3>
@stop

@section('content')
	
	<div class="box-header with-border">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.users.index') }}"> Back</a>
        </div>
	</div>

	<div class="box">
		<div class="box-body">
			<table class="table table-bordered table-hover" id="">
				<tr>
					<td><strong>Name:</strong></td>
					<td>{{ $user->name }}</td>
				</tr>
				<tr>
					<td><strong>Email:</strong></td>
					<td>{{ $user->email }}</td>
				</tr>
				<tr>
					<td><strong>Roles:</strong></td>
					<td>
						@if(!empty($user->roles))
							@foreach($user->roles as $v)
								<label class="label label-success">{{ $v->display_name }}</label>
							@endforeach
						@endif
					</td>
				</tr>
			</table>
		</div>
	</div>

@stop