<?php
/// dua komponen jika di buat folder
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Jasa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminJasa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'title' => 'Manajemen Jasa',
            'jasa' => Jasa::get(),
            'content' => 'operator/jasa/index'
        ];
        return view ('operator.jasa.index', $data );
    }

    public function show ($id)
    {
    $data = [
        'jasa' => Jasa::find($id),
        'content'=> 'operator/jasa/show'
    ];
    return view('operator.jasa.show',$data);
    }

        public function destroy($id)
    {
        $jasa = Jasa::find ($id);


        Alert::success('sukses', 'data berhasil dihapus');
        $jasa->delete();
        return redirect ('/operator/jasa');
        
    }

}
