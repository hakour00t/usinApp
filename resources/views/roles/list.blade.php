



@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRole">
  Ajeuter un role
</button>

<!-- Modal -->
<div class="modal fade" id="createRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajeuter role</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('role.store') }}" method="post">
            @method('post')
            @csrf
            <div class="mb-3">
                <label for="role" class="form-label">Titetre de role</label>
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

    @foreach ($roles as $role )
        <tr>
            
            <td>{{ $role->name }} </td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('role.show' , $role->id) }}" role="button">Plus</a>
              
                <a class="btn btn-secondary btn-sm" href="{{ route('role.edit' , $role->id) }}" role="button">Modifer</a>
              

                    <!-- delete btn -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $role->id }}" >
                        Supprimer
                    </button>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $role->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="deleteModalLabel">Confermer la Superission.</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                             Êtes-vous sûr de vouloir supprimer cet Role ?

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>

                            <form action="{{ route('role.destroy' , $role->id) }}" id="deleteForm" method="POST" >
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
