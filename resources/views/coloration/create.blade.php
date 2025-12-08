@extends('layouts.app')

@section('content')

<div class="container">

<h1 style="text-align: center" class="text-capitalize">etablissement de càblerie</h1>
        <hr>
        
        <div class="container text-capitalize">
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
        </div>

 
<div class="container text-center  text-capitalize">
        <div class="row ">
            <div class="col ">
            <div class="card">
            <h3 class="card-header text-capitalize">crée une fiche de suivi de laproduction de coloration f.o</h3>
               
            <form action="{{ route('coloration.store') }} " method="post" class="row g-2 p-4">
                @method('post')
                @csrf

                {{-- work order id  text input --}}
                <div class="col-md-4">
                    <label for="work_order_id" class="form-label">le id de work order</label>
                    <input type="text" class="form-control"  id="work_order_id" name="work_order_id" placeholder="WO-20251201-01" required>
                </div>

                 {{-- production lote id  text input --}}
                <div class="col-md-4">
                    <label for="lote_id" class="form-label">le id de work lote</label>
                    <input type="text" class="form-control"  id="lote_id" name="lote_id"  placeholder="LO-20251102-02" required>
                </div>
                <div class="col-md-4">
                <label for="Apparaille" class="form-label">Selectioner L'apariel</label>
                    <div class="input-group ">
                       
                        <select class="form-select" id="apariel" name="apariel" required>
                            <option value="1">sélectionner un'aparile</option>
                            <option value="1">apariel 01</option>
                            <option value="2">apariel 02</option>
                        </select>
                    </div>
                </div>

                {{-- vitesse de coloration --}}

                <div class="col-md-4 ">
                    <label for="vitesse" class="form-label">Vitesse de coloration (tr/min)</label>
                    <input type="number" class="form-control"  id="vitesse" name="vitesse"  step="any"  placeholder="1234" required>
                </div>
                

                {{-- chifet input section  --}}
                <div class="col-md-4">
                <label for="chifet" class="form-label">les chifets </label>
                    <div class="input-group ">
                        <select class="form-select" id="chifet" name="chifet" required>
                            <option >sélectionner un chifet</option>
                            <option value="a">Chifet A</option>
                            <option value="b">Chifet B</option>
                            <option value="c">Chifet C</option>
                            <option value="d">Chifet D</option>
                        </select>
                    </div>
                </div>

                        
                       
                <div class="col-md-4">
                <label for="fornissuer_id" class="form-label">Fournisseure de fibre </label>
                    <div class="input-group ">
                    
                        <select class="form-select" id="fornissuer_id" name="fornissuer_id" required >
                            <option >séléctionner un fournisseure</option>
                            <option value="1">Atellier 01</option>
                            <option value="2">Atellier 02</option>
                            <option value="3">Atellier 03</option>
                        </select>
                    </div>
                </div>

                     

                <button type="button submit" class="btn btn-primary text-capitalize mt-4">enregistrer</button>
            </form>
            </div>
        </div>
</div>
</div>

@endsection

