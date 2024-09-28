<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use App\Models\UMKM;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalShelter = Shelter::where('status', true)->count();
        $totalUMKMYangMenempatiShelter = UMKM::where('status', true)->whereHas('booth')->count();
        $totalUMKMYangTidakMenempatiShelter = UMKM::where('status', true)->whereDoesntHave('booth')->count();
        $totalUMKM = UMKM::where('status', true)->count();
        $totalUMKMAktif = UMKM::where('aktif', true)->where('status', true)->count();
        $totalUMKMTidakAktif = UMKM::where('aktif', false)->where('status', true)->count();
        $totalUMKMBerSIP = UMKM::where('status', true)->where('surat_ijin_penempatan', 'ada')->count();
        $totalUMKMTidakBerSIP = UMKM::where('status', true)->where('surat_ijin_penempatan', 'tidak')->count();
        $totalUMKMBerRetribusiLancar = UMKM::where('status', true)->where('retribusi', 'lancar')->count();
        $totalUMKMBerRetribusiTidakLancar = UMKM::where('status', true)->where('retribusi', 'tidak lancar')->count();
        $shelters = Shelter::with('booths', 'district', 'subdistrict')->where('status', true)->latest()->paginate(3);
        
        return view('backend.pages.dashboard', compact(
            'totalShelter',
            'totalUMKMYangMenempatiShelter',
            'totalUMKMYangTidakMenempatiShelter',
            'totalUMKM',
            'totalUMKMAktif',
            'totalUMKMTidakAktif',
            'totalUMKMBerSIP',
            'totalUMKMTidakBerSIP',
            'totalUMKMBerRetribusiLancar',
            'totalUMKMBerRetribusiTidakLancar',
            'shelters',
        ));
    }
}
