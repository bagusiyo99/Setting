<?php
/// dua komponen jika di buat folder
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Pesan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPesan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'title' => 'Manajemen Pesan',
            'pesan' => Pesan::get(),
            'content' => 'operator/pesan/index'
        ];
        return view ('operator.pesan.index', $data );
    }

    public function show ($id)
    {
    $data = [
        'pesan' => Pesan::find($id),
        'content'=> 'operator/pesan/show'
    ];
    return view('operator.pesan.show',$data);
    }

        public function destroy($id)
    {
        $pesan = Pesan::find ($id);


        Alert::success('sukses', 'data berhasil dihapus');
        $pesan->delete();
        return redirect ('/operator/pesan');
        
    }

}
