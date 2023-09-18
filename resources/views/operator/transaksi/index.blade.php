@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/operator/transaksi/create" class="btn btn-primary mb-5"><i class="fas fa-plus"></i> Tambah</a>

                    <table class="table table-bordered text-center mt-4" id="data">
                        <thead>
                            <tr class="btn-secondary">
                                <td>No</td>
                                <td class="text-center">Gambar</td>
                                <td>Nama Barang</td>
                                <td>Total Harga</td>
                                <td>Jumlah Transaksi</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($item->barang)
                                            <img src="{{ asset($item->barang->gambar) }}" alt="Gambar Barang"
                                                width="100">
                                        @endif
                                    </td>
                                    <td>{{ $item->barang->nama_barang }}</td>
                                    <td>Rp. {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->jumlah_terjual }}</td>
                                    <td>
                                        <div class="text-center mb-1">
                                            <a href="/operator/transaksi/{{ $item->id }}/edit "
                                                class="btn btn-success  mb-2">Edit</a>

                                            <form action="/operator/transaksi/{{ $item->id }}" method="POST">
                                                @method ('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger mx-2">Hapus</button>

                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
