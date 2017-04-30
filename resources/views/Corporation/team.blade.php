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
		<li class="MisProyectos" value="{{Auth::user()->id}}"><a class="letternav">Proyecto</a></li>
		<li><a class="letternav" href="#">Mi equipo</a></li>
	</ul>
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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <br>
            <div class="col-md-12">
                <button style="width:100%;" class="form-control" id="newMember">Nuevo Integrante</button>
            </div>
            <div class="col-md-12">
                <section id="membersList"></section>
            </div>
        </div>
        <div class="col-md-8">
            <br>
            <div class="col-md-12">
                
                <section id="mainSection">
                    Main Section
                </section>
                
                <section id="newMember" hidden>
                    <div class="row">
                        <div class="col-md-2">
                            <img style="height:100px;width:auto;" class="responsive" src="{!!asset('Imagenes/avatar-new.png')!!}">
                        </div>
                        <div class="col-md-10"> 
                            <input placeholder="Nombre" type="text" style="width:100%;" class="form-control" name="nombre"/>
                            <br>
                            <input placeholder="Area Desempeño" type="text" style="width:100%;" class="form-control" name="area"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <img style="height:100px;width:auto;" class="responsive" src="{!! asset('Imagenes/email.png') !!}">
                        </div>
                        <div class="col-md-10">
                            <input style="width:100%;transform:translate(0,90%);" class="form-control" type="text" name="email" placeholder="email"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-success" style="width:90%;" id="addMember">Añadir</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger" style="width:90%;" id="cancelar">Cancelar</button>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function getMembers(){
        $.ajax({
                 url: '/corporation/team/members',
                type: 'post',
            dataType: 'json',
             headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             success: function(response){
                 $("section#membersList").append(response);
             }
        });
    }
    
    $(document).ready(function(){
       getMembers(); 
       $("button#newMember").click(function(){
           $("section#mainSection").prop('hidden',true);
           $("section#newMember").prop('hidden',false);
       }) ;
       $("button#cancelar").click(function(){
          $("input").val('');
          $("section#newMember").prop('hidden',true);
          $("section#mainSection").prop('hidden',false);
       });
       $("button#addMember").click(function(){
            $.ajax({
                url: '/corporation/team/addMember',
               type: 'post',
           dataType: 'json',
               data: {
                   'nombre' : $('input[name=nombre]').val(),
                     'area' : $('input[name=area]').val(),
                    'email' : $('input[name=email]').val()
                    
               },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (){
                
            }
          });
          $("input").val('');
       });
    });
    
</script>

@endsection