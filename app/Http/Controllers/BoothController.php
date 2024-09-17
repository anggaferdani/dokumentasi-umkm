<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\Shelter;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class BoothController extends Controller
{
    public function index(Request $request) {
        $query = Booth::with('shelter', 'shelter.wilayah')->where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('alamat', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('wilayah') && !empty($request->input('wilayah'))) {
            $wilayah = $request->input('wilayah');
            $query->whereHas('shelter.wilayah', function ($q) use ($wilayah) {
                $q->where('id', $wilayah);
            });
        }

        if ($request->has('shelter') && !empty($request->input('shelter'))) {
            $shelter = $request->input('shelter');
            $query->whereHas('shelter', function ($q) use ($shelter) {
                $q->where('id', $shelter);
            });
        }

        $booths = $query->latest()->paginate(10);

        $wilayahs = Wilayah::where('status', true)->get();
        $shelters = Shelter::where('status', true)->get();

        return view('backend.pages.booth.index', compact(
            'booths',
            'wilayahs',
            'shelters',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'shelter_id' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
            ]);
    
            $array = [
                'shelter_id' => $request['shelter_id'],
                'nama' => $request['nama'],
                'alamat' => $request['alamat'],
            ];

            Booth::create($array);
    
            return redirect()->route('admin.booth.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        try {
            $booth = Booth::find($id);
    
            $request->validate([
                'shelter_id' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
            ]);
    
            $array = [
                'shelter_id' => $request['shelter_id'],
                'nama' => $request['nama'],
                'alamat' => $request['alamat'],
            ];
    
            $booth->update($array);
    
            return redirect()->route('admin.booth.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $booth = Booth::find($id);

            $booth->update([
                'status' => false,
            ]);

            return redirect()->route('admin.booth.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
