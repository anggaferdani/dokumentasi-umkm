<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UMKMExport implements FromView
{
    protected $umkms;

    public function __construct($umkms)
    {
        $this->umkms = $umkms;
    }

    public function view(): View
    {
        return view('backend.exports.umkm', [
            'umkms' => $this->umkms
        ]);
    }
}
