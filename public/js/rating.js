document
.querySelector(".rating-body__rating")
.addEventListener("click", function(e){
    if(!e.target.classList.contains("full")) return;
    
    document
    .querySelector(".rating-body__satisfied_indicator")
    .textContent = e.target.title;
})