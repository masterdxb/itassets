@extends('adminlte::page')

@section('title', 'Edit ITAsset')

@section('content_header')
    <h3>Edit {{$itasset->name}}</h3>
@stop

@section('content')
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
            	{!! Form::model($itasset, ['method' => 'PATCH','route' => ['admin.itassets.update', $itasset->id]]) !!}
            	   <div class="form-group">
                        {!! Form::label('name', 'Name: *') !!}
                        {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control slag-name')) !!}
                        @if ($errors->has('name'))
                            {!! $errors->first('name', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                         {!! Form::textarea('description', null, ['size' => '30x5', 'class' => 'form-control']) !!}
                        @if ($errors->has('description'))
                          {!! $errors->first('description', '<small class=error>:message</small>') !!}
                        @endif                
                    </div>

                    <div class="form-group">
                        {!! Form::label('type', 'Owner:') !!}
                        {!! Form::select('type', $types, null, array('class' => 'form-control select2')) !!}
                        @if ($errors->has('type'))
                            {!! $errors->first('type', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('owner_id', 'Owner:') !!}
                        {!! Form::select('owner_id', $users, null, array('class' => 'form-control select2')) !!}
                        @if ($errors->has('owner_id'))
                            {!! $errors->first('owner_id', '<small class=error>:message</small>') !!}
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('purchase_date', 'Purchase Date: *') !!}
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            {!! Form::text('purchase_date', null, array('placeholder' => 'Purchase Date', 'class' => 'form-control', 'id' => 'datepicker', 'readonly' => true)) !!}
                        </div>
                        @if ($errors->has('purchase_date'))
                            {!! $errors->first('purchase_date', '<small class=error>:message</small>') !!}
                        @endif
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('status', 'Status: *') !!}
                        <label class="radio-inline">{{ Form::radio('status', 'available', true, ['class' => 'minimal']) }} Available</label>
                        <label class="radio-inline">{{ Form::radio('status', 'in-use', null, ['class' => 'minimal']) }} In Use</label>
                        <label class="radio-inline">{{ Form::radio('status', 'out-of-stock', null, ['class' => 'minimal']) }} Out of Stock</label>
                        <label class="radio-inline">{{ Form::radio('status', 'in-active', null, ['class' => 'minimal']) }} In-Active</label>
                        @if ($errors->has('status'))
                            {!! $errors->first('status', '<small class=error>:message</small>') !!}
                        @endif
                    </div>
                    <div class="form-group">
                       {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
                       {!! Form::reset('Clear Changes', array('class' => 'btn btn-primary')) !!}
                       <a href="{{ route('admin.itassets.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
            	{!! Form::close() !!}
            </div>
        </div>
    </div>

@stop