<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
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
        $query = Produk::with('umkm', 'umkm.shelter')->where('status', true);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi_produk', 'like', '%' . $search . '%');
            })
            ->orWhereHas('umkm.kategori', function ($q) use ($search) {
                $q->where('kategori', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('shelter')) {
            $shelter = $request->input('shelter');
            $query->whereHas('umkm.shelter', function ($q) use ($shelter) {
                $q->where('id', $shelter);
            });
        }

        if ($request->filled('umkm')) {
            $umkm = $request->input('umkm');
            $query->whereHas('umkm', function ($q) use ($umkm) {
                $q->where('id', $umkm);
            });
        }

        $produks = $query->latest()->paginate(10);
        $wilayahs = Wilayah::where('status', true)->get();
        $shelters = Shelter::where('status', true)->get();
        $umkms = UMKM::where('status', true)->get();
        return view('frontend.pages.produk', compact(
            'produks',
            'wilayahs',
            'shelters',
            'umkms',
        ));
    }
}
