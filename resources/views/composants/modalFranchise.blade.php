<div class="fixed inset-0 bg-slate-800 bg-opacity-60 flex items-center justify-center max-md:px-4">

     <!-- Franchise Modal -->
    @if( isset($protectionChoisi) && $prtc == $protectionChoisi)
      <div  @click.away="open = false" class="flex flex-col max-w-xl bg-teal-100 shadow-lg rounded-lg border-2 border-teal-600 border-opacity-50">
    @else
      <div  @click.away="open = false" class="flex flex-col max-w-xl bg-white shadow-lg rounded-lg border-2 border-teal-600 border-opacity-50">
    @endif
       <div class="w-full flex justify-end p-1">
         <button @click="open=false"><i class="ri-close-line text-3xl hover:bg-red-500 hover:text-white rounded-full p-1"></i></button>
       </div>
       <div class="flex flex-row justify-center place-items-center gap-2 p-2">
         <h4 class="text-xl font-semibold font-montserrat underline">Franchise {{ $prtc->type }}</h4>
       </div>
       <div class="flex flex-col justify-center text-center py-3 gap-1 px-3">
          <p class="text-teal-600">Caution minimum : <span>{{ $prtc->prixCaution }} DH</span></p>
          <p class="text-cyan-600">Franchise à payer en cas de dommages : <span>{{ $prtc->prixFranchise }} DH</span></p>
          <p class="font-cabin text-lg py-2">{{ $prtc->details }}</p>
       </div>
       <div class="flex flex-col gap-2 sm:py-12 sm:px-8 max-sm:py-2 max-sm:px-5 mx-auto text-left font-semibold">

        @if ($prtc->type == 'Basique')
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre les dommages résultant d'une collision</p>
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre le vol</p>
          <p class="text-slate-400"><b class="mr-2 text-red-700 text-opacity-50">&#10006;</b>Protection bris de glace, phares et pneumatiques</p>
          <p class="text-slate-400"><b class="mr-2 text-red-700 text-opacity-50">&#10006;</b>Protection personnelle accident (conducteur et passagers)</p>
          <p class="text-slate-400"><b class="mr-2 text-red-700 text-opacity-50">&#10006;</b>Protection des biens personnels</p>

        @elseif($prtc->type == 'Medium')
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre les dommages résultant d'une collision</p>
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre le vol</p>
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection bris de glace, phares et pneumatiques</p>
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection personnelle accident (conducteur et passagers)</p>
          <p class="text-slate-400"><b class="mr-2 text-red-700 text-opacity-50">&#10006;</b>Protection des biens personnels</p>

        @elseif($prtc->type == 'Premium')
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre les dommages résultant d'une collision</p>
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection contre le vol</p>
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection bris de glace, phares et pneumatiques</p>
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection personnelle accident (conducteur et passagers)</p>
          <p> <b class="text-teal-500 mr-1">&#x2713;</b> Protection des biens personnels</p>

        @endif
      </div>
       <div class="flex flex-row justify-between place-items-center p-6 max-md:p-4">
         <p class="text-lg text-teal-600 underline"><b>{{ $prtc->prix}} DH</b> /Total</p>

          @if( isset($protectionChoisi) && $prtc == $protectionChoisi)
            <button class="py-2 px-3 font-semibold bg-neutral-500 hover:bg-neutral-600 rounded shadow transition text-white my-4 w-fit" disabled>
              Sélectionnée</button>
          @else
            <button wire:click="choisirProtection({{ $prtc->id }})" class="py-2 px-3 font-semibold bg-teal-500 hover:bg-teal-600 rounded shadow transition text-white my-4 w-fit">
              Sélectionner</button>
          @endif

       </div>

     </div>
</div>