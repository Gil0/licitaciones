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
		<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Convocatoria<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{url('/announcements')}}">General</a></li>
				<li class ="MisConvocatorias" value="{{Auth::user()->id}}"><a >Mis convocatorias</a></li>
            </ul>
        </li>
		<li><a class="letternav" href="{{url ('/corporation/projects')}}">Proyecto</a></li>
		<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Mi Equipo<b class="caret"></b></a>
      <ul class="dropdown-menu">                				
        <li><a href="{{url('/corporation/myteam/'.Auth::user()->id)}}">Mi Personal</a></li>
        <li><a href="{{url('/corporation/newpersonal/'.Auth::user()->id)}}">Nuevo Personal</a></li>
      </ul>
    </li>
	</ul>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h2>Mi Personal</h2>
      <div class="panel panel-default">
        <table class="table table-striped">
          <thread>
            <tr>              
              <th class="head"><h5>Nombre</h5></th>
              <th class="head"><h5>E-mail</h5></th>
              <th class="head">Telefono</th> 
            </tr>
          </thread>
          <tbody>
          @foreach($personal as $personal)
            <tr class="rowsTabla">              
              <th >{{$personal->name}}</th>
              <th >{{$personal->email}}</th> 
              <th >{{$personal->phoneNumber}}</th>              
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
	  $('li.MisConvocatorias').click(function(){
		 window.location.href = '/corporation/dashboard/misConvocatorias/' +$(this).attr('value');
		 
	  });
  });
</script>
@endsection
