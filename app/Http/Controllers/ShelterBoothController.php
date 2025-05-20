<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Shelter;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ShelterBoothController extends Controller
{
    public function index($shelterId, Request $request)
    {
        $shelter = Shelter::findOrFail($shelterId);

        $allUmkms = $shelter->umkms;

        $ditempatiPagi = 0;
        $ditempatiMalam = 0;
        $berSIPPagi = 0;
        $berSIPMalam = 0;

        foreach ($allUmkms as $umkm) {
            if ($umkm->shift == 'pagi' || $umkm->shift == 'pagi malam') {
                $ditempatiPagi += 1;
                if (isset($umkm->surat_ijin_penempatan) && $umkm->surat_ijin_penempatan === "ada") {
                     $berSIPPagi += 1;
                }
            }
            if ($umkm->shift == 'malam' || $umkm->shift == 'pagi malam') {
                $ditempatiMalam += 1;
                 if (isset($umkm->surat_ijin_penempatan) && $umkm->surat_ijin_penempatan === "ada") {
                     $berSIPMalam += 1;
                }
            }
        }
        $kosongPagi = $shelter->kapasitas - $ditempatiPagi;
        $kosongMalam = $shelter->kapasitas - $ditempatiMalam;

        $allBoothNumbers = collect(range(1, $shelter->kapasitas));

        $search = $request->input('search');
        $displayBoothNumbers = $allBoothNumbers->filter(function($boothNum) use ($search, $allUmkms) {
            if (empty($search)) {
                return true;
            }

            if (trim(strtolower($boothNum)) == trim(strtolower($search))) {
                 return true;
            }

            $matchingUmkm = $allUmkms->first(function($umkm) use ($search, $boothNum) {
                 return $umkm->nomor_booth == $boothNum && stripos($umkm->nama, $search) !== false;
            });

            return $matchingUmkm !== null;
        });

        $perPage = 10;

        $paginator = $this->paginateCollection($displayBoothNumbers, $request, $perPage);

        return view('backend.pages.booth.index', compact(
            'shelter',
            'paginator',
            'allUmkms',
            'search',
            'ditempatiPagi',
            'ditempatiMalam',
            'kosongPagi',
            'kosongMalam',
            'berSIPPagi',
            'berSIPMalam'
        ));
    }

    protected function paginateCollection(Collection $items, Request $request, $perPage = 10, $pageName = 'page')
    {
        $currentPage = $request->input($pageName, 1);
        $offset = ($currentPage - 1) * $perPage;
        $currentPageItems = $items->slice($offset, $perPage)->values();

        return new LengthAwarePaginator(
            $currentPageItems,
            $items->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
                'pageName' => $pageName,
            ]
        );
    }
}