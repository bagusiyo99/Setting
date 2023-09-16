<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BerandaOperatorController extends Controller
    
{
    function index (
      
    ){

    

        return view('operator.beranda_index');



    }


}


