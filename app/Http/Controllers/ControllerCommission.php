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
    public function show(Commission $commission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commission $commission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        //
    }
}
