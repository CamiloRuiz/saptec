@extends('../layout')

@section('title')
	Saptec | Admin Usuarios
@stop

@section('content')
    <h1>Usuarios</h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    <p>Listado de Usuarios</p>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ URL::to('admin/users/create'); }}" class="btn btn-primary">Crear Usuario</a>
        </div>
    </div>
    @if ($users->isEmpty())
    	<p> No se han encontrado usuarios.</p>
    @else
    	<table class="table table-striped">
            <thead>
                <tr>
	    			<th>Nombre</th>
	    			<th>Usuario</th>
	    			<th>Email</th>
	    			<th>Estado</th>
	    			<th>Rol</th>
	    			<th></th>
	    			<th></th>
	    			<th></th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    		@foreach($users as $user)
	    		<tr>
	    			<td>{{ $user->nombres }} {{ $user->apellidos }}</td>
	    			<td>{{ $user->usuario }}</td>
	    			<td>{{ $user->email }}</td>
	    			<td>{{ ($user->estado) ? 'Sí' : 'No' }}</td>
	    			<td>{{ $user->role->nombre }}</td>
	    			<td><a href="{{ URL::action('Admin_UsersController@show', $user->id) }}" class="btn btn-primary">Ver</a></td>
	    			<td><a href="{{ action('Admin_UsersController@edit', $user->id) }}" class="btn btn-default">Editar</a></td>
	    			<td><a href="{{ URL::action('Admin_UsersController@destroy', $user->id) }}" class="btn btn-danger">Eliminar</a></td>
	    		</tr>
	    		@endforeach
	    	</tbody>
	    </table>
    @endif
@stop