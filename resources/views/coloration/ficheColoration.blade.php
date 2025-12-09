@extends('layouts.app')
@section('content')

<div class="container ">
  

  <div class="message mt-4">
    {{-- show messages comming from controllers. --}}
  </a>
      @if (session('sucss'))
          <div class="alert alert-success ">
            
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
  </div>
  



<div class="card" >
  <div class="card-header text-capitalize  ">
    <div class="text-center"><h3>fiche de suivi de production de coloration de f.o</h3></div><hr>
   
   <ul class="ow list-unstyled">

    {{-- 'work_order_id' ,'apariel' ,'lote_id', 'vitesse' ,'fornissuer_id' ,'chifet' ,'user_id' --}}
    <li class="col-4 mb-2"> id de work order : {{$fiche->work_order_id}} </li>
    <li class="col-4 mb-2"> id de lote : {{$fiche->lote_id}} </li>
    <li class="col-4 mb-2"> l'aparile utiliser : {{$fiche->apariel}} </li>
    <li class="col-4 mb-2"> la vitesse utiliser : {{$fiche->vitesse}} </li>
    <li class="col-4 mb-2"> id de fornissuer : {{$fiche->fornissuer_id}} </li>
    <li class="col-4 mb-2"> le chifet : {{$fiche->chifet}} </li>
    <li class="col-4 mb-2"> créer par  : {{$fiche->user->grad}} {{$fiche->user->last_name}} {{$fiche->user->first_name}}    </li>
    </ul>
  </div>
  


 <table class="table text-center">
    <thead> <a class="btn btn-primary  text-capitalize col-4 m-3" href="{{ route('fibreColori.create' ,$fiche->id) }}" role="button">créer un fibre colori dans cette ficher</a>
   
      <tr>
      

        <th scope="col" class="text-capitalize">ID</th>
        <th scope="col" class="text-capitalize">couleur</th>
        <th scope="col" class="text-capitalize">longueur</th>
      
        <th scope="col" class="text-capitalize">Options</th>
      </tr>
    </thead>
    <tbody>
      

      @foreach ($fibres as $fibre )
          <tr>
              
              <td> {{ $fibre->id}}  </td>
              <td> {{ $fibre->couleur }} </td>
              <td> {{ $fibre->longueur }}  </td>
       

              <td>
                
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
              </td>
          </tr>
      @endforeach
      
    </tbody>
  </table>
  
</div>


</div>

@endsection

