<?php

namespace App\Http\Controllers;

use App\Models\Bobine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class BobineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bobines = Bobine::all();
        return view('bobines.index', compact('bobines'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        // dd($request->all());
        try {$request->validate(['loungeur' => 'required|numeric']);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
        
        $today = Carbon::now()->format('Ymd');
        $last = Bobine::where('id', 'like','G-' . $today . '%')->orderBy('id', 'desc')->first();

        if ($last) {
            
            $lastNumber = (int) substr($last->id, -2);
            $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
        } else {
           
            $nextNumber = "01";
        }
        $newId = 'G-' . $today .'-'. $nextNumber;
         try {  Bobine::create(['id' => $newId,'loungeur' => $request->loungeur,'user_id' => Auth::id() ]);
            return redirect()->back()->with('sucss', 'Bobine est ajeuter');
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
        
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bobine $bobine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           try {$request->validate(['loungeur' => 'required|numeric']);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

         try { Bobine::find($id)->update($request->all());
        return redirect()->back()->with('sucss', 'Bobine est modifier');
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
        

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Bobine::find($id)->delete();
        return redirect()->back()->with('sucss', 'Bobine est Supprimer.');
    }
}
