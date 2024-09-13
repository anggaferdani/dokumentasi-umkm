<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        return view('backend.pages.dashboard');
    }
}
