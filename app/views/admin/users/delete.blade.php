@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h1 class="center">¿Esta seguro que desea eliminar al usuario {{ $user->nombres }} {{ $user->apellidos }} ?</h1>
    </div>
    <div class="content_form">
	    {{ Form::open(array(
			'action' => 'Admin_UsersController@destroy',
			'role' => 'form',
		)) }}

	        <input type="hidden" name="user" value="{{ $user->id }}" />
	        {{ Form::hidden('_method', 'DELETE') }}
	        <input type="submit" class="btn btn-danger" value="Si" />
	        <a href="{{ action('Admin_UsersController@index') }}" class="btn btn-default">No</a>

	    {{ Form::close() }}
	</div>
@stop