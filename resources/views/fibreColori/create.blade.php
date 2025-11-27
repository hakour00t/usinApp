@extends('layouts.app')

@section('content')

<div class="container">

<h1 style="text-align: center">Crée Fibre Colorer</h1>
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
<div class="container text-center ">
        <div class="row ">
            <div class="col ">
            <div class="card">
            <h3 class="card-header">Fiche de suivi de la procédure de coloraction de fibre optique </h3>
               
            <form action="{{ route('fibreColori.store') }} " method="post" class="row g-2 p-4">
                @method('post')
                @csrf
                        <div class="col-md-3">
                        <label for="Apparaille" class="form-label">Selectioner L'apparille</label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="Apparaille" name="apparaille" required>
                                    <option selected>Numéro Apparaille</option>
                                    <option value="1">Apparaille 01</option>
                                    <option value="2">Apparaille 02</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="vitasse" class="form-label">Vitesse de coloration</label>
                            <input type="number" class="form-control"  id="vitasse" name="vitesse"  step="any" required>
                        </div>
                        <div class="col-md-3">
                        <label for="Attellier" class="form-label">Fournisseure de fibre </label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="Apparaille" required >
                                    <option selected>Selectioner fournisseure</option>
                                    <option value="1">Atellier 01</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                        <label for="chifet" class="form-label">Chifets </label>
                            <div class="input-group ">
                                <select class="form-select" id="chifet" name="chifet" required>
                                    <option selected>Selectioner chifet</option>
                                    <option value="a">Chifet A</option>
                                    <option value="b">Chifet B</option>
                                    <option value="c">Chifet C</option>
                                    <option value="d">Chifet D</option>
                                </select>
                            </div>
                        </div>

                         <div class="col-md-3">
                        <label for="color" class="form-label">Coleur </label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="color" name="color" required>
                                    <option selected>Selectioner La Cleur</option>
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
                            <label for="long" class="form-label">Longueur </label>
                            <input type="Number" class="form-control"  id="long"  name="long" step="any" required>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="coloration" class="form-label">Qualité de Coloration</label>
                             <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" name="colorQiolity" value="1">
                            </div>
                        </div>
                           <div class="col-md-3">
                            <label for="bobinage" class="form-label">Qualité de Bobinage</label>
                             <div class="input-group-text">
                                <input class="form-check-input mt-1" type="checkbox" name="bobineQiolity"  value="1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="tempiratuer" class="form-label">Tempirature du Moule </label>
                            <input type="number" class="form-control"  id="tempiratuer" name="tempir" step="any" required>
                        </div>

                          <div class="col-md-3">
                            <label for="deti" class="form-label">Debit d'Azote </label>
                            <input type="number" class="form-control"  id="deti" name="debitAzot" step="any" required>
                        </div>

                        <div class="col-md-3">
                        <label for="color" class="form-label">Bobine Mére </label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="color" name="bobigneMere_id" required >
                                    <option selected>Selectioner La Bobine Mére</option>
                                    @foreach ( $bobines as $bobine )
                                        <option value="{{ $bobine->id }}"  >Id : {{ $bobine->id }} Longure: {{ $bobine->length }} km </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                         <div class="col-md-3"> 
                            <label for="observ" class="form-label">Observation   </label>
                            <input type="tetx" class="form-control"  id="observ" name="Observ" >
                        </div>

                          <button type="button submit" class="btn btn-primary">Enregistrer</button>
            </form>
            </div>
        </div>
</div>
</div>

@endsection

