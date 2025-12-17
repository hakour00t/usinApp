@extends('layouts.app')

@section('content')

<div class="container">
            <h3 class="card-header text-capitalize text-center" >ajeuter une work order global </h3>
<hr/>

       
<div class="container m-2 text-capitalise" >
        @if (session('sucss'))
            <div class="alert alert-success">{{ session('sucss') }}</div>
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
            <h3 class="card-header text-capitalize">formullaire pour ajeuter un work oderd </h3>
               
            <form action="{{ route('work_order.store') }} " method="post" class="row g-2 p-4">
                @method('post')
                @csrf
                
                <div class="col-md-4">
                    <label for="description" class="form-label">description </label>
                    <input type="text" class="form-control"  id="description" name="description" placeholder="description..." required>
                </div>

                <div class="col-md-4">
                    <label for="date_creation" class="form-label">date de création </label>
                    <input type="date" class="form-control"  id="date_creation" name="date_creation"  required>
                </div>

                 <div class="col-md-4">
                    <label for="date_debut" class="form-label">date de début </label>
                    <input type="date" class="form-control"  id="date_debut" name="date_debut"  required>
                </div>

                <div class="col-md-4">
                    <label for="quantite_planifiee" class="form-label"> quantite planifiee </label>
                    <input type="number" class="form-control"  id="quantite_planifiee" name="quantite_planifiee" step="any" placeholder="1234" required>
                </div>

                <div class="col-md-4">
                    <label for="date_cloture" class="form-label">date de cloture </label>
                    <input type="date" class="form-control"  id="date_cloture" name="date_cloture">
                </div>
                              
                <div class="col-md-4">
                    <label for="date_de_finaliser" class="form-label">date de finalisation </label>
                    <input type="date" class="form-control"  id="date_de_finaliser" name="date_de_finaliser"  required>
                </div>
                              
              
                
                <div class="col-md-4">
                <label for="Apparaille" class="form-label">Selectioner le lote</label>
                    <div class="input-group ">
                        <select class="form-select" id="lote_id" name="lote_id" required>
                            <option >sélectionner un lote</option>
                            @foreach ($lotes as $lote)
                                 <option value="{{ $lote->id }}"> id:{{ $lote->id }} N:{{ $lote->number }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="button submit" class="btn btn-primary text-capitalize mt-4 p-2">enregistrer</button>
            </form>
            </div>
        </div>
</div>
</div>

@endsection

