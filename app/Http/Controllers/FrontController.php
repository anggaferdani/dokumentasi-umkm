<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Partner;
use App\Models\Profile;
use App\Models\UMKM;
use App\Models\WhyTradersChooseUs;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function umkm(Request $request) {
        return view('frontend.pages.umkm');
    }

    public function product(Request $request) {
        $query = UMKM::where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nama_produk', 'like', '%' . $search . '%')
                  ->orWhere('tempat_usaha', 'like', '%' . $search . '%');
            });

            $query->orWhereHas('kategori', function ($q) use ($search) {
                $q->where('kategori', 'like', '%' . $search . '%');
            });
        }

        $umkms = $query->latest()->paginate(10);
        return view('frontend.pages.product', compact(
            'umkms',
        ));
    }
}
