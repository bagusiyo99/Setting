@extends('layouts.app_sneat')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (isset($formulir))
                        <form action="/operator/formulir/{{ $formulir->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form action="/operator/formulir" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="judul"
                            class="form-control                             
                        @error('judul')
                            is-invalid
                            @enderror"
                            placeholder="Judul" value="{{ isset($formulir) ? $formulir->judul : old('judul') }}">
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Deskripsi</label>
                        <textarea id="textya" name="deskripsi"class="form-control" cols="30" rows="10">{{ isset($formulir) ? $formulir->deskripsi : old('deskripsi') }} </textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">File</label>
                        <input type="file" name="file" accept=".doc,.docx,.pdf,.zip,"
                            class="form-control 
                            @error('file')
                            is-invalid
                            @enderror"
                            placeholder="File">
                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (isset($formulir))
                            <iframe src="/{{ $formulir->file }}" width="100%" class="mt-4" alt=""></iframe>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
