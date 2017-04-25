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
		<li><a class="letternav" href="{{url('/corporation/dashboard')}}">Inicio</a></li>
		<li><a class="letternav" href="#">Convocatoria</a></li>
		<li><a class="letternav" href="#">Proyecto</a></li>
		<li><a class="letternav" href="{{url ('/corporation/myteam')}}">Mi equipo</a></li>
	</ul>
</div>
<h1>My Team</h1>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h2>Personal</h2>
      <div class="panel panel-default">
        <table class="table table-striped">
          <thread>
            <tr>              
              <th class="head"><h5>Nombre</h5></th>
              <th class="head"><h5>E-mail</h5></th>
              <th class="head"></th> 
            </tr>
          </thread>
          <tbody>
          @foreach($personal as $personal)
            <tr class="rowsTabla">              
              <th >{{$personal->name}}</th>
              <th >{{$personal->email}}</th>              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<h1>Nuevo Personal</h1>
<button id="botonAgregar" class="btn btn-info">Agregar Personal</button>
<script type="text/javascript">
    document.getElementById("botonAgregar").onclick = function () {
        location.href = "/corporation/dashboard";
    };
</script>
@endsection
