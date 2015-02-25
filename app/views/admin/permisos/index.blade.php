@extends('admin.layout')

@section('title')
	Saptec | Admin Permisos
@stop

@section('content')

    <h1>Permisos</h1>
    <p>Listado de Permisos</p>

    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ URL::to('admin/permisos/create'); }}" class="btn btn-primary">Crear Permiso</a>
        </div>
    </div>

    @if ($permisos->isEmpty())
    	<p> No se han encontrado permisos.</p>
    @else
    	<table class="table table-striped">
            <thead>
                <tr>
	    			<th>Descripción</th>
	    			<th>Controller</th>
	    			<th>Action</th>
	    			<th></th>
	    			<th></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		@foreach($permisos as $permiso)
	    		<tr>
	    			<td>{{ $permiso->descripcion }}</td>
	    			<td>{{ $permiso->controller }}</td>
	    			<td>{{ $permiso->action }}</td>
	    			<td><a href="{{ URL::action('Admin_PermisosController@edit', $permiso->id) }}" class="btn btn-warning">Editar</a></td>
	    			<td><a href="{{ URL::action('Admin_PermisosController@confirmDelete', $permiso->id) }}" class="btn btn-danger">Eliminar</a></td>
	    		</tr>
	    		@endforeach
	    	</tbody>
	    </table>
    @endif
@stop