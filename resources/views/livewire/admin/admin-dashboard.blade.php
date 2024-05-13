<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="stats shadow m-6">
  
        <div class="stat place-items-center">
          <div class="stat-title">Réservations</div>
          <p class="stat-value">{{ $reservations }}</p>
          <div class="stat-desc">Crées Aujour'hui</div>
        </div>
        
        <div class="stat place-items-center">
          <div class="stat-title ">Voitures</div>
          <p class="stat-value text-mediumBlue">{{ $voitures }}</p>
          <div class="stat-desc text-mediumBlue">Actives</div>
        </div>
        
        <div class="stat place-items-center">
          <div class="stat-title">Messages</div>
          <p class="stat-value">{{ $messages }}</p>
          <div class="stat-desc">Reçues Aujourd'hui</div>
        </div>
        
    </div>
</div>
