<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProdukExport implements FromView
{
    protected $produks;

    public function __construct($produks)
    {
        $this->produks = $produks;
    }

    public function view(): View
    {
        return view('backend.exports.produks', [
            'produks' => $this->produks
        ]);
    }
}
