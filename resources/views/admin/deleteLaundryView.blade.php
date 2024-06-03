@extends("layouts.adminView")

@section("content")
    <div class="box box-pad24">
        <input class="inputsearch" type="search" name="inputSearch" id="inputSearch" placeholder="Cari “Laundry Terdekat”">

        <div class="box box-displayflex box-flexdirectioncolumn">

            @foreach ($laundries as $laundry)
                <div class="box box-bordercadetblue box-mar16-bottom box-rad4 box-pad8 box-width400 box-colorwhite box-displayflex">
                    <img class="image image-width140 image-mar12-right image-rad4" src="/uploads/{{ $laundry->foto }}" alt="">
                    <div class="box">
                        <h1 class="title title-mar8-bottom title-size12">{{ $laundry->nama }}</h1>
                        <p class="text text-mar8-bottom text-size8 text-colorgray">{{ $laundry->alamat }}</p>
                        <div class="box-container box-displayflex">
                            @foreach ($laundry->jenis_cucian as $jenis_cucian)
                                @if($jenis_cucian)
                                    <div class="box box-mar8-right box-rad4 box-mar8-bottom box-pad4 box-wrap box-displayflex box-{{$jenis_cucian === "Pakaian" ? 'colorblue' : 'coloryellow'}}">
                                        <img class="icon icon-size12" src="/icn/{{$jenis_cucian === "Pakaian" ? 'cloth' : 'sepatu'}}.svg" alt={{$jenis_cucian}} alt="">
                                        <p class="text text-size8 text-colorwhite">{{$jenis_cucian}}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <p class="text text-size8 text-colorcadetblue">Mulai dari</p>
                        <p class="text text-size12 text-bold text-mar8-bottom">Rp. {{ $laundry->harga }}/kg</p>
                        <!-- Add a JavaScript function to prompt for confirmation -->
                        <button class="btn btn-cursorpointer btn-colorred btn-width48" style="background-color: red" onclick="confirmDelete('{{ $laundry->id_laundry }}')">
                            <p class="text-coloronprimary text-size8">Delete</p>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- JavaScript function to prompt for confirmation -->
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this item?")) {
                // If user confirms, redirect to delete route
                window.location.href = "/admin/deleteLaundry/" + id;
            }
        }
    </script>
@endsection
