var swiper = new Swiper(".mySwiper", {
  
    spaceBetween: 30,
    effect: "fade",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      
    },
});

// Initialization for ES Users
import { Collapse, Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Collapse, Ripple });


let searchbar = document.querySelector('#searchbar');
// scroll searchbar
let prevScrollpos = window.scrollY;
window.addEventListener("scroll", ()=> {
let currentScrollPos = window.scrollY;
  // if(currentScrollPos == 0){
  //   searchbar.style.top='60px';
  //   console.log('0');
    
  // }else
   if(prevScrollpos > currentScrollPos) {
    searchbar.classList.remove('searchbar-out', 'margin-init');
    searchbar.classList.add('searchbar-in',);
  }
  else {
    searchbar.classList.add('searchbar-out',);
    searchbar.classList.remove('searchbar-in',);
    
  }
  prevScrollpos = currentScrollPos;
})