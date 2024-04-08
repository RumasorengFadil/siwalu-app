<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['public/css/main.scss', 'public/js/slider.js'])
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
                <input class="nav__link nav__input-search" type="search" name="input-search" id="inputSearch" placeholder="Cari “Laundry Terdekat”">
                <a href="{{url("login")}}" class="nav__link nav__login-btn">Masuk</a>
            </ul>
        </nav>
    </header>

    <main class="main">
        <div class="slider">
            <div slide-number = "0" class="slider__slide">
                <a href="" class="slider__link">
                    <img class="slider__image slider__image0" src="img/slide-0.png" alt="html"></img>
                </a>
            </div>
            <div slide-number = "1" class="slider__slide">
                <a href="" class="slider__link">
                    <img class="slider__image slider__image1" src="img/slide-0.png" alt="html"></img>
                </a>
            </div>
            <div slide-number = "2" class="slider__slide">
                <a href="" class="slider__link">
                    <img class="slider__image slider__image1" src="img/slide-0.png" alt="html"></img>
                </a>
            </div>

            <div class="slider__nav">
                <div nav-number = 0 class="slider__nav-item slider__nav-active"></div>
                <div nav-number = 1 class="slider__nav-item"></div>
                <div nav-number = 2 class="slider__nav-item"></div>
            </div>
            {{-- <div slide-number = "1" className="slider__slide">
                <a href="" className="slider__link">
                    <img className="slider__image" src="img/slide-0.png" alt="html"></img>
                </a>
            </div> --}}
            {{-- <div slide-number = "1" className="slider__slide">
                <a href="" className="slider__link">
                    <img className="slider__image" src="img/slide-0.png" alt="html"></img>
                </a>
            </div> --}}
        </div>
    </main>

</body>
</html>