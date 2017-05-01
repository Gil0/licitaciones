<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Corporation;
use App\Personal;
use Auth;

class HomeController extends Controller
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
        if(Auth::user()->role == 'Personal')
        {
            if(Auth::user()->Personal)
            {
                return view('Personal.dashboard');
            }
            else
            {
                return view('home');
            }
        }
        else 
        {
            if(Auth::user()->Corporation)
            {
                return view('Corporation.dashboard');
            }
            else
            {
                return view('home');
            }
        }
    }

    public function postRegister(Request $request, $role)
    {
        $redirect = null;
        //dd($request->all());

        if($role == 'Corporation')
        {
            $User = Auth::user();

            if($User->Corporation)
            {
                $User->Corporation->location = $request->location;
                $User->Corporation->save();
            }
            else
            {
                $Corporation = new Corporation;
                $Corporation->location = $request->location;
                $Corporation->address = $request->address;
                $Corporation->workArea = $request->workArea;
                $User->Corporation()->save($Corporation);
            }
            
            $redirect = "/corporation/dashboard";
        }
        else
        {
            $User = Auth::user();

            if($User->Personal)
            {
                $User->Personal->area = $request->area;
                               
                $User->Personal->save();
            }
            else
            {
                $Personal = new Personal;
                $Personal->area = $request->area;
                $Personal->phoneNumber = $request->phoneNumber;
                $Personal->address = $request->address;
                $Personal->rfc = $request->rfc;
                $Personal->zipCode = $request->zipCode;
                $User->Personal()->save($Personal);
            }

            $redirect = "/personal/dashboard";
        }

        return redirect($redirect);
    }
}
