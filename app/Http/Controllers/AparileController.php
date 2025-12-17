<?php

namespace App\Http\Controllers;

use App\Models\aparile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AparileController extends Controller
{
    public function index()
    {
        $apariles = aparile::all();
        return view('apariles.index' ,compact('apariles'));
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
                    'name' => 'required',
            ]);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

        try{
                $aparile = Aparile::create([
                     'name' => $request->name,
                     'user_id' => Auth::id(),
                ]) ;
                return redirect()->back()->with('sucss' , 'l\'aparile est ajeuter.');
            }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

    }

    
    public function show(aparile $aparile)
    {
        //
    }

    public function edit(aparile $aparile)
    {
        //
    }

  
    public function update(Request $request, $id)
    {

        try{
                $aparile = Aparile::find($id);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

        try{
                $validated = $request->validate(['name' => 'required']);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

         try{
                $aparile->update($validated);
                return redirect()->back()->with('sucss' , 'l\'aparile est modifier.');
            }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }
    }

    public function destroy($id)
    {
        try{
                $aparile = Aparile::find($id);
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

        try{
                $aparile->delete();
                return redirect()->back()->with('sucss' , 'l\'aparile est supprimer.');
        }catch(ValidationException $e){return back()->withErrors($e->validator)->withInput(); }

    }
}
