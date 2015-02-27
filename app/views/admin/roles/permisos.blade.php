@extends('admin.layout')

@section('title')
	Saptec | Admin Permisos por Rol
@stop

@section('content')

    <div class="page-header">
        <h1>Editar Permisos del Rol {{ $role->nombre }}</h1>
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

	<div class="form-group">
        <a href="" class="btn btn-success">Marcar Todos</a>
        <a href="" class="btn btn-warning">Desmarcar Todos</a>
    </div>

    <br />
	
	<div class="content_form">
	    {{ Form::open(array(
			'action' => array('Admin_RolesController@updatePermisos', $role->id),
			'role' => 'form',
		)) }}

		@foreach ($controladores as $controlador)

		<div class="form-group">
			<div class="lb_form">{{ Form::label('controlador', ucfirst($controlador->controller) ) }}</div>
			<div class="field_form">
				@foreach ($permisos as $permiso)
					@if($controlador->controller == $permiso->controller)
					<div class="content_radio">
						{{ ucfirst($permiso->action) }} &nbsp;&nbsp;{{ Form::checkbox($permiso->controller.'@'.$permiso->action, 1) }}
					</div>
					@endif
				@endforeach
			</div>
		</div>

		@endforeach

		<br />

		<div class="form-group">
			<input type="submit" value="Guardar" class="btn btn-primary" />
        	<a href="{{ action('Admin_RolesController@index') }}" class="btn btn-danger">Cancelar</a>
		</div>
		
		{{ Form::close() }}
	</div>
@stop