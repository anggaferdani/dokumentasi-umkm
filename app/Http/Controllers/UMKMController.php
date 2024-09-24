<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Shelter;
use App\Models\Wilayah;
use App\Exports\UMKMExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class UMKMController extends Controller
{
    public function index(Request $request) {
        $query = UMKM::with('shelter', 'shelter.wilayah')->where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('shift', 'like', '%' . $search . '%')
                    ->orWhere('jenis_dagangan', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('wilayah') && !empty($request->input('wilayah'))) {
            $wilayah = $request->input('wilayah');
            $query->whereHas('shelter.wilayah', function ($q) use ($wilayah) {
                $q->where('id', $wilayah);
            });
        }

        if ($request->has('shelter') && !empty($request->input('shelter'))) {
            $shelter = $request->input('shelter');
            $query->whereHas('shelter', function ($q) use ($shelter) {
                $q->where('id', $shelter);
            });
        }

        if ($request->has('export') && $request->export == 'excel') {
            $fileName = 'umkm-' . now()->format('d-m-Y-H-i-s') . '.xlsx';
            return Excel::download(new UMKMExport($query->get()), $fileName);
        }
    
        if ($request->has('export') && $request->export == 'pdf') {
            $fileName = 'umkm-' . now()->format('d-m-Y-H-i-s') . '.pdf';
            $umkms = $query->get();
            $pdf = Pdf::loadView('backend.exports.umkm', compact('umkms'))->setPaper('a4', 'landscape');
            return $pdf->download($fileName);
        }

        $umkms = $query->latest()->paginate(10);

        $wilayahs = Wilayah::where('status', true)->get();
        $shelters = Shelter::where('status', true)
            ->withCount('umkms')
            ->latest()
            ->get()
            ->map(function ($shelter) {
                $shelter->is_full = $shelter->umkms_count >= $shelter->kapasitas;
                $shelter->current_count = $shelter->umkms_count;
                $shelter->total_capacity = $shelter->kapasitas;
                return $shelter;
            });

        return view('backend.pages.umkm.index', compact(
            'umkms',
            'wilayahs',
            'shelters',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'shelter_id' => 'required',
                'shift' => 'required',
                'surat_ijin_penempatan' => 'required',
                'reribusi' => 'required',
            ]);

            $nomorShelter = UMKM::where('shelter_id', $request['shelter_id'])->max('nomor_shelter') + 1;
    
            $array = [
                'nama' => $request['nama'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'alamat' => $request['alamat'],
                'shelter_id' => $request['shelter_id'],
                'nomor_shelter' => $nomorShelter,
                'shift' => $request['shift'],
                'surat_ijin_penempatan' => $request['surat_ijin_penempatan'],
                'reribusi' => $request['reribusi'],
                'jenis_dagangan' => $request['jenis_dagangan'],
                'nomor_sip' => $request['nomor_sip'],
                'valid_sip' => $request['valid_sip'],
                'note' => $request['note'],
            ];

            UMKM::create($array);
    
            return redirect()->route('admin.umkm.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'shelter_id' => 'required',
            'shift' => 'required',
            'surat_ijin_penempatan' => 'required',
            'reribusi' => 'required',
        ]);
        
        try {
            $umkm = UMKM::find($id);
    
            if ($umkm->shelter_id != $request['shelter_id']) {
                $nomorShelter = UMKM::where('shelter_id', $request['shelter_id'])->max('nomor_shelter') + 1;
            } else {
                $nomorShelter = $umkm->nomor_shelter;
            }
    
            $array = [
                'nama' => $request['nama'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'alamat' => $request['alamat'],
                'shelter_id' => $request['shelter_id'],
                'nomor_shelter' => $nomorShelter,
                'shift' => $request['shift'],
                'surat_ijin_penempatan' => $request['surat_ijin_penempatan'],
                'reribusi' => $request['reribusi'],
                'jenis_dagangan' => $request['jenis_dagangan'],
                'nomor_sip' => $request['nomor_sip'],
                'valid_sip' => $request['valid_sip'],
                'note' => $request['note'],
            ];
    
            $umkm->update($array);
    
            return redirect()->route('admin.umkm.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $umkm = UMKM::find($id);

            $umkm->update([
                'status' => false,
            ]);

            return redirect()->route('admin.umkm.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
