<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(["public/css/main.scss"])

</head>
<body>
    <header>
        <nav class="nav">
            <a href="{{url("/")}}">
                <img class="nav__logo" src="/img/logo.svg" alt="">
            </a>
            <h1 class="nav__brand-name">Siwalu</h1>
        </nav>
    </header>

    <main class="main register-main">
        <a  href="{{url('/')}}"><img class="main__back-icon" src="icn/chevron-left.svg" alt=""></a>
        <form class="box box-textcenter" action="/login" method="post">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="form__el">
                <input class="form__input-email" type="email" name="input-email" id="" value="{{ old('input-email') }}" placeholder="Email" autofocus><br>
                <label class="error">{{$errors->first("input-email")}}</label>
            </div>
            <div class="form__el">
                <input class="form__input-pass" type="password" name="input-password" id=""  placeholder="Password"><br>
                <label class="error">{{$errors->first("input-password")}} {{$errors->first("error")}}</label>
            </div>

            <input class="form__submit-btn" type="submit" value="Login">

            <p class="form__link">Belum punya akun? <a href="{{url('register')}}">daftar yuk!</a></p>
        </form>
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