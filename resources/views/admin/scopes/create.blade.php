@extends('adminlte::page')

@section('title', 'Create New Scope')

@section('content_header')
    <h3>Create New Scope</h3>
@stop

@section('content')
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
            	{!! Form::open(['route' => 'admin.scopes.store']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name: *') !!}
                        {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control slag-name')) !!}
                        @if ($errors->has('name'))
                        	{!! $errors->first('name', '<small class=error>:message</small>') !!}
                    	@endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('slug', 'Slug: *') !!}
                        {!! Form::text('slug', null, array('placeholder' => 'Slug', 'class' => 'form-control slug-role', 'readonly' => true)) !!}
                        @if ($errors->has('slug'))
                            {!! $errors->first('slug', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description: *') !!}
                        {!! Form::text('description', null, array('class' => 'form-control','placeholder' => 'description')) !!}
                        @if ($errors->has('description'))
                            {!! $errors->first('description', '<small class=error>:message</small>') !!}
                        @endif
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('status', 'Status: *') !!}
                        <label class="radio-inline">{{ Form::radio('status', 'active', true, ['class' => 'minimal']) }} Active</label>
                        <label class="radio-inline">{{ Form::radio('status', 'in-active', null, ['class' => 'minimal']) }} In-Active</label>
                        @if ($errors->has('status'))
                            {!! $errors->first('status', '<small class=error>:message</small>') !!}
                        @endif
                    </div>
                    <div class="form-group">
        			   {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
                       {!! Form::reset('Clear Changes', array('class' => 'btn btn-primary')) !!}
                       <a href="{{ route('admin.scopes.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
            	</div>
            	{!! Form::close() !!}
            </div>
        </div>
    </div>

@stop