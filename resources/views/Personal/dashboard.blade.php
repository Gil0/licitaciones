@extends('layouts.app')

@section('content')

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<style>
	@import url('https://fonts.googleapis.com/css?family=Anton');
    @import url('https://fonts.googleapis.com/css?family=Oswald');
	.navar{
		background: #39A8EA;
		height: 45px;
		width: 100%;
	}
	.letternav{
		color: #fff;
		font-family: 'Oswald', sans-serif;
	}
	.banner{
        background: #124151;
        height: 320px;
        position: relative;
        top: 0px;
    }
    .imgbanner{
        height: 320px;
        width: 100%;
    }
    .letterbanner{
        color: #fff;
        font-family: 'Anton', sans-serif;
        text-align: center;
        position: relative;
        top: -310px;
        letter-spacing: 4px;
        font-size: 40px;
    }
    .iconbanner{
        position: relative;
        top: -300px;
    }
    .parrafoacerca{
        text-align: justify;
        padding-top: 20px;
    }
    .parrafoacercade{
        color: #4F4F4F;
        font-family: 'Oswald', sans-serif;
        font-size: 18px;
    }
    .log{
        color: #3F3F3F;
        font-family: 'Anton', sans-serif;
        font-size: 18px;
    }
    .equipo{
        padding-top: 30px;
        width:250px;
        height: 250px;
    }
    .parrafoequipo{
        color: #fff;
        position: relative;
        font-family: 'Oswald',sans-serif;
        text-align: center;
        top: -150px;
        font-size: 25px;
        text-decoration: underline;
    }
    .footer1{
        height: 130px;
        background: #0a2934;
    }
    .imgfooter{
        width: 7%;
        padding-top: 5px;
    }
    footer{
        background: #124151;
        height: 40px;
        color: #fff;
        font-family: 'Oswald', sans-serif;
        text-align: center;
        padding-top: 10px;
    } 
</style>
<div class="navar">
	<ul class="nav nav-pills">
		<li><a class="letternav" href="{{url ('/home')}}">Inicio</a></li>
		<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Convocatoria<b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><a href="{{url('/announcements')}}">General</a></li>
				<li class ="MisConvocatorias" value="{{Auth::user()->id}}"><a >Mis convocatorias</a></li>
            </ul>
        </li>
		<li class="MisProyectos" value="{{Auth::user()->id}}"><a class="letternav">Proyecto</a></li>
	</ul>
</div>
<div>
	<div class="col-md-12 banner">
		<img class="imgbanner" src="Imagenes/banner.png">
        <center><h1 class="letterbanner">{{ Auth::user()->name }} bienvenido a</h1></center>
        <h1 class="letterbanner">LiciTop</h1>
        <center><img class="iconbanner" src="Imagenes/list.png"></center>
	</div>
	<div class="col-md-10 col-md-offset-1 parrafoacerca">
        <p class="parrafoacercade">Como <span class="log">Personal</span> podras publicar convocatorias de proyectos 
        asi como solicitar participacion en otras disponibles dentro de la plataforma. Asi mismo como mandar ideas de proyecto dentro de diversas convocatorias.</p>
        <div class="col-md-4">
            <img class="equipo" src="Imagenes/img1.png">
            <p class="parrafoequipo">Busca convocatorias</p>
        </div>
        <div class="col-md-4">
            <img class="equipo" src="Imagenes/img2.png">
            <p class="parrafoequipo">Registra convocatoria</p>
        </div>
        <div class="col-md-4">
            <img class="equipo" src="Imagenes/img3.png">
            <p class="parrafoequipo">Registra tu idea</p>
        </div>
    </div>
    <div class="col-md-12 footer1">
        <center><img class="imgfooter" src="Imagenes/Logo1.png"></center>
    </div>
    <footer class="footer col-md-12">
        <p>LiciTop - Todos los derechos reservados.</p>
    </footer>
</div>
<script>
  $(document).ready(function(){
     $('li.MisProyectos').click(function(){
        window.location.href = '/projects/' +$(this).attr('value');
     });
  });     
</script>
@endsection