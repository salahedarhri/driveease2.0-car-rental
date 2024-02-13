<div>
    {{-- Formulaire --}}
    <form wire:submit.prevent="validerDonnees">
        <div class="grid grid-cols-3 justify-center align-center place-items-center p-2 border border-mediumBlue font-cabin">
            
            <label for="lieuDepart" class="text-sm p-1">Lieu de départ
                <input wire:model.blur="lieuDepart" type="text" class="h-8" name="lieuDepart">
                @error('lieuDepart')
                    <p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </label>
            <label for="lieuRetour" class="text-sm p-1">Lieu de retour
                <input wire:model.blur="lieuRetour" type="text" class="h-8" name="lieuRetour">
                @error('lieuRetour')
                    <p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </label>
            <label for="dateDepart" class="text-sm p-1">Date de départ
                <input wire:model.blur="dateDepart" type="date" class="h-8" name="dateDepart">
                @error('dateDepart')
                    <p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </label>
            <label for="dateRetour" class="text-sm p-1">Date de retour
                <input wire:model.blur="dateRetour" type="date" class="h-8" name="dateRetour">
                @error('dateRetour')
                    <p class="text-red-600 text-sm">{{ $message }}</p>@enderror
            </label>

            <label for="minAge" class="p-1 text-sm">Age min
                <select name="minAge" wire:model.blur="minAge" class="w-18">
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
            </label>

            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded shadow">Rechercher</button>
        </div>
    </form>

    <div class="max-w-5xl mx-auto grid grid-cols-1 justify-center align-center">
        @if (isset($voituresDisponibles))
            @foreach ($voituresDisponibles as $v)
            <div class="flex flex-col justify-center align-center ">
                <span>{{ $v->modele }}</span>
                <span>{{ $v->transmission }}</span>
                <span>{{ $v->ville }}</span>
            </div>
            @endforeach
        @endif

    </div>

</div>
