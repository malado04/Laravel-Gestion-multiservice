<?php

namespace App\Http\Controllers;

use App\Models\Solde;
use App\Models\Operation;
use App\Models\Caisse;
use App\Models\Service;
use App\Models\Commission;
use App\Models\Zone;
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
       
         if (Auth::user()->admin == 0) {
            $solde = Solde::where("fk_proprio_id", Auth::user()->id)->get();
            return view('soldes.index', [
                'soldes' => $solde
            ]);
        }else if (Auth::user()->admin == 1) {
            $solde = Solde::where("fk_proprio_id", Auth::user()->id)->get();
            return view('soldes.index', [
                'soldes' => $solde
            ]);
        } else {
            $cai = Caisse::where("id", Auth::user()->fk_caisse_id)->get();
            $solde = Solde::where("fk_caisse_id", $cai[0]->id)->where("fk_proprio_id", Auth::user()->fk_proprio_id)->get();
            var_dump($solde);
            return view('soldes.index', [
                'soldes' => $solde
            ]);
        }

        //  $sol = Solde::all();
        // return view('soldes.index', [
        //     'soldes' => $sol
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->admin == 0) {
             
            $zone = Zone::where("fk_proprio_id", Auth::user()->id)->get();
            $pdv = Pdv::where('fk_proprio_id', Auth::user()->id)->get();
            $cai = Caisse::where("fk_proprio_id", Auth::user()->id)->get();
            return view('soldes.create', [
                'zones' => $zone,
                'pdvs' => $pdv,
                'caisses' => $cai
            ]);
        } elseif (Auth::user()->admin == 1) {
            # code...
        } else {  
            // $useca = User::where('fk_caisse_id')->get();
            // $zone = Zone::where("fk_proprio_id", Auth::user()->id)->get();
            // $pdv = Pdv::where('fk_proprio_id', Auth::user()->id)->get();
            $zone = Zone::where("fk_proprio_id", Auth::user()->fk_proprio_id)->get();
            $cai = Caisse::where("id", Auth::user()->fk_caisse_id)->where("fk_proprio_id", Auth::user()->fk_proprio_id)->get();
            return view('soldes.create', [
                'zones' => $zone,
                'caisses' => $cai
            ]);
        }
      
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

            if ( Commission::where("max", ">=", $request->montant)->where("fk_service_id", $request->fk_service_id)->exists() ) {
            
                $com = Commission::where("fk_service_id", $request->fk_service_id)->where("min", "<=", $request->montant)->where("max", ">=", $request->montant)->get();

                if ($com->isNotEmpty()) {

                   if ($request->montant <= $com[0]->max || $request->montant >= $com[0]->min && $request->operation == $com[0]->typeoperation && $request->fk_service_id == $com[0]->fk_service_id) {
                       
                       Operation::create([
                            'montant' => $request->montant,
                            'operation' => $request->operation,
                            'commission' => $com[0]->montant,
                            'fk_service_id' => $request->fk_service_id,
                            'fk_caisse_id' => $request->fk_caisse_id,
                            'fk_solde_id' => $request->fk_solde_id,
                            'fk_proprio_id' => Auth::user()->id,
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

                            if (($sum_opres->isNotEmpty()) && ($sum_opdes->isEmpty())) {
                               
                                return redirect()->route('soldes.show', [
                                    'sum_opres' => $sum_opres[0]->sum_montant,
                                    'sum_oprescom' => $sum_opres[0]->sum_commission,
                                    'sum_opdescom' => $sum_opdes,
                                    'sum_opdes' => $sum_opdes,
                                    'servs' => $serv,
                                    'solde' => $sol,
                                    'opres' => $opres,
                                    'opdes' => $opdes,
                                    'cai' => $cai[0],
                                ])->with('success_message', "Retrait éffectué avec success");

                            }else if ($sum_opdes->isNotEmpty() && ($sum_opdes->isEmpty())) {
                                      
                                return redirect()->route('soldes.show', [
                                    'sum_opres' => $sum_opres,
                                    'sum_opdescom' => $sum_opdes,
                                    'sum_oprescom' => $sum_opres[0]->sum_commission,
                                    'sum_opdes' => $sum_opdes[0]->sum_montant,
                                    'servs' => $serv,
                                    'solde' => $sol,
                                    'opres' => $opres,
                                    'opdes' => $opdes,
                                    'cai' => $cai[0],
                                ])->with('success_message', "Depot éffectué avec success");
                            }

                            if ((($sum_opres->isNotEmpty()) && ($sum_opdes->isNotEmpty()))) {
                               
                                 return redirect()->route('soldes.show', [
                                    'sum_opres' => $sum_opres[0]->sum_montant,
                                    'sum_oprescom' => $sum_opres[0]->sum_commission,
                                    'sum_opdescom' => $sum_opdes[0]->sum_commission,
                                    'sum_opdes' => $sum_opdes[0]->sum_montant,
                                    'servs' => $serv,
                                    'solde' => $sol,
                                    'opres' => $opres,
                                    'opdes' => $opdes,
                                    'cai' => $cai[0],
                                ])->with('success_message', "Effectué avec success ");

                            } else {
                                # code...
                                    return redirect()->route('soldes.show', [
                                    'sum_opres' => $sum_opres,
                                    'sum_opdes' => $sum_opdes,
                                    'sum_oprescom' => $sum_opres,
                                    'sum_opdescom' => $sum_opdes,
                                    'servs' => $serv,
                                    'solde' => $sol,
                                    'opres' => $opres,
                                    'opdes' => $opdes,
                                    'cai' => $cai[0],
                                ])->with('success_message', "Effectué avec success");
                            
                            }  

                   } else {

                         return redirect()->route('soldes.show', $request->fk_solde_id)
                            ->with('error_message', "Cette valeur n'est pas enregistré comme une commission");
                   }
                   
                } else {
                    
                    return redirect()->route('soldes.show', $request->fk_solde_id)
                        ->with('error_message', "Veuillez renseigner la commission SVP");
                    
                }
                
            }else{
                        return redirect()->route('soldes.show', $request->fk_solde_id)
                            ->with('error_message', "Cette valeur est supérieur à la commission");
                
            }
              
        }else{

            $request->validate([
                'montant' => 'required',
            ]);

            $user = Auth::user()->id;
            Solde::create([
                'montant' => $request['montant'],
                'fk_caisse_id' => $request['fk_caisse_id'],
                'fk_sup_id' => $user,
                'fk_proprio_id' => $user,
            ]);

            return redirect()->route('soldes.index')
                ->with('success_message', 'solde créer avec success');
        } 
        
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
            $serv = Service::where("fk_proprio_id", Auth::user()->id)->orwhere("fk_proprio_id", Auth::user()->fk_proprio_id)->get();
            $opres = Operation::where("fk_solde_id", $id)->where("operation", "Retrait")->get();
            $opdes = Operation::where("fk_solde_id", $id)->where("operation", "Depot")->get();
            
                $sum_opres = Operation::select("fk_solde_id")
                    ->where("fk_solde_id", $id)->where("operation", "Retrait")
                    ->selectRaw("SUM(montant) as sum_montant, SUM(commission) as sum_commission")
                    ->groupBy('fk_solde_id')
                    ->get();
                $sum_opdes = Operation::select("fk_solde_id")
                    ->where("fk_solde_id", $id)->where("operation", "Depot")
                    ->selectRaw("SUM(montant) as sum_montant, SUM(commission) as sum_commission")
                    ->groupBy('fk_solde_id')
                    ->get(); 

                $com = Commission::All();
            // if (!isset($sol)) return redirect()->route('pdvs.show', optional($cai->pdv)->id)
            //     ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solde  $solde
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $s_id = Solde::find($id);
        $cai = Caisse::all();
        
        return view('soldes.edit', [
            'solde' => $s_id,
            'caisses' => $cai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solde  $solde
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sol = Solde::find($id);
        $sol->montant = $request->montant;
        $sol->fk_caisse_id = $request->fk_caisse_id;
        $sol->fk_sup_id = Auth::user()->id;
        $sol->save();
        return redirect()->route('soldes.index')
            ->with('success_message', 'Modification effectuée avec success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solde  $solde
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sol = Solde::find($id);
        if ($sol) $sol->delete();
        return redirect()->route('soldes.index')
            ->with('success_message', ' Solde supprimée');
    }
}
