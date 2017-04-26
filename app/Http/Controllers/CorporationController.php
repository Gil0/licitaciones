<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function myteam(Request $request, $id)
    {
          $personal = DB::table('users')
            ->join('personals', 'users.id', '=', 'personals.user_id')
            ->select('users.name','users.email','personals.phoneNumber')
            ->where('personals.idCorporation',$id)
            ->get();          
        return view('Corporation.myteam',['personal'=>$personal]);
    }

    public function newteam(Request $request, $id)
    {
          $personal = DB::table('users')
            ->join('personals', 'users.id', '=', 'personals.user_id')
            ->select('users.name','users.email','personals.area','personals.phoneNumber',
            'personals.address','personals.rfc','personals.zipCode','personals.idCorporation','personals.id')
            ->where('idCorporation',NULL)
            ->get();  
        return view('Corporation.newpersonal',['personal'=>$personal]);
    }

    public function projects()
    {
        return view('.projects');
    }   

     public function cambiarStatus(Request $request, $id)
    {
        $evento = DB::table('personals')->where('id',$id)->update(['idCorporation' => $request->status]);        
        return json_encode('ok');
    }

}
