import './bootstrap'
import 'remixicon/fonts/remixicon.css'
import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'

window.Alpine = Alpine;
Alpine.start();
Alpine.plugin(intersect)

// import { gsap } from "gsap";
// import { ScrollTrigger } from "gsap/ScrollTrigger";
// import { Observer } from "gsap/Observer";
// import { ScrollToPlugin } from "gsap/ScrollToPlugin";

// gsap.registerPlugin(ScrollTrigger);
// gsap.registerPlugin(Observer);
// gsap.registerPlugin(ScrollToPlugin);
