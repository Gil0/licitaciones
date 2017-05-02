<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectsController extends Controller
{
    
    public function __construct()
    {
        //El constructor es el encargado de inicializar la instancia del controlador.
        //Se carga el middleware auth en todo controlador que requiera tener una sesion activa 
        //para poder ser utilizado una vez iniciada la sesion con email y password
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('projects');
    }
    
    public function getProjects(Request $request,$id){
        $projects =  DB::table('projects')
        ->join('announcements', 'projects.announcement_id','=','announcements.id')
        ->select('projects.*','announcements.name', 'announcements.budget', 'announcements.description')
        ->where('projects.user_id',$id)
        ->get();    
         return view('projects',['projects'=>$projects]);
    }
     
    
 
     public function addProject(Request $request, $id){
          DB::table('projects')->insert([
            'cost' => $request->cost,
            'duration' => $request->duration,
             'description' => $request->description,
            'user_id' => $request->user_id,
            'announcement_id' => $id,
        ]);
        return redirect()->action('announcement@getAnnouncements');
     }

      public function verProjects(Request $request,$id){
        $projects =  DB::table('projects')
        ->join('announcements', 'projects.announcement_id','=','announcements.id')
        ->select('projects.*','announcements.*')
        ->where('projects.id',$id)
        ->first();
        
         return view('verProject',['projects'=>$projects]);
    }

}
