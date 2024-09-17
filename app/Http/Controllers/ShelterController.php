<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class ShelterController extends Controller
{
    public function index(Request $request) {
        $query = Shelter::where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('wilayah') && !empty($request->input('wilayah'))) {
            $wilayah = $request->input('wilayah');
            $query->whereHas('wilayah', function ($q) use ($wilayah) {
                $q->where('id', $wilayah);
            });
        }

        $shelters = $query->latest()->paginate(10);

        $wilayahs = Wilayah::where('status', true)->get();

        return view('backend.pages.shelter.index', compact(
            'shelters',
            'wilayahs',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'wilayah_id' => 'required',
                'nama' => 'required',
            ]);
    
            $array = [
                'wilayah_id' => $request['wilayah_id'],
                'nama' => $request['nama'],
            ];

            Shelter::create($array);
    
            return redirect()->route('admin.shelter.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        try {
            $shelter = Shelter::find($id);
    
            $request->validate([
                'wilayah_id' => 'required',
                'nama' => 'required',
            ]);
    
            $array = [
                'wilayah_id' => $request['wilayah_id'],
                'nama' => $request['nama'],
            ];
    
            $shelter->update($array);
    
            return redirect()->route('admin.shelter.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $shelter = Shelter::find($id);

            $shelter->update([
                'status' => false,
            ]);

            return redirect()->route('admin.shelter.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
