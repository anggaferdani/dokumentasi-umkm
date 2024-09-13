<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request) {
        $query = Kategori::where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('kategori', 'like', '%' . $search . '%');
            });
        }

        $kategoris = $query->latest()->paginate(10);

        return view('backend.pages.kategori.index', compact(
            'kategoris',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'kategori' => 'required',
            ]);
    
            $array = [
                'kategori' => $request['kategori'],
            ];

            Kategori::create($array);
    
            return redirect()->route('admin.kategori.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        try {
            $kategori = Kategori::find($id);
    
            $request->validate([
                'kategori' => 'required',
            ]);
    
            $array = [
                'kategori' => $request['kategori'],
            ];
    
            $kategori->update($array);
    
            return redirect()->route('admin.kategori.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $kategori = Kategori::find($id);

            $kategori->update([
                'status' => false,
            ]);

            return redirect()->route('admin.kategori.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
