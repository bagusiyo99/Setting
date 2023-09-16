<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Kepsek;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AdminKepsek extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'title' => 'Manajemen Infromasi',
            'kepsek' => Kepsek::get(),
            'content' => 'operator/kepsek/index'
        ];
        return view ('operator.kepsek.index', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[
            'title' => 'Tambah Infromasi',
            'content' => 'operator/kepsek/add'
        ];
        
        return view ('operator.kepsek.add', $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> validate ([
            'judul' => 'required',
            'deskripsi' => 'required ',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            ], [
        'judul.required' => 'Nama Lengkap WAJIB DIISI',
        'deskripsi.required' => 'Deskripsi WAJIB DIISI',
        'gambar.required' => 'gambar WAJIB DIISI',
        'gambar.mimes' => 'Hanya menerima gambar PDF, Word, atau Excel',
        'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 5 MB',
        ]);

        // upload gambar
        if ($request -> hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time ().'-'. $gambar -> getClientOriginalName ();

            $storage = 'uploads/kepsek/';
            $gambar->move ($storage, $file_name);
            $data ['gambar'] =$storage .$file_name;
        }else {
            $data ['gambar'] = null;
        }

                    Alert::success('sukses', 'data berhasil DITAMBAH');
                    Kepsek::create ($data);
                    return redirect ('/operator/kepsek');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =[
            'title' => 'Edit Infromasi',
            'kepsek' => Kepsek::find ($id),
            'content' => 'operator/kepsek/add'
        ];
        return view ('operator.kepsek.add', $data ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $kepsek = Kepsek::find($id);
         $data = $request -> validate ([
            'judul' => 'required',
            'deskripsi' => 'required ',

        ]);

        // upload gambar
        if ($request -> hasFile('gambar')) {
            if($kepsek->gambar  != null){
                unlink($kepsek->gambar);
            }


            $gambar = $request->file('gambar');
            $file_name = time ().'-'. $gambar -> getClientOriginalName ();

            $storage = 'uploads/kepsek/';
            $gambar->move ($storage, $file_name);
            $data ['gambar'] =$storage .$file_name;
        }else {
            $data ['gambar'] = $kepsek ->gambar;
        }

                    Alert::success('sukses', 'data berhasil diupdate');
                    $kepsek->update($data);
                    return redirect ('/operator/kepsek');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kepsek = Kepsek::find ($id);

            if($kepsek->gambar != null){
            unlink($kepsek->gambar);
                }

        Alert::success('sukses', 'data berhasil dihapus');
        $kepsek->delete();
        return redirect ('/operator/kepsek');
        
    }
}

