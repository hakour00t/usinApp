
@extends('layouts.app')

@section('content')
<div class="container">


       
{{-- ['id' ,'apparaille' , 'vitesse' ,'long', 'chifet' , 'color' , 'colorQiolity' , 'bobineQiolity' , 'tempir' , 'debitAzot' , 'Observ','bobigneMere_id']; --}}

    <div class="card text-left">
        <a href="{{ route('fibreColori.downloadPdf', $fibre->id) }}" class="btn btn-success">Télécharger PDF</a>
        <div class="card-header text-center">
             <h5 class="card-title">{{ $fibre->id}}</h5>
        </div>
        <div class="card-body">
             <ul class="list-group list-group-flush">
                <li class="list-group-item">L'apparille utiliser :  {{$fibre->apparaille}}</li>
                <li class="list-group-item"> La vitess {{$fibre->vitesse}}</li>
                <li class="list-group-item"> La Longuer de fibre {{$fibre->long}}</li>
                <li class="list-group-item"> Chifet {{$fibre->chifet}}</li>
                <li class="list-group-item"> La Coluer {{$fibre->color}}</li>
                <li class="list-group-item"> La Qualité De coloration  : @if(($fibre->colorQiolity == '1')) Bien @else Mauvaise @endif</li>
                <li class="list-group-item"> La Qualité De Bobinage  : @if(($fibre->bobineQiolity  == '1' )) Bien  @else Mauvaise @endif</li>

                <li class="list-group-item"> La Tempiratuer  : {{$fibre->tempir}}</li>
                <li class="list-group-item"> Dédit D'Azote {{$fibre->debitAzot}}</li>
                @if(isset($fibre->Observ))<li class="list-group-item"> Observations : {{ $fibre->Observ }} </li>@endif

                <li class="list-group-item"> Id de bobine Mére {{$fibre->bobigneMere_id}}</li>
                <li class="list-group-item"> L'opératuer :  {{$user->grad}} {{$user->first_name}}  {{$user->last_name}}</li>

            </ul>
             
        </div>
     
       
    </div>
    

</div>
@endsection

