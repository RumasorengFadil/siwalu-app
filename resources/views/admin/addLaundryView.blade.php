@extends('layouts.adminView')

@section('content')
    <form action="{{ route('laundry.post') }}" class="form form__admin" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form__el">
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
            <input class="form__input" type="text" name="name" id="inputName" value="{{ old('name') }}"
                placeholder="Masukan nama laundry">
            <label class="error" for="">{{ $errors->first('name') }}</label>

        </div>
        <div class="form__el">
            <label class="form__label" for="location">Lokasi *</label><br>
            <!-- Input file -->
            <input class="form__input" type="text" name="location" id="inpuLocation" value="{{ old('location') }}"
                placeholder="Masukan lokasi">
            <label class="error" for="">{{ $errors->first('location') }}</label>
        </div>
        <div class="form__el">
            <label class="form__label" for="description">Deskripsi *</label><br>
            <!-- Input file -->
            <textarea class="form__input form__input-textarea" name="description" id="inpuDescription"
                placeholder="Masukan Deskripsi">{{ old('description') }}</textarea>
            <label class="error" for="">{{ $errors->first('description') }}</label>
        </div>
        <div class="form__el">
            <label class="form__label" for="service">Layanan *</label><br>
            <!-- Input file -->
            <input class="form__input form__input-service" type="text" name="service" value="{{ old('service') }}"
                id="inpuService" placeholder="Masukan service">
            <label class="error" for="">{{ $errors->first('service') }}</label>
        </div>
        <div class="form__el">
            <label class="form__label" for="harga">Harga *</label><br>
            <!-- Input file -->
            <input class="form__input form__input-harga" type="number" name="harga" value="{{ old('harga') }}"
                id="inpuHarga" placeholder="Masukan harga">
            <label class="error" for="">{{ $errors->first('harga') }}</label>
        </div>
        <div class="form__el">
            <label class="form__label" for="whatsappNumber">Nomor Whatsapp *</label><br>
            <!-- Input file -->
            <input class="form__input form__input-whatsappNumber" type="number" name="whatsappNumber"
                value="{{ old('whatsappNumber') }}" id="inputWhatsappNumber" placeholder="Masukan nomor whatsapp">
            <label class="error" for="">{{ $errors->first('whatsappNumber') }}</label>

        </div>
        <div class="form__el">
            <label class="form__label" for="typeoflaundry">Jenis Cucian *</label><br>
            <!-- Input file -->

            <input class="form__input-checkbox" type="checkbox" name="pakaian" id="" value="Pakaian">
            <label class="form__label-jenis-cucian">Pakaian</label>
            <input class="form__input-checkbox" type="checkbox" name="sepatu" id="" value="Sepatu">
            <label class="form__label-jenis-cucian">Sepatu</label>
        </div>

        <div class="form__el">
            <!-- Input file -->
            <input class="form__submit-btn form__submit-btn-sm" type="submit" value="Tambah">

        </div>
    </form>
@endsection
