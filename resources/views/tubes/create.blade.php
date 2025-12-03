@extends('layouts.app')

@section('content')

<div class="container">

<h1 style="text-align: center">Crée Un Tube Lache</h1>
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
            <h3 class="card-header"> Fiche de suivi de la procédure de revetement secandaire </h3>
               
            <form action="{{ route('tube.store') }} " method="post" class="row g-2 p-4">
                @method('post')
                @csrf
                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Vitesse De Traction (m/min) </label>    
                            <input type="number" class="form-control"  value="70" id="vitesse_traction" name="vitesse_traction"  step="any" required>
                        </div>

                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Vitesste d'Extrudeuse (tr/min) </label>    
                            <input type="number" class="form-control"  value="8.5"   id="vitesse_extrudeuse" name="vitesse_extrudeuse"  step="any" required>
                        </div>

                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Pourcentage de Gel (%) </label>    
                            <input type="number" class="form-control"   value="6"  id="pourcentage_gel" name="pourcentage_gel"  step="any" required>
                        </div>

                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Noyau du Moule (mm)</label>    
                            <input type="number" class="form-control"  id="noyau_moule" name="noyau_moule"  step="any" required>
                        </div>

                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label"> Couverture Interieur du Moule (mm)  </label>    
                            <input type="number" class="form-control"  id="couverture_moule_interieur" name="couverture_moule_interieur"  step="any" required>
                        </div>

                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label"> Couverture Exterieur du Moule (mm) </label>    
                            <input type="number" class="form-control"  id="couverture_moule_exterieur" name="couverture_moule_exterieur"  step="any" required>
                        </div>

                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Aiguille de Fibre (mm)</label>    
                            <input type="number" class="form-control"  id="aiguille_fibre" name="aiguille_fibre"  step="any" required>
                        </div>

                         <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Aiguille de Gel (mm)</label>    
                            <input type="number" class="form-control"  id="aiguille_gel" name="aiguille_gel"  step="any" required>
                        </div>
                      
                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">temp d'Environnement(°C)</label>    
                            <input type="number" class="form-control"  value="24"  id="temp_environnement" name="temp_environnement"  step="any" required>
                        </div>

                    
                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Temp de Sechage PBT (°C)</label>    
                            <input type="number" class="form-control" value="110" id="temp_sechage_pbt" name="temp_sechage_pbt"  step="any" required>
                        </div>


                        <hr class="">
                        <h5>Temp De l'Extrusion de l'Eau Chaque 2h (°C)</h5>

                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Corps 1</label>    
                            <input type="number" class="form-control"  id="corps1" name="corps1"  step="any" required>
                        </div>

                         <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Corps 2</label>    
                            <input type="number" class="form-control"  id="corps2" name="corps2"  step="any" required>
                        </div>


                         <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Corps 3</label>    
                            <input type="number" class="form-control"  id="corps3" name="corps3"  step="any" required>
                        </div>


                         <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Corps 4</label>    
                            <input type="number" class="form-control"  id="corps4" name="corps4"  step="any" required>
                        </div>

                     

                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Téte 1</label>    
                            <input type="number" class="form-control"  id="tete1" name="tete1"  step="any" required>
                        </div>

                         <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Téte 2</label>    
                            <input type="number" class="form-control"  id="tete2" name="tete2"  step="any" required>
                        </div>


                         <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Téte 3</label>    
                            <input type="number" class="form-control"  id="tete3" name="tete3"  step="any" required>
                        </div>

                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Auge Chaude </label>    
                            <input type="number" class="form-control"  id="auge_chaude" name="auge_chaude"  step="any" required>
                        </div>


                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Auge Tiede </label>    
                            <input type="number" class="form-control"  id="auge_tiede" name="auge_tiede"  step="any" required>
                        </div>


                        <div class="col-md-3">
                            <label for="Apparaille" class="form-label">Auge Froide </label>    
                            <input type="number" class="form-control"  id="auge_froide" name="auge_froide"  step="any" required>
                        </div>

                        


                        <br>

                         <hr class="">
                        <h5> Type de Fibre Optique </h5>

                        @foreach ( $colors as $color )

                            <div class="col-md-3">
                        <label for="chifet" class="form-label">Chifets </label>
                            <div class="input-group ">
                                <select class="form-select" id="chifet" name="fiberColori_id[]" >
                                    @foreach ($color as $subColor )
                                         <option value=" {{ $subColor->id }}"> {{ $subColor->id }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endforeach
         

                        <br>

                         <hr class="mt-4">
                       

                        <div class="col-md-3">
                        <label for="chifet" class="form-label">Chifets </label>
                            <div class="input-group ">
                                <select class="form-select" id="chifet" name="chifet" required>
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
                            <label for="pbt_lote" class="form-label">Lote de  PBT   </label>
                            <input type="tetx" class="form-control"  id="pbt_lote" name="pbt_lote" required>
                        </div>

                        <div class="col-md-3"> 
                            <label for="gel_lote" class="form-label">Lote de  Gel   </label>
                            <input type="tetx" class="form-control"  id="gel_lote" name="gel_lote" required>
                        </div>

                          <div class="col-md-3"> 
                            <label for="gel_lote" class="form-label">Longueur de Fibre  </label>
                            <input type="number" class="form-control"  id="longueur" name="longueur" required>
                        </div>

                          <button type="button submit" class="btn btn-primary">Enregistrer</button>
            </form>
            </div>
        </div>
</div>
</div>

@endsection

