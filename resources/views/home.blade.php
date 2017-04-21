@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">Rellenado de informacion de registro</div>

                <div class="panel-heading">
                    Al ser un nuevo registro (Personal/Corporacion) este debera llenar los campos de acorde a su rol para poder hacer la vinculacion de la tabla de usuario con => Personals || Corporations
                </div>

                <div class="panel-body">
                    @if(Auth::user()->role == 'Personal')
                        <p>Personal</p>

                        <form method="POST" action="/postRegister/{{Auth::user()->role}}">
                        {{ csrf_field() }}
                            <label>location</label>

                            Area: <input name="area" class="form-control">
                            Phone Number: <input name="phoneNumber" class="form-control">
                            Address: <input name="address" class="form-control">
                            ZipCode: <input name="zipCode" class="form-control">
                            RFC: <input name="rfc" class="form-control">   
                            
                                                    
                            <div class="panel-default">
                                Al terminar el registro de la informacion necesaria la primera vez que inica sesion el usuario podra modificar dicha informacion en su configuracion de cuenta.
                            </div>
                            <div class="panel-heading">
                                <button type="submit">Guardar y continuar</button>
                            </div>

                        </form>


                    @else
                        <p>Corporation</p>

                        <form method="POST" action="/postRegister/{{Auth::user()->role}}">
                        {{ csrf_field() }}
                            <label>location</label>
                            <textarea name="location" class="form-control"></textarea>
                            Phone Number: <input name="phoneNumber" class="form-control">
                            Address: <input name="address" class="form-control">
                            ZipCode: <input name="zipCode" class="form-control">
                            RFC: <input name="rfc" class="form-control">   
                            Work Area: <input name="workArea" class="form-control">   
                            <div class="panel-default">
                                Al terminar el registro de la informacion necesaria la primera vez que inica sesion el usuario podra modificar dicha informacion en su configuracion de cuenta.
                            </div>
                            <div class="panel-heading">
                                <button type="submit">Guardar y continuar</button>
                            </div>

                        </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
