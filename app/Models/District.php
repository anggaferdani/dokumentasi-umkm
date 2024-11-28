<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class, 'dis_id', 'dis_id');
    }

    public function shelters()
    {
        return $this->hasMany(Shelter::class, 'kecamatan_id', 'dis_id');
    }
}
