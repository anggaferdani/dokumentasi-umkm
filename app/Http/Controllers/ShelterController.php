<?php

namespace App\Http\Controllers;

use App\Exports\ShelterExport;
use App\Models\Shelter;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ShelterController extends Controller
{
    public function index(Request $request) {
        $query = Shelter::with('umkms')->where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('wilayah') && !empty($request->input('wilayah'))) {
            $wilayah = $request->input('wilayah');
            $query->whereHas('wilayah', function ($q) use ($wilayah) {
                $q->where('id', $wilayah);
            });
        }

        if ($request->has('export') && $request->export == 'excel') {
            $fileName = 'shelter-' . now()->format('d-m-Y-H-i-s') . '.xlsx';
            return Excel::download(new ShelterExport($query->get()), $fileName);
        }
    
        if ($request->has('export') && $request->export == 'pdf') {
            $fileName = 'shelter-' . now()->format('d-m-Y-H-i-s') . '.pdf';
            $shelters = $query->get();
            $pdf = Pdf::loadView('backend.exports.shelter', compact('shelters'));
            return $pdf->download($fileName);
        }

        $shelters = $query->latest()->paginate(10);

        $wilayahs = Wilayah::where('status', true)->get();

        return view('backend.pages.shelter.index', compact(
            'shelters',
            'wilayahs',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'wilayah_id' => 'required',
                'nama' => 'required',
                'kapasitas' => 'required|integer',
            ]);
    
            $array = [
                'wilayah_id' => $request['wilayah_id'],
                'nama' => $request['nama'],
                'kapasitas' => $request['kapasitas'],
            ];

            Shelter::create($array);
    
            return redirect()->route('admin.shelter.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        try {
            $shelter = Shelter::find($id);
    
            $request->validate([
                'wilayah_id' => 'required',
                'nama' => 'required',
                'kapasitas' => 'required|integer',
            ]);

            $jumlahUMKM = $shelter->umkms()->count();

            if ($request['kapasitas'] < $jumlahUMKM) {
                return back()->with('error', 'Kapasitas tidak boleh kurang dari jumlah UMKM yang terdaftar di shelter ini (' . $jumlahUMKM . ' UMKM).');
            }
    
            $array = [
                'wilayah_id' => $request['wilayah_id'],
                'nama' => $request['nama'],
                'kapasitas' => $request['kapasitas'],
            ];
    
            $shelter->update($array);
    
            return redirect()->route('admin.shelter.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $shelter = Shelter::find($id);

            $shelter->update([
                'status' => false,
            ]);

            return redirect()->route('admin.shelter.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
