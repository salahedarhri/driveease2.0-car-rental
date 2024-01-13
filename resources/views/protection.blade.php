@extends('layouts.client')

@section('content')

<div class="w-full bg-slate-200 p-5">

  @include('composants.formulaireRecap')

  <div class="max-w-7xl mx-auto p-4 font-cabin">

    <p class="font-montserrat text-2xl max-sm:text-xl text-darkBlue font-bold px-3 py-5">Choisissez votre franchise et options</p>

    <div class="grid grid-cols-3 gap-2 max-lg:grid-cols-1 w-full">

      @foreach ($protections as $prtc)
        <div class="bg-white rounded shadow-lg p-4">
          <p class="text-2xl font-montserrat font-bold">{{ $prtc->type }} 
            
            @if ($prtc->type == 'Basique')
              <span class="text-teal-500 text-xl font-normal ml-2">&#128970;</span></p>
            @elseif($prtc->type == 'Medium')
              <span class="text-teal-500 text-xl font-normal ml-2">&#128970;&#128970;</span></p>
            @elseif($prtc->type == 'Premium')
              <span class="text-teal-500 text-xl font-normal ml-2">&#128970;&#128970;&#128970;</span></p>
            @endif

            <div class="font-montserrat font-semibold text-sm py-5 flex flex-col gap-2">
              <p class="">Caution minimum : <span>{{ $prtc->prixCaution }} DH</span></p>
              <p class="text-cyan-600">Franchise à payer en cas de dommages : <span>{{ $prtc->prixFranchise }} DH</span></p>
            </div>

            <div class="flex flex-col gap-2 px-1 py-6">

              @if ($prtc->type == 'Basique')
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre les dommages résultant d'une collision</p>
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre le vol</p>
                <p class="text-slate-400"><b class="mr-2">&#10006;</b>Protection bris de glace,phares et pneumatiques</p>
                <p class="text-slate-400"><b class="mr-2">&#10006;</b>Protection personnelle accident (conducteur et passagers)</p>
                <p class="text-slate-400"><b class="mr-2">&#10006;</b>Protection des biens personnels</p>

              @elseif($prtc->type == 'Medium')
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre les dommages résultant d'une collision</p>
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre le vol</p>
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection bris de glace,phares et pneumatiques</p>
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection personnelle accident (conducteur et passagers)</p>
                <p class="text-slate-400"><b class="mr-2">&#10006;</b>Protection des biens personnels</p>

              @elseif($prtc->type == 'Premium')
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre les dommages résultant d'une collision</p>
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre le vol</p>
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection bris de glace,phares et pneumatiques</p>
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection personnelle accident (conducteur et passagers)</p>
                <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection des biens personnels</p>

              @endif
            </div>

            <div class="font-montserrat flex flex-col justify-center align-center text-center pt-4">
              <p class="text-lg  font-semibold text-teal-600">{{ $prtc->prix }}DH/Jour</p>
              <button class="p-2 font-semibold bg-teal-500 hover:bg-teal-600 rounded shadow transition text-white my-4">Sélectionner</button>
            </div>

        </div>

      @endforeach

    </div>

  </div>
</div>

@endsection