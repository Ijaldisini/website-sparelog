# 📦 SpareLog (Inventory & Transaction Management System)

**SpareLog** adalah aplikasi berbasis web yang dibangun menggunakan **Laravel** untuk memanajemen inventaris (stok barang/sparepart), mencatat arus transaksi barang masuk (pembelian dari supplier) dan barang keluar (penjualan/distribusi ke toko), serta menghasilkan laporan rekapan yang terstruktur dalam format PDF.

Aplikasi ini dirancang dengan antarmuka yang ramah pengguna (menggunakan Native CSS & Vanilla JS) dan dilengkapi dengan sistem rekam jejak (riwayat) aktivitas stok yang presisi.

---

## ✨ Fitur Utama

Aplikasi SpareLog dibagi menjadi beberapa modul utama:

### 1. 🔐 Autentikasi & Keamanan
- **Secure Login:** Sistem autentikasi pengguna.
- **Prevent Back History:** Menggunakan custom middleware (`PreventBackHistory`) untuk mencegah pengguna menekan tombol *Back* pada browser setelah melakukan *logout*, menjaga keamanan sesi.

### 2. 📊 Dashboard Interaktif
- Menampilkan ringkasan data inventaris, jumlah barang, supplier, dan statistik transaksi secara *real-time*.

### 3. 📦 Manajemen Master Data
- **Katalog Barang:** CRUD (Create, Read, Update, Delete) data barang/sparepart beserta manajemen jumlah stok.
- **Data Supplier:** Pengelolaan data entitas pemasok barang yang terintegrasi langsung dengan modul transaksi pembelian.

### 4. 🛒 Manajemen Transaksi (Inbound & Outbound)
Sistem memisahkan arus barang menjadi dua alur transaksi utama:
- **Transaksi Pembelian (Inbound):** Pencatatan barang masuk dari *Supplier* ke dalam gudang (dikelola oleh `TransaksiController`).
- **Transaksi Toko (Outbound):** Pencatatan distribusi atau penjualan barang keluar menuju entitas toko/pelanggan (dikelola oleh `TransaksiTokoController`).

### 5. 🕒 Riwayat & Monitoring
- **Riwayat Transaksi:** Melacak setiap *invoice* atau riwayat transaksi yang pernah terjadi, baik dari supplier maupun ke toko.
- **Aktivitas Stok:** Mencatat setiap perubahan (penambahan/pengurangan) pada stok barang (dikelola oleh tabel `aktivitas_stok`).

### 6. 🖨️ Cetak Laporan (Export to PDF)
- **Laporan Pembelian & Penjualan:** Modul khusus (`LaporanController`) untuk memfilter data transaksi berdasarkan periode tertentu dan mengekspornya ke dalam format dokumen PDF yang siap cetak.

---

## 🛠️ Teknologi & Arsitektur

- **Backend:** Laravel (PHP)
- **Database:** MySQL
- **Frontend:** Laravel Blade, Native CSS (`public/style/`), Vanilla JavaScript (`public/script/`)
- **Testing:** PHPUnit

> **Catatan Frontend:** Proyek ini menggunakan arsitektur tradisional aset langsung. File styling dan interaksi dipanggil langsung melalui helper `asset()` Laravel tanpa kompilasi (tanpa Vite/Webpack), memastikan kesederhanaan *deployment*.

---

## ⚙️ Persyaratan Sistem

Pastikan komputer/server Anda telah menginstal:
- **PHP** (Versi 8.1 atau lebih baru direkomendasikan)
- **Composer** (Dependency Manager untuk PHP)
- **MySQL** / MariaDB

---

## 🚀 Panduan Instalasi (Development Lokal)

Ikuti langkah-langkah berikut untuk menjalankan SpareLog di mesin lokal Anda:

### 1. Clone Repositori
```bash
git clone [https://github.com/Ijaldisini/website-sparelog.git](https://github.com/Ijaldisini/website-sparelog.git)
cd website-sparelog
```

2. Install Dependensi PHP
```bash
composer install
```

### 3. Konfigurasi Environment
Salin file environment dan sesuaikan dengan konfigurasi database lokal Anda:
```bash
cp .env.example .env
```

Buka file (`.env`) dan atur bagian database (pastikan Anda sudah membuat database kosong bernama (`sparelog_db`) di phpMyAdmin/MySQL Anda):
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sparelog_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Migrasi & Seeding Database
Langkah ini akan membuat seluruh tabel yang dibutuhkan beserta data awal (dummy data) untuk User, Barang, Supplier, dan Transaksi:
```bash
php artisan migrate --seed
```

### 6. Jalankan Server
Jalankan development server bawaan Laravel:
```bash
php artisan serve
```
Aplikasi sekarang dapat diakses melalui: (`http://localhost:8000`)

---

## 🔑 Akses Login Default

Setelah melakukan perintah (`--seed`) pada tahap instalasi, Anda dapat masuk ke dalam sistem menggunakan akun yang telah di-generate oleh (`Users`) seeder (Silakan cek file (`database/seeders/Users.php`) untuk kredensial pastinya jika Anda melakukan modifikasi):

- **Email**: (`admin@gmail.com`)
- **Password**: (`password`)

---

## 📂 Struktur Direktori Penting

Jika Anda ingin melakukan modifikasi pada kode, berikut adalah panduan navigasi source code utama:

- (`app/Http/Controllers/`)
    - Mengandung logic aplikasi seperti (`BarangController.php`), (`TransaksiController.php`), dan (`LaporanController.php`).

- (`app/Models/`)
    - Mengandung Eloquent Models seperti (`Barang.php`), (`Supplier.php`), (`Transaksi.php`), dll.

- (`database/migrations/`)
    - Skema pembentukan struktur database.

- (`public/style/ & public/script/`)
    - Modifikasi tampilan antarmuka (Native CSS) dan interaktivitas spesifik halaman (Vanilla JS) diletakkan di sini secara modular (misal: (`barang.css`), (`dashboard.js`)).

- resources/views/
    - Kumpulan file Blade templating, dibagi berdasarkan fitur ((`/barang`), (`/transaksi`), (`/laporan`), dll).
 
---

## 👨‍💻 Kontributor
Raditya (@Ijaldisini) - Lead Developer

---

## 📄 Lisensi
Proyek ini dibangun untuk keperluan edukasi dan portofolio pengembangan sistem informasi.
