@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h3>Roles</h3>
@stop

@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-body">
            	{!! Form::model($role, ['method' => 'PATCH','route' => ['admin.roles.update', $role->id]]) !!}
            	   <div class="form-group">
                        {!! Form::label('display_name', 'Display Name: *') !!}
                        {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control slag-name')) !!}
                        @if ($errors->has('display_name'))
                            {!! $errors->first('display_name', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Name: *') !!}
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control slug-role')) !!}
                        @if ($errors->has('name'))
                            {!! $errors->first('name', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description: *') !!}
                        {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                        @if ($errors->has('description'))
                            {!! $errors->first('description', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('permissions', 'Permission: *') !!}
                        {!! Form::select('permissions[]', $permissions, $rolePermissions, ['data-placeholder' => 'Select Permissions', 'class' => 'form-control select2','multiple']) !!}
                        @if ($errors->has('permissions'))
                            {!! $errors->first('permissions', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                       {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
                       {!! Form::reset('Clear Changes', array('class' => 'btn btn-primary')) !!}
                       <a href="{{ route('admin.roles.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
	           {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop