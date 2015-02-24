@extends('../layout')

@section('title')
	Saptec | Editar Usuario
@stop

@section('content')
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif

    <div class="page-header">
        <h1>Editar Usuario</h1>
    </div>
	
	<div class="content_form">
	    {{ Form::open(array(
			'action' => array('Admin_UsersController@update', $user->id),
			'role' => 'form',
		)) }}

		{{ Form::hidden('_method', 'PUT') }}

		<div class="form-group">
			<div class="lb_form">{{ Form::label('nombres', 'Nombre(s):') }}</div>
			<div class="field_form">{{ Form::text('nombres', $user->nombres, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('apellidos', 'Apellido(s):') }}</div>
			<div class="field_form">{{ Form::text('apellidos', $user->apellidos, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('usuario', 'Usuario:') }}</div>
			<div class="field_form">{{ Form::text('usuario', $user->usuario, array('class' => 'form-control', 'placeholder' => 'Ingrese el usuario')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('email', 'Email:') }}</div>
			<div class="field_form">{{ Form::email('email', $user->email, array('class' => 'form-control', 'placeholder' => 'Ingrese el email')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('password', 'Contraseña:') }}</div>
			<div class="field_form">{{ Form::password('password', null, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('estado', 'Activo:') }}</div>
			<div class="field_form">
				<div class="content_radio">Si &nbsp;{{ Form::radio('estado', '1', ($user->estado == '1') ? true : '' ) }}</div>
				<div class="content_radio">No &nbsp;{{ Form::radio('estado', '0', ($user->estado == '0') ? true : '' ) }}</div>
			</div>
		</div>
		<div class="form-group">
			<div class="lb_form">{{ Form::label('role', 'Rol:') }}</div>
			<div class="field_form">{{ Form::select('role', $roles, $user->role_id, array('class' => 'form-control')) }}</div>
		</div>
		<div class="form-group">
			<input type="submit" value="Guardar" class="btn btn-primary" />
        	<a href="{{ action('Admin_UsersController@index') }}" class="btn btn-danger">Cancelar</a>
		</div>
		
		{{ Form::close() }}
	</div>
@stop