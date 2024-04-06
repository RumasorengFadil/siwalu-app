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
            <img class="nav__logo" src="/img/logo.svg" alt="">
            <h1 class="nav__title">Siwalu</h1>
        </nav>
    </header>

    <main class="register-main">
        <a  href="{{url('/')}}"><img class="register-main__back-icon" src="icn/chevron-left.svg" alt=""></a>
        <form class="form-register" action="" method="post">
            <input class="form-register__input-email" type="email" name="" id="" placeholder="Email"><br>
            <input class="form-register__input-pass" type="password" name="" id="" placeholder="Password"><br>
            <input class="form-register__regist-btn" type="submit" value="Daftar">

            <p class="form-register__privacy-policy">Dengan membuat akun kamu telah menyetujui <a href="">Syarat & Ketentuan</a> dan <a href="">Kebijakan Privasi</a></p>
            <p class="form-register__login-btn">Udah punya akun? <a href="{{url('login')}}">masuk disini!</a></p>
        </form>
    </main>

    <footer>
        
    </footer>
</body>
</html>