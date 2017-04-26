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
     */
    public function index()
    {
       
    }

    public function getAnnouncements(){
        $announcements = DB::table('announcements')->get();
        //dd($annoucements);
        return view ('announcements',['announcements' => $announcements]);
    }
    /*------Projects-----*/
    public function getProjects(Request $request,$id){
        $projects =  DB::table('projects')->where('id',$id)->get();
         return view('projects',['projects'=>$projects]);
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
        $announcements =  DB::table('announcements')->where('id',$id)->get();
         return view('/Corporation/convocatoria',['announcements'=>$announcements]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

      public function __construct()
    {
        //El constructor es el encargado de inicializar la instancia del controlador.
        //Se carga el middleware auth en todo controlador que requiera tener una sesion activa 
        //para poder ser utilizado una vez iniciada la sesion con email y password
        $this->middleware('auth');
    }

 public function announcement(Request $request , $id ){
         $announcements =  DB::table('announcements')->where('id',$id)->get();
         return view('/Corporation/convocatoria',['announcements'=>$announcements]);
     }

        public function crearConvocatoria(Request $request, $id){
         DB::table('announcements')->insert([
            'name' => $request->name,
            'category' => $request->category,
            'duration' => $request->duration,
             'budget' => $request->budget,
             'description' => $request->description,
            'user_id' => $request->user_id,
           
        ]);
     
       return redirect()->action('announcement@getAnnouncements');
     }
     
 
 
     

}
