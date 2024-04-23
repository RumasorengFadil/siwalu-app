document.addEventListener("DOMContentLoaded", function(){
    const lazyImages = document.querySelectorAll(".lazy-image")

    lazyImages.forEach(img => {
        const totalSkeletonText = img.getAttribute("skeleton-text");

        
        const container = document.createElement("div");
        container.classList.add("container");
       
        const skeletonLoader = document.createElement("deiv");
        skeletonLoader.classList.add("skeleton-loader");
        container.appendChild(skeletonLoader);
  
        const skeletonImage = document.createElement("div");
        skeletonImage.classList.add("skeleton-image");
        skeletonLoader.appendChild(skeletonImage);
        
        const skeletonText = document.createElement("div");
        skeletonText.classList.add("skeleton-text");
        skeletonLoader.appendChild(skeletonText);

        img.parentElement.appendChild(container);

        // console.log(img.parentElement)
        img.addEventListener("load", function(){
            container.style.display = "none"
        })
    })


})