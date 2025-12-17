<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotes = Lote::all();
        return view('lotes.index' , compact('lotes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //  dd($request->all());
        try{
                $aparile = $request->validate([
                    'number' => 'required',
            ]);
        
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

    
          $today = Carbon::now()->format('Ymd');         
            $last = Lote::where('id', 'like','LO-' .$today .'-'.'%')->orderBy('id', 'desc')->first();
          
            if ($last) {
                $lastNumber = (int) substr($last->id, -2);
                $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
            
            } else {  $nextNumber = "01";}

            $newId = "LO-" . $today . "-" . $nextNumber;

        try{
                $aparile = Lote::create([
                    'id' => $newId,
                    'number' => $request->number,
                    'user_id' => Auth::id(),
                ]) ;
                return redirect()->back()->with('sucss' , 'lote est ajeuter.');
            }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
    }

    
    public function show(Lote $lote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lote $lote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
          try{
                $lote = Lote::find($id);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

        try{
                $validated = $request->validate(['number' => 'required']);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

         try{
                $lote->update($validated);
                return redirect()->back()->with('sucss' , 'lote est modifier.');
            }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $lote = Lote::find($id);
          try{
                $aparile = lote::find($id);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

        try{
                $aparile->delete();
                return redirect()->back()->with('sucss' , 'lote est supprimer.');
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
    }
}
