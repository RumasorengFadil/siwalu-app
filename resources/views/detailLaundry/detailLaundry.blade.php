
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['public/css/main.scss', 'public/js/countEstimation.js'])
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

        <div class="detail-laundry">
            <img class="detail-laundry__img" src="{{$laundry->foto}}" alt="">
            
            <div class="card__laundry-name-cn">
                <h1 class="card__laundry-name-me">{{$laundry->nama}}</h1>
                <img class="card__icn-heart icon" src="/icn/heart.svg" alt="">
            </div>

            <div class="card__laundry-address-cn">
                <img class="card__icn-address icon" src="/icn/location.svg" alt="">
                <p class="card__laundry-address-me">{{$laundry->alamat}}</p>
            </div>

            <div class="detail-laundry__rating card__laundry-rating-cn">
                <img class="icon" src="/icn/half-star-gold.svg" alt="">
                <p class="card__laundry-rating-me">{{$laundry->rating}}/5</p>
            </div>
            
            <div class="review">
                <div class="review__header">
                    <h5 class="review__title">Ulasan</h5>
                    <a class="review__btn-review" href="">
                        <img src="/icn/edit.svg" alt="" class="review__pencil-icon">
                        <p class="review__btn-text">Tulis Ulasan</p>
                    </a>
                </div>
                
                <div class="review__body">
                    <div class="review__card">
                        <div class="review__card-header">
                            <img class="review__img" src="/img/ari-wijaya.png" alt="">
    
                            <div class="review__author">
                                <h5 class="review__author-text">
                                    Latif Arif Putranto
                                </h5>
                                
                                <div class="review__score">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                </div>
                            </div>
                            <h5 class="review__date-passed">21 Nov 2023</h5>
                        </div>

                        <p class="review__comment">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error illum ea magnam natus nobis ex possimus laudantium neque rerum, suscipit aut, cumque corporis porro quas commodi dolor blanditiis deserunt culpa.
                        </p>
                    </div>
                    <div class="review__card">
                        <div class="review__card-header">
                            <img class="review__img" src="/img/ari-wijaya.png" alt="">
    
                            <div class="review__author">
                                <h5 class="review__author-text">
                                    Latif Arif Putranto
                                </h5>
                                
                                <div class="review__score">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                    <img src="/icn/star-full.svg" class="review__star-icn" alt="">
                                </div>
                            </div>
                            <h5 class="review__date-passed">21 Nov 2023</h5>
                        </div>

                        <p class="review__comment">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error illum ea magnam natus nobis ex possimus laudantium neque rerum, suscipit aut, cumque corporis porro quas commodi dolor blanditiis deserunt culpa.
                        </p>
                    </div>
                </div>
                
                
            </div>
            <h5 class="detail-laundry__title">Deskripsi</h5>
            <p class="detail-laundry__deksripsi">Lulu 'n Be Luxury Laundry adalah layanan laundry yang berbasis di Purwokerto, Jawa 
                Tengah, dan telah beroperasi sejak tahun 2012. Mereka menggunakan teknologi canggih 
                dan memiliki tenaga profesional yang siap melayani pelanggan. Lulu 'n Be menawarkan 
                layanan pick-up dan delivery melalui telepon, sehingga pelanggan dapat dengan mudah 
                mengatur antar-jemput pakaian mereka. Dengan fokus pada kualitas dan kepuasan 
                pelanggan, Lulu 'n Be Luxury Laundry adalah pilihan yang tepat untuk kebutuhan laundry 
                Anda
            </p>
            
            <h5 class="detail-laundry__title">Layanan Laundry</h5>
            <select class="detail-laundry__select-service" name="input-layanan" id="inputLayanan">
                @foreach ($laundry->jenis_layanan as $jenis_layanan)
                    <option value="value">{{$jenis_layanan}}</option>
                @endforeach
            </select>
            <h5 class="detail-laundry__title">Estimasi Berat</h5>
            <input class="detail-laundry__input-estimasi" type="number" name="input-weight" id="inputWeight" placeholder="Dalam Kilogram">
            <p class="detail-laundry__harga">Rp.{{$laundry->harga}}/kg</p>
            
            <div class="detail-laundry__cost-estimation-cn">
                <a class="detail-laundry__whatsapp-link" href="">
                    <img class="detail-laundry__whatsapp-icon" src="/icn/whatsapp.svg" alt="">
                </a>

                <div class="detail-laundry__cost-estimation">
                    <p class="detail-laundry__cost-estimation-label">Estimasi Biaya</p>
                    <p class="detail-laundry__total-cost-estimation">Rp.0</p>
                </div>
              
            </div>
        </div>
    </main>
</body>
</html>