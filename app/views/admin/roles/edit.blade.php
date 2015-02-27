@extends('admin.layout')

@section('title')
	Saptec | Editar Rol
@stop

@section('content')

    <div class="page-header">
        <h1>Editar Rol</h1>
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
			'action' => array('Admin_RolesController@update', $role->id),
			'role' => 'form',
		)) }}

		{{ Form::hidden('_method', 'PUT') }}

		<div class="form-group">
			<div class="lb_form">{{ Form::label('nombre', 'Nombre:') }}</div>
			<div class="field_form">{{ Form::text('nombre', Input::old('nombre') ? Input::old('nombre') : $role->nombre, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('descripcion', 'Descripción:') }}</div>
			<div class="field_form">{{ Form::text('descripcion', Input::old('descripcion') ? Input::old('descripcion') : $role->descripcion, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<input type="submit" value="Guardar" class="btn btn-primary" />
        	<a href="{{ action('Admin_RolesController@index') }}" class="btn btn-danger">Cancelar</a>
		</div>
		
		{{ Form::close() }}
	</div>
@stop