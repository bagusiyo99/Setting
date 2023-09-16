<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KomenController extends Controller
{
    public function comen()
    {
        $data = [
            'content' => 'home/blog/detail'
        ];

        return view('home.layouts.wrapper', $data);
    }

    public function send(Request $request)
    {
        $request->validate([
            'nama' => 'required', // Nama harus diisi
            'isi' => 'required',  // Isi komentar harus diisi
            'blog_id' => 'required',  // Jika Anda menggunakan blog_id dalam formulir
        ], [
            'nama.required' => 'Nama harus diisi.',
            'isi.required' => 'Isi komentar harus diisi.',
            'blog_id.required' => 'Blog ID harus diisi.',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'isi' => $request->input('isi'),
            'blog_id' => $request->input('blog_id'), // Sesuaikan dengan nama input di formulir
        ];

        Komen::create($data);

        Alert::success('Sukses', 'Pesan berhasil dikirim');

        return redirect()->back()->with('success', 'Komentar berhasil disimpan.');
    }
}