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

    public function wilayah() {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }

    public function umkms() {
        return $this->hasMany(UMKM::class);
    }
}