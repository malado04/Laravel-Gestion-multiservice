<?php

namespace App\Http\Controllers;

use App\Models\Solde;
use App\Models\Operation;
use App\Models\Caisse;
use App\Models\Service;
use App\Models\Pdv;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerSolde extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sol = Solde::all();
        return view('soldes.index', [
            'soldes' => $sol
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cai = Caisse::all();
        return view('soldes.create', [
            'caisses' => $cai
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
            'montant' => 'required',
        ]);  

        // if (Zone::where('montant', $request['montant'])->exists()) {

        // return redirect()->route('zones.create')
        //     ->with('error_message', 'Cette zone existe déja, veuillez utiliser une autre svp');
        // } 

        Solde::create([
            'montant' => $request['montant'],
            'fk_caisse_id' => $request['fk_caisse_id'],
            'fk_sup_id' => Auth::user()->id,
        ]);

        return redirect()->route('soldes.index')
            ->with('success_message', 'solde créer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solde  $solde
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $sol = Solde::find($id);
        $act = 1;

        $cai = Caisse::where("id", optional($sol->caisse)->id)->get();
        $serv = Service::all();
        $opres = Operation::where("fk_solde_id", $id)->where("operation", "Retrait")->get();
        $opdes = Operation::where("fk_solde_id", $id)->where("operation", "Depot")->get();
        
            $sum_opres = Operation::select("fk_solde_id")
                ->where("fk_solde_id", $id)->where("operation", "Retrait")
                ->selectRaw("SUM(montant) as sum_montant")
                ->groupBy('fk_solde_id')
                ->get();
            $sum_opdes = Operation::select("fk_solde_id")
                ->where("fk_solde_id", $id)->where("operation", "Depot")
                ->selectRaw("SUM(montant) as sum_montant")
                ->groupBy('fk_solde_id')
                ->get();

        if (!isset($sol)) return redirect()->route('pdvs.show', optional($cai->pdv)->id)
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');

        return view('soldes.show', [
            'sum_opres' => $sum_opres,
            'sum_opdes' => $sum_opdes,
            'servs' => $serv,
            'sol' => $sol,
            'opres' => $opres,
            'opdes' => $opdes,
            'cai' => $cai[0],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solde  $solde
     * @return \Illuminate\Http\Response
     */
    public function edit(Solde $solde)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solde  $solde
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solde $solde)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solde  $solde
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solde $solde)
    {
        //
    }
}
