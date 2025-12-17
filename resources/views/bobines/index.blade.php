



@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBobine">
  Ajeuter un boubinne
</button>



 <div class="container m-2">
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
                    </div>


<!-- Modal -->
    <div class="modal fade" id="createBobine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ajeuter boubinne</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('bobines.store') }}" method="post">
                @method('post')
                @csrf
                <div class="mb-3">
                    <label for="loungeur" class="form-label">Longuer de bobinne en Km</label>
                    <input type="number" class="form-control" id="loungeur" step="any" name="loungeur">
                </div>
            
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="button submit" class="btn btn-primary">Enregistrer</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    
    <table class="table">
  <thead>
    <tr>
    
     
      <th scope="col">Titere</th>
      <th scope="col">Longuer</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($bobines as $bobine )
        <tr>
            
            <td>{{ $bobine->id }} </td>
            <td>{{ $bobine->loungeur }} </td>

            <td>
              
             
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateBobine{{ $bobine->id }}">
              Modifier
            </button>

            <!-- Modal -->
                <div class="modal fade" id="updateBobine{{ $bobine->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> Modifier La Longuer de Bobinne</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('bobines.update' , $bobine->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="role" class="form-label">Longuer de bobinne en Km</label>
                                <input type="number" class="form-control" id="role" step="any" name="loungeur" value="{{ $bobine->loungeur }}">
                            </div>
                        
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button submit" class="btn btn-primary">Enregistrer</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                    <!-- delete btn -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $bobine->id }}" >
                        Supprimer
                    </button>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $bobine->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="deleteModalLabel">Confermer la Superission.</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                             Êtes-vous sûr de vouloir supprimer cet Boubinne ?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>

                            <form action="{{ route('bobines.destroy' , $bobine->id) }}" id="deleteForm" method="POST" >
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
@endsection
