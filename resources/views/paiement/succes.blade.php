@extends('layouts.client')

@section('content')
    <div class="w-full bg-slate-200 p-3 md:py-40">
        <div class="max-w-7xl mx-auto flex flex-col gap-6 max-md:gap-3 p-4 shadow-lg rounded-lg font-montserrat text-center bg-white">
            <h1 class="text-3xl max-md:text-xl md:py-6 font-bold text-teal-600">Félicitations !</h1>
            <h2 class="text-xl max-md:text-lg font-semibold text-mediumBlue">Votre réservation de location a été confirmée avec succès !</h2>

            <section class="w-full grid grid-cols-2 max-md:grid-cols-1 align-center justify-center py-3">
                <div class="font-cabin flex flex-col md:justify-between max-md:gap-3 text-justify max-md:text-center md:text-lg">
                    <p>Votre réservation a été traitée avec soin, et nous sommes en train de préparer votre véhicule pour la location. 
                        <br>Dès que votre voiture sera prête, nous vous enverrons un email de confirmation à cette adresse : <b class="text-teal-600">{{ $client->email }}</b> avec tous les détails de la location.</p>
                    <p class="">Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter. Nous sommes là pour vous aider!</p>
                    <p class="">Merci encore pour votre confiance.</p>
                    <p class="font-montserrat font-semibold text-teal-600">Cordialement,</p>
                    <p class="italic font-montserrat font-semibold text-teal-600">DriveEase</p>
                </div>
                <img src="{{ asset('images/composants/newsletter-400w.png')}}" alt="white car" 
                    srcset="{{ asset('images/composants/newsletter-400w.png')}} 400w,
                            {{ asset('images/composants/newsletter-600w.png')}} 600w,
                            {{ asset('images/composants/newsletter-800w.png')}} 800w"
                    class="py-3">
            </section>
        </div>
    </div>


@endsection