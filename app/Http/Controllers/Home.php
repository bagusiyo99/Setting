<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Formulir;
use App\Models\Foto;
use App\Models\Informasi;
use Settings;

use Illuminate\Http\Request;

class Home extends Controller
{
    function index (){
    $data = [
        'about' => About::get(),
        'blog' => Blog::paginate(4),
        'informasi' => Informasi::paginate(4),
        'banner' => Banner::get(),
        



        'content'=> 'home/home/index'
    ];
    return view('home.layouts.wrapper',$data);
    }




        public function informasi($id)
    {
    $data = [
        'informasi' => Informasi::find($id),
        'content'=> 'home/home/informasi'
    ];
    return view('home.layouts.wrapper',$data);
    }




        function formulir (){
    $data = [
    
     
        'formulir' => Formulir::get(),

        'content'=> 'home/formulir/index'
    ];
    return view('home.layouts.wrapper',$data);
    }


}