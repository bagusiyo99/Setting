@extends('layouts.app_sneat')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table  table-striped table-bordered table-hover table-bordered text-center" id="data">
                        <a href="/pendaftaran-export" class="btn btn-success mb-3"><i class="fa  fa-file-excel"></i>
                            Excel</a>

                        <a href="{{ url('/hapus-semua-pendaftaran') }}" class="btn btn-danger mb-3 mx-3"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus semua pendaftaran?')">Hapus Semua
                            Pendaftaran</a>



                        <thead>
                            <tr class="btn-secondary">
                                <td> No </td>
                                <td> Nama </td>
                                <td> Email</td>
                                <td> Whatsapp Atau Telpon </td>
                                {{-- <td width="50px"> Deskripsi </td> --}}
                                <td> Action </td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pendaftaran as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $item->nama }} </td>
                                    <td> {{ $item->email }} </td>
                                    <td> {{ $item->telpon }} </td>

                                    {{-- <td> {{ $item->desc }} </td> --}}

                                    <td>
                                        <div class="text-center mb-1">
                                            <a href="/operator/pendaftaran/{{ $item->id }} "
                                                class="btn btn-success  mb-2">Detail</a>

                                            <form action="/operator/pendaftaran/{{ $item->id }}" method="POST">
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
