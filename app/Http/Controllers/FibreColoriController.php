<?php

namespace App\Http\Controllers;

use App\Models\fibreColori;
use App\Models\Bobine;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;



use Illuminate\Support\Carbon;


class FibreColoriController extends Controller
{

    public function index()
    {
        $fibreColoris = fibreColori::all();
        return view('fibreColori.list', compact('fibreColoris'));
    }

    public function create($id)
    {

        $fs_id = $id ;// passer id de fiche de suivi
        $bobines = Bobine::all();
        return view('fibreColori.create' , compact('bobines' , 'fs_id') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        try {
             $validated = $request->validate( [
                'couleur' =>'required' ,
                'longueur' =>'required' ,
                // 'colorQiolity' =>'required' ,
                // 'bobineQiolity' =>'required' ,
                'tempirature' =>'required' ,
                'debitAzot' =>'required' ,
                'observation' =>'required' ,
                'bobigneMere_id' =>'required' ,
                'f_scoloratios_id' =>'required' ,
        ]);
            $today = Carbon::now()->format('Ymd');         
            $last = fibreColori::where('id', 'like','A-'. $today . '%')->orderBy('id', 'desc')->first();
            if ($last) {

                $lastNumber = (int) substr($last->id, -2);
                $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
            
            } else {  $nextNumber = "01";}

        } catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
    
    $newId = "A-" . $today . "-" . $nextNumber;

            $fibre =  fibreColori::create([
                 'id' => $newId,
                 'couleur' => $request->couleur ,
                 'longueur' => $request->longueur ,
                 'colorQiolity' => $request->colorQiolity ?? 0,
                 'bobineQiolity' => $request->bobineQiolity ?? 0 ,
                 'tempirature' => $request->tempirature ,
                 'debitAzot' => $request->debitAzot ,
                 'observation' => $request->observation ,
                 'bobigneMere_id' => $request->bobigneMere_id ,
                 'f_scoloratios_id' => $request->f_scoloratios_id ,
                 'user_id' => Auth::id()
             ]);
             if($fibre)return redirect()->back()->with('sucss', 'La Fibre Colorier est ajeuter');
             else{ return back()->with('error', 'la fibre colorier n\'est  pa ajeuter.'); }
    }

   
    public function show($id)
    {
        
        $fibre = fibreColori::find($id);
        return view('fibreColori.show' , compact('fibre') );
    }

  
    public function edit(fibreColori $fibreColori)
    {
        //
    }

    
    public function update(Request $request, fibreColori $fibreColori)
    {
        //
    }

   
    public function destroy($id)
    {
        fibreColori::find($id)->delete();
        return redirect()->back()->with('sucss', 'Fibre Coleuré est Supprimer.');
    }

     public function downloadListFiberColorie()
    {
            $users = User::where('id','!=', '1')->get();
            $fibres = fibreColori::all();
            $pdf = Pdf::loadView('fibreColori.listFibreColorier', compact('fibres' , 'users'));
            return $pdf->stream('fibre-list.pdf');
    }

      public function downloadFibreFile( $id)
    {
            $fibre = fibreColori::findOrFail($id);
            $user = User::find($fibre->user_id);
            $pdf = Pdf::loadView('fibreColori.profileFibreColorier', compact('fibre' , 'user'));
            return $pdf->stream('fibre-'.$fibre->id.'.pdf');
          
    }   

}