<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;


use App\Models\Pemesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomePemesanan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index ()
    {
    $data = [
        'content'=> 'home/pemesanan/index'
    ];
    return view('home.layouts.wrapper',$data);
    }

         function send  (Request $request)
    {
        $data = $request -> validate ([
            'nama' => 'required',
            'email' => 'required|email|unique:pemesanans', // Pastikan email unik dalam tabel 'pesans'
            'alamat' => 'required',
            'jk' => 'required ',
            'pesan' => 'required ',
        ]);
        Pemesanan::create($data);
         Alert::success('sukses', 'Pesan berhasil dikirim');
        return redirect('/pemesanan');

    }

}
