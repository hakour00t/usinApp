@extends('layouts.app')
@section('content')

<div class="container ">
<div class="card" >
  <div class="card-header text-capitalize ">
   fiche de suivi de production de coloration de f.o
  </div>
  
      
 
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> 
         <a class="btn btn-primary btn-sm text-capitalize " href="{{ route('fibreColori.create' ,$fiche->id) }}" role="button">créer un fibre colori dans cette ficher</a>
    </li>
   
    @foreach ($fibres as $fibre )
 <li class="list-group-item d-flex justify-content-between">
    <div class="content">
      {{-- '' ,
        '' ,
        '' ,
        '' ,
        '' ,
        '' ,
        'debitAzot' ,
        'observation' ,
        'bobigneMere_id' ,
        'f_scoloratios_id' , --}}
       id :{{ $fibre->id}} couleur : {{ $fibre->couleur }} louneur : {{ $fibre->longueur }} 
    </div>
    <div class="options">
         
          <a class="btn btn-primary btn-sm text-capitalize " href="{{ route('fibreColori.show' , $fibre->id) }}" role="button">voire</a>
          <a class="btn btn-primary btn-sm text-capitalize" href="{{ route('fibreColori.edit' , $fibre->id) }}" role="button">modifier</a>
          
          {{-- supprimer fibre colori. --}}
          <button class="btn btn-danger btn-sm text-capitalize" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $fibre->id }}" >Supprimer</button>
          
            <div class="modal fade" id="deleteModal{{ $fibre->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-capitalize" id="deleteModalLabel">confermer la suprission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-capitalize">
               Êtes-vous sûr de supprimer cet fibre colouier ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">anuller</button>
                <form action="{{ route('fibreColori.destroy' , $fiche->id) }}" id="deleteForm" method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger fw-bold">supprimer</button>
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
    </li> 
    @endforeach
  </ul>
</div>


</div>

@endsection

