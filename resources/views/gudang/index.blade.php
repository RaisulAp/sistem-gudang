<!-- resources/views/gudang/barang/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Barang</h1>
    <a href="{{ route('barangs.create') }}" class="btn btn-primary">Tambah Barang</a>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $index=>$barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kode }}</td>
                    <td>{{ $barang->kategori }}</td>
                    <td>{{ $barang->lokasi }}</td>
                    <td>
                        <a href="{{ route('barangs.show', $barang->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
