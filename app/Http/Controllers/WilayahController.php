<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index(Request $request) {
        $query = Wilayah::where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
            });
        }

        $wilayahs = $query->latest()->paginate(10);

        return view('backend.pages.wilayah.index', compact(
            'wilayahs',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'nama' => 'required',
            ]);
    
            $array = [
                'nama' => $request['nama'],
            ];

            Wilayah::create($array);
    
            return redirect()->route('admin.wilayah.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        try {
            $wilayah = Wilayah::find($id);
    
            $request->validate([
                'nama' => 'required',
            ]);
    
            $array = [
                'nama' => $request['nama'],
            ];
    
            $wilayah->update($array);
    
            return redirect()->route('admin.wilayah.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $wilayah = Wilayah::find($id);

            $wilayah->update([
                'status' => false,
            ]);

            return redirect()->route('admin.wilayah.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
