@extends('layouts.admin.master')
@section('title')

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- <div class="card"> --}}
                <div class="card-header">
                    <h4>@yield('title')</h4>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="cari" class="form-label">Cari Laundry</label>
                                    <input type="text" name="cari" class="form-control" autocomplete="off" id="cari" placeholder="Cari Laundry">
                                </div>
                                <img src="{{ asset('assets/no-image.jpeg') }}" class="img-fluid shadow-sm"
                                    style="border-radius: 14px;" id="blah">
                                <div class="mt-3">
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <div>
                                            Images are only JPG and PNG and make the size of 2 MB
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Masukan Foto Laundry</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" autocomplete="off" id="imgInp">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Laundry<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" autocomplete="off" placeholder="Nama Laundry">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Lokasi<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        name="harga" value="{{ old('alamat') }}" autocomplete="off" placeholder="Lokasi">
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                        name="harga" value="{{ old('deskripsi') }}" autocomplete="off" placeholder="Deskripsi">
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fasilitas</label>
                                    <fieldset class="form-group">
                                        <select class="form-select @error('status') is-invalid @enderror" id="basicSelect"
                                            name="status">
                                            <option value="">-- Pilih Fasilitas --</option>
                                            <option {{ old('status') == 'publish' ? 'selected' : '' }} value="publish">
                                                Reguler</option>
                                            <option {{ old('status') == 'draft' ? 'selected' : '' }} value="draft">Express
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="mb-3">
                                    <input type="checkbox" id="Pakaian" class="form-check-input @error('Pakaian') is-invalid @enderror" name="Pakaian" value="{{ old('Pakaian') }}" autocomplete="off">
                                    <label class="form-check-label" for="Pakaian">Pakaian</label><br>
                                </div>
                                <div class="mb-3">
                                    <input type="checkbox" id="Sepatu" class="form-check-input @error('Sepatu') is-invalid @enderror" name="Sepatu" value="{{ old('Sepatu') }}" autocomplete="off">
                                    <label class="form-check-label" for="Sepatu">Sepatu</label><br>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga<span style="color: red;">*</span></label>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                        name="harga" value="{{ old('harga') }}" autocomplete="off" placeholder="\kg">
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </form>
                </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css ') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css ') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css ') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/filepond.css ') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/js/pages/filepond.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Masukan Deskripsi lengkap produk',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
    </script>
@endsection
