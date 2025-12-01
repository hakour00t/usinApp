<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fibre PDF</title>
    <style>
        body { font-family: sans-serif; }
        .title { text-align: center; font-size: 20px; font-weight: bold; }
        ul { list-style: none; padding: 0; }
        li { padding: 5px 0; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>

    <div class="title">Fibre ID : {{ $fibre->id }} </div>
    <h5 class="">Date  : {{ $fibre->created_at }} </h5>
    

    <ul>
        <li>L'appareil utilisé : {{ $fibre->apparaille }}</li>
        <li>Chifet : {{ $fibre->chifet }}</li>
        <li>Le Fournisuer Atelier 1</li>
        <li>La vitesse : {{ $fibre->vitesse }}</li>
        <li>La longueur de fibre : {{ $fibre->long }}</li>
        <li>La couleur : {{ $fibre->color }}</li>

        <li>
            Qualité de coloration : 
            {{ $fibre->colorQiolity == 1 ? 'Bien' : 'Mauvaise' }}
        </li>

        <li>
            Qualité de bobinage : 
            {{ $fibre->bobineQiolity == 1 ? 'Bien' : 'Mauvaise' }}
        </li>

        <li>Température de Moule : {{ $fibre->tempir }}</li>
        <li>Débit d’Azote : {{ $fibre->debitAzot }}</li>

        @if($fibre->Observ)
            <li>Observations : {{ $fibre->Observ }}</li>
        @endif

        <li>Id de bobine mère : {{ $fibre->bobigneMere_id }}</li>


          <li > L'opératuer :  {{$user->grad}} {{$user->first_name}}  {{$user->last_name}}</li>

    </ul>

</body>
</html>
