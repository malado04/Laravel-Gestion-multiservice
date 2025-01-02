<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Caisse;
use App\Models\Service;
use App\Models\Pdv;
use App\Models\Solde;
use App\Models\Zone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerCaisse extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

         if (Auth::user()->admin == 0) {
            $caisses = Caisse::where("fk_proprio_id", Auth::user()->id)->get();
            return view('caisses.index', [
                'caisses' => $caisses
            ]);
        }else if (Auth::user()->admin == 1) {
            $caisses = Caisse::where("fk_proprio_id", Auth::user()->id)->get();
            return view('caisses.index', [
                'caisses' => $caisses
            ]);
        } else {
            $caisses = Caisse::where("fk_proprio_id", Auth::user()->fk_proprio_id)->get();
            return view('caisses.index', [
                'caisses' => $caisses
            ]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $zone = Zone::where("fk_proprio_id", Auth::user()->id)->get();
        $pdv = Pdv::where('fk_proprio_id', Auth::user()->id)->get();
        return view('caisses.create', [
            'zones' => $zone,
            'pdvs' => $pdv,
        ]);
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
            'libelle' => 'required',
        ]);  

        if (Caisse::where('libelle', $request['libelle'])->where('fk_proprio_id', Auth::user()->id)->where('fk_pdv_id', $request['fk_pdv_id'])->exists() == true) {

        return redirect()->route('caisses.create')
            ->with('error_message', 'Cette caisse existe déja, veuillez utiliser une autre svp');
        } 

        Caisse::create([
            'libelle' => $request['libelle'],
            'fk_pdv_id' => $request->fk_pdv_id,
            'fk_proprio_id' => Auth::user()->id,
            'fk_user_id' => Auth::user()->id,
        ]);

        return redirect()->route('caisses.index')
            ->with('success_message', 'Zone créer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */

    public function show( $id)
    {
        $act = 1;
        $cai = Caisse::find($id);
        $sol = Solde::where("fk_caisse_id", $id)->where("act", $act)->get();
        if (!isset($sol)) return redirect()->route('pdvs.show', optional($cai->pdv)->id)
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');

        return view('caisses.show', [
            'cai' => $cai,
            'sol' => $sol,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cai = Caisse::find($id);

        $pdv = Pdv::all();
        return view('caisses.edit', [
            'cai' => $cai,
            'pdvs' => $pdv,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cai = Caisse::find($id);

        $user = Auth::user()->id;
        $cai->libelle = $request->libelle;
        $cai->fk_pdv_id = $request->fk_pdv_id;
        $cai->fk_up_id = $user;
        $cai->save();

          return redirect()->route('caisses.index')
            ->with('success_message', 'Modification éffectué avec success'); //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $caisse = Caisse::find($id);
        if ($caisse) $caisse->delete();
        return redirect()->route('caisses.index')
            ->with('success_message', 'Supprimée');
    }
}
