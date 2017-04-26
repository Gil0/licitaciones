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
		<li><a class="letternav" href="{{url('/home')}}">Inicio</a></li>
		<li><a href="#" class="letternav dropdown-toggle" data-toggle="dropdown">Convocatoria<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{url('/announcements')}}">General</a></li>
                <li class ="MisConvocatorias" value="{{Auth::user()->id}}"><a >Mis convocatorias</a></li>
            </ul>
        </li>
		<li><a class="letternav" href="#">Proyecto</a></li>
		<li><a class="letternav" href="#">Mi equipo</a></li>
	</ul>
</div>

<meta name="csrf_token" content="{{ csrf_token() }}" /> <!--Se necestia este metadato para poder hacer AJAX, se envia el csrf_token al server para validar que si existe la sesion -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-success" style="width:100%;" data-toggle="modal" data-target="#crearConvocatoria"><h4>Crear Convocatoria</h4></button>
                </div>
                <div class="panel-body">
                    <h3>Convocatorias</h3>
                    <table class="table table-striped">
                        <thread>
                            <tr>
                                <th class="head">Id</th>
                                <th class="head">Nombre</th>
                                <th class="head">Categoria</th>
                                <th class="head"> Ver mas </th> 
                                <th class="head"> Editar </th> 
                            </tr>
                        </thread>
                        <tbody>
                            @foreach($announcements as $announcements)
                               <tr class="rowsTabla">
                                    <th scope="row">{{$announcements->id}}</th>
                                    <th >{{$announcements->name}}</th>
                                    <th >{{$announcements->category}}</th>
                                    <th><i class="fa fa-plus-circle fa-2x"  value="{{$announcements->id}}"></i></th>
                                    <th><i class="fa fa-pencil-square fa-2x" value="{{$announcements->id}}"></i></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    i.fa-plus-circle{
      color: green;
    }
    i.fa-plus-circle:hover{
        color:blue;
    }
    i.fa-pencil-square{
      color: orange;
    }
    i.fa-pencil-square:hover{
        color:green;
    }
    i.fa-trash{
      color: #d9534f;
    }
    i.fa-trash:hover{
        color:red;
    }
    .head{
      background-color: #5cb85c;
      color: white; 
    } 
</style>

<!-- modal Crear Convocatoria-->
<div class="modal fade" id="crearConvocatoria" tabindex="-1" role="dialog" aria-labelledby="Crear convocatoria">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Convocatoria</h4>
      </div>
      <form action="/corporation/dashboard/crear/{id}" method="POST">
      {{ csrf_field() }} <!-- ESTE TOKEN ES IMPORTANTE PARA PODER ENVIAR DATOS AL SERVER... si no lo incluyes habra error ya que la informacion no es "confiable" -->
        <div class="modal-body">
            <input type="text" class="form-control" placeholder="Nombre" name="name" required><br>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control" placeholder="Categoria" name="category" required><br>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control" placeholder="Duracion" name="duration" required><br>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control" placeholder="Presupuesto" name="budget" required><br>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control" placeholder="Descripción" name="description" required><br>
        </div>
        <div class="modal-body">
           <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelar">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="crearConvocatoria">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal informacion evento-->
<div class="modal fade" id="verEvento" tabindex="-1" role="dialog" aria-labelledby="Ver Evento">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="informacionEvento">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" style="width:100%;" data-dismiss="modal"><h4>Cerrar</h4></button>
      </div>
    </div>
  </div>
</div>

<!-- modal seguridad eliminar evento-->
<div class="modal fade" id="eliminarEvento" tabindex="-1" role="dialog" aria-labelledby="Eliminar Evento">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
           <p class="lead" style="text-align:center;">Estas seguro de eliminar la Convocatoria ?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="" id="eliminarEvento">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" style="width:100%;">SI</button>
        </form>
        <button type="button" class="btn btn-default" style="width:100%;" data-dismiss="modal">NO</button>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function(){
        $('i').click(function(){
           window.location.href = '/corporation/dashboard/misConvocatorias/'+$(this).attr('value')+ '/edit';
        });
    });
    </script>

@endsection
