<?php

namespace App\Http\Controllers;

use App\Models\Pdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Zone;
use App\Models\Caisse;

class ControllerPdv extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
   
      * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pdvs = Zone::all();
        $pdvs = Pdv::all();
        return view('pdvs.index', [
            'pdvs' => $pdvs,
            'zones' => $pdvs
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
        $pdvs = Zone::all();
        return view('pdvs.create', [
            'zones' => $pdvs
        ]);
        // return view('pdvs.create');
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
            'nom_pdv' => 'required',
        ]);  

       if (Zone::where('id', $request['fk_zone_id'][0])->exists()) {

            $zone = Zone::where('id', $request['fk_zone_id'][0])->get();
            
            if (Pdv::where('fk_zone_id', $zone[0]->id)->exists()) {
                var_dump( $zone );
                    // return redirect()->route('pdvs.create')
                    //     ->with('error_message', 'Cette zone existe déja, veuillez utiliser une autre svp');

            }

            Pdv::create([
                'fk_zone_id' => $request['fk_zone_id'][0],
                'nom_pdv' => $request['nom_pdv'],
                'fk_sup_id' => Auth::user()->id,
            ]);

            return redirect()->route('pdvs.index')
                ->with('success_message', 'Zone créer avec success');
                
        } 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $pdv
     * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        $pdv = Pdv::find($id);
        $pdvs = Zone::all();
        $cai = Caisse::where("fk_pdv_id", $id)->get();

        if (!$pdv) return redirect()->route('pdvs.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');

        return view('pdvs.show', [
            'pdv' => $pdv,
            'caisses' => $cai,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zone  $pdv
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pdv = Pdv::find($id);

        $zone = Zone::all();
        if (!$pdv) return redirect()->route('zones.index')
            ->with('error_message', 'User dengan id'.$id.' tidak ditemukan');
        return view('pdvs.edit', [
            'zones' => $zone,
            'pdv' => $pdv,
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zone  $pdv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pdv = Pdv::find($id);
        $pdv->nom_pdv = $request->nom_pdv;
        $pdv->fk_sup_id = Auth::user()->id;

        $pdv->save();
        return redirect()->route('pdvs.index')
            ->with('success_message', 'Modification effectuée avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $pdv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $pdv = Zone::find($id);
        if ($pdv) $pdv->delete();
        return redirect()->route('pdvs.index')
            ->with('success_message', 'Supprimée');
    }
}
