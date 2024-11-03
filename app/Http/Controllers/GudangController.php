<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index()
    {
        // Mengembalikan view untuk halaman "Sistem Gudang"
        return view('gudang.index');
    }
}
