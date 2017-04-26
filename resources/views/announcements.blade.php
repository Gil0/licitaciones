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
   .fa-plus-circle{
    barckground-color: green;
  }
</style>
<div class="navar">
	<ul class="nav nav-pills">
		<li><a class="letternav" href="{{url('/home')}}">Inicio</a></li>
		<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Convocatoria<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{url('/announcements')}}">General</a></li>
                 <li class ="MisConvocatorias" value="{{Auth::user()->id}}"><a >Mis convocatorias</a></li>
            </ul>
        </li>
		<li><a class="letternav" href="{{url ('/corporation/projects')}}">Proyecto</a></li>
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
              <th class="head"> Ver mas </th> 
            </tr>
          </thread>
          <tbody>
          @foreach($announcements as $announcements)
            <tr class="rowsTabla">
              <th scope="row">{{$announcements->id}}</th>
              <th >{{$announcements->name}}</th>
              <th >{{$announcements->category}}</th>
              <th ><i class="fa fa-plus-circle fa-2x" aria-hidden="true" value="{{$announcements->id}}"></i></th>
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