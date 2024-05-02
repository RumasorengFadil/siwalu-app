{{-- {{dd(Auth::user()->isAdmin())}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['public/css/main.scss', 'public/js/slider.js', 'public/js/lazyImg.js'])
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

            <ul class="nav__links"> 
                <a href="#about-us" class="nav__link"><img src="icn/heart.svg" alt="" class="nav__icon"></a>
                <a href="#about-product" class="nav__link"><img src="icn/message-square.svg" alt="" class="nav__icon"></a>
                <a href="#collections" class="nav__link"><img src="icn/bell.svg" alt="" class="nav__icon"></a>
                <input class="nav__link nav__input-search" type="search" name="inputSearch" id="inputSearch" placeholder="Cari “Laundry Terdekat”">

                @guest
                    <a href="{{url("login")}}" class="nav__link nav__login-btn">Masuk</a>
                @endguest
                @auth
                    <div class="nav__user-icon-cn">
                        <img src="/icn/user.svg" alt="" class="nav__icon nav__user-icon">
                        <img src="/icn/chevron-down.svg" alt="" class="nav__icon nav__chev-down-icon">

                        <ul class="nav__dropdown">
                            <a class="nav__link nav__dr-link">
                                <img src="/icn/user-no-circle.svg" alt="" class="nav__icon">
                                <p class="nav__my-profile-text">Profile Saya</p>
                            </a>

                            @if (Auth::user()->isAdmin())
                            <a href="{{route("addLaundry")}}" class="nav__link nav__dr-link">
                                <img src="/icn/dashboard.svg" alt="" class="nav__icon">
                                <p class="nav__my-profile-text">Dashboard Admin</p>
                            </a>
                            @endif

                            <form method="POST" action="/logout">
                                @csrf
                                <button class="nav__link nav__dr-link nav__logout-btn">
                                    <img src="/icn/logout.svg" alt="" class="nav__icon">
                                    <p class="nav__logout-text">Keluar</p>
                                </button>
                            </form>
                        </ul>
                    </div>

                    
                    {{-- <a href="{{url("logout")}}" class="nav__link nav__logout-btn">Keluar</a> --}}
                @endauth
            </ul>
        </nav>
    </header>

    <main class="main">
        <div class="slider">
            <div slide-number = "0" class="slider__slide">
                <a class="slider__link">
                    <img 
                        class="slider__image slider__image0 lazy-image"
                        skeleton-image='[{"height":"100"}]'   
                        src="img/slide-0.png" alt="html">
                    </img>
                </a>
            </div>
            <div slide-number = "1" class="slider__slide">
                <a class="slider__link">
                    <img 
                        class="slider__image slider__image1 lazy-image" 
                        skeleton-image='[{"height":"100"}]'  
                        img_set=[fadil,sdss] 
                        src="img/slide-0.png" 
                        alt="html">
                    </img>
                </a>
            </div>
            <div slide-number = "2" class="slider__slide">
                <a class="slider__link">
                    <img 
                        class="slider__image slider__image1 lazy-image"
                        skeleton-image='[{"height":"100"}]'   
                        src="img/slide-0.png" 
                        alt="html">
                    </img>
                </a>
            </div>

            <div class="slider__nav">
                <div nav-number = 0 class="slider__nav-item slider__nav-active"></div>
                <div nav-number = 1 class="slider__nav-item"></div>
                <div nav-number = 2 class="slider__nav-item"></div>
            </div>
            
        </div>

        <div class="box">
            <h1 class="box__title">Laundry terpopuler!</h1>
            <div class="minibox">
            @foreach ($laundries as $laundry)
                <div class="card">
                    <a href="/detailLaundry/{{$laundry->id_laundry}}" class="card__link">
                        <img 
                            src="{{$laundry->foto}}" 
                            skeleton-image='[{"height":"100"}]' 
                            skeleton-text='[{"width":"70"}]' 
                            alt="" 
                            class="card__laundry-img lazy-image"
                        >
                        <div class="card__laundry-name-cn">
                            <p class="card__laundry-name">{{$laundry->nama}}</p>
                            <div class="card__laundry-rating">
                                <p class="card__laundry-rating">4.5/5</p>
                                <img class="card__icn-star" src="/icn/star.svg" alt="">
                            </div>
                        </div>
                        <div class="card__laundry-address-cn">
                            <img class="card__icn-address" src="icn/location.svg" alt="">
                            <p class="card__laundry-address">{{$laundry->alamat}}</p>
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
                        <p class="card__price">Rp. {{$laundry->harga}}/kg</p>

                        
                    </a>
                </div>
            @endforeach
            </div>
        </div>

        <div class="box">
            <h1 class="box__title">Cek laundry terdekatmu!</h1>
            <div class="minibox">
                @foreach ($laundries as $laundry)
                <div class="card">
                    <a href="/detailLaundry/{{$laundry->id_laundry}}" class="card__link">
                        <img 
                            src="{{$laundry->foto}}" 
                            skeleton-image='[{"height":"100"}]' 
                            skeleton-text='[{"width":"70"}]' 
                            alt="" 
                            class="card__laundry-img lazy-image"
                        >
                        
                        <div class="card__laundry-name-cn">
                            <p class="card__laundry-name">{{$laundry->nama}}</p>
                            <div class="card__laundry-rating">
                                <p class="card__laundry-rating">4.5/5</p>
                                <img class="card__icn-star" src="/icn/star.svg" alt="">
                            </div>
                        </div>
                        <div class="card__laundry-address-cn">
                            <img class="card__icn-address" src="icn/location.svg" alt="">
                            <p class="card__laundry-address">{{$laundry->alamat}}</p>
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
                        <p class="card__price">Rp. {{$laundry->harga}}/kg</p>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer__content">
            <div class="footer__about-brand">
                <div class="footer__logo">
                    <img class="nav__logo" src="/img/logo-white.svg" alt="">
                    <h1 class="nav__brand-name footer__brand-name">Siwalu</h1>
                </div>
                
                <p class="footer__about-brand-text">This apps is bla-bla yang panjanganya bisa sampe 2-3 baris sih jadi ntar isi sama highlight appsnya mau apa</p>
            </div>

            <div class="footer__quick-links">
                <h4 class="footer__title">Quick Links</h4>
                <ul class="footer__links">
                    <a href="{{url("/")}}" class="footer__link">Home</a>
                    <a href="" class="footer__link">About Company</a>
                    <a href="" class="footer__link">Partner</a>
                    <a href="" class="footer__link">Terms & Condition</a>
                </ul>
            </div>

            <div class="footer__contact-us">
                <h4 class="footer__title">Contact Us</h4>
                <p class="footer__address">Jl. Berdua bersamamu, Kec. Dalam,
                    Kota Mimpi, Yang Pernah Indah 40122</p>
                <p class="footer__phone-number">+62 8515-5880-6466</p>
                <p class="footer__email">contact@apps.com</p>
            </div>
        </div>

        <div class="footer__copyright">
            <p class="footer__copyright-text">Copyright Apps @ 2023. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>