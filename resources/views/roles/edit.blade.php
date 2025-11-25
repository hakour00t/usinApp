
@extends('layouts.app')

@section('content')


<div class="container">

    @if (session('sucss'))
        <div class="alert alert-success">
           
            {{ session('sucss') }}
            
        </div>
    @endif

       

    <div class="card text-center">
        <h2> Modefication de role : {{$role->name }}</h2>
        <form action="{{ route('role.update' , $role->id) }} " method="post">

       @method('put')
       @csrf
       <div class="mb-3">
                
                <input type="text" class="form-control" id="role_name" value="{{ $role->name }}"  name="role_name">
            </div>
       
        <div class="card-body">
           
            @foreach ($autherPerms as $Perm )

                <input class="form-check-input" type="checkbox" value="{{ $Perm->name}}" name="permissions[]" 
                                id="checkPerm" @checked($role->permissions->contains($Perm)) value="{{ $Perm->name }}"  >
                <label class="form-check-label" for="checkPerm">{{ $Perm->name}} </label>
                @endforeach  
              
        </div>
       
      
       
        <button type="submit" class="btn btn-primary "> Modifier </button>
    </div>

    </form>

</div>

@endsection




