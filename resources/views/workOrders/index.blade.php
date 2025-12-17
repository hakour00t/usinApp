@extends('layouts.app')
{{-- date : workOrders --}}
@section('content')
<div class="container text-capitalize ">

    <a type="button" class="btn btn-primary col-5"  href="{{ route('work_order.create') }}" > Ajeuter un work order</a>

    <div class="container m-2 text-capitalise" >
        @if (session('sucss'))
            <div class="alert alert-success">{{ session('sucss') }}</div>
        @endif
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
        <h1 >les work orders</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">description</th>
      <th scope="col">date de céeation </th>
      <th scope="col">date finalisé </th>
      <th scope="col">quantite planifiée </th>
      <th scope="col">Options </th>
    </tr>
  </thead>
  <tbody>

    @foreach ($workOrders as $workOrder )
        <tr>
            <td>{{ $workOrder->id }}</td>
            <td>{{ $workOrder->description }}</td>
            <td>{{ $workOrder->date_creation }}</td>
            <td>{{ $workOrder->date_de_finaliser  }}</td> 	
            <td>{{ $workOrder->quantite_planifiee }}</td>
            <td>
                 <a type="button" class="btn btn-secondary btn-sm" href="{{ route('work_order.edit' , $workOrder->id) }}"> modifer</a>
                    <!-- delete btn -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $workOrder->id }}" >
                        Supprimer
                    </button>
                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $workOrder->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="deleteModalLabel">Confermer la Superission.</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                             Êtes-vous sûr de vouloir supprimer cet worl order ?

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>

                            <form action="{{ route('work_order.destroy' , $workOrder->id) }}" id="deleteForm" method="POST" >
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
