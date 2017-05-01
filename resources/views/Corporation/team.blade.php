@extends('layouts.app')

@section('content')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="application/javascript">

    function getMembers(){
        $("section#membersList").children().remove();
        $.ajax({
                 url: '/corporation/team/members',
                type: 'post',
            dataType: 'json',
             headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             success: function(response){
                 for(var i=0; i<response.length; i++){
                     $("section#membersList").append(
                        '<div class="container-fluid" style="padding-top:10px;" id="memberInfo">'+
                            '<option hidden>'+response[i].user_id+'</option>'+
                            '<div class="row">'+
                                '<div class="col-sm-2">'+
                                    '<img style="height:50px;width:auto;border-radius:50%;" class="responsive" src="{!!asset('Imagenes/avatar-new.png')!!}">'+
                                '</div>'+
                                '<div class="col-sm-10>'+
                                    '<div class="row">'+
                                        '<div class="row">'+
                                            '<p class="lead" style="font-size:90%; transform:translate(3%,80%);">'+response[i].name+'</p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                     );
                }
             }
        });
    }
    
    $(document).ready(function(){
       getMembers(); 
       $("button#newMember").click(function(){
           $("section#mainSection").prop('hidden',true);
           $("section#newMember").prop('hidden',false);
           $('section#memberInfo').prop('hidden',true)
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
                getMembers();
            }
          });
          $("input").val('');
       });
    });
    
    $(document).delegate("div#memberInfo","click",function(){
       $('section#mainSection').prop('hidden',true);
       $('section#newMember').prop('hidden',true);
       $('section#memberInfo').prop('hidden',false).children().remove();
       
       $.ajax({
          url: '/corporation/team/member/'+$(this).find('option').val(),
          type: 'post',
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
              $("section#memberInfo").append(
                '<div class="row">'+
                    '<div class="col-md-12">'+
                        '<center>'+
                            '<img style="height:100px;width:auto;" class="responsive" src="{!!asset('Imagenes/avatar-new.png')!!}">'+
                            '<p class="lead">'+response.name+'</p>'+
                        '</center>'+
                    '</div>'+
                '</div>'
              );
          }
       });
    });
</script>

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
    div#memberInfo:hover {
        background-color: #CDCDCD;
    }
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
                <center><button style="width:85%;" class="form-control" id="newMember">Nuevo Integrante</button></center>
            </div>
            <div class="col-md-12" style="padding-top:10px;">
                <section id="membersList"></section>
            </div>
        </div>
        <div class="col-md-8">
            <br>
            <div class="col-md-12">
                
                <section id="mainSection">
                    <div class="well">
                        Puedes dar click en cualquier miembro para ver información a detalle.
                    </div>
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
                
                <section id="memberInfo" hidden>
                    
                </section>
                
            </div>
        </div>
    </div>
</div>
@endsection
