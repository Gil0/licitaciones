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
    background-color: green;
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">Editar Convocatoria</div>
                <div class="panel-body">
                    <form action="/corporation/dashboard/update/{{$announcement->id}}" method="POST">
                        {{ csrf_field() }} <!-- ESTE TOKEN ES IMPORTANTE PARA PODER ENVIAR DATOS AL SERVER... si no lo incluyes habra error ya que la informacion no es "confiable" -->
                        <div class="modal-body">
                            <input type="text" class="form-control" value="{{$announcement->name}}" name="name" required ><br>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" value="{{$announcement->category}}" name="category" required><br>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" value="{{$announcement->duration}}" name="duration" required><br>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" value="{{$announcement->budget}}" name="budget" required><br>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" value="{{$announcement->description}}" name="description" required><br>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelar">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="crearConvocatoria">Guardar</button>
                        </div>
                    </form>
                </div>
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