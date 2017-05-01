<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

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
    
    public function addMember(Request $request)
    {
        //seledd($request->all());
        
                  $User = new \App\User;
            $User->name = $request->nombre;
            $User->email= $request->email;
            $User->role = 'Personal';
        $User->password = 'password';
                  $User->save();
                  
                 $PersonalInfo = new \App\Personal;
           $PersonalInfo->area = $request->area;
        $PersonalInfo->user_id = $User->id;
                  $PersonalInfo->save();
                  
                  
                  $Team_Member = new \App\Team;
         $Team_Member->user_id = $User->id;
  $Team_Member->corporation_id = Auth::user()->id;
                  $Team_Member->save();
        
        return json_encode('ok');
    }
    
    public function members()
    {
        $Members = DB::table('users')->join('personals','personals.user_id','=','users.id')
                                     ->join('teams','teams.user_id','users.id')->select('*')->get();
        return json_encode($Members);
    }
    
    public function member($id)
    {
        $Member = DB::table('users')->join('personals','personals.user_id','=','users.id')
                                     ->join('teams','teams.user_id','users.id')->select('*')
                                     ->where('users.id',$id)->first();
        return json_encode($Member);
    }
}
