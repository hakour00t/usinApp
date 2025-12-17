<?php

namespace App\Http\Controllers;

use App\Models\Chifets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChifetsController extends Controller
{
    public function index()
    {
        $chifets = Chifets::all();
        return view('chifets.index' , compact('chifets'));
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
          try{
                $aparile = $request->validate([
                    'title' => 'required',
                    'time' => 'required',
            ]);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

        try{
                $aparile = Chifets::create([
                     'title' => $request->title,
                     'time' => $request->time,
                     'user_id' => Auth::id(),
                ]) ;
                return redirect()->back()->with('sucss' , 'le chifet est ajeuter.');
            }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chifets $chifets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chifets $chifets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         try{
                $chifet = Chifets::find($id);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

        try{
                $validated = $request->validate(['title' => 'required' , 'time' => 'required' ]);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

         try{
                $chifet->update($validated);
                return redirect()->back()->with('sucss' , 'le chifet est modifier.');
            }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try{
                $chifet = Chifets::find($id);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

        try{
                $chifet->delete();
                return redirect()->back()->with('sucss' , 'le chifet est supprimer.');
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
    }
}
