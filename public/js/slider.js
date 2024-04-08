document.addEventListener("DOMContentLoaded", function(){
    const slides = document.querySelectorAll(".slider__slide");
    const totalSlide = slides.length - 1;
    slides.forEach((slide, i) =>{
        slide.style.transform = `translate(${100*i}%)`
    })
    setInterval(() => {
        const currentNavActive = document
        .querySelector(".slider__nav-active")
        let navNumber = +currentNavActive
        .getAttribute("nav-number");

        const currentSlide = document
        .querySelector(`[slide-number="${navNumber}"`);
        let slideNumber = +currentSlide
        .getAttribute("slide-number");

        if(slideNumber === totalSlide && navNumber === totalSlide){
           slideNumber = -1;
           navNumber = -1; 
        }

        const nextSlide = document
        .querySelector(`[slide-number="${slideNumber+1}"]`);
        const nextNavActive = document
        .querySelector(`[nav-number="${navNumber+1}"]`)

      
        slides.forEach((slide, i) =>{
            slide.style.transform = `translate(${(i - (slideNumber+1))*100}%)` 
        })
        currentNavActive.classList.remove("slider__nav-active");
        nextNavActive.classList.add("slider__nav-active");
6
    }, 5000);

})
