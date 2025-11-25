



@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPermissions">
  Ajeuter un permission
</button>

<!-- Modal -->
    <div class="modal fade" id="createPermissions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ajeuter permission</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('permission.store') }}" method="post">
                @method('post')
                @csrf
                <div class="mb-3">
                    <label for="role" class="form-label">Titetre de permission</label>
                    <input type="text" class="form-control" id="role" placeholder="titere role " name="name">
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

    @if (session('sucss'))
        <div class="alert alert-success">
           
            {{ session('sucss') }}
            
        </div>
    @endif
       
    <table class="table">
  <thead>
    <tr>
    
     
      <th scope="col">Titere</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($permissions as $permission )
        <tr>
            
            <td>{{ $permission->name }} </td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('permission.show' , $permission->id) }}" role="button">Plus</a>
                <a class="btn btn-secondary btn-sm" href="{{ route('permission.edit' , $permission->id) }}" role="button">Modifer</a>
                    <!-- delete btn -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $permission->id }}" >
                        Supprimer
                    </button>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $permission->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="deleteModalLabel">Confermer la Superission.</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                             Êtes-vous sûr de vouloir supprimer cet Permission ?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>

                            <form action="{{ route('permission.destroy' , $permission->id) }}" id="deleteForm" method="POST" >
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
