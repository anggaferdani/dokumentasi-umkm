<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function getSubdistricts(Request $request){
        $districtId = $request->input('district_id');
        $subdistricts = Subdistrict::where('dis_id', $districtId)->get();
        return response()->json($subdistricts);
    }
}
