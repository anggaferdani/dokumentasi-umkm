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

    public function booths() {
        return $this->hasMany(Booth::class);
    }

    public function district() {
        return $this->belongsTo(District::class, 'kecamatan_id', 'dis_id');
    }

    public function subdistrict() {
        return $this->belongsTo(Subdistrict::class, 'kelurahan_id', 'subdis_id');
    }
}
