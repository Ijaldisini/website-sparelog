@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('style/dashboard.css') }}">

<div class="dashboard-wrapper">
    <div class="main-dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-content">
                <div class="logo-section">
                    <a href="#" id="logo-btn">
                        <img src="{{ asset('images/logo.png') }}" alt="SpareLog Logo" class="logo-img">
                    </a>
                </div>

                <div class="menu-section">
                    <a href="{{ route('barang.index') }}" class="menu-btn"><span>Manajemen Stok</span></a>
                    <a href="{{ route('transaksi.index') }}" class="menu-btn"><span>Transaksi</span></a>
                    <a href="{{ route('riwayat-transaksi.index') }}" class="menu-btn"><span>Riwayat Transaksi</span></a>
                    <a href="{{ route('laporan.index') }}" class="menu-btn"><span>Laporan</span></a>
                </div>
            </div>

            <div class="logout-section">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <iframe id="content-frame" src=""></iframe>
        </div>
    </div>
</div>

<script src="{{ asset('script/dashboard.js') }}"></script>
@endsection