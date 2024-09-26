<?php

namespace App\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subdistrict extends Model
{
    use HasFactory;

    protected $table = 'subdistricts';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function district()
    {
        return $this->belongsTo(District::class, 'dis_id');
    }

    public function shelters()
    {
        return $this->hasMany(Shelter::class, 'kelurahan_id', 'subdis_id');
    }
}
