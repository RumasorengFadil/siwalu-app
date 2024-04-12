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
                <a class="slider__link">
                    <img class="slider__image slider__image0" src="img/slide-0.png" alt="html"></img>
                </a>
            </div>
            <div slide-number = "1" class="slider__slide">
                <a class="slider__link">
                    <img class="slider__image slider__image1" src="img/slide-0.png" alt="html"></img>
                </a>
            </div>
            <div slide-number = "2" class="slider__slide">
                <a class="slider__link">
                    <img class="slider__image slider__image1" src="img/slide-0.png" alt="html"></img>
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
                <div class="card">
                    <img src="img/laundry-img.png" alt="" class="card__laundry-img">
                    <div class="card__laundry-name-cn">
                        <p class="card__laundry-name">Lulu 'n Be Luxury Laundry</p>
                        <img class="card__icn-star" src="icn/star.svg" alt="">
                    </div>

                    <div class="card__laundry-address-cn">
                        <img class="card__icn-address" src="icn/location.svg" alt="">
                        <p class="card__laundry-address">Purwokerto</p>
                    </div>

                    <div class="card__laundry-type-cn">
                        <a class="card__laundry-type card__laundry-type-cloth" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                        <a class="card__laundry-type card__laundry-type-shoe" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                    </div>
                    <p class="card__start-from">Start From</p>
                    <p class="card__price">Rp. 4000/kg</p>
                </div>
                <div class="card">
                    <img src="img/aquos-laundry-img.png" alt="" class="card__laundry-img">
                    <div class="card__laundry-name-cn">
                        <p class="card__laundry-name">Lulu 'n Be Luxury Laundry</p>
                        <img class="card__icn-star" src="icn/star.svg" alt="">
                    </div>

                    <div class="card__laundry-address-cn">
                        <img class="card__icn-address" src="icn/location.svg" alt="">
                        <p class="card__laundry-address">Purwokerto</p>
                    </div>

                    <div class="card__laundry-type-cn">
                        <a class="card__laundry-type card__laundry-type-cloth" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                        <a class="card__laundry-type card__laundry-type-shoe" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                    </div>
                    <p class="card__start-from">Start From</p>
                    <p class="card__price">Rp. 4000/kg</p>
                </div>
                <div class="card">
                    <img src="img/laundry-max-img.png" alt="" class="card__laundry-img">
                    <div class="card__laundry-name-cn">
                        <p class="card__laundry-name">Lulu 'n Be Luxury Laundry</p>
                        <img class="card__icn-star" src="icn/star.svg" alt="">
                    </div>

                    <div class="card__laundry-address-cn">
                        <img class="card__icn-address" src="icn/location.svg" alt="">
                        <p class="card__laundry-address">Purwokerto</p>
                    </div>

                    <div class="card__laundry-type-cn">
                        <a class="card__laundry-type card__laundry-type-cloth" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                        <a class="card__laundry-type card__laundry-type-shoe" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                    </div>
                    <p class="card__start-from">Start From</p>
                    <p class="card__price">Rp. 4000/kg</p>
                </div>
                <div class="card">
                    <img src="img/megaclin-laundry-img.png" alt="" class="card__laundry-img">
                    <div class="card__laundry-name-cn">
                        <p class="card__laundry-name">Lulu 'n Be Luxury Laundry</p>
                        <img class="card__icn-star" src="icn/star.svg" alt="">
                    </div>

                    <div class="card__laundry-address-cn">
                        <img class="card__icn-address" src="icn/location.svg" alt="">
                        <p class="card__laundry-address">Purwokerto</p>
                    </div>

                    <div class="card__laundry-type-cn">
                        <a class="card__laundry-type card__laundry-type-cloth" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                        <a class="card__laundry-type card__laundry-type-shoe" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                    </div>
                    <p class="card__start-from">Start From</p>
                    <p class="card__price">Rp. 4000/kg</p>
                </div>
            </div>
        </div>

        <div class="box">
            <h1 class="box__title">Cek laundry terdekatmu!</h1>
            <div class="minibox">
                <div class="card">
                    <img src="img/mm-laundry-img.png" alt="" class="card__laundry-img">
                    <div class="card__laundry-name-cn">
                        <p class="card__laundry-name">Lulu 'n Be Luxury Laundry</p>
                        <img class="card__icn-star" src="icn/star.svg" alt="">
                    </div>

                    <div class="card__laundry-address-cn">
                        <img class="card__icn-address" src="icn/location.svg" alt="">
                        <p class="card__laundry-address">Purwokerto</p>
                    </div>

                    <div class="card__laundry-type-cn">
                        <a class="card__laundry-type card__laundry-type-cloth" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                        <a class="card__laundry-type card__laundry-type-shoe" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                    </div>
                    <p class="card__start-from">Start From</p>
                    <p class="card__price">Rp. 4000/kg</p>
                </div>
                <div class="card">
                    <img src="img/oke-laundry-image.png" alt="" class="card__laundry-img">
                    <div class="card__laundry-name-cn">
                        <p class="card__laundry-name">Lulu 'n Be Luxury Laundry</p>
                        <img class="card__icn-star" src="icn/star.svg" alt="">
                    </div>

                    <div class="card__laundry-address-cn">
                        <img class="card__icn-address" src="icn/location.svg" alt="">
                        <p class="card__laundry-address">Purwokerto</p>
                    </div>

                    <div class="card__laundry-type-cn">
                        <a class="card__laundry-type card__laundry-type-cloth" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                        <a class="card__laundry-type card__laundry-type-shoe" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                    </div>
                    <p class="card__start-from">Start From</p>
                    <p class="card__price">Rp. 4000/kg</p>
                </div>
                <div class="card">
                    <img src="img/simple-laundy-img.png" alt="" class="card__laundry-img">
                    <div class="card__laundry-name-cn">
                        <p class="card__laundry-name">Lulu 'n Be Luxury Laundry</p>
                        <img class="card__icn-star" src="icn/star.svg" alt="">
                    </div>

                    <div class="card__laundry-address-cn">
                        <img class="card__icn-address" src="icn/location.svg" alt="">
                        <p class="card__laundry-address">Purwokerto</p>
                    </div>

                    <div class="card__laundry-type-cn">
                        <a class="card__laundry-type card__laundry-type-cloth" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                        <a class="card__laundry-type card__laundry-type-shoe" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                    </div>
                    <p class="card__start-from">Start From</p>
                    <p class="card__price">Rp. 4000/kg</p>
                </div>
                <div class="card">
                    <img src="img/vins-laundry-img.png" alt="" class="card__laundry-img">
                    <div class="card__laundry-name-cn">
                        <p class="card__laundry-name">Lulu 'n Be Luxury Laundry</p>
                        <img class="card__icn-star" src="icn/star.svg" alt="">
                    </div>

                    <div class="card__laundry-address-cn">
                        <img class="card__icn-address" src="icn/location.svg" alt="">
                        <p class="card__laundry-address">Purwokerto</p>
                    </div>

                    <div class="card__laundry-type-cn">
                        <a class="card__laundry-type card__laundry-type-cloth" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                        <a class="card__laundry-type card__laundry-type-shoe" href="#">
                            <img src="icn/cloth.svg" alt="" class="card__type-icon">
                            <span class="card__laundry-type-text">Pakaian</span>
                        </a>
                    </div>
                    <p class="card__start-from">Start From</p>
                    <p class="card__price">Rp. 4000/kg</p>
                </div>
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