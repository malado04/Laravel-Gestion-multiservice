<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerService extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('services.index', [
            'services' => $services
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
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Service::where('libelle', $request->libelle)->exists()) {

            return redirect()->route('services.create')
                ->with('error_message', 'Ce service existe déja, veuillez utiliser un autre SVP');

        } else{
            
            $user = Auth::user()->id;
            $path = $request->file('file')->store('uploads');
            $file=$path ?? "Aucune";

            $service = Service::create([
                'file' => $file,
                'libelle' => $request->libelle,
                'fk_user_id' => $user,
            ]);

            if (!$service) return redirect()->route('services.index')
                ->with('error_message', 'service non créer');

            return redirect()->route('services.index')
                ->with('success_message', 'service créer avec success');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        
        $serv = Service::find($id); 
        $com = Commission::where("fk_service_id", $id)->get(); 

        return view('services.show', [
            'service' => $serv,
            'commissions' => $com,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $s_id = Service::find($id);
            return view('services.edit', [
            'service' => $s_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $Service = Service::find($id);

        $user = Auth::user()->id;
        $Service->libelle = $request->libelleservice;
        $Service->fk_user_id = $user;
        $Service->save();

          return redirect()->route('services.index')
            ->with('success_message', 'Modification éffectué avec success'); //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        try { 

          $service->delete();
          return redirect()->route('services.index')
            ->with('success_message', 'Service supprimé avec succés');

        } catch(\Illuminate\Database\QueryException $ex){ 

          return redirect()->route('services.index')
            ->with('error_message', 'Ce service est déja utilisé, il faut suprimer tous ses liaisons avant');
        }
    }
}
