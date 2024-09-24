<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ShelterExport implements FromView
{
    protected $shelters;

    public function __construct($shelters)
    {
        $this->shelters = $shelters;
    }

    public function view(): View
    {
        return view('backend.exports.shelter', [
            'shelters' => $this->shelters
        ]);
    }
}
