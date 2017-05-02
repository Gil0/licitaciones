@extends('layouts.app')

@section('content')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="application/javascript">

    function getAnnouncements(){
        $("section#announcementsList").children().remove();
        $.ajax({
                 url: '/announcements/getAnnouncements',
                type: 'post',
            dataType: 'json',
             headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             success: function(response){
                 for(var i=0; i<response.length; i++){
                     $("section#announcementsList").append(
                        '<div class="container-fluid" style="padding-top:10px;" id="announcementInfo">'+
                            '<option hidden>'+response[i].id+'</option>'+
                            '<div class="row">'+
                                '<div class="col-sm-2">'+
                                    '<img style="height:50px;width:auto;border-radius:50%;" class="responsive" src="{!!asset('Imagenes/announcement.png')!!}">'+
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
       getAnnouncements(); 
       $("button#newAnnouncement").click(function(){
           $("section#mainSection").prop('hidden',true);
           $("section#newAnnouncement").prop('hidden',false);
           $('section#announcementInfo').prop('hidden',true)
       }) ;
       $("button#cancelar").click(function(){
          $("input").val('');
          $("textarea").val('');
          $("section#newAnnouncement").prop('hidden',true);
          $("section#mainSection").prop('hidden',false);
       });
       $("button#addAnnouncement").click(function(){
            $.ajax({
                url: '/announcement/new',
               type: 'post',
           dataType: 'json',
               data: {
                        'nombre' : $('input[name=nombre]').val(),
                     'categoria' : $('input[name=categoria]').val(),
                      'duracion' : $('input[name=duracion]').val(),
                    'presupuesto': $("input[name=presupuesto]").val(),
                    'descripcion': $("textarea[name=descripcion]").val()
                    
               },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (){
                getAnnouncements();
            }
          });
          $("input").val('');
          $("textarea").val('');
       });
    });
    $(document).delegate("div#announcementInfo","click",function(){
       $('section#mainSection').prop('hidden',true);
       $('section#newAnnouncement').prop('hidden',true);
       $('section#announcementInfo').prop('hidden',false).children().remove();
       
       $.ajax({
          url: '/announcement/'+$(this).find('option').val(),
          type: 'post',
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response){
              $("section#announcementInfo").append(
                '<div class="row">'+
                    '<div class="col-md-12">'+
                        '<center>'+
                            '<img style="height:100px;width:auto;" class="responsive" src="{!!asset('Imagenes/announcement.png')!!}">'+
                            '<p class="lead">'+response.name+'</p>'+
                        '</center>'+
                    '</div>'+
                '</div>'+
                '<div class="container>'+
                    '<div class="well">'+
                        '<center>'+
                            '<form action="/announcement/'+response.id+'/edit" method="POST">'+
                              '{{ csrf_field() }}'+
                              '<button action="submit">Editar</button>'+
                            '</form>'+
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
	
  div#announcementInfo:hover {
      background-color: #CDCDCD;
      cursor: pointer;
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
  .btncolora{
    background: #39A8EA;
    color: #fff;
    font-family: 'Oswald', sans-serif;
  } 
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <br>
            <div class="col-md-12">
                <center><button style="width:85%;" class="form-control btncolora" id="newAnnouncement">Nueva Convocatoria</button></center>
            </div>
            <div class="col-md-12" style="padding-top:10px;">
                <section id="announcementsList"></section>
            </div>
        </div>
        <div class="col-md-8">
            <br>
            <div class="col-md-12">
                
                <section id="mainSection">
                    <div style="border-color:#39A8EA;font-family:'Oswald', sans-serif;" class="well">
                        Puedes dar click en cualquier convocatoria para ver información a detalle.
                    </div>
                </section>
              
                <section id="newAnnouncement" hidden>
                    <div class="row">
                        <div class="col-md-2">
                            <img style="height:100px;width:auto;" class="responsive" src="{!!asset('Imagenes/announcement.png')!!}">
                        </div>
                        <div class="col-md-10"> 
                            <input placeholder="Nombre" type="text" style="width:100%;" class="form-control" name="nombre"/>
                            <br>
                            <input placeholder="Categoría" type="text" style="width:100%;" class="form-control" name="categoria"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <img style="height:100px;width:auto;" class="responsive" src="{!! asset('Imagenes/time.png') !!}">
                        </div>
                        <div class="col-md-10">
                            <input style="width:100%;transform:translate(0,90%);" class="form-control" type="text" name="duracion" placeholder="Duración de Proyecto"/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <img style="height:100px;width:auto;" class="responsive" src="{!! asset('Imagenes/budget.png') !!}">
                        </div>
                        <div class="col-md-10">
                            <input style="width:100%;transform:translate(0,90%);" class="form-control" type="number" name="presupuesto" placeholder="Presupuesto en pesos mx"/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">
                            <img style="height:100px;width:auto;" class="responsive" src="{!! asset('Imagenes/description.png') !!}">
                        </div>
                        <div class="col-md-10">
                            <textarea style="width:100%;" class="form-control" name="descripcion" placeholder="Describe tu proyecto"></textarea>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-success" style="width:90%;" id="addAnnouncement">Añadir</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger" style="width:90%;" id="cancelar">Cancelar</button>
                        </div>
                    </div>
                </section>
                
                <section id="announcementInfo" hidden>
                    
                </section>
                
            </div>
        </div>
    </div>
</div>
@endsection
