<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['public/css/main.scss','public/js/rating.js'])
</head>
<body>
    <header>
        <nav class="nav">
            <div class="nav__logo-cn">
                <a href="{{url("/")}}">
                    <img title="siwalu-logo" class="nav__logo" src="/img/logo.svg" alt="">
                </a>
                <h1 class="nav__brand-name">Siwalu</h1>
            </div>
        </nav>
    </header>

    <main class="main">
        <a  href="{{url('/')}}"><img class="main__back-icon" src="/icn/chevron-left.svg" alt=""></a>
        <div class="rating-header">
            <img src="/img/laundry-img.png" alt="" class="rating-header__img">
            <p class="rating-header__name">{{$laundry["nama"]}}</p>
            <p class="rating-header__date">{{date("d F Y")}}</p>
        </div>

        <div class="rating-body">
            <form class="rating-body__form" action="/detailLaundry/{{$laundry->id_laundry}}" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="rating-body__rating">
                    <input type="radio" id="star5" name="score" value="5" /><label class = "full" for="star5" title="Excellent!"></label>
                    <input type="radio" id="star4" name="score" value="4" /><label class = "full" for="star4" title="Pretty good!"></label>
                    <input type="radio" id="star3" name="score" value="3" /><label class = "full" for="star3" title="Average!"></label>
                    <input type="radio" id="star2" name="score" value="2" /><label class = "full" for="star2" title="Not good!"></label>
                    <input type="radio" id="star1" name="score" checked value="1" /><label class = "full" for="star1" title="Terrible!"></label>
                </div>
                <label class="rating-body__satisfied_indicator" for="">Terrible!</label>
                <p class="rating-body__message">Bantu pelanggan lain dengan ulasan yang kamu berikan.</p>
                <input type="hidden" name="input-laundry-id" id="inputLaundryId" value="{{$laundry->id_laundry}}">
                <input type="hidden" name="input-user-id" id="inputUserId" value="{{$user->id}}">
                <label for="reason" class="rating-body__reason-label">Apa alasan memberikan rating?</label> <br>
                <textarea class="rating-body__reason-textarea" name="reason" id="" cols="30" rows="10" placeholder="Ceritakan pengalamanmu."></textarea>
                <label class="error" for="">{{$errors->first("reason")}}</label>
                <input type="submit" value="Submit" class="rating-body__submit-btn">
            </form>
        </div>


    </main>
    
</body>
</html>