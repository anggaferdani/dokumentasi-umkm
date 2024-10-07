<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Shelter;
use App\Models\Wilayah;
use App\Models\Kategori;
use App\Exports\UMKMExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class UMKMController extends Controller
{
    public function index(Request $request) {
        $query = UMKM::with('kategori')->where('status', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('shift', 'like', '%' . $search . '%')
                    ->orWhere('jenis_dagangan', 'like', '%' . $search . '%');
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
        $kategoris = Kategori::where('status', true)->get();
        $shelters = Shelter::where('status', true)
            ->with(['umkms'])
            ->latest()
            ->get()
            ->map(function ($shelter) {
                $shelter->current_count = $shelter->umkms->reduce(function ($carry, $umkm) {
                    if ($umkm->shift == 'pagi malam') {
                        return $carry + 2;
                    } elseif ($umkm->shift == 'pagi' || $umkm->shift == 'malam') {
                        return $carry + 1;
                    }
                    return $carry;
                }, 0);

                $shelter->is_full = $shelter->current_count >= $shelter->kapasitas;

                $shelter->total_capacity = $shelter->kapasitas;

                return $shelter;
            });

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
                'shelter_id' => 'required',
                'nomor_booth' => [
                    'required',
                    Rule::unique('umkms')->where(function ($query) use ($request) {
                        return $query->where('shelter_id', $request->shelter_id);
                    })
                ],
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'shift' => 'required',
                'surat_ijin_penempatan' => 'required',
                'retribusi' => 'required',
                'kategori_id' => 'required',
                'aktif' => 'required',
            ], [
                'shelter_id.required' => 'Shelter wajib diisi.',
                'nomor_booth.required' => 'Nomor Booth wajib diisi.',
                'nomor_booth.unique' => 'Nomor Booth ini sudah digunakan untuk Shelter yang dipilih.',
                'nama.required' => 'Nama wajib diisi.',
                'tempat_lahir.required' => 'Tempat Lahir wajib diisi.',
                'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi.',
                'tanggal_lahir.date' => 'Tanggal Lahir harus berupa tanggal yang valid.',
                'alamat.required' => 'Alamat wajib diisi.',
                'shift.required' => 'Shift wajib diisi.',
                'surat_ijin_penempatan.required' => 'Surat Ijin Penempatan wajib diisi.',
                'retribusi.required' => 'Retribusi wajib diisi.',
                'retribusi.numeric' => 'Retribusi harus berupa angka.',
                'kategori_id.required' => 'Kategori wajib diisi.',
                'aktif.required' => 'Status aktif wajib diisi.',
                'aktif.boolean' => 'Status aktif harus berupa true atau false.',
            ]);

            $array = [
                'shelter_id' => $request['shelter_id'],
                'nomor_booth' => $request['nomor_booth'],
                'nama' => $request['nama'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'alamat' => $request['alamat'],
                'shift' => $request['shift'],
                'surat_ijin_penempatan' => $request['surat_ijin_penempatan'],
                'retribusi' => $request['retribusi'],
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
        try {
            $umkm = UMKM::find($id);
    
            $request->validate([
                'shelter_id' => 'required',
                'nomor_booth' => [
                    'required',
                    Rule::unique('umkms')->where(function ($query) use ($request) {
                        return $query->where('shelter_id', $request->shelter_id);
                    })->ignore($umkm->id)
                ],
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'kategori_id' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'shift' => 'required',
                'surat_ijin_penempatan' => 'required',
                'retribusi' => 'required',
                'aktif' => 'required',
            ], [
                'shelter_id.required' => 'Shelter wajib diisi.',
                'nomor_booth.required' => 'Nomor Booth wajib diisi.',
                'nomor_booth.unique' => 'Nomor Booth ini sudah digunakan di Shelter yang dipilih.',
                'nama.required' => 'Nama wajib diisi.',
                'tempat_lahir.required' => 'Tempat Lahir wajib diisi.',
                'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi.',
                'tanggal_lahir.date' => 'Tanggal Lahir harus berupa tanggal yang valid.',
                'alamat.required' => 'Alamat wajib diisi.',
                'shift.required' => 'Shift wajib diisi.',
                'surat_ijin_penempatan.required' => 'Surat Ijin Penempatan wajib diisi.',
                'retribusi.required' => 'Retribusi wajib diisi.',
                'retribusi.numeric' => 'Retribusi harus berupa angka.',
                'kategori_id.required' => 'Kategori wajib diisi.',
                'aktif.required' => 'Status aktif wajib diisi.',
                'aktif.boolean' => 'Status aktif harus berupa true atau false.',
            ]);

            $array = [
                'shelter_id' => $request['shelter_id'],
                'nomor_booth' => $request['nomor_booth'],
                'nama' => $request['nama'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'alamat' => $request['alamat'],
                'kategori_id' => $request['kategori_id'],
                'shift' => $request['shift'],
                'surat_ijin_penempatan' => $request['surat_ijin_penempatan'],
                'retribusi' => $request['retribusi'],
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
