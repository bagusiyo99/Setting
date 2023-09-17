{{-- 109 tutor --}}
@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Pengaturan </h5>

                <div class="card-body">

                    {!! Form::open(['route' => 'setting.store', 'method' => 'POST', 'files' => true]) !!}



                    <div class="form-group">

                        <div class="form-group mt-3">
                            <label for="app_name">Nama Instansi</label>
                            {!! Form::text('app_name', settings()->get('app_name'), ['class' => 'form-control', 'autofocus']) !!}
                            <span class="text-danger">{{ $errors->first('app_name') }}</span>
                        </div>

                        <div class="form-group mt-3">
                            <label for="gambar">Kepala Sekolah <b>(Format:jpg, jpeg, png, Ukuran Maks : 3MB)</b></label>
                            {!! Form::file('gambar', ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('gambar') }}</span>
                            <img src="/{{ settings()->get('gambar') }}" width="300px">
                            {{-- <img src="{{ \Storage::url(settings()->get('gambar')) }}" width="300px"> --}}

                        </div>

                        <div class="form-group mt-3">
                            <label for="foto">Logo <b>(Format:jpg, jpeg, png, Ukuran Maks : 3MB)</b></label>
                            {!! Form::file('foto', ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                            <img src="/{{ settings()->get('foto') }}" width="300px">
                            {{-- <img src="{{ \Storage::url(settings()->get('foto')) }}" width="300px"> --}}

                        </div>

                        {!! Form::submit('UPDATE', ['class' => 'btn btn-primary mt-5']) !!}






                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endsection
