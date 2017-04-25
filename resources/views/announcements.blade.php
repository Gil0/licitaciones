@extends('layouts.app')

@section('content')
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
		<li><a class="letternav" href="#">Inicio</a></li>
		<li><a class="letternav" href="#">Convocatoria</a></li>
		<li><a class="letternav" href="#">Proyecto</a></li>
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
              <th class="head"><h5>Area</h5></th>
              <th class="head"></th> 
            </tr>
          </thread>
          <tbody>
         <!--   @foreach($convocatoria as $convocatoria)
            <tr class="rowsTabla">
              <th scope="row">{{$convocatoria->id}}</th>
              <th >{{$convocatoria->nombre}}</th>
              <th >{{$convocatoria->area}}</th>
              <th class="text-right"><i class="fa fa-plus-circle fa-2x" aria-hidden="true" value="{{$convocatoria->id}}" onclick="redirect({{$convocatoria->id}})"></i></th>
            </tr>
            @endforeach-->
          </tbody>
        </table>
        <!--{!! $eventos -> render() !!}-->
      </div>
    </div>
  </div>
</div>

@endsection