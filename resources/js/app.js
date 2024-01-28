import './bootstrap';

//Alpine
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

//Sticky Navbar 
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar-total");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

//Suggestions de lieux
function fetchSuggestions() {
  fetch("{{ route('autocomplete') }}", {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
      },
      body: JSON.stringify({ query: this.inputValue }),
  })

  .then(response => response.json())
  .then(data => this.suggestions = data)
  .catch(error => console.error('Error fetching suggestions:', error));
}


