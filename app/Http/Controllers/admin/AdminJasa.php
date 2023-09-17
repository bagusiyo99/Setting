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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[
            'title' => 'Tambah Jasa',
            'content' => 'operator/jasa/add'
        ];
        
        return view ('operator.jasa.add', $data );
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
        ]);

        // upload gambar
        if ($request -> hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time ().'-'. $gambar -> getClientOriginalName ();

            $storage = 'uploads/jasa/';
            $gambar->move ($storage, $file_name);
            $data ['gambar'] =$storage .$file_name;
        }else {
            $data ['gambar'] = null;
        }

                    Alert::success('sukses', 'data berhasil DITAMBAH');
                    Jasa::create ($data);
                    return redirect ('/operator/jasa');

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
            'title' => 'Edit Jasa',
            'jasa' => Jasa::find ($id),
            'content' => 'operator/jasa/add'
        ];
        return view ('operator.jasa.add', $data ); 
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
        $jasa = Jasa::find($id);
         $data = $request -> validate ([
            'judul' => 'required',
            'deskripsi' => 'required ',

        ]);

        // upload gambar
        if ($request -> hasFile('gambar')) {
            if($jasa->gambar  != null){
                unlink($jasa->gambar);
            }


            $gambar = $request->file('gambar');
            $file_name = time ().'-'. $gambar -> getClientOriginalName ();

            $storage = 'uploads/jasa/';
            $gambar->move ($storage, $file_name);
            $data ['gambar'] =$storage .$file_name;
        }else {
            $data ['gambar'] = $jasa ->gambar;
        }

                    Alert::success('sukses', 'data berhasil diupdate');
                    $jasa->update($data);
                    return redirect ('/operator/jasa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasa = Jasa::find ($id);

            if($jasa->gambar != null){
            unlink($jasa->gambar);
                }

        Alert::success('sukses', 'data berhasil dihapus');
        $jasa->delete();
        return redirect ('/operator/jasa');
        
    }
}