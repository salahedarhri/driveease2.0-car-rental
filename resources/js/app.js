import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


//"more details" function
// const showDetailsButtons = document.querySelectorAll('.show-details-btn');

//   showDetailsButtons.forEach((button) => {
//     button.addEventListener('click', () => {
      
//       const additionalInfo = button.nextElementSibling;
//       additionalInfo.classList.toggle('hidden');

//       if (additionalInfo.classList.contains('hidden')) {
//         button.innerHTML = '&#11206  More Details';
//       } else {
//         button.innerHTML = '&#11205  Less Details';
//       }
//     });
//   });
