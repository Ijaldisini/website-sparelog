<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Semua barang
    public function index()
    {
        $barang = Barang::with('supplier')
            ->orderByRaw('CASE WHEN stok <= 10 THEN 0 ELSE 1 END')
            ->orderBy('stok', 'asc')
            ->get();

        return view('barang.index', compact('barang'));
    }

    // Form tambah barang
    public function create()
    {
        $suppliers = Supplier::all();
        return view('barang.create', compact('suppliers'));
    }

    // Simpan barang
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'tanggal_masuk' => 'required|date',
            'id_supplier' => 'required|exists:supplier,id',
        ]);

        $hpp = $request->hpp ?? ($request->harga - ($request->harga * 0.1));

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'hpp' => $hpp,
            'id_supplier' => $request->id_supplier,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Form edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $suppliers = Supplier::all();
        return view('barang.edit', compact('barang', 'suppliers'));
    }

    // Update barang
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $hpp = $request->hpp ?? ($request->harga + ($request->harga * 0.1));

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $hpp,
            'stok' => $request->stok,
            'hpp' => $request->harga,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // Hapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
