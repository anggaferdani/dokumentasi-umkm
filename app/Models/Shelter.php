<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    use HasFactory;

    protected $table = 'shelters';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function umkms() {
        return $this->hasMany(UMKM::class);
    }

    public function subdistrict() {
        return $this->belongsTo(Subdistrict::class, 'kelurahan_id', 'id');
    }
}
