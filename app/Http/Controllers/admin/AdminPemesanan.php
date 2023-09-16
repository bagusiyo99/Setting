<?php
/// dua komponen jika di buat folder
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPemesanan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'title' => 'Manajemen Pemesanan',
            'pemesanan' => Pemesanan::get(),
            'content' => 'operator/pemesanan/index'
        ];
        return view ('operator.pemesanan.index', $data );
    }

    public function show ($id)
    {
    $data = [
        'pemesanan' => Pemesanan::find($id),
        'content'=> 'operator/pemesanan/show'
    ];
    return view('operator.pemesanan.show',$data);
    }

        public function destroy($id)
    {
        $pemesanan = Pemesanan::find ($id);


        Alert::success('sukses', 'data berhasil dihapus');
        $pemesanan->delete();
        return redirect ('/operator/pemesanan');
        
    }

}
