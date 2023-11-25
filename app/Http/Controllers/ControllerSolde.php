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

        if ($request->fk_solde_id) {
            
            Operation::create([
                'montant' => $request->montant,
                'operation' => $request->operation,
                'fk_service_id' => $request->fk_service_id,
                'fk_caisse_id' => $request->fk_caisse_id,
                'fk_solde_id' => $request->fk_solde_id,
                'fk_user_id' => Auth::user()->id,
            ]);

            $sol = Solde::find($request->fk_solde_id);
            $cai = Caisse::where("id", optional($sol->caisse)->id)->get();
            $serv = Service::all();
            $opres = Operation::where("fk_solde_id", $request->fk_solde_id)->where("operation", "Retrait")->get();
            $opdes = Operation::where("fk_solde_id", $request->fk_solde_id)->where("operation", "Depot")->get();
            
                $sum_opres = Operation::select("fk_solde_id")
                    ->where("fk_solde_id", $request->fk_solde_id)->where("operation", "Retrait")
                    ->selectRaw("SUM(montant) as sum_montant")
                    ->groupBy('fk_solde_id')
                    ->get();
                $sum_opdes = Operation::select("fk_solde_id")
                    ->where("fk_solde_id", $request->fk_solde_id)->where("operation", "Depot")
                    ->selectRaw("SUM(montant) as sum_montant")
                    ->groupBy('fk_solde_id')
                    ->get();

                // $sum_opresr_ac = Operation::select("fk_solde_id")
                //     ->where("fk_solde_id", $request->fk_solde_id)->where("operation", "Retrait avec code")
                //     ->selectRaw("SUM(montant) as sum_montant")
                //     ->groupBy('fk_solde_id')
                //     ->get();
                // $sum_opdesr_ac = Operation::select("fk_solde_id")
                //     ->where("fk_solde_id", $request->fk_solde_id)->where("operation", "Depot avec code")
                //     ->selectRaw("SUM(montant) as sum_montant")
                //     ->groupBy('fk_solde_id')
                //     ->get();
           if (($sum_opres->isNotEmpty()) && ($sum_opdes->isEmpty())) {
                       
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres[0]->sum_montant,
                            'sum_opdes' => $sum_opdes,
                            'servs' => $serv,
                            'sol' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]);     

                    }else if ($sum_opdes->isNotEmpty() && ($sum_opdes->isEmpty())) {
                       
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres,
                            'sum_opdes' => $sum_opdes[0]->sum_montant,
                            'servs' => $serv,
                            'sol' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]);     

                    } if ((($sum_opres->isNotEmpty()) && ($sum_opdes->isNotEmpty()))) {
                       
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres[0]->sum_montant,
                            'sum_opdes' => $sum_opdes[0]->sum_montant,
                            'servs' => $serv,
                            'sol' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]);     

                    } else {
                        # code...
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
        } 
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
        // $act = 1;
             $sol = Solde::find($id);
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
            // if (!isset($sol)) return redirect()->route('pdvs.show', optional($cai->pdv)->id)
            //     ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
                    if (($sum_opres->isNotEmpty())) {
                       
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres[0]->sum_montant,
                            'sum_opdes' => $sum_opdes,
                            'servs' => $serv,
                            'sol' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]);     

                    }else if ($sum_opdes->isNotEmpty()) {
                       
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres,
                            'sum_opdes' => $sum_opdes[0]->sum_montant,
                            'servs' => $serv,
                            'sol' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]);     

                    } if ((($sum_opres->isNotEmpty()) && ($sum_opdes->isNotEmpty()))) {
                       
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres[0]->sum_montant,
                            'sum_opdes' => $sum_opdes[0]->sum_montant,
                            'servs' => $serv,
                            'sol' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]);     

                    } else {
                        # code...
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
