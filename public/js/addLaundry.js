 // Mendapatkan elemen input file
 var inputGambar = document.querySelector('.form__input-file');
 // Mendapatkan elemen gambar placeholder
 var placeholder = document.querySelector('.form__image-placeholder');

 // Menambahkan event listener untuk perubahan pada input file
 inputGambar.addEventListener('change', function(event) {
     // Mengecek apakah ada file yang dipilih
     if (event.target.files.length > 0) {
         // Mengganti sumber gambar placeholder dengan gambar yang dipilih
         var file = event.target.files[0];
         var reader = new FileReader();
         reader.onload = function(e) {
             placeholder.src = e.target.result;
         };
         reader.readAsDataURL(file);
     }
 });