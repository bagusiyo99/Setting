<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Settings;

class SettingController extends Controller
{
    public function create ()
    {
        return view('operator.setting_form');
    }

    public function store  (Request $request)
    {
        $dataSettings = $request->except('_token');

            if ($request -> hasFile('foto')) {
                $foto = $request->file('foto');
                $file_name = time ().'-'. $foto -> getClientOriginalName ();

                $storage = 'uploads/logo/';
                $foto->move ($storage, $file_name);
                $dataSettings ['foto'] =$storage .$file_name;
            }else {
                $dataSettings ['foto'] = null;
            }

            if ($request -> hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $file_name = time ().'-'. $gambar -> getClientOriginalName ();

                $storage = 'uploads/logo/';
                $gambar->move ($storage, $file_name);
                $dataSettings ['gambar'] =$storage .$file_name;
            }else {
                $dataSettings ['gambar'] = null;
            }


        Settings()->set($dataSettings);
        flash ('Data Berhasil Disimpan');
        return back();
    }
}
