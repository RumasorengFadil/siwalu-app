<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['public/css/main.scss','public/js/favorite.js'])
</head>
<body>
    <header>
        <nav class="nav">
            <div class="nav__logo-cn">
                <a href="{{url("/")}}">
                    <img class="nav__logo" src="/img/logo.svg" alt="">
                </a>
                <h1 class="nav__brand-name">Siwalu</h1>
            </div>
        </nav>
    </header>

    <main class="main">
        <div class="box">
            <h1 class="box__title">Favorite List</h1>
            <div class="minibox-favorite">
                {{-- menampilkan data filter dari id local storage --}}
                @foreach ($favorites as $favorite)
                <div class="card-favorite">
                    {{-- {{ var_dump($favorite->laundry) }} --}}
                    <a href="/detailLaundry/{{$favorite->laundry->id_laundry}}" class="card-favorite__link">
                        <img 
                            src="/uploads/{{$favorite->laundry->foto}}" 
                            skeleton-image='[{"height":"500"}]' 
                            skeleton-text='[{"width":"120"}]' 
                            alt="" 
                            class="card-favorite__laundry-img"
                        >
                        <div class="card-favorite__laundry-name-cn">
                            <p class="card-favorite__laundry-name">{{$favorite->laundry->nama}}</p>
                            <div class="card-favorite__laundry-rating">
                                <p class="card-favorite__laundry-rating">4.5/5</p>
                                <img class="card-favorite__icn-star" src="/icn/star.svg" alt="">
                            </div>
                        </div>
                        <div class="card-favorite__laundry-address-cn">
                            <img class="card-favorite__icn-address" src="icn/location.svg" alt="">
                            <p class="card-favorite__laundry-address">{{$favorite->laundry->alamat}}</p>
                        </div>
    
                        <div class="card-favorite__laundry-type-cn">
                            <div class="card-favorite__laundry-type card-favorite__laundry-type-cloth">
                                <img src="icn/cloth.svg" alt="" class="card-favorite__type-icon">
                                <span class="card-favorite__laundry-type-text">Pakaian</span>
                            </div>
                            <div class="card-favorite__laundry-type card-favorite__laundry-type-shoe">
                                <img src="icn/cloth.svg" alt="" class="card-favorite__type-icon">
                                <span class="card-favorite__laundry-type-text">Sepatu</span>
                            </div>
                        </div>
                        <p class="card-favorite__start-from">Start From</p>
                        <p class="card-favorite__price">Rp. {{$favorite->laundry->harga}}/kg</p>

                        
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </main>
</body>
</html>