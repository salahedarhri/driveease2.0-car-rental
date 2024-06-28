import './bootstrap'
import 'remixicon/fonts/remixicon.css'

import Alpine from 'alpinejs'
// import intersect from '@alpinejs/intersect'
// import focus from '@alpinejs/focus'

window.Alpine = Alpine;
Alpine.start();
// Alpine.plugin(intersect)
// Alpine.plugin(focus)

const scrollers = document.querySelectorAll(".scroller");

if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
  addAnimation();
}

function addAnimation() {
  scrollers.forEach((scroller) => {
    scroller.setAttribute("data-animated", true);

    const scrollerInner = scroller.querySelector(".scroller__inner");
    const scrollerContent = Array.from(scrollerInner.children);

    scrollerContent.forEach((item) => {
      const duplicatedItem = item.cloneNode(true);
      duplicatedItem.setAttribute("aria-hidden", true);
      scrollerInner.appendChild(duplicatedItem);
    });
  });
}


