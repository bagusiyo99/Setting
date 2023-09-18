<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

        // Definisikan relasi dengan model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
