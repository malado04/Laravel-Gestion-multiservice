<?php

namespace App\Http\Controllers;

use App\Models\Multiservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerMultiservice extends Controller
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
        $user = Auth::user()->id;
        
        $mul = Multiservice::create([
            'rs' => $request->rs,
            'sigle' => $request->sigle,
            'numrg' => $request->numrg,
            'ninea' => $request->ninea,
            'fk_sup_id' => $user,
            'fk_proprio_id' => $user,
        ]);

        if (!$mul) return redirect()->route('services.index')
               ->with('error_message', 'service non créer');

         return redirect()->route('home')
            ->with('success_message', 'service créer avec success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Multiservice  $multiservice
     * @return \Illuminate\Http\Response
     */
    public function show(Multiservice $multiservice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Multiservice  $multiservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Multiservice $multiservice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Multiservice  $multiservice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Multiservice $multiservice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Multiservice  $multiservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Multiservice $multiservice)
    {
        //
    }
}
