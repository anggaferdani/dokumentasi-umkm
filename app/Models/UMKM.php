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

    public function shelter() {
        return $this->belongsTo(Shelter::class, 'shelter_id');
    }

    public function produks() {
        return $this->hasMany(Produk::class);
    }
}
