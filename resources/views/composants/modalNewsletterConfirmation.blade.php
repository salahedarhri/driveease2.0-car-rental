<div class="fixed inset-0 bg-slate-800 bg-opacity-60 flex items-center justify-center max-md:px-4 z-10">

    <!-- Modal -->
    <div class="max-w-5xl max-md:w-full bg-white shadow-xl rounded-xl font-cabin max-md:overflow-y-auto max-md:my-6">
        <div class="grid md:grid-cols-3 max-md:grid-cols-1 align-center justify-center text-center">
            <img src="{{ asset('images/composants/landing_updated.jpg')}}" class="w-full h-full object-cover md:rounded-l-xl max-md:rounded-t-xl" alt="car in driveway">
            <div class="relative flex flex-col justify-center align-center gap-4 col-span-2 p-6">
                <button class="absolute top-1 right-1" @click="modalNewsletter= !modalNewsletter"><i class="ri-close-line text-2xl hover:bg-red-500 hover:text-white rounded-full p-1 transition-all"></i></button>
                <h4 class="lg:text-2xl max-lg:text-xl font-montserrat font-semibold text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-cyan-500 py-2">Bienvenue dans Notre Newsletter !</h4>
                <p class="text-darkBlue">
                   <span class="font-semibold text-teal-700">Félicitations pour votre inscription à la newsletter DriveEase !</span><br>
                    Vous recevrez désormais nos meilleures offres, des conseils de location et les dernières nouveautés directement dans votre boîte de réception.
                </p>

                <button @click="modalNewsletter= !modalNewsletter" 
                class="w-fit mx-auto px-4 py-2 uppercase font-montserrat font-semibold text-white bg-gradient-to-r from-teal-600 to-cyan-600 hover:saturate-150 rounded shadow">
                D'accord</button>
            </div>
        </div>
    </div>

</div>