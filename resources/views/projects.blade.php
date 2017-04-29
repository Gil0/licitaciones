@extends('layouts.app')

@section('content')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
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
	    @if(Auth::user()->role == 'Corporation')
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
		@else
			<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Convocatoria<b class="caret"></b></a>
	            <ul class="dropdown-menu">
	                <li><a href="{{url('/announcements')}}">General</a></li>
                 <li class ="MisConvocatorias" value="{{Auth::user()->id}}"><a >Mis convocatorias</a></li>
	            </ul>
	        </li>
			<li class="MisProyectos" value="{{Auth::user()->id}}"><a class="letternav">Proyecto</a></li>
		@endif
	</ul>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h2>Proyectos</h2>
      <div class="panel panel-default">
        <table class="table table-striped">
          <thread>
            <tr>
              <th class="head"><h5>Id</h5></th>
              <th class="head"><h5>Costo</h5></th>
              <th class="head"><h5>Convocatoria</h5></th>
              <th class="head"><h5>Ver Mas</h5></th> 
            </tr>
          </thread>
          <tbody>
          @foreach($projects as $projects)
            <tr class="rowsTabla">
              <th scope="row">{{$projects->id}}</th>
              <th >{{$projects->cost}}</th>
              <th >{{$projects->name}}</th>
              <th ><i class="fa fa-plus-circle fa-2x" aria-hidden="true" value="{{$projects->id}}"></i></th>
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
	  $('li.MisProyectos').click(function(){
		 window.location.href = '/projects/' +$(this).attr('value');
		 
	  });
		$('li.MisConvocatorias').click(function(){
		 window.location.href = '/corporation/dashboard/misConvocatorias/' +$(this).attr('value');
	  });
		$('i.fa-plus-circle').click(function(){
    	window.location.href = '/projects/'+$(this).attr('value')+ '/ver';
    });
		$('li.MiPersonal').click(function(){
	    window.location.href = '/corporation/myTeam/'+$(this).attr('value');		 
    });    
    $('li.NuevoPersonal').click(function(){
	    window.location.href = '/corporation/newTeam/'+$(this).attr('value');		 
    });
  });
</script>
@endsection