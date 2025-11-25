<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class rolesControlles extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = DB::table('roles')->where('name' , '!=' , 'superAdmin')->get();
        return view('roles.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
       
        $var = $request->validate([
            'name' => ['required' ,'string' , 'max:255']
        ]);

          $role = Role::create(['name' => $request->name]);
        //  dd($request->all());
        
        return redirect()->back()->with('sucss' , 'Role est crée.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id); 
        return view('roles.show', compact('role'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        
        $role = Role::find($id);
        $autherPerms = Permission::all();
        return view('roles.edit', compact('role', 'autherPerms'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $role = Role::find($id);
        $role->name = $request->role_name;
        $role->update();
        $role->syncPermissions($request->permissions);
       
        return redirect()->back()->with('sucss' , 'Role est modifier.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('sucss' , 'Role est supprimer.');
    }
}
