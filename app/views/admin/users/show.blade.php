@extends('../layout')

@section('title')
	Saptec | Admin Usuarios
@stop

@section('content')
    <h1>Usuario</h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    
@stop