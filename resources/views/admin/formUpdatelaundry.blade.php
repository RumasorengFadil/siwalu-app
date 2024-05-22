@extends("layouts.adminView")

@section("content")
    <form action="{{ route('formUpdateLaundry.post') }}" class="form form__admin" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form__el">
            <img height="167px" src="/uploads/{{ $laundry->foto }}">
            <label for="gambar">
                <img class="form__image-placeholder" title="pilih file" src="/img/image-placeholder.png" alt="Placeholder">
            </label>
            <!-- Input file -->
            <input class="form__input-file" type="file" id="gambar" name="gambar" accept="image/*"
                style="display: none;">
            <label class="error" for="">{{ $errors->first('gambar') }}</label>
        </div>
        <div class="form__el">
            <label class="form__label" for="name">Nama Laundry *</label><br>
            <!-- Input file -->
            <input class="form__input" type="text" name="name" id="inputName" value="{{ $laundry->nama }}"
                placeholder="Masukan nama laundry">
            <label class="error" for="">{{ $errors->first('name') }}</label>

        </div>
        <div class="form__el">
            <label class="form__label" for="location">Lokasi *</label><br>
            <!-- Input file -->
            <input class="form__input" type="text" name="location" id="inpuLocation" value="{{ $laundry->alamat }}"
                placeholder="Masukan lokasi">
            <label class="error" for="">{{ $errors->first('location') }}</label>
        </div>
        <div class="form__el">
            <label class="form__label" for="description">Deskripsi *</label><br>
            <!-- Input file -->
            <textarea class="form__input form__input-textarea" name="description" id="inpuDescription"
                placeholder="Masukan Deskripsi">{{ $laundry->deskripsi }}</textarea>
            <label class="error" for="">{{ $errors->first('description') }}</label>
        </div>
        <div class="form__el">
            <label class="form__label" for="service">Layanan *</label><br>
            <!-- Input file -->
            <input class="form__input form__input-service" type="text" name="service" value="{{ $laundry->jenis_layanan }}"
                id="inpuService" placeholder="Masukan service">
            <label class="error" for="">{{ $errors->first('service') }}</label>
        </div>
        <div class="form__el">
            <label class="form__label" for="harga">Harga *</label><br>
            <!-- Input file -->
            <input class="form__input form__input-harga" type="number" name="harga" value="{{ $laundry->harga }}"
                id="inpuHarga" placeholder="Masukan harga">
            <label class="error" for="">{{ $errors->first('harga') }}</label>
        </div>
        <div class="form__el">
            <label class="form__label" for="whatsappNumber">Nomor Whatsapp *</label><br>
            <!-- Input file -->
            <input class="form__input form__input-whatsappNumber" type="number" name="whatsappNumber"
                value="{{ $laundry->nomor_telp }}" id="inputWhatsappNumber" placeholder="Masukan nomor whatsapp">
            <label class="error" for="">{{ $errors->first('whatsappNumber') }}</label>

        </div>
        <div class="form__el">
            <label class="form__label" for="typeoflaundry">Jenis Cucian *</label><br>
            
            <!-- Checkbox for 'Pakaian' -->
            <input class="form__input-checkbox" type="checkbox" name="pakaian" id="pakaian" value="Pakaian"
                @if (!is_null($laundry->jenis_cucian) && in_array('Pakaian', $laundry->jenis_cucian)) checked @endif>
            <label class="form__label-jenis-cucian">Pakaian</label>
            
            <!-- Checkbox for 'Sepatu' -->
            <input class="form__input-checkbox" type="checkbox" name="sepatu" id="sepatu" value="Sepatu"
                @if (!is_null($laundry->jenis_cucian) && in_array('Sepatu', $laundry->jenis_cucian)) checked @endif>
            <label class="form__label-jenis-cucian">Sepatu</label>
        </div>


        <div class="form__el">
            <!-- Input file -->
            <input  class="hidden" name="input-laundry-id" id="inputLaundryId" value="{{$laundry->id_laundry}}">
            <input class="form__submit-btn form__submit-btn-sm" type="submit" value="Simpan">

        </div>
    </form>
@endsection