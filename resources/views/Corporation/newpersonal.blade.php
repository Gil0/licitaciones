@extends('layouts.app')

@section('content') 
<meta name="csrf_token" content="{{ csrf_token() }}" /> <!--Se necestia este metadato para poder hacer AJAX, se envia el csrf_token al server para validar que si existe la sesion -->
 <link rel="stylesheet" href="{!!asset('css/bootstrap.min.css')!!}">
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
      <h2>Nuevo Personal</h2>
      <div class="panel panel-default">
        <table class="table table-hover" class="rowsTabla">
          <thread>
            <tr>              
              <th class="head text-center"><h5>Nombre</h5></th>
              <th class="head text-center"><h5>E-mail</h5></th>              
              <th class="head text-center"><h5>Telefono</h5></th> 
              <th class="head text-center"><h5>Area</h5></th> 
              <th class="head text-center"><h5>Direccion</h5></th> 
              <th class="head text-center"><h5>RFC</h5></th>               
              <th class="head text-center"><h5>Estado</h5></th> 
            </tr>
          </thread>
          <tbody>
          @foreach($personal as $personal)          
            <tr class="rowsTabla">              
              <th class="text-center">{{$personal->name}}</th>
              <th class="text-center">{{$personal->email}}</th>              
              <th class="text-center">{{$personal->phoneNumber}}</th>
              <th class="text-center">{{$personal->area}}</th>
              <th class="text-center">{{$personal->address}}</th>
              <th class="text-center">{{$personal->rfc}}</th>              
              <th class="text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger" style="width:100%;" id="{{$personal->id}}" value="{{$personal->idCorporation}}">
                    <i id="buttonState" class="fa fa-bullseye" aria-hidden="false">Agregar</i>
                    </button>
                </div>
              </th>              
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
    $(document).ready(function(){
        $('li.MisProyectos').click(function(){
		 window.location.href = '/projects/' +$(this).attr('value');
	    });
        $('li.MiPersonal').click(function(){
	        window.location.href = '/corporation/myTeam/'+$(this).attr('value');		 
        });
        $('li.NuevoPersonal').click(function(){
	        window.location.href = '/corporation/newTeam/'+$(this).attr('value');		 
        });
        
        $('.rowsTabla > th > div > button').click(function(){             
            if($(this).attr('value') == 0){                        
                $(this).removeClass('btn-danger');
                $(this).text('!Agregado!');                     
                $(this).addClass('btn-success');
                $(this).attr('value',{{Auth::user()->id}});                                            
            }
            else{                                 
                $(this).removeClass('btn-success');  
                $(this).text('Agregar');               
                $(this).addClass('btn-danger');                 
                $(this).attr('value',0);                    
            }
                $.ajax({                 
                    url:'/corporation/newTeam/'+$(this).attr('id')+'/cambiarStatus',
                    type:'POST',
                    dataType:'json',
                    data:{
                        'idPersonal':$(this).attr('id'),
                        'idCorporation':$(this).attr('value')
                    },beforeSend: function (xhr) {                                 
                        var token = $('meta[name="csrf_token"]').attr('content');
                            if (token) {
                                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                            }
                    },
                    success:function(response){
                        alert(response);
                    }
                });
            });        
        });      
    });
 </script>
@endsection

