
<div class="cabin font-semibold flex flex-col justify-center lg:max-w-3xl sm:max-w-xl max-sm:w-80 mx-auto md:p-4 max-md:p-3 bg-white rounded-md shadow-md">
  
  <form action="{{ route('voituresDisponibles')}}" method="post">
    @csrf
    <div class="grid lg:grid-cols-4 sm:grid-cols-2 max-sm:grid-cols-1 justify-center max-lg:gap-2">
        <label for="lieuDepart">
          <input name="lieuDepart"  type="text" placeholder="Lieu de départ" class="p-3 w-full cursor-pointer border border-sky-700 max-lg:rounded-lg text-sm lg:rounded-l-xl"></label>
        <label for="lieuRetour">
          <input name="lieuRetour"  type="text" placeholder="Lieu de retour" class="p-3 w-full cursor-pointer border border-sky-700 max-lg:rounded-lg lg:border-l-0 text-sm"></label>
        <label for="dateDepart">
          <input id="dateTime1" name="dateDepart" type="text" placeholder="Date de départ" class="p-3 text-slate-800 w-full cursor-pointer border border-sky-700 max-lg:rounded-lg lg:border-l-0 text-sm"></label>
        <label for="dateRetour">
          <input id="dateTime2" name="dateRetour" type="text" placeholder="Date de retour" class="p-3 text-slate-800 w-full cursor-pointer border border-sky-700 max-lg:rounded-lg lg:border-l-0 text-sm lg:rounded-r-xl"></label>
    </div>
    <div class="flex flex-col align-center justify-center">
      @error('dateDepart') <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
      @error('dateRetour') <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
      @error('lieuDepart') <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
      @error('lieuRetour') <p class="text-red-600 text-sm p-2">{{ $message }}</p> @enderror
    </div>
    <div class="flex flex-row align-middle justify-between pt-4 text-sm">

      <select name="minAge" class="px-2 md:h-12 pr-8 max-md:h-10 text-sm font-semibold text-sky-700 bg-white cursor-pointer border-none">
        <option value="16">Entre 16 et 18</option>
        <option value="18">Entre 18 et 23</option>
        <option value="23">Entre 23 et 26</option>
        <option value="26" selected>26+</option>
      </select>

      <input type="submit" value="Rechercher" class="px-5 py-3 bg-teal-500 hover:bg-teal-600 text-white cursor-pointer font-semibold rounded-lg shadow-md uppercase transition-all">
    </div>
  </form> 
</div>

@once
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
  flatpickr('#dateTime1' , {
    enableTime: true,
    dateFormat: "d-m-Y H:i",
    minTime: "06:00",
    maxTime: "01:00",
    defaultDate:new Date().fp_incr(1),
    defaultHour:12,
    defaultMinute:30,
  });

  flatpickr('#dateTime2' , {
    enableTime: true,
    dateFormat: "d-m-Y H:i",
    minTime: "06:00",
    maxTime: "01:00",
    defaultDate:new Date().fp_incr(2),
    defaultHour:12,
    defaultMinute:30,
  });
</script>
@endonce