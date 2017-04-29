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
		<li><a class="letternav" href="{{url('/corporation/dashboard')}}">Inicio</a></li>
		<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Convocatoria<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{url('/announcements')}}">General</a></li>
				<li class ="MisConvocatorias" value="{{Auth::user()->id}}"><a >Mis convocatorias</a></li>
            </ul>
        </li>
    <li class="MisProyectos" value="{{Auth::user()->id}}"><a class="letternav">Proyecto</a></li>		
        <li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Mi Equipo<b class="caret"></b></a>
            <ul class="dropdown-menu">                				
                <li class ="MiPersonal" value="{{Auth::user()->id}}"><a >Mis Personal</a></li>
                <li class ="NuevoPersonal" value="{{Auth::user()->id}}"><a >Nuevo Personal</a></li>
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
    $('li.MiPersonal').click(function(){
	    window.location.href = '/corporation/myTeam/'+$(this).attr('value');		 
        });
  });    
  $(document).ready(function(){
   $('li.NuevoPersonal').click(function(){
	    window.location.href = '/corporation/newTeam/'+$(this).attr('value');		 
        });
  });   
  $(document).ready(function(){
    $('li.MisProyectos').click(function(){
      window.location.href = '/projects/' +$(this).attr('value');
    });   
  });
</script>
@endsection
