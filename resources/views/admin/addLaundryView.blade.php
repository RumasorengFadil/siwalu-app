<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['public/css/main.scss'])
</head>
<body>
    <header class="header">
        <nav class="sidebar">
            <div class="nav__logo-cn">
                <a href="{{url("/")}}">
                    <img class="nav__logo" src="/img/logo-white.svg" alt="">
                </a>
                <h1 class="nav__brand-name">Siwalu</h1>
            </div>

            <ul class="sidebar__links">
                <a class="sidebar__link">
                    <img src="/icn/acc.svg" alt="" class="sidebar__icon">
                    <p class="sidebar__linkText">Accept Laundry</p>
                </a>
                <a class="sidebar__link sidebar__link-active">
                    <img src="/icn/add.svg" alt="" class="sidebar__icon">
                    <p class="sidebar__linkText">Tambah Laundry</p>
                </a>
                <a class="sidebar__link">
                    <img src="/icn/delete.svg" alt="" class="sidebar__icon">
                    <p class="sidebar__linkText">Perbarui Laundry</p>
                </a>
                <a class="sidebar__link">
                    <img src="/icn/update.svg" alt="" class="sidebar__icon">
                    <p class="sidebar__linkText">Delete Laundry</p>
                </a>  
            </ul>
        </nav>
    </header>
</body>
</html>