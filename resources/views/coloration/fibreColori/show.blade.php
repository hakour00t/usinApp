
@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card text-left text-capitalize">
        {{-- <a href="{{ route('coloration.fibreColori.downloadPdf', $fibre->id) }}" class="btn btn-success">Télécharger PDF</a> --}}
        <div class="card-header text-center">
             <h5 class="card-title">{{ $fibre->id}}</h5>
        </div>
        <div class="card-body">
             <ul class="list-group list-group-flush">
                  
        {{-- 'f_scoloratios_id' , --}}
                <li class="list-group-item">couleur :  {{$fibre->couleur}} </li>
                <li class="list-group-item"> La longueur {{$fibre->longueur}} Km</li>
                <li class="list-group-item"> La Longuer de fibre {{$fibre->long}}</li>
                <li class="list-group-item"> la tempirature {{$fibre->tempirature}} °C</li>
                <li class="list-group-item"> debitAzot {{$fibre->debitAzot}} m<sup>3</sup></li>
                <li class="list-group-item"> La Qualité De coloration  : @if(($fibre->colorQiolity == '1')) Bien @else Mauvaise @endif</li>
                <li class="list-group-item"> La Qualité De Bobinage  : @if(($fibre->bobineQiolity  == '1' )) Bien  @else Mauvaise @endif</li>

                <li class="list-group-item"> La Tempiratuer  : {{$fibre->tempir}}</li>
                <li class="list-group-item"> Dédit D'Azote {{$fibre->debitAzot}}</li>
                @if(isset($fibre->Observ))<li class="list-group-item"> Observations : {{ $fibre->observation }} </li>@endif

                <li class="list-group-item"> Id de bobine Mére : {{$fibre->Bobine?->id ?? 'put pas chargier la bobine'}}  
                    loungeur : {{$fibre->Bobine?->length ?? 'put pas chargier la bobine'}} 
                      {{-- loungeur : {{$fibre->Bobine->id}}  --}}
                    </li>
                {{-- <li class="list-group-item"> L'opératuer :  {{$user->grad}} {{$user->first_name}}  {{$user->last_name}} --}}

            </ul>
             
        </div>
     
       
    </div>
    

</div>
@endsection

