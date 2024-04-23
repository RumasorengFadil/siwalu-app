const createSkeletonImage = function({height=100} = {height : 100}){
    const skeletonImage = document.createElement("div");
    skeletonImage.classList.add("skeleton-image");
    skeletonImage.style.height = `${height}%`;

    return skeletonImage;
}
const createSkeletonText = function({width=70} = {width : 70}){
    console.log(width)
    const skeletonText = document.createElement("div");
    skeletonText.classList.add("skeleton-text");
    skeletonText.style.width = `${width}%`;

    return skeletonText;
}

document.addEventListener("DOMContentLoaded", function(){
    const lazyImages = document.querySelectorAll(".lazy-image")

    lazyImages.forEach(img => {
        const skeletonImage = JSON.parse(img.getAttribute("skeleton-image"));
        const skeletonText = JSON.parse(img.getAttribute("skeleton-text"));

        const container = document.createElement("div");
        container.classList.add("container");
        
        const skeletonLoader = document.createElement("div");
        skeletonLoader.classList.add("skeleton-loader");
        container.appendChild(skeletonLoader);
        
        if(skeletonImage){
            skeletonImage
            .forEach(
                s =>skeletonLoader
                .appendChild(createSkeletonImage(s))
            )
        }
        if(skeletonText){
            skeletonText
            .forEach(
                s => skeletonLoader
                .appendChild(createSkeletonText(s))
            )
        }
   
        img.parentElement.appendChild(container);
        img.addEventListener("load", function(){
            container.style.display = "none"
        })
    })
})