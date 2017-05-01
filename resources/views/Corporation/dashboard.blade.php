@extends('layouts.app')

@section('content')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="application/javascript">
        function searchAnnouncementsBy($case,$data)
        {
            $.ajax({
                    url: '/announcements/search/'+$case,
                   type: 'post',
               dataType: 'json',
                   data: {
                       'data' : $data
                   },
                headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response)
                {
                    $('tbody#results').children().remove();
                     for(var i=0; i< response.length; i++)
                       {
                            $('tbody#results').append(
                            '<tr>'+
                                '<td>'+
                                    response[i].fechaCreacion.substring(0, 10)+
                                '</td>'+
                                '<td>'+
                                    response[i].nombre+
                                '</td>'+
                                '<td>'+
                                    response[i].categoria+
                                '</td>'+
                                '<td>'+
                                    response[i].presupuesto+
                                '</td>'+
                                '<td>'+
                                    response[i].empresaSolicitante+
                                '</td>'+
                                '<td>'+
                                    '<center><a id="ver">Ver<option hidden>'+response[i].id+'</option></a></center>'+
                                '</td>'+
                            '</tr>'
                            );
                        }
                }
            });
        }
        
        $(document).ready(function(){
            $('div#search').click(function(){
               //alert($(this).children('option').val());
               switch($(this).children('option').val())
               {
                   case 'last':
                       searchAnnouncementsBy('last',null);
                       $('section#mainSection').prop('hidden',true);
                       $('section#announcementInfo').prop('hidden',true);
                       $('section#results').prop('hidden',false);
                       $('div#searchValue').prop('hidden',true);
                   break;
                   
                   case 'area':
                       $('section#mainSection').prop('hidden',true);
                       $('section#announcementInfo').prop('hidden',true);
                       $('section#results').prop('hidden',false);
                       $('div#searchValue').prop('hidden',false);
                       $('div#searchValue').find('input').focus();
                   break;
                   
                   case 'request-sent':
                       searchAnnouncementsBy('request-sent',null);
                       $('section#mainSection').prop('hidden',true);
                       $('section#announcementInfo').prop('hidden',true);
                       $('section#results').prop('hidden',false);
                       $('div#searchValue').prop('hidden',true);
                   break;
                    
               }
            });
             $('input[name="search"]').keyup(function(event){
                 if(event.which <= 90 && event.which >= 48)
                 {
                      $('datalist#announcements').children().remove();
                     searchAnnouncementsBy('area',$(this).val());
                        $.ajax({
                                url: '/corporations/areas',
                               type: 'post',
                           dataType: 'json',
                            headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response)
                            {
                                for(var i=0; i<response.length; i++)
                                {
                                    $('datalist#announcements').append(
                                        '<option>'+response[i].workArea+'</option>'
                                    );
                                }
                            }
                        }); 
                      }
                      else{
                        return false;
                      }
             });
        });
        
       $(document).delegate("a#ver","click",function(){
       $('section#mainSection').prop('hidden',true);
       $('section#results').prop('hidden',true);
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
                            '<form action="/announcement/'+response.id+'/newProposal" method="POST">'+
                              '{{ csrf_field() }}'+
                              '<button action="submit">Enviar Propuesta</button>'+
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
	
    div#searchOptions > .row:hover {
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
        <div class="col-md-3">
            <br>
            
            <div class="col-md-12" style="padding-top:10px;">
                
                <div class="container-fluid" style="padding-top:10px;" id="searchOptions">
                    
                    <div class="row" style="padding-top:10px;" id="search">
                        <option value="last" hidden></option>
                        <div class="col-sm-2">
                            <img style="height:50px;width:auto;border-radius:50%;" class="responsive" src="{!!asset('Imagenes/announcement.png')!!}">
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="row">
                                    <p class="lead" style="font-size:90%; transform:translate(18%,80%);"> Nuevas Convocatorias </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="padding-top:10px;" id="search">
                        <option value="area" hidden></option>
                        <div class="col-sm-2">
                            <img style="height:50px;width:auto;border-radius:50%;" class="responsive" src="{!!asset('Imagenes/announcement.png')!!}">
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="row">
                                    <p class="lead" style="font-size:90%; transform:translate(18%,80%);"> Por área </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" style="padding-top:10px;" id="search">
                        <option value="request-sent" hidden></option>
                        <div class="col-sm-2">
                            <img style="height:50px;width:auto;border-radius:50%;" class="responsive" src="{!!asset('Imagenes/announcement.png')!!}">
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="row">
                                    <p class="lead" style="font-size:90%; transform:translate(18%,80%);"> Mis Solicitudes </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" id="searchValue" style="transform:translate(0px,15px);" hidden>
                        <center>
                            <input type="text" name="search" list="announcements" class="form-control" placeholder="Buscar">
                            <datalist id="announcements">
                            </datalist>
                        </center>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="col-md-9">
            <br>
            
            <div class="col-md-12">
                
                <section id="mainSection">
                    <div class="well">
                        Aquí es donde tu podrás encontrar cualquier proyecto existente en la plataforma y hacer una propuesta 
                        para ser seleccionado como el licitante ganador.
                        <br><br><br>
                        Prueba haciendo click en "Nuevas Convocatorias"
                    </div>
                </section>
                
                <section id="results" hidden>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Presupuesto</th>
                            <th>Empresa Solicitante</th>
                            <th>Ver más</th>
                          </tr>
                        </thead>
                        <tbody id=results>
                        </tbody>
                      </table>
                    </div>
                    
                </section>
                
                <section id="announcementInfo" hidden>
                    
                </section>
                
            </div>
        </div>
    </div>
</div>
@endsection
