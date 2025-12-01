<?php

namespace App\Http\Controllers;

use App\Models\TubLaiche;
use Illuminate\Http\Request;

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
        return view('tubes.create' );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
