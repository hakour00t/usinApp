@extends('layouts.app')

@section('content')

<div class="container">

<h1 style="text-align: center">Créee Une Fibre Colorer</h1>
<hr>

    @if (session('sucss'))
        <div class="alert alert-success">
           
            {{ session('sucss') }}
            
        </div>
    @endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container text-center text-capitalize">
        <div class="row ">
            <div class="col ">
            <div class="card">
            <h3 class="card-header">Formulaire de creation de fibre colorie </h3>
               
            <form action="{{ route('fibreColori.store') }} " method="post" class="row g-2 p-4">
                @method('post')
                @csrf
                    <div class="col-md-3">
                        <label for="couleur" class="form-label">couleur </label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="couleur" name="couleur" required>
                                    <option >sélectionner couleur</option>
                                    <option value="Blue">Blue</option>
                                    <option value="orange">orange</option>
                                    <option value="vert">vert</option>
                                    <option value="marron">marron</option>
                                    <option value="gris">gris</option>
                                    <option value="blanc">blanc</option>
                                    <option value="rouge">rouge</option>
                                    <option value="noire">noire</option>
                                    <option value="jaune">jaune</option>
                                    <option value="violet">violet</option>
                                    <option value="rose">rose</option>
                                    <option value="turquoise">turquoise</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="longueur" class="form-label">Longueur (Km)</label>
                            <input type="Number" class="form-control"  id="longueur" placeholder="1234" name="longueur" step="any"  required>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="colorQiolity" class="form-label">Qualité de Coloration</label>
                             <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" name="colorQiolity" id="colorQiolity" value="1" >
                            </div>
                        </div>
                           <div class="col-md-3">
                            <label for="bobineQiolity" class="form-label">Qualité de Bobinage</label>
                             <div class="input-group-text">
                                <input class="form-check-input mt-1" type="checkbox" name="bobineQiolity" id="bobineQiolity" value="1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="tempirature" class="form-label">Tempirature du Moule (°C)</label>
                            <input type="number" class="form-control"  id="tempirature" name="tempirature" placeholder="38" step="any" required>
                        </div>

                          <div class="col-md-3">
                            <label for="debitAzot" class="form-label">Debit d'Azote (m<sup>3</sup>/h)</label>
                            <input type="number" class="form-control"  id="debitAzot" name="debitAzot" step="any" placeholder="120" required>
                        </div>

                        <div class="col-md-3">
                        <label for="color" class="form-label">Bobine Mére </label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="bobigneMere_id" name="bobigneMere_id" required >
                                    <option  >sélectionner une bobine mére</option>
                                    @foreach ( $bobines as $bobine )
                                        <option value="{{ $bobine->id }}"  >Id : {{ $bobine->id }} Longure: {{ $bobine->length }} Km </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                         <div class="col-md-3"> 
                            <label for="observation" class="form-label">observation   </label>
                            <input type="text" class="form-control"  id="observation" name="observation" placeholder="écrire des notes" >
                            
                        </div>
                        {{-- pour passer  id de fiche de suivi --}}
                        <input type="text" class="form-control d-none" name="f_scoloratios_id"  value="{{ $fs_id }}">

                          <button type="button submit" class="btn btn-primary">Enregistrer</button>
            </form>
            </div>
        </div>
</div>
</div>

@endsection

