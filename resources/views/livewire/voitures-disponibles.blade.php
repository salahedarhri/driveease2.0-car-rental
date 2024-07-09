<article>
    @include('composants.formulaireRecap')

    <section class="w-full bg-slate-200 px-4">

        <section class="max-w-5xl mx-auto py-2 font-cabin">

            <h1 class="font-montserrat text-2xl max-sm:text-xl max-md:text-center text-mediumBlue font-bold px-3 py-5">Notre sélection de véhicules</h1>

            @if ($voituresDisponibles->isEmpty())
                <p>Aucune voiture disponible pour les critères spécifiés.</p>
            @else
                @foreach ($voituresDisponibles as $car)
                    <section x-data="{ open: false }">

                        <!-- Informations de Voiture   -->
                        <div class="bg-white overflow-hidden flex flex-col sm:flex-row border-b-2">
                            <div class="sm:w-1/3 py-2 flex items-center justify-center">
                                <img loading="lazy" src="{{ asset('images/voitures/'.$car->photo)}}" alt="{{ $car->photo }}" class="h-56 w-auto object-center object-contain p-3">
                            </div>
                            <div class="sm:w-1/3 px-2 sm:py-4 flex flex-col max-sm:items-center">
                                <h3 class="text-xl font-semibold font-montserrat pb-2 max-sm:text-center text-mediumBlue">{{ $car->modele }}</h3>
                                <div class="flex flex-row gap-3 font-cabin text-sm align-center py-2">
                                    <span><img loading="lazy" src="{{ asset('images/icons/personne.svg')}}" class="w-6 h-6 align-middle inline-block mr-1"></img loading="lazy">{{ $car->nbPers }}</span>
                                    <span><img loading="lazy" src="{{ asset('images/icons/transmission.svg')}}" class="w-6 h-6 align-middle inline-block mr-1"></img loading="lazy">{{ $car->transmission }}</span>
                                    @if( $car->climatisation == true )
                                        <span><img loading="lazy" src="{{ asset('images/icons/climatisation.svg')}}" class="w-6 h-6 align-middle inline-block mr-1"></img loading="lazy">Climatisation</span>
                                    @endif
                                </div>
                                <p class=" py-1 text-md"> {{ $car->description }} </p>

                                <button @click="open=!open" class="px-2 sm:mt-6 rounded-md font-semibold font-montserrat text-teal-500 max-sm:pt-4 max-sm:pb-2 underline decoration-teal-500">
                                    Plus de détails &nbsp; &#11033
                                </button>
                            </div>
                            <div class="sm:w-1/3 p-4 flex flex-col items-right justify-center">
                                <div class="text-right font-montserrat">
                                    <p class="text-xl max-sm:text-lg text-mediumBlue"><b>{{ $car->prix }} DH</b>/Jour</p>
                                    <p class="text-md max-sm:text-sm text-lightBlue pb-4 max-sm:pb-2">Total {{ $car->prix * $nbJrs }} DH</p>
            
                                    <form wire:key="car-{{$car->slug}}" wire:submit.prevent="ChoisirVoiture('{{$car->slug}}')">
                                        <button type="submit" class="font-semibold py-2 px-4 rounded-full shadow-md bg-lightBlue hover:bg-teal-500 transition mt-4 w-36 max-sm:w-full text-white">
                                            Sélectionner
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div x-cloak x-show="open" class="rounded-b-lg"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">

                            <div class="grid grid-cols-2 max-sm:grid-cols-1 gap-2 justify-evenly p-4">
                                <div class="flex flex-col p-4 bg-slate-100 rounded">
                                    <p class="font-semibold text-mediumBlue font-montserrat text-lg">Détails de la Voiture </p>
                                    <div class="flex flex-col p-2">
                                        <p><b class="text-teal-500 mr-2">&#8226;</b>{{ $car->nbPers }} Personnes</p>
                                        <p><b class="text-teal-500 mr-2">&#8226;</b>Transmission {{ $car->transmission }}</p>
                                        @if( $car->climatisation == true )
                                        <p><b class="text-teal-500 mr-2">&#8226;</b>Climatisation</p>
                                        @endif
                                        <p><b class="text-teal-500 mr-2">&#8226;</b>{{ $car->minAge }} ans min.</p>
                                    </div>
                                </div>

                                <div class="flex flex-col p-3 bg-slate-100">
                                    <p class="font-semibold text-mediumBlue font-montserrat text-lg pb-1">Protection Basique <i class="text-sm text-teal-600">&nbsp; inclus</i></p>
                                    <p> <i class="text-lg text-teal-500 mr-2">&#x2713;</i> Protection contre le vol</p>
                                    <p> <i class="text-lg text-teal-500 mr-2">&#x2713;</i> Protection contre les dommages résultant d'une
                                    collision</p>
                                </div>
                            </div>
                        </div>

                    </section>
                @endforeach
            @endif

            <div x-intersect="$wire.ChargerPlus()" class="w-full mx-auto flex justify-center align-center p-4">
            </div>
            
        </section>

    </section>
</article>
