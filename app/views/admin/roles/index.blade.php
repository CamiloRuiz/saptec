@extends('admin.layout')

@section('title')
	Saptec | Admin Roles
@stop

@section('content')

    <h1>Roles de Usuario</h1>
    <p>Listado de roles</p>

    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ URL::to('admin/roles/create'); }}" class="btn btn-primary">Crear Rol</a>
        </div>
    </div>

    @if ($roles->isEmpty())
    	<p> No se han encontrado roles.</p>
    @else
    	<table class="table table-striped">
            <thead>
                <tr>
	    			<th>Nombre</th>
	    			<th>Descripción</th>
	    			<th></th>
	    			<th></th>
	    			<th></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		@foreach($roles as $role)
	    		<tr>
	    			<td>{{ $role->nombre }}</td>
	    			<td>{{ $role->descripcion }}</td>
	    			<td><a href="{{ URL::action('Admin_RolesController@edit', $role->id) }}" class="btn btn-warning">Editar</a></td>
	    			<td><a href="{{ URL::action('Admin_RolesController@managePermisos', $role->id) }}" class="btn btn-primary">Permisos</a></td>
	    			<td>
	    				@if ( ($role->id != 1) && (count($role->users()->get()) < 1) )
	    					<a href="{{ URL::action('Admin_RolesController@confirmDelete', $role->id) }}" class="btn btn-danger">Eliminar</a>
	    				@endif
	    			</td>
	    		</tr>
	    		@endforeach
	    	</tbody>
	    </table>
    @endif
@stop