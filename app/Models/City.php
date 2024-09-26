<?php

namespace App\Models;

use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function province()
    {
        return $this->belongsTo(Province::class, 'prov_id');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'city_id');
    }
}
