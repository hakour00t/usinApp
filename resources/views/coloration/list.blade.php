


{{-- data :
      fichs_coloration--> 'work_order_id' ,'apariel' , 'vitesse' ,'fornissuer_id' ,'chifet' --> liste des fichs de suivi de coloration.
        --}}

{{-- Route :
      /coloration : resources. 
  --}}
@extends('layouts.app')

@section('content')
<div class="container d-grid">
  
        
  <h1> Lise des fiches de suivi la Production de Coloration </h1>
   <div class="row-1 "> 
    <a type="button" class="btn btn-success col-5 text-capitalize" href="{{ route('coloration.create') }}" > Ajeuter Une Fiche De Suivi De Coloration</a>
    {{-- <a href="{{ route('fibreColori.download.FibreList') }}" class="btn btn-primary col-5">Télécharger PDF</a> --}}

      
{{-- show messages comming from controllers. --}}
  </a>
      @if (session('sucss'))
          <div class="alert alert-success">
            
              {{ session('sucss') }}
              
          </div>
      @endif

{{-- for show errors comming from controllers. --}}
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
         
    <table class="table">
    <thead>
      <tr>

        <th scope="col" class="text-capitalize">ID</th>
        <th scope="col" class="text-capitalize">id de work order</th>
        <th scope="col" class="text-capitalize">aparile</th>
        <th scope="col" class="text-capitalize">chifet</th>
        <th scope="col" class="text-capitalize">id de fornissuer</th>
        <th scope="col" class="text-capitalize">Options</th>
      </tr>
    </thead>
    <tbody>
      

      @foreach ($fichs_coloration as $fiche )
          <tr>
              
              <td>{{ $fiche->id }} </td>
              <td>{{ $fiche->work_order_id }}</td>
              <td>{{ $fiche->apariel }} </td>
              <td>{{ $fiche->chifet }} </td>
              <td>{{ $fiche->vitesse }} </td>
              <td>{{ $fiche->fornissuer_id }} </td>

              <td>
                
              {{-- afficher plus de detailles sur cette fiche de coloration. --}}
              <a class="btn btn-primary btn-sm text-capitalize " href="{{ route('coloration.show' , $fiche->id) }}" role="button">voir</a>
              {{-- modifier cette fiche de coloration. --}}
              <a class="btn btn-primary btn-sm text-capitalize" href="{{ route('coloration.edit' , $fiche->id) }}" role="button">Modifier</a>
              
              {{-- supprimer cette fiche de coloration. --}}
              <button class="btn btn-danger btn-sm text-capitalize" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $fiche->id }}" >Supprimer</button>
              
                      <div class="modal fade" id="deleteModal{{ $fiche->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title fw-bold text-capitalize" id="deleteModalLabel">confermer la suprission</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body text-capitalize">
                             Êtes-vous sûr de supprimer cette fiche de coloration ainsi que toutes les fibres de coloration qu’elle contient ?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">anuller</button>
                              <form action="{{ route('coloration.destroy' , $fiche->id) }}" id="deleteForm" method="POST" >
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger fw-bold">supprimer</button>
                              </form>
                          </div>
                          </div>
                          </div>
                      </div>
              </td>
          </tr>
      @endforeach
      
    </tbody>
  </table>

</div>
</div>
@endsection
