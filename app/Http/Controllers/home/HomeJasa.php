<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;


use App\Models\Jasa;
use Illuminate\Http\Request;

class HomeJasa extends Controller
{
    public function index()
{
    $jasa = Jasa::latest()->paginate(5); 
    $recentJasa = Jasa::latest()->take(5)->get();
    $data = [
        'title' => 'Daftar Jasa',
        'jasa' => $jasa,
        'recentJasa' => $recentJasa, // Mengirim variabel $recentBlogs ke tampilan
        'content' => 'home/jasa/index'
    ];

    return view('home.layouts.wrapper', $data);
}


        function detail ($id)
    {
    $data = [
        'jasa' => Jasa::find($id),
        'content'=> 'home/jasa/detail'
    ];
    return view('home.layouts.wrapper',$data);
    }

    
}

