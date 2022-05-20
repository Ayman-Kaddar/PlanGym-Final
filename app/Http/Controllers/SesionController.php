<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SesionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->id();
        $userDB = DB::table('users')->where('id', $user)->first();

        if ($userDB->person == "client") {
            if (Sesion::where('id_client', $user) != null) {
                $sessions = Sesion::where('id_client', $user)->orderBy('day', 'DESC')->get();
    
                $sessionsArray = array();
                $l = 0;
                for ($i = 0; $i < count($sessions); $i++) {
                    if ($i == 0) {
                        array_push($sessionsArray, array(date('d-m-Y', strtotime($sessions[$i]->day))));
                        array_push($sessionsArray[$l], $sessions[$i]);
                        
                    } else {
                        if ($sessions[$i]->day == $sessions[$i-1]->day) {
                            array_push($sessionsArray[$l], $sessions[$i]);
                        } else {
                            $l++;
                            array_push($sessionsArray, array(date('d-m-Y', strtotime($sessions[$i]->day))));
                            array_push($sessionsArray[$l], $sessions[$i]);
                        }
                    } 
                    
                }

                return view('session.index')
                    -> with('sessionsArray', $sessionsArray)
                    -> with('user', "client");
    
            } else {
                return view('session.index')
                    -> with('user', "client");
            }
        } else {
            
            $clients = DB::table('users')->where('person', "client")->get();
            return view('session.index')
                -> with('clients', $clients)
                -> with('user', "trainer");  
        }

    }

    public function indexSessionTrainer($id) {

        if (Sesion::where('id_client', $id) != null) {
            $sessions = Sesion::where('id_client', $id)->orderBy('day', 'DESC')->get();
            
            $sessionsArray = array();
            $l = 0;
            for ($i = 0; $i < count($sessions); $i++) {
                if ($i == 0) {
                    array_push($sessionsArray, array(date('d-m-Y', strtotime($sessions[$i]->day))));
                    array_push($sessionsArray[$l], $sessions[$i]);
                    
                } else {
                    if ($sessions[$i]->day == $sessions[$i-1]->day) {
                        array_push($sessionsArray[$l], $sessions[$i]);
                    } else {
                        $l++;
                        array_push($sessionsArray, array(date('d-m-Y', strtotime($sessions[$i]->day))));
                        array_push($sessionsArray[$l], $sessions[$i]);
                    }
                } 
                
            }

            
            
            return view('session.training')
                -> with('sessionsArray', $sessionsArray)
                -> with('user', $id);

        } else {
            return view('session.training')
                -> with('user', $id);
        }

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
        $request->validate([
            'name' => 'required|max:50',
        ]);

        $sesion = new Sesion();

        $today = new DateTime();

        $sesion->name = $request->name;
        $sesion->day = new DateTime();
        $sesion->start_time = $today->format("H:i:s");
        $sesion->id_client = $request->idUser;

        $sesion->save();

        return redirect()->route('session.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function show(Sesion $sesion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesion $sesion)
    {
        //
    }

    public function updateSession(Request $request)
    {

        $campos = "name = '" . $request->nombre . "',";

        if ($request->peso != null) {
            $campos .= " weight = " . $request->peso . ",";
            
        }

        if ($request->repeticion != null) {
            $campos .= " repetition = " . $request->repeticion . ",";
        }

        if ($request->tiempoRepeticion != null) {
            $campos .= " time = " . $request->tiempoRepeticion . ",";
        }

        if ($request->observaciones != null) {
            $campos .= " remark = '" . $request->observaciones . "',";
        }

        if (isset($request->finalTiempo)) {
            $today = new DateTime();
            $campos .= " finish_time = '" . $today->format("H:i:s") . "',";
        }

        $sql = 'UPDATE sesions SET ' . $campos . ' WHERE id = ' . $request->id . ";";
        $sql = str_replace(", WHERE", " WHERE", $sql);

        DB::update($sql);

        $session = Sesion::where('id', $request->id)->get();

        return redirect()->route('session.training', ['id' => $session[0]->id_client]);


    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesion $sesion)
    {

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesion $sesion)
    {
        $sesion->delete();

        //return redirect()->route('session.training', ['id' => $idClient]);
        return redirect()->route('session.index');

    }
}
