<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['public/css/main.scss', 'public/js/addLaundry.js'])
</head>
<body>
    <main class="main main-addlaundry">
        <nav class="sidebar">
            <div class="nav__logo-cn">
                <a href="{{url("/")}}">
                    <img class="nav__logo" src="/img/logo-white.svg" alt="">
                </a>
                <h1 class="nav__brand-name">Siwalu</h1>
            </div>

            <ul class="sidebar__links">
                <a href="{{route("accLaundry.show")}}" class="sidebar__link">
                    <img src="/icn/acc.svg" alt="" class="sidebar__icon">
                    <p class="sidebar__link-text">Accept Laundry</p>
                </a>
                <a class="sidebar__link sidebar__link-active">
                    <img src="/icn/add.svg" alt="" class="sidebar__icon">
                    <p class="sidebar__link-text">Tambah Laundry</p>
                </a>
                <a class="sidebar__link">
                    <img src="/icn/delete.svg" alt="" class="sidebar__icon">
                    <p class="sidebar__link-text">Perbarui Laundry</p>
                </a>
                <a class="sidebar__link">
                    <img src="/icn/update.svg" alt="" class="sidebar__icon">
                    <p class="sidebar__link-text">Delete Laundry</p>
                </a>  
                <form  method="POST" action="/logout">
                    @csrf
                    <button class="sidebar__link">
                        <img src="/icn/logout-white.svg" alt="" class="sidebar__icon">
                        <p class="sidebar__link-text">Logout</p>
                    </button>
                </form> 
            </ul>
            <div class="sidebar__toggle-btn">
                <img src="/icn/chevron-left-white.svg" alt="" class="sidebar__chev-left-icon">
            </div>
        </nav>

        <form action="{{route('laundry.post')}}" class="form form-addlaundry" method="POST"  enctype="multipart/form-data">
           @csrf
            <div class="form__el">
                <label for="gambar">
                    <img class="form__image-placeholder" title="pilih file" src="/img/image-placeholder.png" alt="Placeholder">
                </label>
                <!-- Input file -->
                <input class="form__input-file" type="file" id="gambar" name="gambar" accept="image/*" style="display: none;">
                <label class="error" for="">{{$errors->first("gambar")}}</label>
            </div>
            <div class="form__el">
                <label class="form__label" for="name">Nama Laundry *</label><br>
                <!-- Input file -->
                <input class="form__input" type="text" name="name" id="inputName" value="{{old("name")}}" placeholder="Masukan nama laundry">
                <label class="error" for="">{{$errors->first("name")}}</label>

            </div>  
            <div class="form__el">
                <label class="form__label" for="location">Lokasi *</label><br>
                <!-- Input file -->
                <input class="form__input" type="text" name="location" id="inpuLocation" value="{{old("location")}}" placeholder="Masukan lokasi">
                <label class="error" for="">{{$errors->first("location")}}</label>
            </div>  
            <div class="form__el">
                <label class="form__label" for="description">Deskripsi *</label><br>
                <!-- Input file -->
                <textarea class="form__input form__input-textarea" name="description" id="inpuDescription" placeholder="Masukan Deskripsi">{{old("description")}}</textarea>
                <label class="error" for="">{{$errors->first("description")}}</label>
            </div>  
            <div class="form__el">
                <label class="form__label" for="service">Layanan *</label><br>
                <!-- Input file -->
                <input class="form__input form__input-service" type="text" name="service" value="{{old("service")}}" id="inpuService" placeholder="Masukan service">
                <label class="error" for="">{{$errors->first("service")}}</label>
            </div>  
            <div class="form__el">
                <label class="form__label" for="harga">Harga *</label><br>
                <!-- Input file -->
                <input class="form__input form__input-harga" type="number" name="harga" value="{{old("harga")}}" id="inpuHarga" placeholder="Masukan harga">
                <label class="error" for="">{{$errors->first("harga")}}</label>
            </div>  
            <div class="form__el">
                <label class="form__label" for="whatsappNumber">Nomor Whatsapp *</label><br>
                <!-- Input file -->
                <input class="form__input form__input-whatsappNumber" type="number" name="whatsappNumber" value="{{old("whatsappNumber")}}" id="inputWhatsappNumber" placeholder="Masukan nomor whatsapp">
                <label class="error" for="">{{$errors->first("whatsappNumber")}}</label>

            </div>  
            <div class="form__el">
                <label class="form__label" for="typeoflaundry">Jenis Cucian *</label><br>
                <!-- Input file -->

                <input class="form__input-checkbox" type="checkbox" name="pakaian" id="" value="Pakaian">
                <label class="form__label-jenis-cucian">Pakaian</label>
                <input class="form__input-checkbox" type="checkbox" name="sepatu" id="" value="Sepatu">
                <label class="form__label-jenis-cucian">Sepatu</label>
            </div>  
            
            <div class="form__el">
                <!-- Input file -->
                <input class="form__submit-btn form__submit-btn-sm" type="submit" value="Tambah">
                
            </div>  
        
        </form> 
    </main>
</body>
</html>