<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Aktivitas;
use Carbon\Carbon;

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
        $request->merge([
            'hpp' => str_replace('.', '', $request->hpp),
            'harga' => str_replace('.', '', $request->harga),
        ]);

        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'id_supplier' => 'nullable|exists:supplier,id',
            'stok' => 'required|integer|min:0',
            'hpp' => 'required|numeric|min:0',
        ]);

        $validated['harga'] = $validated['hpp'] + ($validated['hpp'] * 0.1);

        $barang = Barang::create($validated);

        $barang = Barang::whereRaw('LOWER(nama_barang) = ?', [strtolower($validated['nama_barang'])])->first();

        if ($barang) {
            $barang->increment('stok', $validated['stok']);
            $barang->update([
                'hpp' => $validated['hpp'],
                'harga' => $validated['harga'],
            ]);

            $message = 'Barang sudah ada, stok berhasil diperbarui!';
        } else {
            $barang = Barang::create($validated);
            $message = 'Barang baru berhasil ditambahkan!';
        }

        Aktivitas::create([
            'nama_barang' => $barang->nama_barang,
            'jumlah' => $validated['stok'],
            'harga_satuan' => $validated['hpp'],
            'total_harga' => $validated['stok'] * $validated['hpp'],
            'tanggal' => Carbon::now()->toDateString(),
        ]);


        return redirect()->route('barang.index')->with('success', $message);
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

            $request->merge([
                'harga' => str_replace('.', '', $request->harga),
            ]);

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
