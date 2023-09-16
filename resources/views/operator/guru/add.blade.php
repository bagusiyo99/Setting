@extends('layouts.app_sneat')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (isset($guru))
                        <form action="/operator/guru/{{ $guru->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form action="/operator/guru" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="judul"
                            class="form-control                             
                        @error('judul')
                            is-invalid
                            @enderror"
                            placeholder="Judul" value="{{ isset($guru) ? $guru->judul : old('judul') }}">
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Jurusan / Jabatan</label>
                        <input type="text" name="mapel"
                            class="form-control                             
                        @error('mapel')
                            is-invalid
                            @enderror"
                            placeholder="Jurusan / Jabatan" value="{{ isset($guru) ? $guru->mapel : old('mapel') }}">
                        @error('mapel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi"class="form-control" id="tiny" cols="30" rows="10">{{ isset($guru) ? $guru->deskripsi : old('deskripsi') }} </textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" accept="image/png, image/jpg, image/jpeg"
                            class="form-control 
                            @error('gambar')
                            is-invalid
                            @enderror"
                            placeholder="Gambar">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @if (isset($guru))
                            <img src="/{{ $guru->gambar }}" width="100%" class="mt-4" alt="">
                        @endif
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Facebook</label>
                        <input type="text" name="facebook"
                            class="form-control                             
                        @error('facebook')
                            is-invalid
                            @enderror"
                            placeholder="Facebook" value="{{ isset($guru) ? $guru->facebook : old('facebook') }}">
                        @error('facebook')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Twitter</label>
                        <input type="text" name="twitter"
                            class="form-control                             
                        @error('twitter')
                            is-invalid
                            @enderror"
                            placeholder="Twitter" value="{{ isset($guru) ? $guru->twitter : old('twitter') }}">
                        @error('twitter')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">instagram</label>
                        <input type="text" name="instagram"
                            class="form-control                             
                        @error('instagram')
                            is-invalid
                            @enderror"
                            placeholder="instagram" value="{{ isset($guru) ? $guru->instagram : old('instagram') }}">
                        @error('instagram')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Tiktok</label>
                        <input type="text" name="tiktok"
                            class="form-control                             
                        @error('tiktok')
                            is-invalid
                            @enderror"
                            placeholder="Tiktok" value="{{ isset($guru) ? $guru->tiktok : old('tiktok') }}">
                        @error('tiktok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
