<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\admin;

use App\Exports\PendaftaransExport;
use App\Http\Controllers\Controller;

use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPendaftaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'title' => 'Manajemen Pendaftaran',
            'pendaftaran' => Pendaftaran::get(),
            'content' => 'operator/pendaftaran/index'
        ];
        return view ('operator.pendaftaran.index', $data );
    }

    public function show ($id)
    {
    $data = [
        'pendaftaran' => Pendaftaran::find($id),
        'content'=> 'operator/pendaftaran/show'
    ];
    return view('operator.pendaftaran.show',$data);
    }

        public function destroy($id)
    {
        $pendaftaran = Pendaftaran::find ($id);


        Alert::success('sukses', 'data berhasil dihapus');
        $pendaftaran->delete();
        return redirect ('/operator/pendaftaran');
        
    }

    public function hapusSemuaPendaftaran()
{
    // Hapus semua data siswa dari tabel siswas
    $pendaftaran = Pendaftaran::truncate();
    $pendaftaran->delete();

    Alert::alert('sukses', 'data berhasil dihapus');
    return redirect('/operator/pendaftaran')->with('message', 'Semua pendaftaran telah dihapus.');
}


        public function export() 
    {
        return Excel::download(new PendaftaransExport ,'pendaftaran-'.Carbon::now()->timestamp. '.xlsx');
    }


    

}

