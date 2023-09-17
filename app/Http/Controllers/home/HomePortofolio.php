<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;


use App\Models\Portofolio;
use Illuminate\Http\Request;

class HomePortofolio extends Controller
{
    public function index()
{
    $portofolio = Portofolio::latest()->paginate(5); 
    $recentPortofolio = Portofolio::latest()->take(5)->get();
    $data = [
        'title' => 'Daftar Portofolio',
        'portofolio' => $portofolio,
        'recentPortofolio' => $recentPortofolio, // Mengirim variabel $recentBlogs ke tampilan
        'content' => 'home/portofolio/index'
    ];

    return view('home.layouts.wrapper', $data);
}


        function detail ($id)
    {
    $data = [
        'portofolio' => Portofolio::find($id),
        'content'=> 'home/portofolio/detail'
    ];
    return view('home.layouts.wrapper',$data);
    }

    
}

