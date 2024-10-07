<?php

namespace App\Http\Controllers;

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
        $totalUMKMBerNote = UMKM::where('status', true)->whereNotNull('note')->count();
        $totalUMKMBerRetribusiLancar = UMKM::where('status', true)->where('retribusi', 'lancar')->count();
        $totalUMKMBerRetribusiTidakLancar = UMKM::where('status', true)->where('retribusi', 'tidak lancar')->count();
        $shelters = Shelter::with('district', 'subdistrict')->where('status', true)->latest()->paginate(3);
        
        return view('backend.pages.dashboard', compact(
            'totalShelter',
            'totalUMKM',
            'totalUMKMAktif',
            'totalUMKMTidakAktif',
            'totalUMKMBerSIP',
            'totalUMKMTidakBerSIP',
            'totalUMKMBerNote',
            'totalUMKMBerRetribusiLancar',
            'totalUMKMBerRetribusiTidakLancar',
            'shelters',
        ));
    }
}
