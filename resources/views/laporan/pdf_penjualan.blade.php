<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        tfoot td {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>LAPORAN PENJUALAN</h2>
    <table>
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
            @foreach ($laporan as $item)
            <tr>
                <td>{{ $item['nama_pelanggan'] }}</td>
                <td>{{ $item['tanggal'] }}</td>
                <td>{{ $item['barang'] }}</td>
                <td>{{ $item['jumlah'] }}</td>
                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total Keseluruhan</td>
                <td>Rp {{ number_format($totalKeseluruhan ?? 0, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>