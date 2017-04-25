@extends('layouts.app')

@section('content')
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
</style>
<div class="navar">
	<ul class="nav nav-pills">
		<li><a class="letternav" href="{{url ('/home')}}">Inicio</a></li>
		<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Convocatoria<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">General</a></li>
                <li><a href="#">Mis Convocatorias</a></li>
            </ul>
        </li>
		<li><a class="letternav" href="{{url ('/personal/projects')}}">Proyecto</a></li>
		<li><a class="letternav" href="#">Mi equipo</a></li>
	</ul>
</div>
@endsection