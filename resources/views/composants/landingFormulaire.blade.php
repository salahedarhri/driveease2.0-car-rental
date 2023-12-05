<div class="cabin flex flex-col justify-center lg:max-w-3xl sm:max-w-xl max-sm:w-80 mx-auto md:p-4 max-md:p-3 bg-white rounded-md shadow-md max-md:mb-5">
  <form action="#" method="post">
    <div class="grid lg:grid-cols-4 sm:grid-cols-2 max-sm:grid-cols-1 justify-center max-lg:gap-2">
        <label for="lieuDepart">
          <input type="text" placeholder="Lieu de départ" class="p-3 w-full cursor-pointer border border-sky-700 max-lg:rounded-lg text-sm lg:rounded-l-xl"></label>
        <label for="lieuRetour">
          <input type="text" placeholder="Lieu de retour" class="p-3 w-full cursor-pointer border border-sky-700 max-lg:rounded-lg lg:border-l-0 text-sm"></label>
        <label for="dateDepart">
          <input type="text" placeholder="Date de départ" class="p-3 w-full cursor-pointer border border-sky-700 max-lg:rounded-lg lg:border-l-0 text-sm"></label>
        <label for="dateRetour">
          <input type="text" placeholder="Date de retour" class="p-3 w-full cursor-pointer border border-sky-700 max-lg:rounded-lg lg:border-l-0 text-sm lg:rounded-r-xl"></label>
    </div>
    <div class="flex flex-row align-middle justify-between pt-4 text-sm">

      <select name="minAge" class="px-6 md:h-12 max-md:h-10 w-18 text-sm font-semibold text-sky-700 bg-white cursor-pointer border-none">
        <option value="16">Entre 16 et 18</option>
        <option value="18" selected>Entre 18 et 23</option>
        <option value="23">Entre 23 et 26</option>
        <option value="26">26+</option>
      </select>

      <input type="submit" value="Rechercher" class="px-5 py-3 bg-teal-500 hover:bg-teal-600 text-white cursor-pointer font-semibold rounded-lg shadow-md uppercase transition-all">
    </div>
  </form> 
</div>
