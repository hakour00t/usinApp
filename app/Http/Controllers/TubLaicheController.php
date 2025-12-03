<?php

namespace App\Http\Controllers;

use App\Models\TubLaiche;
use Illuminate\Http\Request;
use App\Models\fibreColori;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class TubLaicheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tubes = TubLaiche :: all();

        
        return view('tubes.list', compact('tubes'));
        // return 'hello in tube laches index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

            // fibreColori

        $colors = [
            'blue' =>fibreColori::where('color' , 'blue')->get(), 
            'orange'  =>  fibreColori::where('color' , 'orange')->get() ,
            'verte'  =>  fibreColori::where('color' , 'verte')->get() ,
            'marron'  =>  fibreColori::where('color' , 'marron')->get() ,
            'grise'  =>  fibreColori::where('color' , 'grise')->get() ,
            'blanc'  =>  fibreColori::where('color' , 'blanc')->get() ,
            'rouge'  =>  fibreColori::where('color' , 'rouge')->get() ,
            'noire'  =>  fibreColori::where('color' , 'noire')->get() ,
            'jaune'  =>  fibreColori::where('color' , 'jaune')->get() ,
            'violet'  =>  fibreColori::where('color' , 'violet')->get() ,
            'rose'  =>  fibreColori::where('color' , 'rose')->get() ,
            'turquise'  =>  fibreColori::where('color' , 'turquise')->get() 
                    ] ;
                        
        return view('tubes.create' , compact('colors'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $valid = $request->validate([
                // "vitesse_traction" => 'required'
                // "vitesse_extrudeuse" => 'required'
                // "pourcentage_gel" => 'required'
                "noyau_moule" => 'required',
                "couverture_moule_interieur" => 'required',
                "couverture_moule_exterieur" => 'required',
                "aiguille_fibre" => 'required',
                // "temp_environnement" => 'required' 
                // "temp_sechage_pbt" => 'required'
                "corps1" => 'required',
                "corps2" => 'required',
                "corps3" => 'required',
                "corps4" => 'required',
                "tete1" => 'required',
                "tete2" => 'required',
                "tete3" => 'required',
                "auge_chaude" => 'required',
                "auge_tiede" => 'required',
                "auge_froide" => 'required',
                // "fiberColori_id" => 'required'
                "chifet" =>  'required',
                "color" =>  'required',
                // "pbt_lote" => "45"
                // "gel_lote" => "38"
                "longueur" =>  'required',
        ]);

        $today = Carbon::now()->format('Ymd');
        $last = TubLaiche::where('id', 'like','%'. $today . '%')->orderBy('id', 'desc')->first();
            if ($last) {
                $lastNumber = (int) substr($last->id, -2);
                $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
            } else {   
                $nextNumber = "01";
            }
        $newId = "B".count($request->fiberColori_id). "-"  . $today . "-" . $nextNumber;
             
        // dd($valid);
        $tube = TubLaiche::create([
            "id" => $newId,
            "vitesse_traction" => $request->vitesse_traction,
            "vitesse_extrudeuse" => $request->vitesse_extrudeuse,
            "pourcentage_gel" => $request->pourcentage_gel,
            "noyau_moule" => $request->noyau_moule,
            "couverture_moule_interieur" => $request->couverture_moule_interieur,
            "couverture_moule_exterieur" => $request->couverture_moule_exterieur,
            "aiguille_fibre" => $request->aiguille_fibre,
            "aiguille_gel" => $request->aiguille_gel,
            "temp_environnement" => $request->temp_environnement ,
            "temp_sechage_pbt" => $request->temp_sechage_pbt,
            "corps1" => $request->corps1,
            "corps2" => $request->corps2,
            "corps3" => $request->corps3,
            "corps4" => $request->corps4,
            "tete1" => $request->tete1,
            "tete2" => $request->tete2,
            "tete3" => $request->tete3,
            "auge_chaude" => $request->auge_chaude,
            "auge_tiede" => $request->auge_tiede,
            "auge_froide" => $request->auge_froide,
            // "fiberColori_id" => $request->fiberColori_id,
            "chifet" =>  $request->chifet,
            "color" =>  $request->color,
            "pbt_lote" => $request->pbt_lote,
            "gel_lote" => $request->gel_lote,
            "longueur" =>  $request->longueur,
            'user_id' => Auth::id()
        ]);
        $tube->fibreColoris()->sync($request->fibreColori_id);
        // dd($tube);

        return redirect()->back()->with('sucss', 'Tube Lache est ajeuter');



    // $fibre->colors()->sync($request->colors);
    }

    /**
     * Display the specified resource.
     */
    public function show(TubLaiche $tubLaiche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TubLaiche $tubLaiche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TubLaiche $tubLaiche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TubLaiche $tubLaiche)
    {
        //
    }
}
