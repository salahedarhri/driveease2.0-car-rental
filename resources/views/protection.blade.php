@extends('layouts.client')

@section('content')

<div class="w-full bg-slate-200 p-5">

  @include('composants.formulaireRecap')

  <div class="max-w-7xl mx-auto p-4 max-sm:px-0 font-cabin">

    <p class="font-montserrat text-2xl max-sm:text-xl text-mediumBlue font-bold px-3 py-5">Choisissez votre franchise</p>

    <!--Section Franchises -->
    <div class="grid grid-cols-3 gap-3 max-lg:grid-cols-1 w-full">
      
      @foreach ($protections as $prtc)
      <div x-data="{ open:false }">

        @if( isset($protectionChoisi) && $prtc == $protectionChoisi)
          <div class="bg-teal-100 rounded shadow-lg shadow-teal-600 p-4 max-lg:text-center">
        @else
          <div class="bg-white rounded shadow-lg p-4 max-lg:text-center">
        @endif

              <p class="text-2xl font-montserrat font-bold">{{ $prtc->type }} 
            
              @if ($prtc->type == 'Basique')
                <span class="text-teal-500 text-xl font-normal ml-2">&#128970;</span></p>
              @elseif($prtc->type == 'Medium')
                <span class="text-teal-500 text-xl font-normal ml-2">&#128970;&#128970;</span></p>
              @elseif($prtc->type == 'Premium')
                <span class="text-teal-500 text-xl font-normal ml-2">&#128970;&#128970;&#128970;</span></p>
              @endif

              <div class="h-24 font-montserrat font-semibold text-sm py-5 flex flex-col gap-2">
                <p class="">Caution minimum : <span>{{ $prtc->prixCaution }} DH</span></p>
                <p class="text-cyan-600">Franchise à payer en cas de dommages : <span>{{ $prtc->prixFranchise }} DH</span></p>
              </div>

              <div class="flex flex-col gap-2 px-1 py-6 mx-auto text-left">

                @if ($prtc->type == 'Basique')
                  <p><b class="text-teal-500 mr-1">&#x2713;</b> Protection contre les dommages résultant d'une collision</p>
                  <p><b class="text-teal-500 mr-1">&#x2713;</b> Protection contre le vol</p>
                  <p class="text-slate-400"><b class="mr-2 text-red-700 text-opacity-50">&#10006;</b>Protection bris de glace, phares et pneumatiques</p>
                  <p class="text-slate-400"><b class="mr-2 text-red-700 text-opacity-50">&#10006;</b>Protection personnelle accident (conducteur et passagers)</p>
                  <p class="text-slate-400"><b class="mr-2 text-red-700 text-opacity-50">&#10006;</b>Protection des biens personnels</p>

                @elseif($prtc->type == 'Medium')
                  <p><b class="text-teal-500 mr-1">&#x2713;</b> Protection contre les dommages résultant d'une collision</p>
                  <p><b class="text-teal-500 mr-1">&#x2713;</b> Protection contre le vol</p>
                  <p><b class="text-teal-500 mr-1">&#x2713;</b> Protection bris de glace, phares et pneumatiques</p>
                  <p><b class="text-teal-500 mr-1">&#x2713;</b> Protection personnelle accident (conducteur et passagers)</p>
                  <p class="text-slate-400"><b class="mr-2 text-red-700 text-opacity-50">&#10006;</b>Protection des biens personnels</p>

                @elseif($prtc->type == 'Premium')
                  <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre les dommages résultant d'une collision</p>
                  <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre le vol</p>
                  <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection bris de glace, phares et pneumatiques</p>
                  <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection personnelle accident (conducteur et passagers)</p>
                  <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection des biens personnels</p>

                @endif
              </div>

              <div class="font-montserrat flex flex-col justify-center align-center text-center pt-4">

                @if($prtc->type == 'Basique')
                <p class="text-lg  font-semibold text-teal-600">Incluse</p>
                @else
                <p class="text-lg  font-semibold text-teal-600">{{ $prtc->prix }}DH/Jour</p>
                @endif


                <div class="flex flex-col gap-2 p-4 max-lg:text-center">


                  <form method="POST" action="{{ route('actualiserFranchise') }}" class="w-full">
                    @csrf
                    <input type="hidden" name="prtcChoisi" value="{{ $prtc->id }}">
                    @if( isset($protectionChoisi) && $prtc == $protectionChoisi)
                      <button type="submit" class="p-2 font-semibold bg-neutral-500 hover:bg-neutral-600 rounded shadow transition text-white my-4 w-full" disabled>Sélectionnée</button>
                    @else
                      <button type="submit" class="p-2 font-semibold bg-teal-500 hover:bg-teal-600 rounded shadow transition text-white my-4 w-full">Sélectionner</button>
                    @endif
                  </form>

                  <button class="text-sm font-semibold underline" @click="open =! open" >En savoir plus...</button>

                </div>

                  <!-- Modal associé à l'option -->
                 @include('composants.modalFranchise')

              </div>

          </div>
        </div>
        @endforeach
    </div>



    <!-- Section Options -->
    <p class="font-montserrat text-2xl max-sm:text-xl text-mediumBlue font-bold px-3 pt-8 pb-4">Choisissez vos options</p>

    <div class="grid grid-cols-4 max-xl:grid-cols-3 max-lg:grid-cols-2 max-sm:grid-cols-1 max-w-7xl mx-auto gap-4 p-2">

        @foreach ($options as $optn)
          
          @if(in_array($optn->id, $optnIdArray))
            <p>Selected</p>
          @else
            <div x-data="{ open:false }">
              <!-- Affichage standard d'Option -->
              <div  class="bg-white flex flex-col justify-center p-3 rounded-lg shadow-lg">
                  <div class="flex flex-row justify-left gap-2 p-2 h-20">
                    <img src="{{asset('images/options/'. $optn->urlPhoto )}}" alt="{{$optn->urlPhoto}}" class="w-auto h-16 object-center">
                    <p class="text-lg font-bold"> {{ $optn->option}} </p>
                  </div>
                  <div class="flex flex-col gap-3 p-2 h-24">
                    <p class="line-clamp-3">{{ $optn->description }}</p>
                  </div>
                  <div class="flex flex-row justify-between px-2 py-4">
                    <button class="underline" @click="open =! open" >En savoir plus...</button>
                    <p class="font-semibold text-right text-teal-500"> {{ $optn->prix}} DH/Total</p>
                  </div>

                  <form action="{{ route('choisirOptions') }}" method="post" class="w-full">
                    @csrf
                    <input type="hidden" name="optionId" value="{{ $optn->id }}"> 
                    <button class="py-2 px-4 bg-cyan-500 text-white font-semibold shadow rounded font-montserrat my-3 w-fit self-end">Sélectionner</button>
                  </form>
              </div>

              <!-- Modal associé à l'option -->
                @include('composants.modalOptions')
            
            </div>
          @endif
      @endforeach

    </div>
  </div>
</div>

@endsection