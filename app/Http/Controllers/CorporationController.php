<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorporationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //El constructor es el encargado de inicializar la instancia del controlador.
        //Se carga el middleware auth en todo controlador que requiera tener una sesion activa 
        //para poder ser utilizado una vez iniciada la sesion con email y password
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Corporation.dashboard');
    }
    
    public function team()
    {
        return view('Corporation.team');
    }
    
    public function newMember(Request $request)
    {
        return $request->all();
    }
}
