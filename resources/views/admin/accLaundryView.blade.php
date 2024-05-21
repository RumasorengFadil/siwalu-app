@extends('layouts.adminView')
@section('content')
    <div class="box box-pad24">
        <input class="inputsearch" type="search" name="inputSearch" id="inputSearch" placeholder="Cari “Laundry Terdekat”">

        <div class="box box-displayflex box-flexdirectioncolumn">

            @foreach ($applicants as $applicant)
                @if ($applicant->status === 'waiting')
                    <div
                        class="box box-bordercadetblue box-mar16-bottom box-rad4 box-pad8 box-width400 box-colorwhite box-displayflex">
                        <img class="image image-width140 image-mar12-right image-rad4"
                            src="/uploads/{{ $applicant->foto_laundry }}" alt="">

                        <div class="box">
                            <h1 class="title title-mar8-bottom title-size12">{{ $applicant->nama }}</h1>
                            <p class="text text-mar8-bottom text-size8 text-colorgray">{{ $applicant->alamat }}</p>

                            <div class="box box-rad4 box-mar8-bottom box-pad4 box-wrap box-displayflex box-colorblue">
                                <img class="icon icon-size12" src="/icn/cloth.svg" alt="">
                                <p class="text text-size8 text-colorwhite">Pakaian</p>
                            </div>

                            <p class="text text-size8 text-colorcadetblue">Mulai dari</p>
                            <p class="text text-size12 text-bold text-mar8-bottom">Rp. {{ $applicant->harga }}/kg</p>
                            <a href="/uploads/{{ $applicant->foto_ktp }}"
                                class="text text-size12 text-decornone text-mar4-right">Foto
                                Ktp</a>
                            <a href="/uploads/{{ $applicant->foto_laundry }}" class="text text-size12 text-decornone">Foto
                                Laundry</a><br>

                            <form class="box box-displayinline" action="{{route('accLaundry.accept')}}" method="POST">
                                @csrf
                                <input class="hidden" type="text" name="id_user" value="{{$user->id}}" id="">
                                <button class="btn btn-cursorpointer btn-colorprimary btn-width48" name="id_applicant" value="{{ $applicant->id }}" type="submit">
                                    <p class="text-coloronprimary btn-bordercolorprimary text-size8">Terima</p>
                                </button>
                            </form>

                            <form class="box box-displayinline" action="{{ route('accLaundry.reject') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-bordercolorprimary btn-cursorpointer btn-colorsecondary btn-width48"
                                    type="submit" name="id_applicant" value="{{ $applicant->id }}">
                                    <p class="text-colorroyalblue text-size8">Tolak</p>
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach


        </div>

    </div>
@endsection
