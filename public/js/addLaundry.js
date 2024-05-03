 // Mendapatkan elemen input file
 const inputGambar = document.querySelector('.form__input-file');
 // Mendapatkan elemen gambar placeholder
 const placeholder = document.querySelector('.form__image-placeholder');
 //Mendapatkan elemen input service
 const inputService = document.querySelector('.form__input-service');
 //Mendapatkan sidebar
 const sidebar = document.querySelector(".sidebar");
 //Mendapatkan content
 const form = document.querySelector(".form");
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
     // Mendapatkan nilai properti margin left pada form
     const formMarginLeftValue = window
     .getComputedStyle(form)
     .getPropertyValue("margin-left");
     // Mendapatkan nilai properti rotate pada icon chevron left
     const chevLeftRotateValue = window
     .getComputedStyle(chevLeftIcon)
     .getPropertyValue("rotate");
    console.log(chevLeftRotateValue);
     sidebar.style.left = `${sidebarLeftValue === "0px"?"-200px":"0"}`;
     form.style.marginLeft = `${formMarginLeftValue === "200px"?"0":"200px"}`;
     chevLeftIcon.style.rotate = `${chevLeftRotateValue === "none"?"180deg":"none"}`;
 }

 // Menambahkan event listener untuk perubahan pada input file
 inputGambar.addEventListener('change', function(event) {
     // Mengecek apakah ada file yang dipilih
     if (event.target.files.length > 0) {
         // Mengganti sumber gambar placeholder dengan gambar yang dipilih
         const file = event.target.files[0];
         const reader = new FileReader();
         reader.onload = function(e) {
             placeholder.src = e.target.result;
         };
         reader.readAsDataURL(file);
     }
 });

 //Menambahkan event listener untuk melakukan proses membuka dan menutup sidebar
toggleBtn.addEventListener("click", toggleSidebar);
