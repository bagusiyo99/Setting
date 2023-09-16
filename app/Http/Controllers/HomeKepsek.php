<?php

namespace App\Http\Controllers;

use App\Models\Kepsek;
use Illuminate\Http\Request;

class HomeKepsek extends Controller
{
       function index (){
    $data = [
    
     
        'kepsek' => Kepsek::get(),
        'title' => 'Daftar Pimpinan',
        'content'=> 'home/Kepsek/index'
    ];
    return view('home.layouts.wrapper',$data);
    }

        function detail ($id)
    {
    $data = [
        'kepsek' => Kepsek::find($id),
        'content'=> 'home/kepsek/show'
    ];
    return view('home.layouts.wrapper',$data);
    }

    
}

