@extends('layouts.app')

@section('content')
<div class="container text-capitalize ">

    <button type="button" class="btn btn-primary col-5" data-bs-toggle="modal" data-bs-target="#createChifet"> Ajeuter un chifet</button>

        <!-- Modal  créer une aparile-->
            <div class="modal fade " id="createChifet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajeuter aparile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('chifet.store') }}" method="post">
                        @method('post')
                        @csrf
                        <div class="mb-3">
                            <label for="chifet" class="form-label">Titetre de chifet</label>
                            <input type="text" class="form-control" id="chifet" placeholder="titere de chifet " name="title" required>

                             <label for="time" class="form-label">temp de time</label>
                            <input type="text" class="form-control" id="time" placeholder="soire " name="time" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button submit" class="btn btn-primary">ajeuter</button>
                </div>
                </form>
                </div>
            </div>
            </div>

    {{-- <a class="btn btn-primary col-5" href=" {{ route('aparile.create') }}"  data-mdb-ripple-init>Ajueter une aparile </a> --}}

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
    
    <div class="container ">
        <h1 >chifets</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">titere</th>
      <th scope="col">temp </th>
      <th scope="col">options</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($chifets as $chifet )
  
        <tr>
            
            <td>{{ $chifet->title }}</td>
            <td>{{ $chifet->time }}</td>
            <td>
                 <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modiferChifet{{ $chifet->id }}"> modifer</button>

                <!-- Modal  modifer un chifte -->
                    <div class="modal fade " id="modiferChifet{{ $chifet->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">modifer chifet</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('chifet.update' , $chifet->id  ) }}" method="post">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Titetre de chifet</label>
                                    <input type="text" class="form-control" id="title"  name="title" value="{{ $chifet->title }}" required>

                                      <label for="time" class="form-label">temp de chifet</label>
                                    <input type="text" class="form-control" id="time" name="time" value="{{ $chifet->time }}" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="button submit" class="btn btn-primary">modifer</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>


                    <!-- delete btn -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $chifet->id }}" >
                        Supprimer
                    </button>
                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $chifet->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="deleteModalLabel">Confermer la Superission.</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                             Êtes-vous sûr de vouloir supprimer cet chifet ?

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>

                            <form action="{{ route('chifet.destroy' , $chifet->id) }}" id="deleteForm" method="POST" >
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
