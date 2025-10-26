<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class BiodataController extends Controller
{
    public function index() {
        $anggota = Anggota::get();
        return view('biodata', compact('anggota'));
    }

    
}
