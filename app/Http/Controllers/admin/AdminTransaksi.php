<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class AdminTransaksi extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Manajemen Transaksi',
            'transaksi' => Transaksi::with('barang')->get(),
            'content' => 'operator/transaksi/index'
        ];

        return view('operator.transaksi.index', $data);
    }

        public function create()
        {
            $data = [
                'title' => 'Tambah Transaksi',
                'barangs' => Barang::all(),
                'content' => 'operator/transaksi/add',
                'transaksi' => null, // Set transaksi ke null karena ini adalah mode tambah
            ];

            return view('operator.transaksi.add', $data);
        }


    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'barang_id' => 'required',
            'jumlah_terjual' => 'required|integer|min:1',
        ]);

        // Check if the requested quantity is available
        $barang = Barang::find($data['barang_id']);
        if ($barang->jumlah_barang < $data['jumlah_terjual']) {
            // Tampilkan notifikasi SweetAlert
            Alert::error('Gagal', 'Stok barang tidak mencukupi');
            return redirect('operator/transaksi/create'); // Kembali ke halaman tambah transaksi
        }

        // Calculate the total harga
        $totalHarga = $data['jumlah_terjual'] * $barang->harga_barang;

        // Create the transaction record
        $transaksi = Transaksi::create([
            'barang_id' => $data['barang_id'],
            'jumlah_terjual' => $data['jumlah_terjual'],
            'total_harga' => $totalHarga,
        ]);

        // Update the stock quantity
        $barang->jumlah_barang -= $data['jumlah_terjual'];
        $barang->save();

        Alert::success('Sukses', 'Transaksi berhasil');
        return redirect('/operator/transaksi');
    }


        public function edit($id)
        {
            $transaksi = Transaksi::find($id);
            if (!$transaksi) {
                Alert::error('Error', 'Transaksi tidak ditemukan');
                return redirect('/operator/transaksi');
            }

            $data = [
                'title' => 'Edit Transaksi',
                'transaksi' => $transaksi,
                'barangs' => Barang::all(),
                'content' => 'operator/transaksi/add',
            ];

            return view('operator.transaksi.add', $data);
        }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
        Alert::error('Error', 'Transaksi tidak ditemukan');
        return redirect("/operator/transaksi/{$id}/edit");
    }


        // Validate the request data
        $data = $request->validate([
            'barang_id' => 'required',
            'jumlah_terjual' => 'required|integer|min:1',
        ]);

        // Check if the requested quantity is available
        $barang = Barang::find($data['barang_id']);
        if ($barang->jumlah_barang < $data['jumlah_terjual']) {
            Alert::error('Gagal', 'Stok barang tidak mencukupi');
            return redirect("/operator/transaksi/{$id}/edit");
        }

        // Calculate the total harga
        $totalHarga = $data['jumlah_terjual'] * $barang->harga_barang;

        // Update the transaction record
        $transaksi->update([
            'barang_id' => $data['barang_id'],
            'jumlah_terjual' => $data['jumlah_terjual'],
            'total_harga' => $totalHarga,
        ]);

        // Update the stock quantity
        $barang->jumlah_barang += $transaksi->jumlah_terjual; // Undo previous quantity
        $barang->jumlah_barang -= $data['jumlah_terjual']; // Deduct the new quantity
        $barang->save();

        Alert::success('Sukses', 'Transaksi berhasil diupdate');
        return redirect('/operator/transaksi');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            Alert::error('Error', 'Transaksi tidak ditemukan');
            return redirect('/operator/transaksi');
        }

        // Restore the stock quantity
        $barang = $transaksi->barang;
        $barang->jumlah_barang += $transaksi->jumlah_terjual;
        $barang->save();

        $transaksi->delete();

        Alert::success('Sukses', 'Transaksi berhasil dihapus');
        return redirect('/operator/transaksi');
    }
}