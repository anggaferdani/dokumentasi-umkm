<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayahs';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function shelters() {
        return $this->hasMany(Shelter::class);
    }
}
