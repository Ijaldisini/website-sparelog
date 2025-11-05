@extends('layouts.app')
@section('title', 'Laporan Pembelian')

@section('content')
<link rel="stylesheet" href="{{ asset('style/laporan.css') }}">

<div class="laporan-wrapper">
    <div class="laporan-container">
        <div class="laporan-header">
            <h2>💰 Laporan Pembelian</h2>
            <div class="tabs">
                <a href="{{ route('laporan.index') }}" class="tab active">Pembelian</a>
                <a href="{{ route('laporan.penjualan') }}" class="tab">Penjualan</a>
            </div>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporan as $item)
                    <tr>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="empty">Belum ada data pembelian</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="total-label">Total Keseluruhan</td>
                        <td>Rp {{ number_format($laporan->sum('total_harga'), 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection