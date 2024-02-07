<div class="relative w-full bg-slate-200 p-2">

    <div wire:loading class="absolute inset-0 bg-white bg-opacity-50 w-full">
        <div class="max-w-xl mx-auto flex flex-col justify-center align-center">
            <span class="loading loading-spinner loading-lg"></span>
        </div>
    </div>

    <div class="max-w-3xl mx-auto grid grid-cols-3 place-items-center py-3">
        <div class="flex flex-col border p-2 w-full">
            <p><b>Date et Heure :</b></p>
            @if( isset($lieuDepart))
                <p>{{ $lieuDepart}}</p>
                <p>{{ $lieuRetour}}</p>
                <p>{{ $dateDepartDt}}</p>
                <p>{{ $dateRetourDt}}</p>
            @else
                <p>---</p>
            @endif
        </div>
        <div class="flex flex-col border p-2 w-full">
            <p><b>Voiture :</b></p>
            @if( isset($voiture))
                <p>{{ $voiture->modele }}</p>
                <p>{{ $voiture->prix }}</p>
            @else
                <p>---</p>
            @endif
        </div>
        <div class="flex flex-col border p-2 w-full">
            <p><b>Protection et Options :</b></p>
            @if( isset($protectionChoisi))
                <p>{{ $protectionChoisi->type }}</p>
                <p>{{ $protectionChoisi->prix }}</p>
            @else
                <p>---</p>
            @endif
        </div>
    </div>

    {{-- Protections --}}
    <div class="max-w-5xl mx-auto flex flex-row justify-center gap-2 p-2">
        @foreach ($protections as $prtc)
        @if ( $prtc == $protectionChoisi)
            <div class="p-2 text-center bg-teal-200 rounded w-60 border border-darkBlue">
                <p>{{ $prtc->type }}</p>
                <p>{{ $prtc->prix }}</p>
                <button class="px-2 py-1 text-white bg-slate-600 rounded mt-3" disabled>Selected</button>
            </div>
        @else
            <div class="p-2 text-center bg-white rounded w-60">
                <p>{{ $prtc->type }}</p>
                <p>{{ $prtc->prix }}</p>
                <button wire:click.debounce.100ms="choisirProtection( {{ $prtc->id }} )" class="px-2 py-1 text-white bg-teal-600 rounded mt-3">Select</button>
            </div>
            @endif

        @endforeach
    </div>

    {{-- Options --}}
    <div class="max-w-5xl mx-auto place-items-center grid grid-cols-2 gap-2 p-2">
        @foreach ($options as $optn)
            @if( in_array($optn->id , $optnsIds ))
                <div class="p-2 text-center bg-cyan-200 rounded w-80">
                    <p>{{ $optn->option }}</p>
                    <p>{{ $optn->prix }}</p>
                    <button wire:key="retirer-{{ $optn->id }}" wire:click="RetirerOption({{ $optn->id }})" class="px-2 py-1 text-white bg-cyan-600 rounded mt-3">Retirer</button>
                </div>
            @else
                <div class="p-2 text-center bg-white rounded w-80">
                    <p>{{ $optn->option }}</p>
                    <p>{{ $optn->prix }}</p>
                    <button wire:key="ajouter-{{ $optn->id }}" wire:click="AjouterOption({{ $optn->id }})" class="px-2 py-1 text-white bg-teal-600 rounded mt-3">Select</button>
                </div> 
            @endif
        @endforeach
        
        @dump($optnsIds)          

    </div>
</div>
