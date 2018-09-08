@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h3>Edit {{$user->name}}</h3>
@stop

@section('content')
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
            	{!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}
            	   <div class="form-group">
                        {!! Form::label('name', 'Name: *') !!}
                        {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control slag-name')) !!}
                        @if ($errors->has('name'))
                          {!! $errors->first('name', '<small class=error>:message</small>') !!}
                      @endif
                    </div>

                  	<div class="form-group">
                        {!! Form::label('email', 'Email: *') !!}
                        {!! Form::text('email', null, array('placeholder' => 'email', 'class' => 'form-control')) !!}
                        @if ($errors->has('email'))
                            {!! $errors->first('email', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

              		<div class="form-group">
                        {!! Form::label('password', 'Password: *') !!}
                        {!! Form::password('password', array('class' => 'form-control','placeholder' => 'password')) !!}
                        @if ($errors->has('password'))
                            {!! $errors->first('password', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirm', 'Confirm Password: *') !!}
                        {{ Form::password('password_confirm', ['name' => 'password_confirm', 'class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('roles', 'Role:') !!}
                        {!! Form::select('roles[]', $roles, $userRole, ['data-placeholder' => 'Select Roles', 'class' => 'form-control select2','multiple']) !!}
                        @if ($errors->has('roles'))
                            {!! $errors->first('roles', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                       {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
                       {!! Form::reset('Clear Changes', array('class' => 'btn btn-primary')) !!}
                       <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
            	{!! Form::close() !!}
            </div>
        </div>
    </div>
@stop


