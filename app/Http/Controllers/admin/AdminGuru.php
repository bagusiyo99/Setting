<?php

/// dua komponen jika di buat folder
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Guru;
use RealRashid\SweetAlert\Facades\Alert;

class AdminGuru extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'title' => 'Manajemen Guru',
            'guru' => Guru::get(),
            'content' => 'operator/guru/index'
        ];
        return view ('operator.guru.index', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[
            'title' => 'Tambah Guru',
            'content' => 'operator/guru/add'
        ];
        
        return view ('operator.guru.add', $data );
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
            'mapel' => 'required ',
            'deskripsi' => 'required ',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            ], [
        'judul.required' => 'Nama Lengkap WAJIB DIISI',
        'deskripsi.required' => 'Deskripsi WAJIB DIISI',
        'mapel.required' => ' WAJIB DIISI',
        'gambar.required' => 'gambar WAJIB DIISI',
        'gambar.mimes' => 'Hanya menerima gambar PDF, Word, atau Excel',
        'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 5 MB',
        'tiktok' => 'Hanya Boleh Memakai URL',
        'instagram' => 'Hanya Boleh Memakai URL',
        'facebook' => 'Hanya Boleh Memakai URL',
        'twitter' => 'Hanya Boleh Memakai URL',
        ]);

        // upload gambar
        if ($request -> hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time ().'-'. $gambar -> getClientOriginalName ();

            $storage = 'uploads/guru/';
            $gambar->move ($storage, $file_name);
            $data ['gambar'] =$storage .$file_name;
        }else {
            $data ['gambar'] = null;
        }

                    Alert::success('sukses', 'data berhasil DITAMBAH');
                    Guru::create ($data);
                    return redirect ('/operator/guru');

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
            'title' => 'Edit Guru',
            'guru' => Guru::find ($id),
            'content' => 'operator/guru/add'
        ];
        return view ('operator.guru.add', $data ); 
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
        $guru = Guru::find($id);
         $data = $request -> validate ([
            'judul' => 'required|max:150',
            'deskripsi' => 'required ',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            ], [
        'judul.required' => 'Nama Lengkap WAJIB DIISI',
        'deskripsi.required' => 'Deskripsi WAJIB DIISI',
        'gambar.required' => 'gambar WAJIB DIISI',
        'gambar.mimes' => 'Hanya menerima gambar PDF, Word, atau Excel',
        'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 5 MB',
        'tiktok' => 'Hanya Boleh Memakai URL',
        'instagram' => 'Hanya Boleh Memakai URL',
        'facebook' => 'Hanya Boleh Memakai URL',
        'twitter' => 'Hanya Boleh Memakai URL',
        ]);

        // upload gambar
        if ($request -> hasFile('gambar')) {
            if($guru->gambar  != null){
                unlink($guru->gambar);
            }


            $gambar = $request->file('gambar');
            $file_name = time ().'-'. $gambar -> getClientOriginalName ();

            $storage = 'uploads/guru/';
            $gambar->move ($storage, $file_name);
            $data ['gambar'] =$storage .$file_name;
        }else {
            $data ['gambar'] = $guru ->gambar;
        }

                    Alert::success('sukses', 'data berhasil diupdate');
                    $guru->update($data);
                    return redirect ('/operator/guru');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find ($id);

            if($guru->gambar != null){
            unlink($guru->gambar);
                }

        Alert::success('sukses', 'data berhasil dihapus');
        $guru->delete();
        return redirect ('/operator/guru');
        
    }
}
