<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;


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

                // Sensor kata-kata kotor dalam isi komentar
        $content = $data['isi'];
        $kataKotor = ['bodoh', 'goblok', 'stupid'];
        
        foreach ($kataKotor as $kata) {
            $content = str_ireplace($kata, '***', $content);
        }
        
        $data['isi'] = $content;

        Komen::create($data);

        Alert::success('Sukses', 'Pesan berhasil dikirim');

        return redirect()->back()->with('success', 'Komentar berhasil disimpan.');
    }
}