<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $announcements= BD::table('announcements')->select('*')->get();
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

 public function annuncement(Request $request , $id ){
         $annuncements =  DB::table('annuncements')->select('*')->get();
         return view('/Corporation/convocatoria',['annuncements'=>$annuncements]);

     }

        public function crearConvocatoria(Request $request, $id){
         DB::table('annuncements')->insert([
            'name' => $request->name,
            'category' => $request->category,
            'duration' => $request->duration,
             'budget' => $request->budget,
             'description' => $request->description,
            'user_id' => $id,
           
        ]);
     
       return redirect()->action('UserController@profesores');
     }
     
 

     

}
