<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::where('id','!=', Auth::id())->get();
        return view('superAdmin.users.userList' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('superAdmin.users.createUser');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        

        $validated = $request->validate( [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'adress' => ['required', 'string'],
            'grad'=> ['required','in:Soldat,Caporal,Caporal_chef,Sergent,Sergent_chef,Adjudant,Adjudant_chef,Adjudant_principal,Aspirant,Sous_lieutenant,Lieutenant,Capitaine,Commandant,Lieutenant_colonel,Colonel'],
            'date' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        //  dd($request->all());
         $user = User::create([
            'first_name' => $request->first_name ,
            'last_name' => $request->last_name ,
            'adress' => $request->adress,
            'grad'=> $request->grad,
            'date' => $request->date ,
            'email' =>$request->email ,
            'password' => Hash::make($request->password) 
         ]);
        
        return redirect()->back()->with('sucss' , 'Utilisatuer est crée.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('superAdmin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $user = User::find($id);
        return view('superAdmin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        dd($request->all());
        $user = User::find($id);

            $user->first_name = $request->first_name ;
            $user->last_name = $request->last_name ;
            $user->adress = $request->adress;
            $user->grad = $request->grad;
            $user->date = $request->date ;
            $user->email =$request->email ;
            $user->password = Hash::make($request->password) ;
         
         //  dd($user);
         $user->save();
        
        return redirect()->back()->with('sucss' , 'Utilisatuer est modifier.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
         $user = User::find($id);

         $user->delete();
         return redirect()->back()->with('sucss' , 'Utilisatuer est supperimer.');
        
    }
}
