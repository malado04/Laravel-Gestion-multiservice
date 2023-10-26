<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Caisse;
use App\Models\Service;
use App\Models\Pdv;
use App\Models\Solde;
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
        $cai = Caisse::all();
        return view('caisses.index', [
            'caisses' => $cai,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $pdv = Pdv::all();
        return view('caisses.create', [
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

        if (Caisse::where('libelle', $request['libelle'])->where('fk_pdv_id', $request['fk_pdv_id'])->exists() == true) {

        return redirect()->route('caisses.create')
            ->with('error_message', 'Cette caisse existe déja, veuillez utiliser une autre svp');
        } 

        Caisse::create([
            'libelle' => $request['libelle'],
            'fk_pdv_id' => $request->fk_pdv_id,
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
    public function edit(Caisse $caisse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caisse $caisse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse $caisse)
    {
        //
    }
}
