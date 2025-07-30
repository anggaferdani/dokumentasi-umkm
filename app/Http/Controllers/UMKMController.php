<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Produk;
use App\Models\Shelter;
use App\Models\Wilayah;
use App\Models\Kategori;
use App\Exports\UMKMExport;
use Illuminate\Http\Request;
use App\Exports\ProdukExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class UMKMController extends Controller
{
    public function produk(Request $request, $id) {
        $umkm = UMKM::where('id', $id)->first();
        $query = Produk::where('umkm_id', $umkm->id)->where('status', 1);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi_produk', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('shelter') && !empty($request->input('shelter'))) {
            $shelter = $request->input('shelter');
            $query->whereHas('umkm.shelter', function ($q) use ($shelter) {
                $q->where('id', $shelter);
            });
        }

        if ($request->has('umkm') && !empty($request->input('umkm'))) {
            $umkm = $request->input('umkm');
            $query->whereHas('umkm', function ($q) use ($umkm) {
                $q->where('id', $umkm);
            });
        }

        if ($request->has('export') && $request->export == 'excel') {
            $fileName = 'produk-' . now()->format('d-m-Y-H-i-s') . '.xlsx';
            return Excel::download(new ProdukExport($query->get()), $fileName);
        }
    
        if ($request->has('export') && $request->export == 'pdf') {
            $fileName = 'produk-' . now()->format('d-m-Y-H-i-s') . '.pdf';
            $produks = $query->get();
            $pdf = Pdf::loadView('backend.exports.produk', compact('produks'));
            return $pdf->download($fileName);
        }

        $produks = $query->latest()->paginate(10);
        return view('backend.pages.umkm.produk', compact(
            'umkm',
            'produks',
        ));
    }

    public function produkCreate($id) {
        $umkm = UMKM::find($id);
        $shelters = Shelter::where('status', true)->get();
        $umkms = UMKM::with('shelter')->where('status', true)->get();

        return view('backend.pages.umkm.produk-create', compact(
            'umkm',
            'shelters',
            'umkms',
        ));
    }

    public function produkStore(Request $request, $id) {
        try {
            $umkm = UMKM::find($id);
            
            $request->validate([
                'nama_produk' => 'required',
                'foto_produk' => 'nullable|file|mimes:png,jpg,jpeg|max:150',
                'deskripsi_produk' => 'required',
            ], [
                'nama_produk.required' => 'Nama produk wajib diisi.',
                'foto_produk.required' => 'Foto produk wajib diunggah.',
                'foto_produk.file' => 'Yang diunggah harus berupa file.',
                'foto_produk.mimes' => 'Foto produk hanya boleh berformat PNG, JPG, atau JPEG.',
                'foto_produk.image' => 'Foto produk harus berupa gambar.',
                'foto_produk.max' => 'Foto produk maksimal 150KB.',
                'deskripsi_produk.required' => 'Deskripsi produk wajib diisi.',
            ]);
    
            $array = [
                'umkm_id' => $id,
                'deskripsi_produk' => $request['deskripsi_produk'],
                'nama_produk' => $request['nama_produk'],
                'foto_produk' => $this->handleFileUpload($request->file('foto_produk'), 'images/produk/foto-produk/'),
            ];

            Produk::create($array);
    
            return redirect()->route('admin.umkm.produk', $umkm->id)->with('success', 'Data berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function produkEdit($id, $produk_id) {
        $umkm = UMKM::find($id);
        $produk = Produk::find($produk_id);
        $shelters = Shelter::where('status', true)->get();
        $umkms = UMKM::with('shelter')->where('status', true)->get();

        return view('backend.pages.umkm.produk-edit', compact(
            'umkm',
            'produk',
            'shelters',
            'umkms',
        ));
    }

    public function produkUpdate(Request $request, $id, $produk_id) {
        try {
            $produk = Produk::find($produk_id);
    
            $request->validate([
                'nama_produk' => 'required',
                'foto_produk' => 'nullable|file|mimes:png,jpg,jpeg|max:150',
                'deskripsi_produk' => 'required',
            ], [
                'nama_produk.required' => 'Nama produk wajib diisi.',
                'foto_produk.file' => 'Foto produk harus berupa file.',
                'foto_produk.mimes' => 'Foto produk harus berformat PNG, JPG, atau JPEG.',
                'foto_produk.max' => 'Ukuran foto produk maksimal 150KB.',
                'deskripsi_produk.required' => 'Deskripsi produk wajib diisi.',
            ]);
    
            $array = [
                'nama_produk' => $request['nama_produk'],
                'deskripsi_produk' => $request['deskripsi_produk'],
            ];

            if ($request->hasFile('foto_produk')) {
                $array['foto_produk'] = $this->handleFileUpload($request->file('foto_produk'), 'images/produk/foto-produk/');
            }
    
            $produk->update($array);
    
            return back()->with('success', 'Data berhasil diupdate');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function produkDestroy($id, $produk_id) {
        try {
            $produk = Produk::find($produk_id);

            $produk->update([
                'status' => false,
            ]);

            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    private function handleFileUpload($file, $path)
    {
        if ($file) {
            $fileName = date('YmdHis') . rand(999, 9999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $fileName);
            return $fileName;
        }
        return null;
    }

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

        $shelters = Shelter::where('status', true)
            ->with(['umkms'])
            ->latest()
            ->get()
            ->map(function ($shelter) {
                // Hitung jumlah UMKM per shift
                $countPagi = $shelter->umkms->filter(function ($umkm) {
                    return $umkm->shift === 'pagi' || $umkm->shift === 'pagi malam';
                })->count();

                $countMalam = $shelter->umkms->filter(function ($umkm) {
                    return $umkm->shift === 'malam' || $umkm->shift === 'pagi malam';
                })->count();

                // Tentukan apakah kapasitas penuh
                $shelter->is_full_pagi = $countPagi >= $shelter->kapasitas;
                $shelter->is_full_malam = $countMalam >= $shelter->kapasitas;

                // Tentukan apakah masih ada kapasitas yang tersisa untuk "pagi malam"
                $shelter->can_select_pagi_malam = ($countPagi < $shelter->kapasitas) && ($countMalam < $shelter->kapasitas);

                // Simpan data tambahan
                $shelter->count_pagi = $countPagi;
                $shelter->count_malam = $countMalam;
                $shelter->total_capacity = $shelter->kapasitas;

                // Hitung status penggunaan booth
                $boothStatus = [];
                foreach ($shelter->umkms as $umkm) {
                    $booth = $umkm->nomor_booth;
                    if (!isset($boothStatus[$booth])) {
                        $boothStatus[$booth] = ['pagi' => false, 'malam' => false];
                    }

                    if ($umkm->shift === 'pagi' || $umkm->shift === 'pagi malam') {
                        $boothStatus[$booth]['pagi'] = true;
                    }
                    if ($umkm->shift === 'malam' || $umkm->shift === 'pagi malam') {
                        $boothStatus[$booth]['malam'] = true;
                    }
                }
                $shelter->booth_status = $boothStatus;

                return $shelter;
            });

        return view('backend.pages.umkm.index', compact(
            'umkms',
            'shelters',
        ));
    }

    public function create() {
        $kategoris = Kategori::where('status', 1)->get();
        $shelters = Shelter::where('status', 1)
            ->with(['umkms' => function ($query) {
                $query->where('status', 1);
            }])
            ->latest()
            ->get()
            ->map(function ($shelter) {
                // Hitung jumlah UMKM per shift
                $countPagi = $shelter->umkms->filter(function ($umkm) {
                    return $umkm->shift === 'pagi' || $umkm->shift === 'pagi malam';
                })->count();

                $countMalam = $shelter->umkms->filter(function ($umkm) {
                    return $umkm->shift === 'malam' || $umkm->shift === 'pagi malam';
                })->count();

                // Tentukan apakah kapasitas penuh
                $shelter->is_full_pagi = $countPagi >= $shelter->kapasitas;
                $shelter->is_full_malam = $countMalam >= $shelter->kapasitas;

                // Tentukan apakah masih ada kapasitas yang tersisa untuk "pagi malam"
                $shelter->can_select_pagi_malam = ($countPagi < $shelter->kapasitas) && ($countMalam < $shelter->kapasitas);

                // Simpan data tambahan
                $shelter->count_pagi = $countPagi;
                $shelter->count_malam = $countMalam;
                $shelter->total_capacity = $shelter->kapasitas;

                // Hitung status penggunaan booth
                $boothStatus = [];
                foreach ($shelter->umkms as $umkm) {
                    $booth = $umkm->nomor_booth;
                    if (!isset($boothStatus[$booth])) {
                        $boothStatus[$booth] = ['pagi' => false, 'malam' => false];
                    }

                    if ($umkm->shift === 'pagi' || $umkm->shift === 'pagi malam') {
                        $boothStatus[$booth]['pagi'] = true;
                    }
                    if ($umkm->shift === 'malam' || $umkm->shift === 'pagi malam') {
                        $boothStatus[$booth]['malam'] = true;
                    }
                }
                $shelter->booth_status = $boothStatus;

                return $shelter;
            });

        return view('backend.pages.umkm.create', compact(
            'kategoris',
            'shelters',
        ));
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'shelter_id' => 'required|exists:shelters,id',
                'nomor_booth' => [
                    'required',
                    'integer',
                    'min:1',
                    function ($attribute, $value, $fail) use ($request) {
                        $shelter = \App\Models\Shelter::find($request->shelter_id);

                        if ($shelter && $value > $shelter->kapasitas) {
                            $fail('Nomor Booth tidak boleh lebih besar dari kapasitas shelter (' . $shelter->kapasitas . ').');
                            return;
                        }

                        $existingUMKMs = UMKM::where('shelter_id', $request->shelter_id)
                            ->where('nomor_booth', $value)
                            ->get();

                        foreach ($existingUMKMs as $umkm) {
                            if ($umkm->shift === 'pagi malam') {
                                $fail("Booth {$value} sudah dipakai untuk shift pagi malam, tidak bisa dipakai lagi.");
                                return;
                            }

                            if ($request->shift === 'pagi' && ($umkm->shift === 'pagi' || $umkm->shift === 'pagi malam')) {
                                $fail("Booth {$value} sudah dipakai untuk shift pagi.");
                                return;
                            }

                            if ($request->shift === 'malam' && ($umkm->shift === 'malam' || $umkm->shift === 'pagi malam')) {
                                $fail("Booth {$value} sudah dipakai untuk shift malam.");
                                return;
                            }

                            if ($request->shift === 'pagi malam') {
                                $fail("Booth {$value} sudah dipakai, tidak bisa dipakai untuk shift pagi malam.");
                                return;
                            }
                        }
                    }
                ],
                'shift' => 'required|in:pagi,malam,pagi malam',
                'nama' => 'required|string',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string',
                'surat_ijin_penempatan' => 'required|in:ada,tidak',
                'retribusi' => 'required|in:lancar,tidak lancar',
                'kategori_id' => 'required|exists:kategoris,id',
                'aktif' => 'required|boolean',
            ], [
                'nomor_booth.required' => 'Nomor Booth wajib diisi.',
                'nomor_booth.integer' => 'Nomor Booth harus berupa angka.',
                'nomor_booth.min' => 'Nomor Booth harus minimal 1.',
                'shift.required' => 'Shift wajib diisi.',
                'shift.in' => 'Shift harus Pagi, Malam, atau Pagi Malam.',
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
    
            return redirect()->route('admin.umkm.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function show($id) {}

    public function edit($id) {
        $umkm = UMKM::find($id);
        $kategoris = Kategori::where('status', true)->get();
        $shelters = Shelter::where('status', true)
            ->with(['umkms'])
            ->latest()
            ->get()
            ->map(function ($shelter) {
                // Hitung jumlah UMKM per shift
                $countPagi = $shelter->umkms->filter(function ($umkm) {
                    return $umkm->shift === 'pagi' || $umkm->shift === 'pagi malam';
                })->count();

                $countMalam = $shelter->umkms->filter(function ($umkm) {
                    return $umkm->shift === 'malam' || $umkm->shift === 'pagi malam';
                })->count();

                // Tentukan apakah kapasitas penuh
                $shelter->is_full_pagi = $countPagi >= $shelter->kapasitas;
                $shelter->is_full_malam = $countMalam >= $shelter->kapasitas;

                // Tentukan apakah masih ada kapasitas yang tersisa untuk "pagi malam"
                $shelter->can_select_pagi_malam = ($countPagi < $shelter->kapasitas) && ($countMalam < $shelter->kapasitas);

                // Simpan data tambahan
                $shelter->count_pagi = $countPagi;
                $shelter->count_malam = $countMalam;
                $shelter->total_capacity = $shelter->kapasitas;

                // Hitung status penggunaan booth
                $boothStatus = [];
                foreach ($shelter->umkms as $umkm) {
                    $booth = $umkm->nomor_booth;
                    if (!isset($boothStatus[$booth])) {
                        $boothStatus[$booth] = ['pagi' => false, 'malam' => false];
                    }

                    if ($umkm->shift === 'pagi' || $umkm->shift === 'pagi malam') {
                        $boothStatus[$booth]['pagi'] = true;
                    }
                    if ($umkm->shift === 'malam' || $umkm->shift === 'pagi malam') {
                        $boothStatus[$booth]['malam'] = true;
                    }
                }
                $shelter->booth_status = $boothStatus;

                return $shelter;
            });

        return view('backend.pages.umkm.edit', compact(
            'umkm',
            'kategoris',
            'shelters',
        ));
    }

    public function update(Request $request, $id) {
        try {
            $umkm = UMKM::find($id);
    
            $request->validate([
                'shelter_id' => 'required|exists:shelters,id',
                'nomor_booth' => [
                    'required',
                    'integer',
                    'min:1',
                    function ($attribute, $value, $fail) use ($request, $umkm) {
                        $shelter = \App\Models\Shelter::find($request->shelter_id);

                        if ($shelter && $value > $shelter->kapasitas) {
                            $fail('Nomor Booth tidak boleh lebih besar dari kapasitas shelter (' . $shelter->kapasitas . ').');
                            return;
                        }

                        $existingUMKMs = UMKM::where('shelter_id', $request->shelter_id)
                            ->where('nomor_booth', $value)
                            ->where('id', '!=', $umkm->id)
                            ->get();

                        foreach ($existingUMKMs as $u) {
                            if ($u->shift === 'pagi malam') {
                                $fail("Booth {$value} sudah dipakai untuk shift pagi malam, tidak bisa dipakai lagi.");
                                return;
                            }

                            if ($request->shift === 'pagi' && ($u->shift === 'pagi' || $u->shift === 'pagi malam')) {
                                $fail("Booth {$value} sudah dipakai untuk shift pagi.");
                                return;
                            }

                            if ($request->shift === 'malam' && ($u->shift === 'malam' || $u->shift === 'pagi malam')) {
                                $fail("Booth {$value} sudah dipakai untuk shift malam.");
                                return;
                            }

                            if ($request->shift === 'pagi malam') {
                                $fail("Booth {$value} sudah dipakai, tidak bisa dipakai untuk shift pagi malam.");
                                return;
                            }
                        }
                    }
                ],
                'shift' => 'required|in:pagi,malam,pagi malam',
                'nama' => 'required|string',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required|string',
                'surat_ijin_penempatan' => 'required|in:ada,tidak',
                'retribusi' => 'required|in:lancar,tidak lancar',
                'kategori_id' => 'required|exists:kategoris,id',
                'aktif' => 'required|boolean',
            ], [
                'nomor_booth.required' => 'Nomor Booth wajib diisi.',
                'nomor_booth.integer' => 'Nomor Booth harus berupa angka.',
                'nomor_booth.min' => 'Nomor Booth minimal 1.',
                'shift.required' => 'Shift wajib diisi.',
                'shift.in' => 'Shift harus Pagi, Malam, atau Pagi Malam.',
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
    
            return redirect()->route('admin.umkm.index')->with('success', 'Data berhasil diupdate');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy($id) {
        try {
            $umkm = UMKM::find($id);

            $umkm->update([
                'status' => false,
            ]);

            return redirect()->route('admin.umkm.index')->with('success', 'Data berhasil dihapus');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }
}
