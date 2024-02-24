<div
  class="cabin font-semibold flex flex-col justify-center lg:max-w-5xl sm:max-w-xl max-sm:w-80 mx-auto md:p-4 max-md:p-3 bg-white rounded-md shadow-md">

  @livewire('TrouverVoituresDispo')

</div>

@once
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>

<script>
  flatpickr('#dateTime1' , {
      enableTime: true,
      dateFormat: "d-m-Y H:i",
      minTime: "06:00",
      maxTime: "01:00",
      defaultDate:new Date().fp_incr(1),
      defaultHour:12,
      defaultMinute:30,
      locale:"fr",
    });

    flatpickr('#dateTime2' , {
      enableTime: true,
      dateFormat: "d-m-Y H:i",
      minTime: "06:00",
      maxTime: "01:00",
      defaultDate:new Date().fp_incr(2),
      defaultHour:12,
      defaultMinute:30,
      locale:"fr",
    });
</script>
@endonce