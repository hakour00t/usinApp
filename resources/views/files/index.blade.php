
@extends('layouts.app')

@section('content')


<div class="container">

<h1 style="text-align: center">Genirer des fichier</h1>
<hr>




<div class="container text-center">
        <div class="row">
            <div class="col ">
            <div class="card">
            <h3 class="card-header">Fiche de suivi de la procédure de coloraction de fibre optique </h3>
               
            <form action="{{ route('file.coloration') }} " method="post" class="row g-2">
                @method('post')
                @csrf
                    {{-- <form class="row g-3"> --}}

                    
                        <div class="col-md-3">
                        <label for="Apparaille" class="form-label">Selectioner L'apparille</label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="Apparaille">
                                    <option selected>Numéro Apparaille</option>
                                    <option value="1">Apparaille 01</option>
                                    <option value="2">Apparaille 02</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="vitasse" class="form-label">Vitesse de coloration</label>
                            <input type="Number" class="form-control"  id="vitasse" >
                        </div>
                        <div class="col-md-3">
                        <label for="Apparaille" class="form-label">Fournisseure de fibre </label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="Apparaille">
                                    <option selected>Selectioner fournisseure</option>
                                    <option value="1">Atellier 01</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                        <label for="Apparaille" class="form-label">Chifets </label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="Apparaille">
                                    <option selected>Selectioner chifet</option>
                                    <option value="1">Chifet A</option>
                                    <option value="1">Chifet B</option>
                                    <option value="1">Chifet C</option>
                                    <option value="1">Chifet D</option>
                                </select>
                            </div>
                        </div>

                         <div class="col-md-3">
                        <label for="color" class="form-label">Coleur </label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="color">
                                    <option selected>Selectioner La Cleur</option>
                                    <option value="1">Blue</option>
                                    <option value="1">blonc</option>
                                    <option value="1">gris</option>
                                    <option value="1">Noire</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="long" class="form-label">Longueur </label>
                            <input type="Number" class="form-control"  id="long" >
                        </div>
                        
                        <div class="col-md-3">Qualité de Coloration
                            <label for="coloration" class="form-label">Q </label>
                             <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                        </div>
                           <div class="col-md-3">Qualité de Bobinage
                            <label for="bobinage" class="form-label">Q </label>
                             <div class="input-group-text">
                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="tempiratuer" class="form-label">Tempirature du Moule </label>
                            <input type="Number" class="form-control"  id="tempiratuer" >
                        </div>

                          <div class="col-md-3">
                            <label for="deti" class="form-label">Debit d'Azote </label>
                            <input type="Number" class="form-control"  id="deti" >
                        </div>

                        <div class="col-md-3">
                        <label for="color" class="form-label">Bobine Mére </label>
                            <div class="input-group ">
                               
                                <select class="form-select" id="color">
                                    <option selected>Selectioner La Bobine Mére</option>
                                    <option value="1">Id : 112321320 Longure: 1212 m </option>
                                    <option value="1">Id : 112321320 Longure: 1212 m </option>
                                    <option value="1">Id : 112321320 Longure: 1212 m </option>
                                    <option value="1">Id : 112321320 Longure: 1212 m </option>
                                </select>
                            </div>
                        </div>


                         <div class="col-md-3">
                            <label for="observ" class="form-label">Observation   </label>
                            <input type="tetx" class="form-control"  id="observ" >
                        </div>

            </form>
          

        
            </div>
        </div>


</div>


</div>

@endsection




