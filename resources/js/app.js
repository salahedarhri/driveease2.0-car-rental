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

