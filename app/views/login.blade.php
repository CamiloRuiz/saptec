@extends('clean_layout')

@section('title')
    Saptec | Login
@stop

@section('content')

    <div class="page-header">
        <h1>Iniciar Sesión</h1>
    </div>

    @if(Session::has('error_message'))
        <p><strong> {{ Session::get('error_message') }} </strong></p>
    @endif

    <div class="content_form form_small">

        {{ Form::open(['url' => 'login']) }}
            <div class="form-group">
                <div class="lb_form">{{ Form::label('username', 'Usuario: ') }}</div>
                <div class="field_form">{{ Form::text('username', null, array('class' => 'form-control')) }}</div>
            </div>
            <div class="form-group">
                <div class="lb_form">{{ Form::label('password', 'Contraseña: ') }}</div>
                <div class="field_form">{{ Form::password('password', array('class' => 'form-control')) }}</div>
            </div>
            
            <div class="form-group center">
                <label>
                    {{ Form::checkbox('remember', true) }} &nbsp;&nbsp;&nbsp;Recordarme
                </label>
            </div>
            
            <div class="form-group center">
                {{ Form::submit('Ingresar', ['class' => 'btn btn-primary']) }}
            </div>
    
        {{ Form::close() }}

    </div>
    
@stop

