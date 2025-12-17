@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashbord</h1>

    <div class="container">
        <div class="row ">

             <div class="col-5 bg-white p-4 shadow-sm m-1" > 
                <a href="{{ route('aparile.index') }}" class="btn text-capitalize ">les apariles</a>
            </div>
            

             <div class="col-5 bg-white p-4 shadow-sm m-1" > 
                <a href="{{ route('lote.index') }}" class="btn text-capitalize ">les lotes</a>
            </div>
            

             <div class="col-5 bg-white p-4 shadow-sm m-1" > 
                <a href="{{ route('chifet.index') }}" class="btn text-capitalize ">les chifets</a>
            </div>
            
           
            <div class="col-5 bg-white p-4 shadow-sm m-1" > 
                <a href="{{ route('bobines.index') }}" class="btn text-capitalize ">Bobines nu</a>
            </div>


            <div class="col-5 bg-white p-4 shadow-sm m-1" > 
                <a href="{{ route('work_order.index') }}" class="btn text-capitalize ">les work orders </a>
            </div>
            
           
        </div>
    </div>
</div>
@endsection
