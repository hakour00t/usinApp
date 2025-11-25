<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
// use Spatie\Permission\Models\Role;
class permissionControlles extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $permissions = DB::table('permissions')->get();
        
        return view('permissions.list', compact('permissions'));
       
    }

    /**
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
        


        $var = $request->validate([
            'name' => ['required' ,'string' , 'max:255']
        ]);

         
        //  dd($request->all());
            $permission = Permission::create(['name' => $request->name]);
        
        return redirect()->back()->with('Sucss' , 'Permission est crée.');  
        
    }

    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
