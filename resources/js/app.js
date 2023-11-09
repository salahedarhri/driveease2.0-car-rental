import './bootstrap';

import Alpine from 'alpinejs';

//flatpicker for dateTime picker
  import flatpickr from "flatpickr"

  flatpickr("#datetime-picker", {
      enableTime: true, 
      dateFormat: "Y-m-d H:i",
  });



window.Alpine = Alpine;

Alpine.start();

