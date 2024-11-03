<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all(); 

        return view('gudang.index', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode' => 'required|unique:barangs',
            'kategori' => 'required',
            'lokasi' => 'required'
        ]);

        $barangs = Barang::create($request->all());
        return response()->json($barangs, 201);
    }

    public function show($id)
    {
        $barangs = Barang::find($id);
        if (!$barangs) {
            return response()->json(['message' => 'Barang not found'], 404);
        }
        return response()->json($barangs, 200);
    }

    public function update(Request $request, $id)
    {
        $barangs = Barang::find($id);
        if (!$barangs) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        $barangs->update($request->all());
        return response()->json($barangs, 200);
    }

    public function destroy($id)
    {
        $barangs = Barang::find($id);
        if (!$barangs) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        $barangs->delete();
        return response()->json(['message' => 'Barang deleted'], 200);
    }
}
