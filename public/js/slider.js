import { SLIDER_TIME } from "../../config";

const slides = document.querySelectorAll(".slider__slide");
const sliderNav = document.querySelector(".slider__nav");

sliderNav.addEventListener("click", function(e){
    if(!e.target.classList.contains("slider__nav-item")) return;
    const slideNumber = e.target.getAttribute("nav-number");
    goToSlide(slideNumber);
    setActiveNav(e.target);
})
const goToSlide = function(slideNumber){
    slides.forEach((slide, i) =>{
        slide.style.transform = `translate(${(i - slideNumber)*100}%)` 
    })
}
const setActiveNav = function(nav){
    const navItems = document.querySelectorAll(".slider__nav-item");
    navItems.forEach(navItem => navItem.classList.remove("slider__nav-active"))
    nav.classList.add("slider__nav-active");
}
const nextSlide = function(){
    const totalSlide = slides.length - 1;

    const currentNavActive = document
    .querySelector(".slider__nav-active")
    let navNumber = +currentNavActive
    .getAttribute("nav-number");

    const currentSlide = document
    .querySelector(`[slide-number="${navNumber}"`);
    let currSlideNumber = +currentSlide
    .getAttribute("slide-number");

    if(currSlideNumber === totalSlide && navNumber === totalSlide){
       currSlideNumber = -1;
       navNumber = -1; 
    }

    const nextSlide = document
    .querySelector(`[slide-number="${currSlideNumber+1}"]`);
    const nextSlideNumber = +nextSlide
    .getAttribute("slide-number");

    const nextNavActive = document
    .querySelector(`[nav-number="${navNumber+1}"]`);

    goToSlide(nextSlideNumber);
    setActiveNav(nextNavActive)

}

document.addEventListener("DOMContentLoaded", function(){

    slides.forEach((slide, i) =>{
        slide.style.transform = `translate(${100*i}%)`
    })
    setInterval(nextSlide, SLIDER_TIME);

})






window.addEventListener("load", function(){
    console.log(1);
})
// window.addEventListener("load", function(){
//     console.log('woi');
//     document.body.style.opacity = 1;
// })