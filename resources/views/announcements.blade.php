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
		<li class="MisProyectos" value="{{Auth::user()->id}}"><a class="letternav">Proyecto</a></li>
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
              <th class="head"><h5>Ver mas</h5> </th> 
              <th class="head"></th>
            </tr>
          </thread>
          <tbody>
          @foreach($announcements as $announcements)
            <tr class="rowsTabla">
              <th scope="row">{{$announcements->id}}</th>
              <th >{{$announcements->name}}</th>
              <th >{{$announcements->category}}</th>
              <th ><i class="fa fa-plus-circle fa-2x" aria-hidden="true" value="{{$announcements->id}}"></i></th>
              <th ><button type="button" id="Project" value="{{$announcements->id}}">Agregar Proyecto</th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- modal Crear Convocatoria-->
<div class="modal fade" id="crearProyecto" tabindex="-1" role="dialog" aria-labelledby="Crear Proyecto">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Proyecto</h4>
      </div>
      <form  method="POST" id="crearProyecto">
      {{ csrf_field() }} <!-- ESTE TOKEN ES IMPORTANTE PARA PODER ENVIAR DATOS AL SERVER... si no lo incluyes habra error ya que la informacion no es "confiable" -->
        <div class="modal-body">
            <input type="text" class="form-control" placeholder="Costo" name="cost" required><br>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control" placeholder="Duracion" name="duration" required><br>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control" placeholder="Descripcion" name="description" required><br>
        </div>
        
        <div class="modal-body">
           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelar">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="crearProyecto">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
 $(document).ready(function(){
	  $('li.MisConvocatorias').click(function(){
		 window.location.href = '/corporation/dashboard/misConvocatorias/' +$(this).attr('value');
		 
	  });
    $('button#Project').click(function(){
       $('#crearProyecto').modal('show');
       $('form#crearProyecto').attr('action','/corporation/dashboard/crearProyecto/'+$(this).attr('value'));
    });
     $('li.MisProyectos').click(function(){
		 window.location.href = '/projects/' +$(this).attr('value');
	  });

  });
 $(document).ready(function(){
    $('li.MisProyectos').click(function(){
     window.location.href = '/projects/' +$(this).attr('value');
     
    });

  });
</script>
@endsection