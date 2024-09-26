<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Shelter;
use App\Models\Wilayah;
use App\Models\Kategori;
use App\Exports\UMKMExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class UMKMController extends Controller
{
    public function index(Request $request) {
        $query = UMKM::with('booth', 'booth.shelter', 'booth.shelter.wilayah')->where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('shift', 'like', '%' . $search . '%')
                    ->orWhere('jenis_dagangan', 'like', '%' . $search . '%');
            });
        }

        // if ($request->has('wilayah') && !empty($request->input('wilayah'))) {
        //     $wilayah = $request->input('wilayah');
        //     $query->whereHas('booth.shelter.wilayah', function ($q) use ($wilayah) {
        //         $q->where('id', $wilayah);
        //     });
        // }

        if ($request->has('shelter') && !empty($request->input('shelter'))) {
            $shelter = $request->input('shelter');
            $query->whereHas('booth.shelter', function ($q) use ($shelter) {
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
        $kategoris = Kategori::where('status', true)->get();
        $shelters = Shelter::where('status', true)->get();

        return view('backend.pages.umkm.index', compact(
            'umkms',
            'wilayahs',
            'kategoris',
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
                'shift' => 'required',
                'surat_ijin_penempatan' => 'required',
                'reribusi' => 'required',
                'kategori_id' => 'required',
                'aktif' => 'required',
            ]);

            $array = [
                'nama' => $request['nama'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'alamat' => $request['alamat'],
                'shift' => $request['shift'],
                'surat_ijin_penempatan' => $request['surat_ijin_penempatan'],
                'reribusi' => $request['reribusi'],
                'jenis_dagangan' => $request['jenis_dagangan'],
                'nomor_sip' => $request['nomor_sip'],
                'valid_sip' => $request['valid_sip'],
                'aktif' => $request['aktif'],
                'note' => $request['note'],
                'kategori_id' => $request['kategori_id'],
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
            'kategori_id' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'shift' => 'required',
            'surat_ijin_penempatan' => 'required',
            'reribusi' => 'required',
            'aktif' => 'required',
        ]);
        
        try {
            $umkm = UMKM::find($id);
    
            $array = [
                'nama' => $request['nama'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'alamat' => $request['alamat'],
                'kategori_id' => $request['kategori_id'],
                'shift' => $request['shift'],
                'surat_ijin_penempatan' => $request['surat_ijin_penempatan'],
                'reribusi' => $request['reribusi'],
                'jenis_dagangan' => $request['jenis_dagangan'],
                'nomor_sip' => $request['nomor_sip'],
                'valid_sip' => $request['valid_sip'],
                'aktif' => $request['aktif'],
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
