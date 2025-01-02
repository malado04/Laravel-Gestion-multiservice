<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerCommission extends Controller
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
        Commission::create([
            'min' => $request['min'],
            'max' => $request['max'],
            'typeoperation' => $request['typeoperation'],
            'montant' => $request['montant'],
            'fk_service_id' => $request['fk_service_id'],
            'fk_sup_id' => Auth::user()->id,
            'fk_proprio_id' => Auth::user()->id,
        ]);

        return redirect()->route('services.show', $request['fk_service_id'])
            ->with('success_message', 'solde créer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $com = Commission::find($id);

        // var_dump($com);
            return view('commissions.edit', [
            'com' => $com,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $com = Commission::find($id);
        $com->typeoperation = $request->typeoperation;
        $com->min = $request->min;
        $com->max = $request->max;
        $com->montant = $request->montant;
        $com->fk_sup_id = Auth::user()->id;

        $com->save();
        return redirect()->route('services.show', $request->fk_service_id)
            ->with('success_message', 'Modification effectuée avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$id)
    {
        $com = Commission::find($id);
        var_dump($com);
        if ($com) $com->delete();
        return redirect()->route('services.show', $com->fk_service_id)
            ->with('success_message', 'Supprimée');
    }
}
