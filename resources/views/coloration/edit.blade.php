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
            <h3 class="card-header text-capitalize">Modifier la fiche de suivi de production de coloration </h3>
               
            <form action="{{ route('coloration.store') }} " method="post" class="row g-2 p-4">
                @method('post')
                @csrf

                {{-- work order id  text input --}}
                {{-- protected $fillable = [ 'work_order_id' ,'apariel' ,'lote_id', 'vitesse' ,'fornissuer_id' ,'chifet' ,'user_id'] ; --}}
                <div class="col-md-4">
                    <label for="work_order_id" class="form-label">le id de work order</label>
                    <input type="text" class="form-control"  id="work_order_id" name="work_order_id"  value="{{ $fiche->work_order_id }}" required>
                </div>

                 {{-- production lote id  text input --}}
                <div class="col-md-4">
                    <label for="lote_id" class="form-label">le id de work lote</label>
                    <input type="text" class="form-control"  id="lote_id" name="lote_id"  value="{{ $fiche->lote_id }}" required>
                </div>
                <div class="col-md-4">
                <label for="Apparaille" class="form-label">Selectioner L'apariel</label>
                    <div class="input-group ">
                        <select class="form-select" id="apariel" name="apariel"  required>
                     
                        <option value="{{ $fiche->apariel }}">
                            Apariel  {{ $fiche->apariel }}
                        </option>
                      
                        </select>
                    </div>
                </div>

                {{-- vitesse de coloration --}}

                <div class="col-md-4 ">
                    <label for="vitesse" class="form-label">Vitesse de coloration (tr/min)</label>
                    <input type="number" class="form-control"  id="vitesse" name="vitesse"  step="any"  value="{{ $fiche->vitesse }}" required>
                </div>
                

                {{-- chifet input section  --}}
                <div class="col-md-4">
                <label for="chifet" class="form-label">les chifets </label>
                    <div class="input-group ">
                        <select class="form-select" id="chifet" name="chifet" required>
                            <option value="{{ $fiche->chifet }}"> chifet  <span > {{ $fiche->chifet }}</span></option>
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

