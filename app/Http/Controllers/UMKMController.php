<?php

namespace App\Http\Controllers;

use App\Exports\UMKMExport;
use App\Models\Kategori;
use App\Models\UMKM;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class UMKMController extends Controller
{
    public function index(Request $request) {
        $query = UMKM::where('status', 1);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nama_produk', 'like', '%' . $search . '%')
                  ->orWhere('tempat_usaha', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('export') && $request->export == 'excel') {
            $fileName = 'umkm-' . now() . '.xlsx';
            return Excel::download(new UMKMExport($query->get()), $fileName);
        }
    
        if ($request->has('export') && $request->export == 'pdf') {
            $fileName = 'umkm-' . now() . '.pdf';
            $umkms = $query->get();
            $pdf = Pdf::loadView('backend.exports.umkm', compact('umkms'));
            return $pdf->download($fileName);
        }

        $umkms = $query->latest()->paginate(10);
        $kategoris = Kategori::where('status', true)->get();

        return view('backend.pages.umkm.index', compact(
            'umkms',
            'kategoris',
        ));
    }

    public function create() {}

    public function store(Request $request) {
        try {
            $request->validate([
                'nama' => 'required',
                'kategori_id' => 'required',
                'nama_produk' => 'nullable',
                'foto_produk' => 'nullable|file|mimes:png,jpg,jpeg',
                'tempat_usaha' => 'required',
            ]);
    
            $array = [
                'nama' => $request['nama'],
                'tempat_usaha' => $request['tempat_usaha'],
                'nama_produk' => $request['nama_produk'],
                'foto_produk' => $this->handleFileUpload($request->file('foto_produk'), 'images/umkm/foto-produk/'),
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
                'nama' => 'required',
                'kategori_id' => 'required',
                'nama_produk' => 'nullable',
                'foto_produk' => 'nullable|file|mimes:png,jpg,jpeg',
                'tempat_usaha' => 'required',
            ]);
    
            $array = [
                'nama' => $request['nama'],
                'kategori_id' => $request['kategori_id'],
                'nama_produk' => $request['nama_produk'],
                'tempat_usaha' => $request['tempat_usaha'],
            ];

            if ($request->hasFile('foto_produk')) {
                $array['foto_produk'] = $this->handleFileUpload($request->file('foto_produk'), 'images/umkm/foto-produk/');
            }
    
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
