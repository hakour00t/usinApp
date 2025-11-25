

@extends('layouts.app')

@section('content')
<div class="container">
 

    <div class="card">

    <div class="card-body">
        <h5 class="card-title">Profile de utilissateur</h5>
        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><span class="fw-bold"> Nom :  </span> {{ $user->last_name}}</li>
        <li class="list-group-item"><span class="fw-bold"> Prénom :  </span> {{ $user->first_name}}</li>
        <li class="list-group-item"><span class="fw-bold"> Grad :  </span> {{ $user->grad}}</li>
        <li class="list-group-item"><span class="fw-bold"> Adress :  </span> {{ $user->adress}}</li>
        <li class="list-group-item"><span class="fw-bold"> Email :  </span> {{ $user->email}}</li>
        <li class="list-group-item"><span class="fw-bold"> Date :  de naissance </span> {{ $user->date}}</li>
    </ul>
    {{-- <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div> --}}
    </div>



</div>
@endsection
