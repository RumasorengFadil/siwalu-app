<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['public/css/main.scss', 'public/js/addLaundry.js'])

</head>
<body>
    <main class="main">
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
    </main>
    ACC LAUNDRY PAGE
</body>
</html>