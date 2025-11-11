@extends('layouts.app')

@section('title', 'Riwayat Transaksi Pelanggan')

@section('content')
<link rel="stylesheet" href="{{ asset('style/riwayat.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">

<div class="riwayat-wrapper">
    <div class="riwayat-container">
        <div class="riwayat-header">
            <h2>Riwayat Transaksi Pelanggan</h2>
            <div class="tabs">
                <a href="{{ route('riwayat.index') }}" class="tab active">Pelanggan</a>
                <a href="{{ route('riwayat.toko') }}" class="tab">Toko</a>
            </div>
        </div>

        <form method="GET" action="{{ route('riwayat.index') }}" class="search-form">
            <input type="text" name="search" placeholder="Cari nama pelanggan..." value="{{ $query ?? '' }}">
            <button type="submit">Cari</button>
        </form>
        
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $trx)
                    @foreach($trx->detail as $detail)
                    <tr>
                        <td>{{ strtolower($trx->nama_pelanggan) }}</td>
                        <td>{{ $trx->tanggal }}</td>
                        <td>{{ strtolower($detail->barang->nama_barang) }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                    @empty
                    <tr>
                        <td colspan="5" class="empty">Belum ada data transaksi pelanggan</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="total-label">Total</td>
                        <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection