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
	
  div#announcementInfo:hover {
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




@endsection
