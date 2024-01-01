@extends('layouts.client')

@section('content')

<div class="w-full bg-slate-200 p-5">

  @include('composants.formulaireRecap')

  <div class="max-w-5xl mx-auto p-4 font-cabin">

    <p class="font-montserrat text-2xl max-sm:text-xl text-darkBlue font-bold px-3 py-5">Choisissez votre franchise et options</p>

    <div class="grid grid-cols-3 gap-2 max-sm:grid-cols-1 w-full">
      <div class="bg-white rounded shadow p-3">


        {{-- Basique --}}
        <p class="text-xl font-montserrat font-bold">Basique <span class="text-teal-500 font-normal ml-2">&#128970;</span></p>
          @if( $protection_display == 'Basique')

          <p>Caution minimum est de <b>{{ $prtc->prixCaution }}</b> </p>
          <p>Franchise à payer en cas de dommages<b>{{ $prtc->prixFranchise }}</b> </p>
          @endif


      </div>

        {{-- Medium --}}
      <div class="bg-white rounded shadow p-3">

        <p class="text-xl font-montserrat font-bold">Medium <span class="text-teal-500 font-normal ml-2">&#128970; &#128970; </span></p>
        @if( $protection_display == 'Medium')

        <p>Caution minimum est de <b>{{ $prtc->prixCaution }}</b> </p>
        <p>Franchise à payer en cas de dommages<b>{{ $prtc->prixFranchise }}</b> </p>
        @endif


      </div>

        {{-- Premium --}}
      <div class="bg-white rounded shadow p-3">

        <p class="text-xl font-montserrat font-bold">Premium <span class="text-teal-500 font-normal ml-2">&#128970; &#128970; &#128970;</span></p>
        @if( $protection_display == 'Medium')

        <p>Caution minimum est de <b>{{ $prtc->prixCaution }}</b> </p>
        <p>Franchise à payer en cas de dommages<b>{{ $prtc->prixFranchise }}</b> </p>
        @endif


      </div>
    </div>

  </div>
</div>

@endsection