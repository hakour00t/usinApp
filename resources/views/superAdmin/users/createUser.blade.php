@extends('layouts.app')

@section('content')
<div class="container w-50">
   
    <h3>Crée compte de utilisatuer</h3>

                  
    @if (session('sucss'))
        <div class="alert alert-success">
           
            {{ session('sucss') }}
            
        </div>
    @endif

    <div class="contaner-sm">
            <form action="{{ route('user.store') }}" method="POST">
                @method('post')
                @csrf
                  <!-- first name  -->
            <div data-mdb-input-init class="form-outline mb-4 ">
                 <label class="form-label" for="first_name">Prénom</label>   
                <input type="text" id="first_name" class="form-control" name="first_name" required />
                  
                    <!-- last name  -->
            <div data-mdb-input-init class="form-outline mb-4 ">
                <label class="form-label" for="first_name">Nom</label>
                <input type="text" id="last_name" class="form-control" name="last_name"  required/>
            </div> 
                     <!-- Adress  -->
            <div data-mdb-input-init class="form-outline mb-4 ">
                <label class="form-label" for="first_name">Adress</label>
                <input type="text" id="adress" class="form-control" name="adress"  required />
            </div> 
             <!-- Date -->
            <div data-mdb-input-init class="form-outline mb-4 ">
                <label class="form-label" for="date">Date</label>
                <input type="date" id="date" class="form-control" name="date" required/>
            </div>  
            
            <!-- Grad -->
            <div data-mdb-input-init class="form-outline mb-4 ">
                <label class="form-label" name="grad">Grad</label>
                <select class="custom-select" name="grad">
                    <option selected>Grad</option>
                    <option value="Soldat">Soldat</option>
                    <option value="Caporal">Caporal</option>
                    <option value="Caporal_chef">Caporal_chef</option>
                    <option value="Sergent">Sergent</option>
                    <option value="Sergent_chef">Sergent_chef</option>
                    <option value="Adjudant">Adjudant</option>
                    <option value="Adjudant_chef">Adjudant_chef</option>
                    <option value="Adjudant_principal">Adjudant_principal</option>
                    <option value="Aspirant">Aspirant</option>
                    <option value="Sous_lieutenant">Sous_lieutenant</option>
                    <option value="Lieutenant">Lieutenant</option>
                    <option value="Capitaine">Capitaine</option>
                    <option value="Commandant">Commandant</option>
                    <option value="Lieutenant_colonel">Lieutenant_colonel</option>
                    <option value="Colonel">Colonel</option>
                </select>
            </div>  

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4 ">
                <label class="form-label" for="email">Email address</label>
                <input type="email" id="email" class="form-control" name="email" required/>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form1Example2"  >Password</label>
                <input type="password" id="form1Example2" class="form-control" required name="password"/>
            </div>
 

            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-success "> Crée</button>
            </form>
    </div>
  

               
</div>
@endsection
