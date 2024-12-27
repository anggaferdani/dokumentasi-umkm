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

    public function create() {
        return view('backend.pages.kategori.create');
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'kategori' => 'required',
            ], [
                'kategori.required' => 'Kolom kategori wajib diisi.',
            ]);
    
            $array = [
                'kategori' => $request['kategori'],
            ];

            Kategori::create($array);
    
            return back()->with('success', 'Data berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function show($id) {}

    public function edit($id) {
        $kategori = Kategori::find($id);

        return view('backend.pages.kategori.edit', compact(
            'kategori',
        ));
    }

    public function update(Request $request, $id) {
        try {
            $kategori = Kategori::find($id);
    
            $request->validate([
                'kategori' => 'required',
            ], [
                'kategori.required' => 'Kolom kategori wajib diisi.',
            ]);
    
            $array = [
                'kategori' => $request['kategori'],
            ];
    
            $kategori->update($array);
    
            return back()->with('success', 'Data berhasil diupdate');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy($id) {
        try {
            $kategori = Kategori::find($id);

            $kategori->update([
                'status' => false,
            ]);

            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }
}
