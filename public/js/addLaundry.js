 // Mendapatkan elemen input file
 const inputGambar = document.querySelector('.form__input-file');
 // Mendapatkan elemen gambar placeholder
 const placeholder = document.querySelector('.form__image-placeholder');
 //Mendapatkan elemen input service
 const inputService = document.querySelector('.form__input-service');

 
 // Menambahkan event listener untuk perubahan pada input file
 document.addEventListener('change', function(event) {
    // console.log(event.target);
    // console.log(event.target.closest(".form__el"));
    // console.log(2);
    const placeholder = event.target.closest(".form__el").querySelector(".form__image-placeholder");
    if(!event.target.classList.contains("form__input-file")) return;
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

 