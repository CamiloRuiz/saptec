@extends('admin.layout')

@section('title')
	Saptec | Eliminar Permiso
@stop

@section('content')
    <div class="page-header">
        <h1 class="center">¿Esta seguro que desea eliminar el permiso {{ $permiso->descripcion }}?</h1>
    </div>
    <div class="content_form">
	    {{ Form::open(array(
			'action' => array('Admin_PermisosController@destroy', $permiso->id),
			'role' => 'form',
		)) }}

	        {{ Form::hidden('_method', 'DELETE') }}
	        <input type="submit" class="btn btn-danger" value="Si" />
	        <a href="{{ action('Admin_PermisosController@index') }}" class="btn btn-default">No</a>

	    {{ Form::close() }}
	</div>
@stop