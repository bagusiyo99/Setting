@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (isset($barang))
                        <form action="/operator/barang/{{ $barang->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form action="/operator/barang" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang"
                            class="form-control
                            @error('nama_barang')
                                is-invalid
                            @enderror"
                            placeholder="Nama Barang"
                            value="{{ isset($barang) ? $barang->nama_barang : old('nama_barang') }}">
                        @error('nama_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="text" name="harga_barang"
                            class="form-control
                            @error('harga_barang')
                                is-invalid
                            @enderror"
                            placeholder="Harga Barang"
                            value="{{ isset($barang) ? formatRupiah($barang->harga_barang) : old('harga_barang') }}"
                            data-inputmask-alias="numeric" data-inputmask-group-separator="." data-inputmask-digits="0"
                            data-inputmask-prefix="Rp " data-inputmask-remove-mask-on-submit="true">
                        @error('harga_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="number" name="jumlah_barang"
                            class="form-control @error('jumlah_barang') is-invalid @enderror" placeholder="Jumlah Barang"
                            value="{{ isset($barang) ? $barang->jumlah_barang : old('jumlah_barang') }}" step="0.01"
                            min="0.01">
                        @error('jumlah_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="gambar">Gambar</label>
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

                        @if (isset($barang))
                            <img src="/{{ $barang->gambar }}" width="100%" class="mt-4" alt="">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hargaInput = document.querySelector('input[name="harga_barang"]');
            const jumlahInput = document.querySelector('input[name="jumlah"]');

            hargaInput.addEventListener('input', formatHargaInput);
            jumlahInput.addEventListener('input', updateTotalHarga);

            function formatHargaInput() {
                let hargaBarang = hargaInput.value.replace(/\D/g, ''); // Hapus semua karakter non-digit.
                if (hargaBarang.length > 3) {
                    hargaBarang = hargaBarang.replace(/\B(?=(\d{3})+(?!\d))/g,
                        '.'); // Tambahkan titik setiap 3 digit.
                }
                const formattedHarga = `Rp. ${hargaBarang}`;

                // Set nilai input harga dengan format Rupiah.
                hargaInput.value = formattedHarga;
            }

            function updateTotalHarga() {
                const hargaBarang = parseInt(hargaInput.value.replace(/\D/g, '')) || 0;
                const jumlahBarang = parseFloat(jumlahInput.value) || 0;
                const totalHarga = hargaBarang * jumlahBarang;

                // Tampilkan total harga dengan format Rupiah.
                const formattedTotalHarga = `Rp. ${totalHarga.toLocaleString()}`;

                // Set nilai input total harga.
                document.querySelector('input[name="total_harga"]').value = formattedTotalHarga;
            }
        });
    </script>
@endsection
