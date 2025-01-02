<?php

namespace App\Http\Controllers\API;

use App\Models\user;
use App\Models\Paiement;
use App\Models\Entreprise;
use App\Models\Employeur;
use App\Models\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user() != null) {
        
                if (auth()->user()->admin == 0) {
                        
                   $us =Auth::user()->id;

                    $ent = Entreprise::select("fk_empeur_id", 'id')
                        ->where("fk_empeur_id",  $us)
                        ->groupBy('fk_empeur_id', 'id')
                        ->get();

                    $pai = Paiement::select("fk_entr_id", 'id')
                        ->where("fk_entr_id", $ent[0]->$id)
                        ->groupBy('fk_entr_id', 'id')
                        ->get();
                    return response()->json($pai);

                } elseif (auth()->user()->admin == 2) {
                   $us =Auth::user()->id;

                    $ent = Entreprise::select("fk_empeur_id", 'id')
                        ->where("fk_empeur_id",  $us)
                        ->groupBy('fk_empeur_id', 'id')
                        ->get();

                    $pai = Paiement::select("fk_entr_id", 'id')
                        ->where("fk_entr_id", $ent[0]->$id)
                        ->groupBy('fk_entr_id', 'id')
                        ->get();
                    return response()->json($pai);
                }else {
                
                    $employer = "Le compte employer est en mode developpement";
                    return response()->json($employer);
                }

        } else {

            // $pai = Paiement::All();
            return response()->json(Auth::user());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {   
        $id =3;

        $ent = Entreprise::where("fk_empeur_id", $id)->get();
        // $pai = Paiement::where("fk_entr_id", $ent[0]->$id)->get();
        var_dump($ent);

        // $emp =Employer::select("fk_ent_id")
        //     ->where("fk_ent_id", $ent[0]->id)
        //     ->selectRaw("SUM(salaire) as sum_salaire, id, nom, prenom")
        //     ->groupBy('fk_ent_id', 'id', 'nom', 'prenom')
        //     ->get();
        foreach ($ent as $key => $value) {
        var_dump($value->$id);
            # code...
        }
            // echo "string";
        // return response()->json($ent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
