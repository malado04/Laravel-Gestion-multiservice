<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Commission;
use App\Models\Caisse;
use App\Models\Solde;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerOperation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        // $com = Commission::all();

        // foreach ($com as $key => $co) {
        //    if ($request->montant <= $com->min && $request->montant >= $com->max) {
        //         echo "Min"; echo "<br>";
        //         echo "Max"; echo "<br>";
        //         echo "Montant"; echo "<br>";
        //    } else{

        //         echo "Min"; echo "<br>";
        //         echo "Max"; echo "<br>";
        //         echo "Montant"; echo "<br>";
        //    }
           
        // }

        Operation::create([
            'montant' => $request->montant,
            'operation' => $request->operation,
            'fk_service_id' => $request->fk_service_id,
            'fk_caisse_id' => $request->fk_caisse_id,
            'fk_solde_id' => $request->fk_solde_id,
            'fk_user_id' => Auth::user()->id,
            'fk_proprio_id' => Auth::user()->id,
        ]);

        // var_dump($request->fk_caisse_id);
        // $cai = Caisse::find($request->fk_caisse_id);
        $cai = Caisse::where("id", $request->fk_caisse_id)->get();
        $act = 1;
        $sol = Solde::where("id", $request->fk_solde_id)->where("act", $act)->get();
        $opres = Operation::where("fk_solde_id", $request->fk_solde_id)->where("operation", "Retrait")->get();
        $opdes = Operation::where("fk_solde_id", $request->fk_solde_id)->where("operation", "Depot")->get();

            $sum_opres = Operation::select("fk_solde_id", "id")
                ->where("fk_solde_id", $request->fk_solde_id)->where("operation", "Retrait")
                ->selectRaw("SUM(montant) as sum_montant")
                ->groupBy('fk_solde_id', 'id')
                ->get();
            $sum_opdes = Operation::select("fk_solde_id", "id")
                ->where("fk_solde_id", $request->fk_solde_id)->where("operation", "Depot")
                ->selectRaw("SUM(montant) as sum_montant")
                ->groupBy('fk_solde_id', 'id')
                ->get();

        $serv = Service::all();
        // var_dump($cai);
       
        return view('soldes.show', [
            'sum_opres' => $sum_opres,
            'sum_opdes' => $sum_opdes,
            'servs' => $serv,
            'cai' => $cai[0],
            'opres' => $opres,
            'opdes' => $opdes,
            'sol' => $sol[0],
        ],)->with('success_message', $request->operation.' effectué avec success');

        // return redirect()->route('caisses.show', $request->fk_caisse_id)
            // ->with('success_message', $request->operation.' effectué avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = Operation::find($id);
        $serv = Service::all();

        if (!$operation) return redirect()->route('zones.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('operations.edit', [
            'operation' => $operation,
            'servs' => $serv,
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zone  $Operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        
        if ($request->fk_solde_id) {

            if ( Commission::where("max", ">=", $request->montant)->exists() ) {

            $com = Commission::where("fk_service_id", $request->fk_service_id)->where("min", "<=", $request->montant)->where("max", ">=", $request->montant)->get();
            // $com[0]->montant;// // foreach ($com as $key => $com) {
            if ($request->montant <= $com[0]->max || $request->montant >= $com[0]->min && $request->operation == $com[0]->typeoperation && $request->fk_service_id == $com[0]->fk_service_id) {

            $ope = Operation::find($id);
            $ope->montant = $request->montant;
            $ope->fk_service_id = $request->fk_service_id;
            $ope->operation = $request->operation;
            $ope->fk_up_id = Auth::user()->id;
            $ope->save();
            
            $sol = Solde::find($request->fk_solde_id);
            $cai = Caisse::where("id", optional($sol->caisse)->id)->get();
            $serv = Service::all();
            $opres = Operation::where("fk_solde_id", $request->fk_solde_id)->where("operation", "Retrait")->get();
            $opdes = Operation::where("fk_solde_id", $request->fk_solde_id)->where("operation", "Depot")->get();
            
                $sum_opres = Operation::select("fk_solde_id", "id")
                    ->where("fk_solde_id", $request->fk_solde_id)->where("operation", "Retrait")
                    ->selectRaw("SUM(montant) as sum_montant")
                    ->groupBy('fk_solde_id', 'id')
                    ->get();
                $sum_opdes = Operation::select("fk_solde_id", "id")
                    ->where("fk_solde_id", $request->fk_solde_id)->where("operation", "Depot")
                    ->selectRaw("SUM(montant) as sum_montant")
                    ->groupBy('fk_solde_id', 'id')
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
                     if (($sum_opres->isNotEmpty() && $sum_opdes->isEmpty())) {
                       
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres[0]->sum_montant,
                            'sum_oprescom' => $sum_opres[0]->sum_commission,
                            'sum_opdescom' => $sum_opdes,
                            'sum_opdes' => $sum_opdes,
                            'servs' => $serv,
                            'solde' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]);     

                    }else if ($sum_opdes->isNotEmpty() && $sum_opres->isEmpty()) {
                       
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres,
                            'sum_opdes' => $sum_opdes[0]->sum_montant,
                            'sum_oprescom' => $sum_opres,
                            'sum_opdescom' => $sum_opdes[0]->sum_commission,
                            'servs' => $serv,
                            'solde' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]);     

                    } if ((($sum_opres->isNotEmpty()) && ($sum_opdes->isNotEmpty()))) {
                       
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres[0]->sum_montant,
                            'sum_opdes' => $sum_opdes[0]->sum_montant,
                            'sum_oprescom' => $sum_opres[0]->sum_commission,
                            'sum_opdescom' => $sum_opdes[0]->sum_commission,
                            'servs' => $serv,
                            'solde' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]);     

                    } else {
                        # code...
                        return view('soldes.show', [
                            'sum_opres' => $sum_opres,
                            'sum_opdes' => $sum_opdes,
                            'sum_oprescom' => $sum_opres,
                            'sum_opdescom' => $sum_opdes,
                            'servs' => $serv,
                            'solde' => $sol,
                            'opres' => $opres,
                            'opdes' => $opdes,
                            'cai' => $cai[0],
                        ]); 
                    } 

                }else{
                    echo "string";
                }
            }else{
                
                $operation = Operation::find($id);
                $serv = Service::all();

                if (!$operation) return redirect()->route('zones.index')
                    ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
                return view('operations.edit', [
                    'operation' => $operation,
                    'servs' => $serv,
                ])->with('success_message', 'Vous avez dépassé la valeur maximale du solde');

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $Operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $Operation = Operation::find($id);
        if ($Operation) $Operation->delete();
        return redirect()->route('soldes.show', $Operation->fk_solde_id)
            ->with('success_message', 'Supprimée');
    }
}
