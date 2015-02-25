@extends('admin.layout')

@section('title')
	Saptec | Crear Permiso
@stop

@section('content')

    <div class="page-header">
        <h1>Crear Permiso</h1>
    </div>

    @if(Session::has('notice'))
       <p><strong> {{ Session::get('notice') }} </strong></p>
    @endif

	@if($errors->has())
		<div class="alert-box alert">           
		<!--recorremos los errores en un loop y los mostramos-->
			@foreach ($errors->all('<p>:message</p>') as $message)
			{{ $message }}
			@endforeach
		</div>
	@endif
	
	<div class="content_form">
	    {{ Form::open(array(
			'action' => 'Admin_PermisosController@store',
			'role' => 'form',
		)) }}

		<div class="form-group">
			<div class="lb_form">{{ Form::label('descripcion', 'Descripción:') }}</div>
			<div class="field_form">{{ Form::text('descripcion', Input::old('descripcion'), array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('controller', 'Controller:') }}</div>
			<div class="field_form">{{ Form::text('controller', Input::old('controller'), array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('action', 'Action:') }}</div>
			<div class="field_form">{{ Form::text('action', Input::old('action'), array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<input type="submit" value="Crear" class="btn btn-success" />
        	<a href="{{ action('Admin_PermisosController@index') }}" class="btn btn-danger">Cancelar</a>
		</div>
		
		{{ Form::close() }}
	</div>
    
@stop