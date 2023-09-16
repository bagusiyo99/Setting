@extends('layouts.app_sneat')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table  table-striped table-bordered table-hover table-bordered text-center" id="data">
                        <thead>
                            <tr class="btn-secondary">
                                <td> No </td>
                                <td> Nama </td>
                                <td> Email</td>
                                <td> Jenis Kelamin</td>
                                <td> Deskripsi </td>
                                <td> Action </td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pesan as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $item->nama }} </td>
                                    <td> {{ $item->email }} </td>
                                    <td> {{ $item->jk }} </td>

                                    <td> {{ $item->pesan }} </td>

                                    <td>
                                        <div class="text-center mb-1">
                                            <a href="/operator/pesan/{{ $item->id }} "
                                                class="btn btn-success  mb-2">Detail</a>

                                            <form action="/operator/pesan/{{ $item->id }}" method="POST">
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
