'use strict'

/* .. tooltip .. */
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

/* .. popover .. */
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

/* Start::back-to-top */
function backToTop() {
    var back_to_top = document.querySelector('.back-to-top');
    var windowTop = window.pageYOffset || document.documentElement.scrollTop;
    windowTop > 500 ? back_to_top.style.display = "inline-flex" : back_to_top.style.display = "none"
}
window.addEventListener('scroll', backToTop)
/* End::back-to-top */

// reveal items on scroll
function reveal(){
var reveals = document.querySelectorAll('.reveal');

    if(reveals) {
        for(var i = 0; i < reveals.length; i++){

            var windowHeight = window.innerHeight;
            var cardTop = reveals[i].getBoundingClientRect().top;
            var cardRevealPoint = 130;
            
            if(cardTop < windowHeight - cardRevealPoint){
                reveals[i].classList.add('reveal-active');
            }
            else{
                reveals[i].classList.remove('reveal-active');
            }
        }
    }
}
window.addEventListener('scroll', reveal);
reveal(); //Run


