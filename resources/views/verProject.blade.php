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
		<li class="MisProyectos" value="{{Auth::user()->id}}"><a class="letternav">Proyecto</a></li>
		<li><a class="letternav" href="#">Mi equipo</a></li>
	</ul>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">Datos </div>
                <div class="panel-body">
                    <form >
                        {{ csrf_field() }} <!-- ESTE TOKEN ES IMPORTANTE PARA PODER ENVIAR DATOS AL SERVER... si no lo incluyes habra error ya que la informacion no es "confiable" -->
                        <div class="modal-body">
                          Nombre  <input type="text" class="form-control" readonly value="{{$projects->name}}" name="name" required ><br>
                        </div>
                        <div class="modal-body">
                          Costo <input type="text" class="form-control" readonly value="{{$projects->cost}}" name="category" required><br>
                        </div>
                        <div class="modal-body">
                          Descripcion  <input type="text" class="form-control" readonly value="{{$projects->description}}" name="duration" required><br>
                        </div>
                        <div class="modal-body">
                          Duracion  <input type="text" class="form-control" readonly value="{{$projects->duration}}" name="duration" required><br>
                        </div>
                        <div class="modal-body">
                          Categoria  <input type="text" class="form-control" readonly value="{{$projects->category}}" name="category" required><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="regresar" value="{{Auth::user()->id}}">Regresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function(){
	  $('button#regresar').click(function(){
		 window.location.href = '/projects/'+$(this).attr('value');
	  });
         $('li.MisProyectos').click(function(){
		 window.location.href = '/projects/' +$(this).attr('value');
	  });
       $('li.MisConvocatorias').click(function(){
		 window.location.href = '/corporation/dashboard/misConvocatorias/' +$(this).attr('value');
		 
	  });
  });

</script>
@endsection





