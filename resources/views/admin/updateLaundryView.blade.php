@extends("layouts.adminView")

@section("content")
<div class="box box-pad24">
        <input class="inputsearch" type="search" name="inputSearch" id="inputSearch" placeholder="Cari “Laundry Terdekat”">

        <div class="box box-displayflex box-flexdirectioncolumn">

            @foreach ($laundries as $laundry)
                    <div
                        class="box box-bordercadetblue box-mar16-bottom box-rad4 box-pad8 box-width400 box-colorwhite box-displayflex">
                        <img class="image image-width140 image-mar12-right image-rad4"
                            src="/uploads/{{ $laundry->foto }}" alt="">

                        <div class="box">
                            <h1 class="title title-mar8-bottom title-size12">{{ $laundry->nama }}</h1>
                            <p class="text text-mar8-bottom text-size8 text-colorgray">{{ $laundry->alamat }}</p>

                            <div class="box-container">
                                <div class="box box-rad4 box-mar8-bottom box-pad4 box-wrap box-displayflex box-colorblue">
                                    <img class="icon icon-size12" src="/icn/cloth.svg" alt="">
                                    <p class="text text-size8 text-colorwhite">Pakaian</p>
                                </div>

                                <div class="box box-rad4 box-mar8-bottom box-pad4 box-wrap box-displayflex box-coloryellow">
                                    <img class="icon icon-size12" src="/icn/sepatu.svg" alt="">
                                    <p class="text text-size8 text-colorwhite">Sepatu</p>
                                </div>
                            </div>

                            <p class="text text-size8 text-colorcadetblue">Mulai dari</p>
                            <p class="text text-size12 text-bold text-mar8-bottom">Rp. {{ $laundry->harga }}/kg</p>

                            <a href="/admin/updateLaundry/{{ $laundry->id_laundry }}">
                                <button class="btn btn-cursorpointer btn-colortertiary btn-width48" name="id_applicant" type="submit">
                                    <p class="text-coloronprimary text-size8">Update</p>
                                </button>
                            </a>

                        </div>
                    </div>
            @endforeach


        </div>

    </div>
@endsection