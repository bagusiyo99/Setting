<?php
namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminBarang extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Manajemen Barang',
            'barang' => Barang::get(),
            'content' => 'operator.barang.index',
        ];

        return view('operator.barang.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Barang',
            'content' => 'operator.barang.add',
        ];

        return view('operator.barang.add', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . '-' . $gambar->getClientOriginalName();

            $storage = 'uploads/barang/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        }

        Barang::create([
            'nama_barang' => $data['nama_barang'],
            'jumlah_barang' => $data['jumlah_barang'],
            'harga_barang' => str_replace(['Rp', '.', ','], '', $data['harga_barang']),
            'gambar' => $data['gambar'],
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');

        return redirect('/operator/barang');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Barang',
            'barang' => Barang::find($id),
            'content' => 'operator.barang.add',
        ];

        return view('operator.barang.add', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $barang = Barang::find($id);
        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($barang->gambar != null) {
                unlink($barang->gambar);
            }

            $gambar = $request->file('gambar');
            $file_name = time() . '-' . $gambar->getClientOriginalName();

            $storage = 'uploads/barang/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        } else {
            $data['gambar'] = $barang->gambar;
        }

        $barang->update([
            'nama_barang' => $data['nama_barang'],
            'jumlah_barang' => $data['jumlah_barang'],
            'harga_barang' => str_replace(['Rp', '.', ','], '', $data['harga_barang']),
            'gambar' => $data['gambar'],
        ]);

        Alert::success('Sukses', 'Data berhasil diupdate');

        return redirect('/operator/barang');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);

        if ($barang->gambar != null) {
            unlink($barang->gambar);
        }

        Alert::success('Sukses', 'Data berhasil dihapus');
        $barang->delete();

        return redirect('/operator/barang');
    }
}
