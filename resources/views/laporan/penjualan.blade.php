@extends('layouts.app')
@section('title', 'Laporan Penjualan')

@section('content')
<link rel="stylesheet" href="{{ asset('style/laporan.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">

<div class="laporan-wrapper">
    <div class="laporan-container">
        <div class="laporan-header">
            <h2>Laporan Penjualan</h2>
            <div class="tabs">
                <a href="{{ route('laporan.index') }}" class="tab">Pembelian</a>
                <a href="{{ route('laporan.penjualan') }}" class="tab active">Penjualan</a>
                <a href="{{ route('laporan.cetak.penjualan') }}" target="_blank" class="btn-cetak">🖨️ Cetak PDF</a>
            </div>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama Pembeli</th>
                        <th>Tanggal Transaksi</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporan as $item)
                    <tr>
                        <td>{{ $item['nama_pelanggan'] }}</td>
                        <td>{{ $item['tanggal'] }}</td>
                        <td>{{ $item['barang'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="empty">Belum ada data penjualan</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="total-label">Total Keseluruhan</td>
                        <td>Rp {{ number_format($totalKeseluruhan ?? 0, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection