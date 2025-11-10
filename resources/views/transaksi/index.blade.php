@extends('layouts.app')

@section('title', 'Transaksi Pelanggan')

@section('content')
<link rel="stylesheet" href="{{ asset('style/transaksi.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('script/transaksi.js') }}" defer></script>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">

<div class="transaksi-wrapper">
    <div class="transaksi-container">
        <div class="transaksi-header">
            <h2>Transaksi Pelanggan</h2>
            <div class="header-right">
                <button class="tab active">Pelanggan</button>
                <a href="{{ route('toko.index') }}" class="tab">Toko</a>
            </div>
        </div>

        <form id="transaksi-form">
            @csrf

            <div class="form-section">
                <div class="form-group">
                    <label>Nomor Polisi</label>
                    <input type="text" name="nomor_polisi" required>
                </div>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" required>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" required>
                </div>
            </div>

            <div class="table-container">
                <table class="barang-table" id="barang-table">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody id="barang-body">
                        @for ($i = 0; $i < 2; $i++)
                            <tr>
                            <td><input type="text" class="nama-barang"></td>
                            <td><input type="number" class="jumlah" min="1"></td>
                            <td><input type="text" class="harga" readonly></td>
                            </tr>
                            @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="total-label">Total</td>
                            <td><input type="text" id="total-harga" readonly></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="add-row-wrapper">
                    <button type="button" id="add-row-btn" class="btn-add-row">Tambah Barang</button>
                </div>
            </div>

            <div class="button-group">
                <button type="reset" class="btn-cancel">Batal</button>
                <button type="submit" class="btn-save">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection