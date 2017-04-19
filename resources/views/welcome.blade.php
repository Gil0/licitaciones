@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css?family=Anton');
    @import url('https://fonts.googleapis.com/css?family=Oswald');
    body{
        padding: 0;
        margin: 0;
    }
    .banner{
        background: #124151;
        height: 400px;
        position: relative;
        top: -100px;
    }
    .letterbanner{
        color: #fff;
        font-family: 'Anton', sans-serif;
        text-align: center;
        position: relative;
        top: -350px;
        letter-spacing: 4px;
        font-size: 60px;
    }
    .imgbanner{
        height: 400px;
        width: 100%;
    }
    .letteracerca{
        color: #39A8EA;
        font-family: 'Oswald', sans-serif;
        text-align: center;
    }
    .acerca{
        position: relative;
        top: -100px;
    }
    .log{
        color: #3F3F3F;
        font-family: 'Anton', sans-serif;
        font-size: 20px;
    }
    .parrafoacercade{
        color: #4F4F4F;
        font-family: 'Oswald', sans-serif;
        font-size: 20px;
    }
    .parrafo{
        color: #4F4F4F;
        font-family: 'Oswald', sans-serif;
        font-size: 20px;
    }
    .parrafoacerca{
        text-align: justify;
    }
    .parrafobanner{
        color: #fff;
        position: relative;
        top: -340px;
        text-align: center;
        font-family: 'Oswald', sans-serif;
        font-size: 20px;
        letter-spacing: 1px;
    }
    .sub{
        text-decoration: underline;
    }
    .iconbanner{
        position: relative;
        top: -320px;
    }
    hr{
        display: block;
        border-top: 1px solid #06a5a3;
    }
    .parallax { 
        height: 300px;
        background-image: url(Imagenes/licitacion.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
    }
    .conten{
        padding-top: 30px;
        pa
    }
    .mv{
        width: 400px;
        height: 300px;
    }
    .div{
        top: 15px;
        background: #124151;
        height: 3px;
        width: 100%; 
    }
    footer{
        background: #124151;
        height: 30px;
        color: #fff;
        font-family: 'Oswald', sans-serif;
        text-align: center;
    }
</style>
<div class="">
    <div class="col-sm-12 banner">
        <img class="imgbanner" src="Imagenes/banner.png">
        <h1 class="letterbanner">LiciTop</h1>
        <p class="parrafobanner">La solucion más confiable te la otorgamos nosotros.</p>
        <center><img class="iconbanner" src="Imagenes/list.png"></center>
    </div>
    <div class="col-sm-12 acerca">
        <h1 class="letteracerca">Acerca de</h1>
        </br>
        <div class="col-md-10 col-md-offset-1 parrafoacerca">
            <p class="parrafoacercade"><span class="log">Licitop</span> es un sistema para la publicación de proyectos de carácter privado, en busca de modo de concurso en donde las dependencias registradas competirán por quedarse con este proyecto y poder llevarlo a cabo, siendo el ganador la dependencia que más le convenga a la empresa que solicita.</p>
        </div>
    </div>
    <div class="cantainer col-md-12 parallax"></div>
    <div class="col-md-12">
        <div class="col-md-10 conten col-md-offset-1">
            <div class="col-md-6">
                <center><img class="mv" src="Imagenes/mision.jpg"></center>
            </div>
            <div class="col-md-6">
                <h1 class="letteracerca">Misión</h1>
                <p class="parrafo">LiciTop es una plataforma de software dedicada a gestionar eficientemente convocatorias de todo tipo de proyectos ya sea de carácter público, así como privado.</p>
                <p class="parrafo">Cuenta con una interfaz intuitiva que le permite al usuario publicar proyectos, así como también registrarse para poder ganar la licitación de otros.</p>
            </div>
        </div>
        <div class="div col-md-12"></div>
        <div class="col-md-10 conten col-md-offset-1">
            <div class="col-md-6">
                <h1 class="letteracerca">Visión</h1>
                <p class="parrafo">Nuestra plataforma pretende ayudar a los usuarios a generar mercado, así como también emplearse en diversas áreas </p>
            </div>
            <div class="col-md-6">
                <center><img class="mv" src="Imagenes/vision.jpg"></center>
            </div>
        </div>
    </div>
    <footer class="footer col-md-12">
        <p>LiciTop - Todos los derechos reservados.</p>
    </footer>
</div>
@endsection
