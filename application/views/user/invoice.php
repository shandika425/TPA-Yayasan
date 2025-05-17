
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f8f8f8;
        }

        .invoice-box {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .btn-kembali {
            padding: 10px 20px;
            background-color: #dc3545; /* Merah */
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 15px;
            cursor: pointer;
        }

        .btn-kembali:hover {
            background-color: #c82333;
        }


        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            line-height: 1.5;
            text-align: left;
        }

        table td {
            padding: 8px;
        }

        .total {
            font-weight: bold;
        }

        .center {
            text-align: center;
            margin-top: 30px;
        }

        .btn-print {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-print:hover {
            background-color: #218838;
        }

        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="invoice-box">
    <h2>INVOICE PEMBAYARAN</h2>

    <table>
        <tr>
            <td><strong>ID Transaksi</strong></td>
            <td>: <?= $transaksi->id_transaksi ?></td>
        </tr>
        <tr>
            <td><strong>Nama Anak</strong></td>
            <td>: <?= $transaksi->nama_anak ?? '-' ?></td>
        </tr>
        <tr>
            <td><strong>Keterangan</strong></td>
            <td>: <?= $transaksi->keterangan ?></td>
        </tr>
        <tr>
            <td><strong>Tanggal Bayar</strong></td>
            <td>: <?= $transaksi->tgl_bayar ? date('d M Y', strtotime($transaksi->tgl_bayar)) : '-' ?> </td>
        </tr>
        <tr>
            <td class="total"><strong>Total Bayar</strong></td>
            <td class="total">: Rp <?= number_format($transaksi->jumlah_bayar, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td><strong>Status</strong></td>
            <td>: <?= $transaksi->status ?></td>
        </tr>
    </table>

    <div class="center">
        <a href="<?= base_url('user/dashboard_user') ?>" class="btn-kembali">Kembali</a>
        <button onclick="window.print()" class="btn-print">Cetak Invoice</button>
    </div>

</div>

</body>
</html>
