<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $table = 'reg_districts';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class);
    }
}
