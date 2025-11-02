@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<link rel="stylesheet" href="{{ asset('style/create_barang.css') }}">
<link rel="stylesheet" href="{{ asset('style/iframe.css') }}">

<div class="main-content">
    <h2 class="form-title">Tambah Barang</h2>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" required>
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" required>
        </div>

        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" required>
        </div>

        <div class="form-group">
            <label for="id_supplier">Supplier</label>
            <select name="id_supplier" id="id_supplier" required>
                <option value="">-- Pilih Supplier --</option>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection