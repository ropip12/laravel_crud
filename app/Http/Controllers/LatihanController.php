<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class LatihanController extends Controller
{
    public function index() {
        $matakuliah = MataKuliah::get();
        return view('latihan', compact('matakuliah'));
    }

    
}
