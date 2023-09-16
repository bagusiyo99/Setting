<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use App\Models\Blog;

use App\Models\Setting;

use Illuminate\Http\Request;

class Home extends Controller
{
    function index (){
    $data = [
        'setting' => Setting::get(),
        'blog' => Blog::paginate(4),
        // 'informasi' => Informasi::paginate(4),
        'banner' => Banner::get(),
        



        'content'=> 'home/home/index'
    ];
    return view('home.layouts.wrapper',$data);
    }




    //     public function informasi($id)
    // {
    // $data = [
    //     'informasi' => Informasi::find($id),
    //     'content'=> 'home/home/informasi'
    // ];
    // return view('home.layouts.wrapper',$data);
    // }




  

}