<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ProposalController extends Controller
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
        return view('Proposals/index');
    }
    
    public function new(Request $request)
    {
        return view('Proposals/proposals',[
            'announcement' => $request->announcement
        ]);
    }

    public function send(Request $request)
    {
        DB::table('proposals')->insert([
            'sender_id' => Auth::user()->id,
          'receiver_id' => $request->receiver,
               'status' =>'Sent',
          'description' => $request->proposal,
      'announcement_id' => $request->announcement,
           'created_at' => date("Y-m-d H:i:s")
        ]);

        return "ok";
    }

    public function search(Request $request, $case)
    {
        $Proposals = null;
        switch ($case) {
            case 'request-sent':
               $Proposals  = DB::table('proposals')
                            ->join('users','users.id','=','proposals.receiver_id')
                            ->join('announcements','announcements.id','=','proposals.announcement_id')
                            ->join('corporations','corporations.id','=','proposals.receiver_id')
                            ->where('proposals.sender_id',Auth::user()->id)
                            ->select(
                                    'proposals.created_at as fecha',
                                    'announcements.name as nombre',
                                    'announcements.category as categoria',
                                    'announcements.budget as presupuesto',
                                    'users.name as empresa',
                                    'announcements.id as id',
                                    'proposals.status as status'
                                )
                            ->get();
                
            break;
            case 'request-arrived':
                DB::table('proposals')->where('receiver_id',Auth::user()->id)->update([
                    'status' => 'Revision'
                ]);

                $Proposals  = DB::table('proposals')
                            ->join('users','users.id','=','proposals.sender_id')
                            ->join('announcements','announcements.id','=','proposals.announcement_id')
                            ->join('corporations','corporations.id','=','proposals.receiver_id')
                            ->where('proposals.receiver_id',Auth::user()->id)
                            ->select(
                                    'proposals.created_at as fecha',
                                    'announcements.name as nombre',
                                    'announcements.category as categoria',
                                    'announcements.budget as presupuesto',
                                    'users.name as empresa',
                                    'announcements.id as id',
                                    'proposals.status as status'
                                )
                            ->get();
            break;
        }
        //dd($Proposals->all());

        return json_encode($Proposals);
    }

    public function showProposal($id)
    {
        $Proposal = DB::table('proposals')->join('users','users.id','proposals.sender_id')->where('proposals.id',$id)->first();

        return json_encode($Proposal);
    }
}
