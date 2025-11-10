@extends('layouts.app')

@section('title', 'Transaksi Toko')

@section('content')
<link rel="stylesheet" href="{{ asset('style/transaksi.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('script/transaksiToko.js') }}" defer></script>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">

<div class="transaksi-wrapper">
    <div class="transaksi-container">
        <div class="transaksi-header">
            <h2>Transaksi Toko</h2>
            <div class="header-right">
                <a href="{{ route('transaksi.index') }}" class="tab">Pelanggan</a>
                <button class="tab active">Toko</button>
            </div>
        </div>

        <form id="toko-form">
            @csrf

            <div class="form-section">
                <div class="form-group">
                    <label>Nama Toko</label>
                    <input type="text" name="nama_toko" required>
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
                        <tr>
                            <td><input type="text" class="nama-barang"></td>
                            <td><input type="number" class="jumlah" min="1"></td>
                            <td><input type="text" class="harga" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="nama-barang"></td>
                            <td><input type="number" class="jumlah" min="1"></td>
                            <td><input type="text" class="harga" readonly></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="total-label">Subtotal</td>
                            <td><input type="text" id="total-harga" readonly></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="total-label">Diskon (5%)</td>
                            <td><input type="text" id="diskon" readonly></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="total-label">Total Akhir</td>
                            <td><input type="text" id="total-akhir" readonly></td>
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