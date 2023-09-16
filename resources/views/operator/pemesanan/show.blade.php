{{-- <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="/operator/pesan" class="btn btn-success mb-5">
                    <i class="fas fa-arrow-alt-circle-left">Kembali</i>
                </a>
                <tr>
                    <p> From : {{ $pesan->nama }} </p>
                </tr>
                <h3> {{ $pesan->email }} </h3>
                <p> {{ $pesan->pesan }} </p>

            </div>
        </div>
    </div>
</div>
</div> --}}
@extends('layouts.app_sneat')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <p class="form-control"> {{ $pemesanan->nama }}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <p class="form-control"> {{ $pemesanan->email }}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <p class="form-control"> {{ $pemesanan->alamat }}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <p class="form-control"> {{ $pemesanan->jk }}</p>
                    </div>

                    <div class="form-group" height="300px">
                        <label>Pesan</label>
                        <textarea class="form-control " height="900px"> {{ $pemesanan->pesan }} </textarea>

                    </div>


                    <a href="/operator/pemesanan" class="btn btn-primary mb-3">
                        Kembali</a>

                </div>
            </div>
        </div>
    </div>
@endsection
