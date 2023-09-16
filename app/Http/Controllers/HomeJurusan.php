<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class HomeJurusan extends Controller
{
    public function index()
{
    $jurusan = Jurusan::latest()->paginate(5); 
    $recentJurusan = Jurusan::latest()->take(5)->get();
    $data = [
        'title' => 'Daftar Jurusan',
        'jurusan' => $jurusan,
        'recentJurusan' => $recentJurusan, // Mengirim variabel $recentBlogs ke tampilan
        'content' => 'home/jurusan/index'
    ];

    return view('home.layouts.wrapper', $data);
}


        function detail ($id)
    {
    $data = [
        'jurusan' => Jurusan::find($id),
        'content'=> 'home/jurusan/detail'
    ];
    return view('home.layouts.wrapper',$data);
    }

    
}

