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
		<li><a class="letternav" href="#">Inicio</a></li>
		<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Convocatoria<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{url('/announcements')}}">General</a></li>
                <li><a href="#">Mis Convocatorias</a></li>
            </ul>
        </li>
		<li><a class="letternav" href="#">Proyecto</a></li>
		<li><a class="letternav" href="#">Mi equipo</a></li>
	</ul>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h2>Convocatorias</h2>
      <div class="panel panel-default">
        <table class="table table-striped">
          <thread>
            <tr>
              <th class="head"><h5>Id</h5></th>
              <th class="head"><h5>Nombre</h5></th>
              <th class="head"><h5>Categoria</h5></th>
              <th class="head"></th> 
            </tr>
          </thread>
          <tbody>
          @foreach($announcements as $announcements)
            <tr class="rowsTabla">
              <th scope="row">{{$announcements->id}}</th>
              <th >{{$announcements->name}}</th>
              <th >{{$announcements->category}}</th>
              <th class="text-right"><i class="fa fa-plus-circle fa-2x" aria-hidden="true" value="{{$announcements->id}}"></i></th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection