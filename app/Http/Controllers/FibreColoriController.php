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
                        'user_id' => Auth::id()
                    ]);

        return redirect()->back()->with('sucss', 'La Fibre Colorier est ajeuter');

    }

   
    public function show($id)
    {
        
        $fibre = fibreColori::find($id);
        $user = User::find($fibre->user_id);
        return view('fibreColori.show' , compact('fibre' , 'user') );
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