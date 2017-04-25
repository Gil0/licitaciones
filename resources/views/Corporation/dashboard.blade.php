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
</style>
<div class="navar">
	<ul class="nav nav-pills">
		<li><a class="letternav" href="#">Inicio</a></li>
		<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Convocatoria<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">General</a></li>
				<li class ="MisConvocatorias"><a href="">Mis convocatorias</a></li>
            </ul>
        </li>
		<li><a class="letternav" href="#">Proyecto</a></li>
		<li><a class="letternav" href="#">Mi equipo</a></li>
	</ul>
</div>

<script>
  $(document).ready(function(){
	  $('li.MisConvocatorias').click(function(){
		 windows.location.href = "/corporation/dashboard/misConvocatorias/ " +$(this).attr('value');
	  });

  });

  

</script>
@endsection