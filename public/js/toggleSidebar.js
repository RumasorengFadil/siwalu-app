 //Mendapatkan sidebar
const sidebar = document.querySelector(".sidebar");
 //Mendapatkan content
 const content = document.querySelector(".content");
 //Mendapatkan toggle button
 const toggleBtn = document.querySelector(".sidebar__toggle-btn");
 //Mendapatkan icon chevron left
 const chevLeftIcon = document.querySelector(".sidebar__chev-left-icon");


  //Fungsi untuk melakukan toggle membuka dan menutup pada sidebar

function toggleSidebar(){
    // Mendapatkan nilai properti left pada sidebar
    const sidebarLeftValue = window
    .getComputedStyle(sidebar)
    .getPropertyValue("left");
    // Mendapatkan nilai properti margin left pada content
    const contentMarginLeftValue = window
    .getComputedStyle(content)
    .getPropertyValue("margin-left");
    // Mendapatkan nilai properti rotate pada icon chevron left
    const chevLeftRotateValue = window
    .getComputedStyle(chevLeftIcon)
    .getPropertyValue("rotate");
    sidebar.style.left = `${sidebarLeftValue === "0px"?"-200px":"0"}`;
    content.style.marginLeft = `${contentMarginLeftValue === "200px"?"0":"200px"}`;
    chevLeftIcon.style.rotate = `${chevLeftRotateValue === "none"?"180deg":"none"}`;
}

//Menambahkan event listener untuk melakukan proses membuka dan menutup sidebar
toggleBtn.addEventListener("click", toggleSidebar);
