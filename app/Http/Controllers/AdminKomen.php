<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKomen extends Controller
{
  public function index()
    {
        $data =[
            'title' => 'Manajemen Komen',
            'komen' => Komen::get(),
            'content' => 'operator/komen/index'
        ];
        return view ('operator.komen.index', $data );
    }

    public function show ($id)
    {
    $data = [
        'komen' => Komen::find($id),
        'content'=> 'operator/komen/show'
    ];
    return view('operator.komen.show',$data);
    }

        public function destroy($id)
    {
        $komen = Komen::find ($id);


        Alert::success('sukses', 'data berhasil dihapus');
        $komen->delete();
        return redirect ('/operator/komen');
        
    }
}
