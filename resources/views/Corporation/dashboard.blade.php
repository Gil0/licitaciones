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
		<li><a class="letternav" href="{{url('corporation/dashboard')}}">Inicio</a></li>
		<li><a class="letternav" href="#">Convocatoria</a></li>
		<li><a class="letternav" href="#">Proyecto</a></li>
		<li><a class="letternav" href="{{url ('/corporation/myteam/{Auth::user()->id}')}}">Mi equipo</a></li>
	</ul>
</div>
@endsection