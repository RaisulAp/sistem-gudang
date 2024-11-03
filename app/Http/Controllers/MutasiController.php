<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        return response()->json(Mutasi::with('user', 'barang')->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required|in:in,out',
            'jumlah' => 'required|integer'
        ]);

        $mutasi = Mutasi::create($request->all());
        return response()->json($mutasi, 201);
    }

    public function show($id)
    {
        $mutasi = Mutasi::with('user', 'barang')->find($id);
        if (!$mutasi) {
            return response()->json(['message' => 'Mutasi not found'], 404);
        }
        return response()->json($mutasi, 200);
    }

    public function update(Request $request, $id)
    {
        $mutasi = Mutasi::find($id);
        if (!$mutasi) {
            return response()->json(['message' => 'Mutasi not found'], 404);
        }

        $mutasi->update($request->all());
        return response()->json($mutasi, 200);
    }

    public function destroy($id)
    {
        $mutasi = Mutasi::find($id);
        if (!$mutasi) {
            return response()->json(['message' => 'Mutasi not found'], 404);
        }

        $mutasi->delete();
        return response()->json(['message' => 'Mutasi deleted'], 200);
    }

    public function historyByBarang($barang_id)
    {
        $barang = Barang::find($barang_id);
        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        $history = $barang->mutasis()->with('user')->get();
        return response()->json($history, 200);
    }

    public function historyByUser($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $history = $user->mutasis()->with('barang')->get();
        return response()->json($history, 200);
    }
}
