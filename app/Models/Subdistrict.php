<?php

namespace App\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subdistrict extends Model
{
    use HasFactory;

    protected $table = 'reg_villages';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function shelters()
    {
        return $this->hasMany(Shelter::class);
    }
}
