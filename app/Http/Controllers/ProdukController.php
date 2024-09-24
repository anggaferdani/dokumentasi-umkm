<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Shelter;
use App\Models\Wilayah;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Exports\ProdukExport;
use App\Models\UMKM;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    public function index(Request $request) {
        $query = Produk::with('umkm')->where('status', 1);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama_produk', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi_produk', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('wilayah') && !empty($request->input('wilayah'))) {
            $wilayah = $request->input('wilayah');
            $query->whereHas('umkm.shelter.wilayah', function ($q) use ($wilayah) {
                $q->where('id', $wilayah);
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
        $kategoris = Kategori::where('status', true)->get();
        $wilayahs = Wilayah::where('status', true)->get();
        $shelters = Shelter::where('status', true)->get();
        $umkms = UMKM::where('status', true)->get();

        return view('backend.pages.produk.index', compact(
            'produks',
            'kategoris',
            'wilayahs',
            'shelters',
            'umkms',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'umkm_id' => 'required',
                'kategori_id' => 'required',
                'nama_produk' => 'required',
                'foto_produk' => 'nullable|file|mimes:png,jpg,jpeg',
                'deskripsi_produk' => 'required',
            ]);
    
            $array = [
                'umkm_id' => $request['umkm_id'],
                'deskripsi_produk' => $request['deskripsi_produk'],
                'nama_produk' => $request['nama_produk'],
                'foto_produk' => $this->handleFileUpload($request->file('foto_produk'), 'images/produk/foto-produk/'),
                'kategori_id' => $request['kategori_id'],
            ];

            Produk::create($array);
    
            return redirect()->route('admin.produk.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {
        try {
            $produk = Produk::find($id);
    
            $request->validate([
                'umkm_id' => 'required',
                'kategori_id' => 'required',
                'nama_produk' => 'required',
                'foto_produk' => 'nullable|file|mimes:png,jpg,jpeg',
                'deskripsi_produk' => 'required',
            ]);
    
            $array = [
                'umkm_id' => $request['umkm_id'],
                'kategori_id' => $request['kategori_id'],
                'nama_produk' => $request['nama_produk'],
                'deskripsi_produk' => $request['deskripsi_produk'],
            ];

            if ($request->hasFile('foto_produk')) {
                $array['foto_produk'] = $this->handleFileUpload($request->file('foto_produk'), 'images/produk/foto-produk/');
            }
    
            $produk->update($array);
    
            return redirect()->route('admin.produk.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $produk = Produk::find($id);

            $produk->update([
                'status' => false,
            ]);

            return redirect()->route('admin.produk.index')->with('success', 'Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
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
}
