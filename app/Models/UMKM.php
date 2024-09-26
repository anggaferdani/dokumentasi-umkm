<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;

    protected $table = 'umkms';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function produks() {
        return $this->hasMany(Produk::class);
    }

    public function booth() {
        return $this->hasOne(Booth::class, 'umkm_id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
