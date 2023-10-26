<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerZone extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $zones = Zone::all();
        return view('zones.index', [
            'zones' => $zones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('zones.create');
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
            'nom_zone' => 'required',
        ]);  

        if (Zone::where('nom_zone', $request['nom_zone'])->exists()) {

        return redirect()->route('zones.create')
            ->with('error_message', 'Cette zone existe déja, veuillez utiliser une autre svp');
        } 

        Zone::create([
            'nom_zone' => $request['nom_zone'],
            'fk_sup_id' => Auth::user()->id,
        ]);

        return redirect()->route('zones.create')
            ->with('success_message', 'Zone créer avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zone = Zone::find($id);

        if (!$zone) return redirect()->route('zones.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('zones.show', [
            'zone' => $zone,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zone = Zone::find($id);

        if (!$zone) return redirect()->route('zones.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('zones.edit', [
            'zone' => $zone,
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $zone = Zone::find($id);
        $zone->nom_zone = $request->nom_zone;
        $zone->fk_sup_id = Auth::user()->id;

        $zone->save();
        return redirect()->route('zones.index')
            ->with('success_message', 'Modification effectuée avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $zone = Zone::find($id);
        if ($zone) $zone->delete();
        return redirect()->route('zones.index')
            ->with('success_message', 'Supprimée');
    }
}
