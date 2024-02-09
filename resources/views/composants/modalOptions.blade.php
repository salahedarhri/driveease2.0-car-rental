<div class="fixed inset-0 bg-slate-800 bg-opacity-60 flex items-center justify-center max-md:px-4">

     <!-- Modal -->
     @if( isset($optnsIds) && in_array($optn->id, $optnsIds))
     <div  @click.away="open = false" class="flex flex-col max-w-xl bg-teal-100 shadow-lg rounded-lg border-2 border-teal-600 border-opacity-50">
    @else
      <div  @click.away="open = false" class="flex flex-col max-w-xl bg-white shadow-lg rounded-lg border-2 border-teal-600 border-opacity-50">
    @endif
       <div class="w-full flex justify-end p-1">
         <button @click="open=false" ><i class="ri-close-line text-2xl hover:bg-red-500 hover:text-white rounded-full p-1"></i></button>
       </div>
       
       <div class="flex flex-row justify-center place-items-center gap-2 p-2">
         <img src="{{asset('images/options/'. $optn->urlPhoto )}}" alt="{{$optn->urlPhoto}}" class="w-auto h-20 object-center">
         <h4 class="text-xl font-semibold font-montserrat">{{ $optn->option }}</h4>
       </div>

       <div class="flex flex-col py-6 gap-4 px-6">
         <p class="font-cabin text-lg text-center">{{ $optn->description }}</p>
       </div>

       <div class="flex flex-row justify-between place-items-center p-6 max-md:p-4">
         <p class="text-lg font-semibold text-teal-600"> {{ $optn->prix}} DH /Total</p>

         @if( isset($optnsIds) && in_array($optn->id, $optnsIds))
          <button wire:key="retirer-modal-{{ $optn->id }}" wire:click="RetirerOption({{ $optn->id }})"  class="bg-white py-2 px-4 text-teal-500 border-2 border-teal-500 font-semibold shadow rounded font-montserrat my-3 w-fit self-end">
            Retirer</button> 
          @else
            <button wire:key="ajouter-modal-{{ $optn->id }}" wire:click="AjouterOption({{ $optn->id }})"  class="py-2 px-4 bg-cyan-500 text-white font-semibold shadow rounded font-montserrat my-3 w-fit self-end">Sélectionner</button>   
          @endif

       </div>

     </div>
</div>