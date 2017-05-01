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
        $announcements = DB::table('announcements')
                         ->where('user_id',Auth::user()->id)->get();
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
         'created_at' => date("Y-m-d H:i:s")
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
    
    public function search(Request $request,$case)
    {
        $announcements = null;
        
        switch ($case) {
            case 'last':
                $announcements = DB::table('announcements')
                                ->join('users','users.id','=','announcements.user_id')
                                ->join('corporations','users.id','corporations.user_id')
                                ->where('announcements.user_id','!=',Auth::user()->id)
                                ->orderBy('announcements.created_at', 'desc')
                                ->select(
                                    'announcements.created_at as fechaCreacion',
                                    'announcements.name as nombre',
                                    'announcements.category as categoria',
                                    'announcements.budget as presupuesto',
                                    'users.name as empresaSolicitante',
                                    'announcements.id as id'
                                  )    
                                ->get();
            break;
            case 'area':
                $data = $request->data ? $request->data : '';
                $announcements = DB::table('announcements')
                                ->join('users','users.id','=','announcements.user_id')
                                ->join('corporations','users.id','corporations.user_id')
                                ->where([
                                    ['announcements.user_id','!=',Auth::user()->id],
                                    ['corporations.workArea','like','%'.$data.'%']
                                ])
                                ->orderBy('announcements.created_at', 'desc')
                                ->select(
                                    'announcements.created_at as fechaCreacion',
                                    'announcements.name as nombre',
                                    'announcements.category as categoria',
                                    'announcements.budget as presupuesto',
                                    'users.name as empresaSolicitante',
                                    'announcements.id as id'
                                  )    
                                ->get();
            break;
        }
        return json_encode($announcements);
    }
    
    /*
    public function deleteAnnouncement(Request $request, $id){
        $user = DB::table('announcements')->where('id',$id)->select('user_id')->first();
        DB::table('announcements')->where('id',$id)->delete();
        return redirect()->action('announcement@announcement',['id'=>$user->user_id]);
    }

    public function announcement(Request $request , $id ){
         $announcements =  DB::table('announcements')->where('user_id',$id)->get();
         return view('/Corporation/convocatoria',['announcements'=>$announcements]);
    }
    */
}
