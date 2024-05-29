<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['public/css/main.scss','public/js/addLaundry.js'])
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
    <main>
        <div class="menu">  
            <div class="menu__container">
               <h1 class="profile__title">PROFILE</h1>
               <img src="/uploads/{{ $user->photo }}" alt="" class="profile__img menu__img">
               <p class="profile__name">{{ $user->name }}</p>
               <p class="profile__email">{{ $user->email }}</p>
            </div>
            <div class="menu__container menu__background">
                <form action="{{ route('profileUpdate.show') }}" >
                    <button class="menu__list-items">
                        <img src="/icn/global.svg" alt="" class="menu__icn-menu">
                        <h3 class="profile__title-menu">Ubah Profile</h3>
                        <img src="/icn/Icon.svg" alt="" class="menu__icn-next">
                    </button>
                </form>
                <form method="POST" action="/logout" >
                    @csrf
                    <button class="menu__list-items">
                        <img src="/icn/logout.svg" alt="" class="menu__icn-menu">
                        <h3 class="profile__title-menu">Logout</h3>
                        <img src="/icn/Icon.svg" alt="" class="menu__icn-next">
                    </button>
                </form>
                
                
            </div>
        </div>
    </main>
</body>
</html>