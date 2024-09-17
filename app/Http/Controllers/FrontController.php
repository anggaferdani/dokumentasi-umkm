<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use App\Models\Produk;
use App\Models\Shelter;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        return view('frontend.pages.index');
    }

    public function produk(Request $request) {
        $query = Produk::where('status', true);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi_produk', 'like', '%' . $search . '%');
            })
            ->orWhereHas('kategori', function ($q) use ($search) {
                $q->where('kategori', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('wilayah')) {
            $wilayah = $request->input('wilayah');
            $query->whereHas('booth.shelter.wilayah', function ($q) use ($wilayah) {
                $q->where('id', $wilayah);
            });
        }

        if ($request->filled('shelter')) {
            $shelter = $request->input('shelter');
            $query->whereHas('booth.shelter', function ($q) use ($shelter) {
                $q->where('id', $shelter);
            });
        }

        if ($request->filled('booth')) {
            $booth = $request->input('booth');
            $query->whereHas('booth', function ($q) use ($booth) {
                $q->where('id', $booth);
            });
        }

        $produks = $query->latest()->paginate(10);
        $wilayahs = Wilayah::where('status', true)->get();
        $shelters = Shelter::where('status', true)->get();
        $booths = Booth::where('status', true)->get();
        return view('frontend.pages.produk', compact(
            'produks',
            'wilayahs',
            'shelters',
            'booths',
        ));
    }
}
