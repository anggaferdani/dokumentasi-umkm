<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use App\Models\Wilayah;
use App\Models\District;
use Illuminate\Http\Request;
use App\Exports\ShelterExport;
use App\Models\Subdistrict;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ShelterController extends Controller
{
    public function index(Request $request) {
        $query = Shelter::with('subdistrict.district', 'subdistrict')->where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
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

        return view('backend.pages.shelter.index', compact(
            'shelters',
        ));
    }

    public function create() {
        $districts = District::where('regency_id', '3372')->get();
        $districtIds = $districts->pluck('id');
        $subdistricts = Subdistrict::whereIn('district_id', $districtIds)->get();

        return view('backend.pages.shelter.create', compact(
            'districts',
            'subdistricts',
        ));
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'nama' => 'required',
                'kapasitas' => 'required|integer',
                'alamat' => 'required',
                'kecamatan_id' => 'required',
                'kelurahan_id' => 'required',
            ], [
                'nama.required' => 'Kolom nama wajib diisi.',
                'kapasitas.required' => 'Kolom kapasitas wajib diisi.',
                'kapasitas.integer' => 'Kapasitas harus berupa angka bulat.',
                'alamat.required' => 'Kolom alamat wajib diisi.',
                'kecamatan_id.required' => 'Kolom ID Kecamatan wajib diisi.',
                'kelurahan_id.required' => 'Kolom ID Kelurahan wajib diisi.',
            ]);
    
            $array = [
                'nama' => $request['nama'],
                'kapasitas' => $request['kapasitas'],
                'alamat' => $request['alamat'],
                'kelurahan_id' => $request['kelurahan_id'],
            ];

            Shelter::create($array);

            return redirect()->route('admin.shelter.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function show($id) {}

    public function edit($id) {
        $shelter = Shelter::find($id);
        $districts = District::where('regency_id', '3372')->get();
        $districtIds = $districts->pluck('id');
        $subdistricts = Subdistrict::whereIn('district_id', $districtIds)->get();
        $kelurahan = Subdistrict::where('id', $shelter->kelurahan_id)->first();

        return view('backend.pages.shelter.edit', compact(
            'shelter',
            'districts',
            'subdistricts',
            'kelurahan',
        ));
    }

    public function update(Request $request, $id) {
        try {
            $shelter = Shelter::find($id);
    
            $request->validate([
                'nama' => 'required',
                'kapasitas' => 'required|integer',
                'alamat' => 'required',
                'kecamatan_id' => 'required',
                'kelurahan_id' => 'required',
            ], [
                'nama.required' => 'Kolom nama wajib diisi.',
                'kapasitas.required' => 'Kolom kapasitas wajib diisi.',
                'kapasitas.integer' => 'Kapasitas harus berupa angka bulat.',
                'alamat.required' => 'Kolom alamat wajib diisi.',
                'kecamatan_id.required' => 'Kolom ID Kecamatan wajib diisi.',
                'kelurahan_id.required' => 'Kolom ID Kelurahan wajib diisi.',
            ]);

            $jumlahActiveUMKMs = $shelter->umkms()->where('status', true)->count();
            $jumlahUMKM = $shelter->umkms()->count();

            if ($request['kapasitas'] < $jumlahActiveUMKMs) {
                return back()->with('error', 'Kapasitas tidak boleh kurang dari jumlah booth aktif yang terdaftar di shelter ini (' . $jumlahActiveUMKMs . ' booth).');
            }

            if ($request['kapasitas'] < $jumlahUMKM) {
                return back()->with('error', 'Kapasitas tidak boleh kurang dari jumlah UMKM yang terdaftar di shelter ini (' . $jumlahUMKM . ' UMKM).');
            }
    
            $array = [
                'nama' => $request['nama'],
                'kapasitas' => $request['kapasitas'],
                'alamat' => $request['alamat'],
                'kelurahan_id' => $request['kelurahan_id'],
            ];
    
            $shelter->update($array);
    
            return back()->with('success', 'Data berhasil diupdate');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy($id) {
        try {
            $shelter = Shelter::find($id);

            $shelter->update([
                'status' => false,
            ]);

            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }
}
