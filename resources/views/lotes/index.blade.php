@extends('layouts.app')

@section('content')
<div class="container text-capitalize ">

    <button type="button" class="btn btn-primary col-5" data-bs-toggle="modal" data-bs-target="#createAparile"> Ajeuter un lote</button>

        <!-- Modal  créer une aparile-->
            <div class="modal fade " id="createAparile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajeuter lote</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lote.store') }}" method="post">
                        @method('post')
                        @csrf
                        <div class="mb-3">
                            <label for="aparile" class="form-label">Numéro de lote</label>
                            <input type="number" class="form-control" id="aparile" placeholder="120545 " name="number" required>
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
        <h1 >lotes</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">number</th>
      <th scope="col">options</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($lotes as $lote )
  
        <tr>
            
            <td>{{ $lote->id }}</td>
            <td>{{ $lote->number }}</td>
            <td>
                 <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modiferlote{{ $lote->id }}"> modifer</button>

                <!-- Modal  modifer une lote-->
                    <div class="modal fade " id="modiferlote{{ $lote->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">modifer lote</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('lote.update' , $lote->id  ) }}" method="post">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="lote" class="form-label">Titetre de l'lote</label>
                                    <input type="number" class="form-control" id="lote"  name="number" value="{{ $lote->number }}" required>
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
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $lote->id }}" >
                        Supprimer
                    </button>
                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $lote->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="deleteModalLabel">Confermer la Superission.</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                             Êtes-vous sûr de vouloir supprimer cette lote ?

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>

                            <form action="{{ route('lote.destroy' , $lote->id) }}" id="deleteForm" method="POST" >
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
