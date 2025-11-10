@extends('layouts.app')

@section('title', 'Manajemen Barang')

@section('content')
<link rel="stylesheet" href="{{ asset('style/barang.css') }}">
<link rel="stylesheet" href="{{ asset('style/iframe.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">

<div class="barang-wrapper">
    <div class="barang-container">
        <div class="page-header">
            <div class="header-left">
                <h2 class="page-title">Semua Stok</h2>
            </div>
            <div class="header-right">
                <a href="{{ route('barang.create') }}" class="btn-add">Tambah</a>
            </div>
        </div>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Nama Pemasok</th>
                        <th>Jumlah Stok</th>
                        <th>HPP</th>
                        <th>Harga Jual</th>
                        <th class="action-column">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barang as $item)
                    <tr class="{{ $item->stok < 10 ? 'low-stock' : '' }}">
                        <td class="item-name">{{ $item->nama_barang }}</td>
                        <td>{{ $item->supplier->nama_supplier ?? '-' }}</td>
                        <td class="stock-cell">
                            <span class="stock-badge {{ $item->stok < 10 ? 'stock-low' : 'stock-normal' }}">
                                {{ $item->stok }}
                            </span>
                        </td>
                        <td>Rp {{ number_format($item->hpp, 0, ',', '.') }}</td>
                        <td class="price-cell">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="action-cell">
                            <a href="{{ route('barang.edit', $item->id) }}" class="btn-action btn-edit" title="Edit">
                                <img src="{{ asset('images/update.png') }}" alt="Edit" class="icon-btn">
                            </a>

                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-action btn-delete" data-id="{{ $item->id }}" title="Hapus">
                                    <img src="{{ asset('images/delete.png') }}" alt="Delete" class="icon-btn">
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="empty-state">
                            <div class="empty-content">
                                <span class="empty-icon">📦</span>
                                <p>Belum ada data barang</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="flash-data" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>
@section('scripts')
<script src="{{ asset('script/barang.js') }}"></script>
@endsection