<?php

namespace App\Http\Controllers;

use App\Models\fibreColori;
use App\Models\Bobine;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Support\Carbon;


class FibreColoriController extends Controller
{

    public function index()
    {
        $fibreColoris = fibreColori::all();
        return view('fibreColori.list', compact('fibreColoris'));
    }

    public function create()
    {
        $bobines = Bobine::all();
        return view('fibreColori.create' , compact('bobines') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        
          $validated = $request->validate( [
            'apparaille' => 'required',
            'vitesse' => 'required', 
            'chifet' => 'required',
            'long' => 'required',
            'color' => 'required',
            'colorQiolity' => 'boolean' , 
            'bobineQiolity' => 'boolean' , 
            'tempir' => 'required' , 
            'debitAzot' => 'required' , 
            // 'Observ' => 'required',
            'bobigneMere_id' => 'required'
        ]);
 $today = Carbon::now()->format('Ymd');
 
                 
                    $last = fibreColori::where('id', 'like','A-'. $today . '%')->orderBy('id', 'desc')->first();
                    if ($last) {
                        $lastNumber = (int) substr($last->id, -2);
                        $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
                    } else {   
                        $nextNumber = "01";
                    }
                    $newId = "A-" . $today . "-" . $nextNumber;
             
                    fibreColori::create([
                        'id' => $newId,
                        'apparaille' => $request->apparaille,
                        'vitesse' => $request->vitesse, 
                        'chifet' => $request->chifet,
                        'color' =>$request->color, 
                        'long' => $request->long,
                        'colorQiolity' => $request->boolean('colorQiolity'), 
                        'bobineQiolity' => $request->boolean('bobineQiolity'), 
                        'tempir' => $request->tempir,
                        'debitAzot' => $request->debitAzot,  
                        'Observ' => $request->Observ,
                        'bobigneMere_id' => $request->bobigneMere_id,
                    ]);

        return redirect()->back()->with('sucss', 'La Fibre Colorier est ajeuter');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $fibre = fibreColori::find($id);
        return view('fibreColori.show' , compact('fibre') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fibreColori $fibreColori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fibreColori $fibreColori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fibreColori $fibreColori)
    {
        //
    }


     public function downloadPdf( $id)
    {
            $fibre = fibreColori::findOrFail($id);
            $pdf = Pdf::loadView('fibreColori.suiverColoration', compact('fibre'));

            return $pdf->stream('fibre-'.$fibre.'.pdf');
          
    }

}