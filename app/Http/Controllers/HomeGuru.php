<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class HomeGuru extends Controller
{
    public function index()
{
    $guru = Guru::latest()->paginate(10); 

    $data = [
        'title' => 'Daftar Guru',
        'guru' => $guru,
        'content' => 'home/guru/index'
    ];

    return view('home.layouts.wrapper', $data);
}


// }

//        function index (){
//     $data = [
    
     
//         'guru' => Guru::paginate(10),

//         'content'=> 'home/guru/index'
//     ];
//     return view('home.layouts.wrapper',$data);
//     }

        function detail ($id)
    {
        

    $data = [
        'guru' => Guru::find($id),
        'content'=> 'home/guru/detail'
    ];
    return view('home.layouts.wrapper',$data);
    }

    
}

