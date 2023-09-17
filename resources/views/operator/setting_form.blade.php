@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Pengaturan</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="mt-3">
                                <label for="app_name">Nama Instansi</label>
                                <input type="text" name="app_name" class="form-control"
                                    value="{{ settings()->get('app_name') }}" autofocus>
                                @error('app_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="gambar">Kepala Sekolah (Format: jpg, jpeg, png, Ukuran Maks: 3MB)</label>
                                <input type="file" name="gambar" class="form-control">
                                @error('gambar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <img src="/{{ settings()->get('gambar') }}" width="300px">
                            </div>

                            <div class="mt-3">
                                <label for="foto">Logo (Format: jpg, jpeg, png, Ukuran Maks: 3MB)</label>
                                <input type="file" name="foto" class="form-control">
                                @error('foto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <img src="/{{ settings()->get('foto') }}" width="300px">
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
