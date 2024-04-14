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
        </nav>
    </header>

    <main class="main">
        <a  href="{{url('/')}}"><img class="main__back-icon" src="/icn/chevron-left.svg" alt=""></a>

        <div class="box">
            <h1 class="box__title">Lulu 'n Be Luxury Laundry</h1>
            <img src="/img/laundry-img.png" alt="">
            <h5 class="box__deskripsi">Deskripsi</h5>
            p.box__
        </div>
    </main>
</body>
</html>