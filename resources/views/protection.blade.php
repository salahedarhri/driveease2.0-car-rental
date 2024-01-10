@extends('layouts.client')

@section('content')

<div class="w-full bg-slate-200 p-5">

  @include('composants.formulaireRecap')

  <div class="max-w-5xl mx-auto p-4 font-cabin">

    <p class="font-montserrat text-2xl max-sm:text-xl text-darkBlue font-bold px-3 py-5">Choisissez votre franchise et options</p>

    <div class="grid grid-cols-3 gap-2 max-md:grid-cols-1 w-full">

      @foreach ($protection_display as $prtc)
        <div class="bg-white rounded shadow-lg p-4">

          <p class="text-xl font-montserrat font-bold">{{ $prtc->type }} 
            
            @if ($prtc->type == 'Basique')
              <span class="text-teal-500 font-normal ml-2">&#128970;</span></p>
            @elseif($prtc->type == 'Medium')
              <span class="text-teal-500 font-normal ml-2">&#128970;&#128970;</span></p>
            @elseif($prtc->type == 'Premium')
              <span class="text-teal-500 font-normal ml-2">&#128970;&#128970;&#128970;</span></p>
            @endif

            <div class="text-sm py-5 flex flex-col gap-2">
              <p class="">Caution minimum : <b>{{ $prtc->prixCaution }} DH</b></p>
              <p class="text-cyan-600">Franchise à payer en cas de dommages : <b>{{ $prtc->prixFranchise }} DH</b></p>
            </div>

            <div class="font-montserrat flex flex-col justify-center align-center text-center">
              <p class="text-lg  font-semibold text-teal-600">{{ $prtc->prix }}DH/Jour</p>
              <button class="p-2 font-semibold bg-teal-500 hover:bg-teal-600 rounded shadow transition text-white my-4">Sélectionner</button>

            </div>


        </div>

      @endforeach

    </div>

  </div>
</div>

@endsection