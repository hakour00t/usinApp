<?php

namespace App\Http\Controllers;

use App\Models\FScoloratio;
use App\Models\fibreColori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Validation\ValidationException;

class FScoloratioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fichs_coloration =  FScoloratio::all();
        return view('coloration.list', compact('fichs_coloration'));
    }
    public function create() {return view('coloration.create');} //show form for create coloration file

   
    public function store(Request $request)
    {
        // dd($request->all());
        try{
              $valide = $request->validate([
            "work_order_id" => "required" ,
            "lote_id" => "required" ,
            "apariel" => "required" ,
            "vitesse" => "required" ,
            "chifet" => "required" ,
            "fornissuer_id" => "required" ,
        ]);
    }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
      
        //  dd($request->all());
        
        $file = FScoloratio::create([
            "work_order_id" => $request->work_order_id ,
            "lote_id" => $request->lote_id ,
            "apariel" => $request->apariel ,
            "vitesse" => $request->vitesse ,
            "chifet" => $request->chifet ,
            "fornissuer_id" => $request->chifet ,
            "user_id"=>auth::id(),
        ]);
        if($file){return redirect()->back()->with('sucss', 'la fiche de suivi la coloration est Ajeuter.');}
        else{ return back()->with('error', 'la fiche de suivi la coloration n\'est  pa ajeuter.'); }
        
        
    }

   
    public function show($id)
    {
        $fiche =  FScoloratio::find($id);
        $fibres = $fiche->fibreColoris;

        return view('coloration.ficheColoration' , compact('fibres' ,'fiche'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FScoloratio $fScoloratio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FScoloratio $fScoloratio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FScoloratio $fScoloratio)
    {
        //
    }
}
