 // Mendapatkan elemen input file
 const inputGambar = document.querySelector('.form__input-file');
 // Mendapatkan elemen gambar placeholder
 const placeholder = document.querySelector('.form__image-placeholder');
 //Mendapatkan elemen input service
 const inputService = document.querySelector('.form__input-service');

 
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

 