@extends('layouts.app')

@section('content')
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="application/javascript">
    $(document).ready(function(){
       $('button#proposal').click(function(){
         $(this).css('visibility','hidden');
         $('button#description').css('visibility','visible');
         $('section#proposal').prop('hidden',false);
         $('section#description').prop('hidden',true);
       });
       $('button#description').click(function(){
          $(this).css('visibility','hidden');
          $('button#proposal').css('visibility','visible'); 
          $('section#proposal').prop('hidden',true);
          $('section#description').prop('hidden',false);
       });
       $('button#cancel').click(function(){
          window.location.replace('/home');
       });
       $('button#submit').click(function(){
          $.ajax({
             url: '/proposal/new',
            type: 'post',
           async: false,
            data: {
              'proposal' : $('textarea#description').val(),
              'receiver' : {!!$announcement['user_id']!!}
            },
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function()
            {
              window.location.replace('/home');
            }
          });
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
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-4">
                  <div class="well">
                      <center>
                          <p class="lead">{{$announcement["name"]}}</p>
                          <p><b>Categoria: </b>{{$announcement["category"]}}</p>
                          <p><b>Duración:</b>{{$announcement["duration"]}}</p>
                          <p><b>Presupuesto:</b>{{$announcement["budget"]}}</p>
                      </center>
                  </div>
                  
                  <section id="control-panel">
                    <div class="row" id="control-panel">
                        <center>
                            <button id="proposal" class="btn btn-info" style="width:80%;">Propuesta</button>
                            <button id="description" class="btn btn-info" style="width:80%; visibility:hidden;">Description</button>
                        </center>
                    </div>
                  </section>
                
              </div>
              <div class="col-md-8">
                  <br>
                  <section id="description">
                          <p>{{$announcement["description"]}}</p>
                  </section>
                  <section id="proposal" hidden>
                      <center>
                          <textarea id="description" style="width:100%;" rows="15" placeholder="Escribe tu propuesta aquí"></textarea>
                          <button id="submit" class="btn btn-info" style="width:49%;">Aceptar</button>
                          <button id="cancel" class="btn btn-danger" style="width:49%;">Cancelar</button>
                      </center>
                  </section>
              </div>
          </div>
      </div>
    </div>
</div>
@endsection
