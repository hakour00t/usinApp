



@extends('layouts.app')

@section('content')
<div class="container d-grid">
  
        
   <div class="row-1 "> 
    <a type="button" class="btn btn-success col-5 " href="{{ route('tube.create') }}" > Ajeuter un Tube Lache</a>
         
    <a href="{{ route('tube.download.TubeList') }}" class="btn btn-primary col-5">Télécharger PDF</a>

       
  </a>
      @if (session('sucss'))
          <div class="alert alert-success">
            
              {{ session('sucss') }}
              
          </div>
      @endif
        
      <table class="table">
    <thead>
      <tr>
      
      
        <th scope="col">Id</th>
        <th scope="col">Coleur</th>
        <th scope="col">Longuer</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>
      

      @foreach ($tubes as $tube )
          <tr>
              
              <td>{{ $tube->id }} </td>
              <td>{{ $tube->color }} </td>
              <td>{{ $tube->long }} </td>

              <td>
                
                <a class="btn btn-primary btn-sm" href="{{ route('tube.show' , $tube->id) }}" role="button">Plus</a>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateBobine{{ $tube->id }}">Modifier</button>    
              <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $tube->id }}" >Supprimer</button>
              
                      <div class="modal fade" id="deleteModal{{ $tube->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title fw-bold" id="deleteModalLabel">Confermer la Superission.</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                              Êtes-vous sûr de vouloir supprimer cet Fibre colouré ?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>
                              <form action="{{ route('tube.destroy' , $tube->id) }}" id="deleteForm" method="POST" >
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger fw-bold">Supprimer</button>
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
