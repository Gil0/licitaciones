<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;

class announcement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        //El constructor es el encargado de inicializar la instancia del controlador.
        //Se carga el middleware auth en todo controlador que requiera tener una sesion activa 
        //para poder ser utilizado una vez iniciada la sesion con email y password
        $this->middleware('auth');
    }
    public function index()
    {
       return view ('announcements');
    }

    public function getAnnouncements(){
        $announcements = DB::table('announcements')->get();
        //dd($annoucements);
        return json_encode($announcements);
    }
    
    public function crearConvocatoria(Request $request){
         
        //dd($request->all());
        DB::table('announcements')->insert([
                'name' => $request->nombre,
            'category' => $request->categoria,
            'duration' => $request->duracion,
              'budget' => $request->presupuesto,
         'description' => $request->descripcion,
            'user_id' => Auth::user()->id,
           
        ]);
        
        return json_encode('ok');
    }
    
    public function verAnnouncement(Request $request, $id){
        $announcement = DB::table('announcements')->where('id', $id)->first();
        
        return json_encode($announcement);
    }
    
    public function editAnnouncement(Request $request, $id){
        $announcement = DB::table('announcements')->where('id', $id)->first();
        return view('EditAnnouncement', ['announcement' => $announcement]);
    }
    public function updateAnnouncement(Request $request, $id){
        DB::table('announcements')->where('id',$id)
            ->update(['name'=>$request->name,
            'category' => $request->category,
            'duration' => $request->duration,
            'budget' => $request->budget,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);
        
        return redirect('/announcements');
    }
    
     public function deleteAnnouncement(Request $request, $id){
        $user = DB::table('announcements')->where('id',$id)->select('user_id')->first();
        DB::table('announcements')->where('id',$id)->delete();
        return redirect()->action('announcement@announcement',['id'=>$user->user_id]);
    }
    
    
    
    /*------Projects-----*/
    public function getProjects(Request $request,$id){
        $projects =  DB::table('projects')
        ->join('announcements', 'projects.announcement_id','=','announcements.id')
        ->select('projects.*','announcements.name', 'announcements.budget', 'announcements.description')
        ->where('projects.user_id',$id)
        ->get();    
         return view('projects',['projects'=>$projects]);
    }

    
    

   
    
   

    public function announcement(Request $request , $id ){
         $announcements =  DB::table('announcements')->where('user_id',$id)->get();
         return view('/Corporation/convocatoria',['announcements'=>$announcements]);
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
