<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Shelter;
use App\Models\UMKM;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalShelter = Shelter::where('status', true)->count();
        $totalUMKM = UMKM::where('status', true)->count();
        $totalUMKMAktif = UMKM::where('aktif', true)->where('status', true)->count();
        $totalUMKMTidakAktif = UMKM::where('aktif', false)->where('status', true)->count();
        $totalUMKMBerSIP = UMKM::where('status', true)->where('surat_ijin_penempatan', 'ada')->count();
        $totalUMKMTidakBerSIP = UMKM::where('status', true)->where('surat_ijin_penempatan', 'tidak')->count();
        $totalProducts = Produk::where('status', true)->count();
        $totalUMKMBerRetribusiLancar = UMKM::where('status', true)->where('retribusi', 'lancar')->count();
        $totalUMKMBerRetribusiTidakLancar = UMKM::where('status', true)->where('retribusi', 'tidak lancar')->count();
        $shelters = Shelter::withCount('umkms')->where('status', true)->get();
        $shelterNames = $shelters->pluck('nama');
        $umkmCounts = $shelters->pluck('umkms_count');
        return view('backend.pages.dashboard', compact(
            'totalShelter',
            'totalUMKM',
            'totalUMKMAktif',
            'totalUMKMTidakAktif',
            'totalUMKMBerSIP',
            'totalUMKMTidakBerSIP',
            'totalProducts',
            'totalUMKMBerRetribusiLancar',
            'totalUMKMBerRetribusiTidakLancar',
            'shelters',
            'shelterNames',
            'umkmCounts',
            'totalUMKM',
            'totalUMKMAktif',
            'totalUMKMTidakAktif'
        ));
    }
}
