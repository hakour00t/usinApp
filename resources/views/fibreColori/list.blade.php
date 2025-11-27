



@extends('layouts.app')

@section('content')
<div class="container">
   
<a type="button" class="btn btn-primary" href="{{ route('fibreColori.create') }}" > Ajeuter un Fibre colorier</a>

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
    

    @foreach ($fibreColoris as $fibre )
        <tr>
            
            <td>{{ $fibre->id }} </td>
            <td>{{ $fibre->color }} </td>
            <td>{{ $fibre->long }} </td>

            <td>
              
              <a class="btn btn-primary btn-sm" href="{{ route('fibreColori.show' , $fibre->id) }}" role="button">Plus</a>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateBobine{{ $fibre->id }}">Modifier</button>    
            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $fibre->id }}" >Supprimer</button>
            
                    <div class="modal fade" id="deleteModal{{ $fibre->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                            <form action="{{ route('bobines.destroy' , $fibre->id) }}" id="deleteForm" method="POST" >
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
