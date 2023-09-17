<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\admin;
use App\Models\Pengaturan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaOperatorController extends Controller
    
{
    function index (
      
    ){

    
$data = [
        'pengaturan' => Pengaturan::get(),
        



        'content'=> 'operator/index'
    ];
        return view('operator.beranda_index', $data);



    }


}


