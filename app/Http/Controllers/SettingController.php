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

   public function store(Request $request)
{
    $dataSettings = $request->except('_token');

    // Cek apakah ada file foto yang di-upload
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $file_name = time() . '-' . $foto->getClientOriginalName();

        $storage = 'uploads/logo/';
        $foto->move($storage, $file_name);
        $dataSettings['foto'] = $storage . $file_name;

        // Hapus file foto lama jika ada
        if (!empty(Settings()->get('foto'))) {
            $oldFotoPath = Settings()->get('foto');
            if (file_exists($oldFotoPath)) {
                unlink($oldFotoPath);
            }
        }
    } else {
        // Jika tidak ada file foto baru di-upload, gunakan foto lama
        $dataSettings['foto'] = Settings()->get('foto');
    }

    // Lakukan hal yang sama untuk gambar
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $file_name = time() . '-' . $gambar->getClientOriginalName();

        $storage = 'uploads/logo/';
        $gambar->move($storage, $file_name);
        $dataSettings['gambar'] = $storage . $file_name;

        // Hapus file gambar lama jika ada
        if (!empty(Settings()->get('gambar'))) {
            $oldGambarPath = Settings()->get('gambar');
            if (file_exists($oldGambarPath)) {
                unlink($oldGambarPath);
            }
        }
    } else {
        // Jika tidak ada file gambar baru di-upload, gunakan gambar lama
        $dataSettings['gambar'] = Settings()->get('gambar');
    }

    Settings()->set($dataSettings);
    flash('Data Berhasil Disimpan');
    return back();
}



}
