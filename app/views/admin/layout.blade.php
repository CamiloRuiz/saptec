<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title', 'Saptec | Administrador')</title>

    {{-- Bootstrap core CSS --}}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}

    {{-- Custom styles for this template --}}
    {{ HTML::style('assets/css/custom_css.css', array('media' => 'screen')) }}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('admin') }}">Saptec Admin</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li {{ (Request::is('admin/users*')) ? 'class="active"' : '' }} >{{ link_to('admin/users', "Usuarios") }}</li>
            <li {{ (Request::is('admin/permisos*')) ? 'class="active"' : '' }}>{{ link_to('admin/permisos', "Permisos") }}</li>
            <li><a href="#empresas">Empresas Externas</a></li>
            <li><a href="#cp">Centros de Producción</a></li>
            <li><a href="#mo">Operarios</a></li>
            <li><a href="#mp">Materiales</a></li>
            <li>{{ link_to('/', "Dashboard") }}</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="contenido">
        @yield('content','Bienvenido Administrador')
      </div>
    </div><!-- /.container -->

    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    {{ HTML::script('assets/js/jquery.min.js') }}

    {{-- Bootstrap core JavaScript --}}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
  </body>
</html>
