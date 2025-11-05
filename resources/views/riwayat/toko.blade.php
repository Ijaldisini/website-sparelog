@extends('layouts.app')

@section('title', 'Riwayat Transaksi Toko')

@section('content')
<link rel="stylesheet" href="{{ asset('style/riwayat.css') }}">

<div class="riwayat-wrapper">
    <div class="riwayat-container">
        <div class="riwayat-header">
            <h2>Riwayat Transaksi Toko</h2>
            <div class="tabs">
                <a href="{{ route('riwayat.index') }}" class="tab">Pelanggan</a>
                <a href="{{ route('riwayat.toko') }}" class="tab active">Toko</a>
            </div>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama Toko</th>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Harga Setelah Diskon</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayatToko as $trx)
                    @foreach($trx->detail as $detail)
                    @php
                    $diskon = $detail->subtotal * 0.05;
                    $hargaSetelahDiskon = $detail->subtotal - $diskon;
                    @endphp
                    <tr>
                        <td>{{ strtolower($trx->nama_toko) }}</td>
                        <td>{{ $trx->tanggal }}</td>
                        <td>{{ strtolower($detail->barang->nama_barang) }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($hargaSetelahDiskon, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                    @empty
                    <tr>
                        <td colspan="6" class="empty">Belum ada data transaksi toko</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="total-label">Total</td>
                        <td>Rp {{ number_format($totalToko, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection