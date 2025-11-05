@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<link rel="stylesheet" href="{{ asset('style/edit_barang.css') }}">
<link rel="stylesheet" href="{{ asset('style/iframe.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="main-content">
    <h2 class="form-title">Edit Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang"
                value="{{ old('nama_barang', $barang->nama_barang) }}" required>
        </div>

        <div class="form-group">
            <label for="harga">HPP</label>
            <input type="text" name="harga" id="harga"
                value="{{ old('harga', number_format($barang->hpp, 0, ',', '.')) }}" required>
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok"
                value="{{ old('stok', $barang->stok) }}" required>
        </div>

        <div class="form-group">
            <label>Supplier</label>
            <input type="text" value="{{ $barang->supplier->nama_supplier ?? '-' }}" disabled>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-primary">Perbarui</button>
            <a href="{{ route('barang.index') }}" class="btn-secondary">Batal</a>
        </div>
    </form>
</div>

<div id="flash-data" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>
@endsection

@section('scripts')
<script src="{{ asset('script/barang.js') }}"></script>
@endsection