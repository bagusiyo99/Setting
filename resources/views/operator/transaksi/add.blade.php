@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah Transaksi
                </div>

                <div class="card-body">
                    @if (isset($transaksi))
                        <form action="/operator/transaksi/{{ $transaksi->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form action="/operator/transaksi" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf

                    {{-- <div class="form-group">
                        <label for="barang_id">Pilih Barang</label>
                        <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
                            <option value="">Pilih Barang</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}" data-harga="{{ $barang->harga_barang }}">
                                    {{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('barang_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    {{-- <div class="form-group mt-5">
                        <label for="jumlah_terjual">Jumlah Terjual</label>
                        <input type="number" name="jumlah_terjual"
                            class="form-control @error('jumlah_terjual') is-invalid @enderror" placeholder="Jumlah Terjual"
                            value="{{ old('jumlah_terjual') }}" min="1">
                        @error('jumlah_terjual')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    {{-- 
                    <div class="form-group mt-5">
                        <label for="total_harga">Total Harga</label>
                        <input type="text" name="total_harga" class="form-control" value="{{ old('total_harga') }}"
                            readonly>
                    </div> --}}

                    <div class="form-group">
                        <label for="barang_id">Pilih Barang</label>
                        <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
                            <option value="">Pilih Barang</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}" data-harga="{{ $barang->harga_barang }}"
                                    @if (isset($transaksi) && $barang->id == $transaksi->barang_id) selected @endif>
                                    {{ $barang->nama_barang }}</option>
                            @endforeach
                        </select>
                        @error('barang_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-5">
                        <label for="jumlah_terjual">Jumlah Terjual</label>
                        <input type="number" name="jumlah_terjual"
                            class="form-control @error('jumlah_terjual') is-invalid @enderror" placeholder="Jumlah Terjual"
                            value="{{ old('jumlah_terjual', isset($transaksi) ? $transaksi->jumlah_terjual : '') }}"
                            min="1">
                        @error('jumlah_terjual')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-5">
                        <label for="total_harga">Total Harga</label>
                        <input type="text" name="total_harga" class="form-control"
                            value="{{ old('total_harga', isset($transaksi) ? 'Rp. ' . number_format($transaksi->total_harga, 0, ',', '.') : '') }}"
                            readonly>
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const barangSelect = document.querySelector('select[name="barang_id"]');
            const jumlahTerjualInput = document.querySelector('input[name="jumlah_terjual"]');
            const totalHargaInput = document.querySelector('input[name="total_harga"]');

            barangSelect.addEventListener('change', updateTotalHarga);
            jumlahTerjualInput.addEventListener('input', updateTotalHarga);

            function updateTotalHarga() {
                const selectedBarang = barangSelect.options[barangSelect.selectedIndex];
                const hargaBarang = selectedBarang.getAttribute('data-harga');
                const jumlahTerjual = jumlahTerjualInput.value;

                if (hargaBarang && jumlahTerjual) {
                    const totalHarga = hargaBarang * jumlahTerjual;
                    totalHargaInput.value = formatRupiah(totalHarga);
                } else {
                    totalHargaInput.value = '';
                }
            }

            function formatRupiah(angka) {
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });
                return formatter.format(angka);
            }
        });
    </script>
@endsection
