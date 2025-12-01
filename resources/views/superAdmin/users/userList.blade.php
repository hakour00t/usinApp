@extends('layouts.app')

@section('content')
<div class="container">
   
    <a class="btn btn-primary" href=" {{ route('user.create') }}"  data-mdb-ripple-init>Crée un utilisatuer</a>
  
                
    @if (session('sucss'))
        <div class="alert alert-success">
           
            {{ session('sucss') }}
            
        </div>
    @endif
       
    <table class="table">
  <thead>
    <tr>
    
     
      <th scope="col">Nom</th>
       <th scope="col">Prenom</th>
      <th scope="col">Grad</th>
      <th scope="col">Options </th>
    </tr>
  </thead>
  <tbody>

    @foreach ($users as $user )
  
        <tr>
            
            <td>{{ $user->last_name }}    </td>
            <td>{{ $user->first_name }} </td>

            <td>{{ $user->grad }} </td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('user.show' , $user->id) }}" role="button">Plus</a>
              
                <a class="btn btn-secondary btn-sm" href="{{ route('user.edit' , $user->id) }}" role="button">Modifer</a>
              


                    <!-- delete btn -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}" >
                        Supprimer
                    </button>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="deleteModalLabel">Confermer la Superission.</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                             Êtes-vous sûr de vouloir supprimer cet élément ?

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>

                            <form action="{{ route('user.destroy' , $user->id) }}" id="deleteForm" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger fw-bold">Supprimer</button>
                            </form>
                        </div>

                        </div>
                        </div>
                    </div>
                  
                <a href="#">Activation </a>

            </td>
        </tr>
    @endforeach
    
  </tbody>
</table>

</div>
@endsection
