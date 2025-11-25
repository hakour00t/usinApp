
@extends('layouts.app')

@section('content')
<div class="container">


       

    <div class="card text-center">
        <div class="card-header">
             <h5 class="card-title">{{ $role->name }}t</h5>
        </div>
        <div class="card-body">
           
            @foreach ($role->permissions as $permission )
            @endforeach
           
                <label class="form-check-label" for="checkIndeterminate">{{ $permission->name}} </label>
                 
              
        </div>
        {{-- <div class="card-footer text-body-secondary">
            2 days ago
        </div> --}}
    </div>
    

</div>
@endsection


{{-- {{ $role }}
<br>
<pre>{{ print_r($role) }}</pre> --}}


