<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['public/css/main.scss'])
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

</body>
</html>