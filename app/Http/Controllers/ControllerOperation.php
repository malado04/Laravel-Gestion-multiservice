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
        ]);

        // var_dump($request->fk_caisse_id);
        // $cai = Caisse::find($request->fk_caisse_id);
        $cai = Caisse::where("id", $request->fk_caisse_id)->get();
        $act = 1;
        $sol = Solde::where("id", $request->fk_solde_id)->where("act", $act)->get();
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
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        //
    }
}
