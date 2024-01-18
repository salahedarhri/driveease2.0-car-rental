<div x-show="open" x-transition.duration.500ms
class="fixed inset-0 bg-whiteBlue bg-opacity-75 flex items-center justify-center max-md:px-4">

     <!-- Modal -->
     <div  @click.away="open = false" class="flex flex-col max-w-xl bg-white shadow-lg rounded-lg border-2 border-teal-600 border-opacity-50">
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
         <button class="py-2 px-4 border border-cyan-600 text-cyan-600 font-semibold shadow-lg rounded font-montserrat">Sélectionner</button>

       </div>

     </div>
</div>