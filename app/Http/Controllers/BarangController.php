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
        try {
            $request->validate([
                'nama_barang' => 'required|string|max:255',
                'harga' => 'required|numeric|min:1000',
                'stok' => 'required|integer|min:1', // stok tidak boleh 0
                'tanggal_masuk' => 'required|date',
                'id_supplier' => 'required|exists:supplier,id',
            ]);

            if ($request->harga % 1000 !== 0) {
                return redirect()->back()->with('error', 'Harga harus dalam satuan ribuan!')->withInput();
            }

            $hpp = $request->harga;
            $harga_jual = $hpp + ($hpp * 0.1);

            $barangLama = Barang::where('nama_barang', $request->nama_barang)
                ->where('id_supplier', $request->id_supplier)
                ->first();

            if ($barangLama) {
                $barangLama->update([
                    'stok' => $barangLama->stok + $request->stok,
                    'harga' => $harga_jual,
                    'hpp' => $hpp,
                    'tanggal_masuk' => $request->tanggal_masuk,
                ]);

                return redirect()->route('barang.index')->with('success', 'Stok barang berhasil ditambahkan!');
            } else {

                Barang::create([
                    'nama_barang' => $request->nama_barang,
                    'harga' => $harga_jual,
                    'stok' => $request->stok,
                    'hpp' => $hpp,
                    'id_supplier' => $request->id_supplier,
                    'tanggal_masuk' => $request->tanggal_masuk,
                ]);

                return redirect()->route('barang.index')->with('success', 'Barang baru berhasil ditambahkan!');
            }
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('error', 'Barang gagal ditambahkan!');
        }
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
        try {
            $barang = Barang::findOrFail($id);

            $request->validate([
                'nama_barang' => 'required|string|max:255',
                'harga' => 'required|numeric|min:1000',
                'stok' => 'required|integer|min:1',
            ]);

            if ($request->harga % 1000 !== 0) {
                return redirect()->back()->with('error', 'Harga harus dalam satuan ribuan!')->withInput();
            }

            $hpp = $request->harga;
            $harga_jual = $hpp + ($hpp * 0.1);

            $barang->update([
                'nama_barang' => $request->nama_barang,
                'harga' => $harga_jual,
                'stok' => $request->stok,
                'hpp' => $hpp,
            ]);

            return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('error', 'Barang gagal diperbarui!');
        }
    }

    // Hapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
