<?php

namespace App\Http\Controllers;

use App\Models\Bobine;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BobineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bobines = Bobine::all();
        return view('bobines.list', compact('bobines'));
    }

    /**.
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'length' => 'required|numeric'
        ]);

          $today = Carbon::now()->format('Ymd');

            $last = Bobine::where('id', 'like', $today . '%')->orderBy('id', 'desc')->first();

                    if ($last) {
                        
                        $lastNumber = (int) substr($last->id, -2);
                        $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
                    } else {
                       
                        $nextNumber = "01";
                    }
                    $newId = $today . "-G" . $nextNumber;
      // create bobine
        Bobine::create([
                        'id' => $newId,
                        'length' => $request->length,
                    ]);

        return redirect()->back()->with('sucss', 'Bobine est ajeuter');
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
         $request->validate([
            'length' => 'required|numeric'
        ]);

       Bobine::find($id)->update($request->all());

        return redirect()->back()->with('sucss', 'Bobine est modifier');
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
