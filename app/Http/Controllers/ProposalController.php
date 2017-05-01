<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function __construct()
    {
        //El constructor es el encargado de inicializar la instancia del controlador.
        //Se carga el middleware auth en todo controlador que requiera tener una sesion activa 
        //para poder ser utilizado una vez iniciada la sesion con email y password
        $this->middleware('auth');
    }
    
    public function new(Request $request)
    {
        return view('proposals',[
            'announcement' => $request->announcement
        ]);
    }
}
