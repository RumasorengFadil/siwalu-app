<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['public/css/main.scss', 'public/js/favorite.js'])
</head>

<body>
    <header>
        <nav class="nav">
            <div class="nav__logo-cn">
                <a href="{{ url('/') }}">
                    <img class="nav__logo" src="/img/logo.svg" alt="">
                </a>
                <h1 class="nav__brand-name">Siwalu</h1>
            </div>
        </nav>
    </header>

    <main class="main">
        <div class="box">
            <h1 class="box__title">Favorite List</h1>
            <div class="minibox">
                {{-- menampilkan data filter dari id local storage --}}
                @if (!$isEmpty)
                    <p class="message__empty">
                        Tidak ada favorite yang tersimpan
                    </p>
                @endif
                @foreach ($favorites as $favorite)
                    @if ($favorite->confirmed)
                        <div class="card">
                            {{-- {{ dd($favorite->laundry->id_laundry) }}; --}}
                            {{-- {{ var_dump($favorite->laundry) }} --}}
                            <a href="/detailLaundry/{{ $favorite->laundry->id_laundry }}" class="card__link">
                                <img src="/uploads/{{ $favorite->laundry->foto }}" skeleton-image='[{"height":"500"}]'
                                    skeleton-text='[{"width":"120"}]' alt="" class="card__laundry-img">
                                <div class="card__laundry-name-cn">
                                    <p class="card__laundry-name">{{ $favorite->laundry->nama }}</p>
                                    <div class="card__laundry-rating">
                                        <p class="card__laundry-rating">4.5/5</p>
                                        <img class="card__icn-star" src="/icn/star.svg" alt="">
                                    </div>
                                </div>
                                <div class="card__laundry-address-cn">
                                    <img class="card__icn-address" src="icn/location.svg" alt="">
                                    <p class="card__laundry-address">{{ $favorite->laundry->alamat }}</p>
                                </div>

                                <div class="card__laundry-type-cn">
                                    <div class="card__laundry-type card__laundry-type-cloth">
                                        <img src="icn/cloth.svg" alt="" class="card__type-icon">
                                        <span class="card__laundry-type-text">Pakaian</span>
                                    </div>
                                    <div class="card__laundry-type card__laundry-type-shoe">
                                        <img src="icn/cloth.svg" alt="" class="card__type-icon">
                                        <span class="card__laundry-type-text">Sepatu</span>
                                    </div>
                                </div>
                                <p class="card__start-from">Start From</p>
                                <p class="card__price">Rp. {{ $favorite->laundry->harga }}/kg</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </main>
</body>

</html>
