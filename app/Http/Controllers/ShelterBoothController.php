<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Shelter;
use Illuminate\Http\Request;

class ShelterBoothController extends Controller
{
    public function index($shelterId, Request $request) {
        if ($shelterId) {
            $query = UMKM::where('shelter_id', $shelterId);
    
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nomor_booth', 'like', '%' . $search . '%');
                });
            }

            $shelter = Shelter::where('id', $shelterId)->first();
            $umkms = $query->latest()->paginate(10);
        
            return view('backend.pages.booth.index', compact(
                'shelter',
                'umkms',
            ));
        } else {
            return back();
        }
    }
}
