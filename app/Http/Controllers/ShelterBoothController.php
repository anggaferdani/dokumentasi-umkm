<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Booth;
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

    public function create() {}

    public function store($shelterId, Request $request) {
        try {
            $shelter = Shelter::where('id', $shelterId)->first();
            $currentBoothCount = Booth::where('shelter_id', $shelter->id)->count();
            if ($currentBoothCount >= $shelter->kapasitas) {
                return back()->with('error', 'Kapasitas shelter sudah penuh. Tidak dapat menambah booth baru.');
            }

            $request->validate([
                'shelter_id' => 'required',
                'umkm_id' => 'required|unique:booths,umkm_id',
                'nomor_booth' => [
                    'required',
                    'unique:booths,nomor_booth,NULL,id,shelter_id,' . $request->shelter_id
                ],
            ], [
                'umkm_id.unique' => 'UMKM ini sudah terdaftar di booth lain. Silakan pilih UMKM yang berbeda.',
                'nomor_booth.unique' => 'Nomor booth tidak tersedia di shelter ini. Silakan masukan nomor booth lain.'
            ]);
    
            $array = [
                'shelter_id' => $request['shelter_id'],
                'umkm_id' => $request['umkm_id'],
                'nomor_booth' => $request['nomor_booth'],
            ];

            Booth::create($array);
    
            return back()->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update($shelterId, Request $request, $id) {
        try {
            $booth = Booth::find($id);
    
            $request->validate([
                'shelter_id' => 'required',
                'umkm_id' => [
                    'required',
                    'unique:booths,umkm_id,' . $booth->id . ',id,shelter_id,' . $request->shelter_id
                ],
                'nomor_booth' => [
                    'required',
                    'unique:booths,nomor_booth,' . $booth->id . ',id,shelter_id,' . $request->shelter_id
                ],
            ], [
                'nomor_booth.unique' => 'Nomor booth tidak tersedia di shelter ini. Silakan masukan nomor booth lain.',
                'umkm_id.unique' => 'UMKM sudah terdaftar di booth ini. Silakan pilih UMKM lain.',
            ]);

            $array = [
                'shelter_id' => $request['shelter_id'],
                'umkm_id' => $request['umkm_id'],
                'nomor_booth' => $request['nomor_booth'],
            ];
    
            $booth->update($array);
    
            return back()->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function delete($shelterId, $id) {
        try {
            $booth = Booth::find($id);

            $booth->update([
                'umkm_id' => null,
                'nomor_booth' => null,
                'status' => false,
            ]);

            return back()->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
