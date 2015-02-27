@extends('admin.layout')

@section('title')
	Saptec | Crear Rol
@stop

@section('content')

    <div class="page-header">
        <h1>Crear Rol</h1>
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
			'action' => 'Admin_RolesController@store',
			'role' => 'form',
		)) }}

		<div class="form-group">
			<div class="lb_form">{{ Form::label('nombre', 'Nombre:') }}</div>
			<div class="field_form">{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('descripcion', 'Descripción:') }}</div>
			<div class="field_form">{{ Form::text('descripcion', Input::old('descripcion'), array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<input type="submit" value="Crear" class="btn btn-success" />
        	<a href="{{ action('Admin_RolesController@index') }}" class="btn btn-danger">Cancelar</a>
		</div>
		
		{{ Form::close() }}
	</div>
    
@stop