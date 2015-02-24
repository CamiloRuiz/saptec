@extends('../layout')

@section('title')
	Saptec | Crear Usuario
@stop

@section('content')
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif

    <div class="page-header">
        <h1>Crear Usuario</h1>
    </div>
	
	<div class="content_form">
	    {{ Form::open(array(
			'action' => 'Admin_UsersController@store',
			'role' => 'form',
		)) }}

		<div class="form-group">
			<div class="lb_form">{{ Form::label('nombres', 'Nombre(s):') }}</div>
			<div class="field_form">{{ Form::text('nombres', null, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('apellidos', 'Apellido(s):') }}</div>
			<div class="field_form">{{ Form::text('apellidos', null, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('usuario', 'Usuario:') }}</div>
			<div class="field_form">{{ Form::text('usuario', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el usuario')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('email', 'Email:') }}</div>
			<div class="field_form">{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el email')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('password', 'Contraseña:') }}</div>
			<div class="field_form">{{ Form::password('password', null, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('estado', 'Activo:') }}</div>
			<div class="field_form">
				<div class="content_radio">Si &nbsp;{{ Form::radio('estado', '1', true) }}</div>
				<div class="content_radio">No &nbsp;{{ Form::radio('estado', '0') }}</div>
			</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('role', 'Rol:') }}</div>
			<div class="field_form">{{ Form::select('role', $roles, null, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<input type="submit" value="Crear" class="btn btn-success" />
        	<a href="{{ action('Admin_UsersController@index') }}" class="btn btn-danger">Cancelar</a>
		</div>
		
		{{ Form::close() }}
	</div>
    
@stop