<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pembayaran Administrasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        /* === Body Styling === */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: url('<?= base_url("assets/img/Masjid.jpg") ?>') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
        }

        /* === Form Container === */
        #formLogin {
            width: 90%;
            max-width: 400px;
            background: rgba(0, 0, 0, 0.7); /* Lebih terang agar kontras */
            padding: 25px;
            border-radius: 20px;
            color: white;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            text-align: center;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            opacity: 1;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        #formLogin h3 {
            color: white;
        }

        /* Input lebih proporsional dan seragam */
        .form-group {
            width: 93%;
            text-align: left;
            margin-bottom: 0px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid #ccc;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
            width: 100%;
        }

        /* Efek fokus */
        .form-control:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(31, 38, 135, 0.5);
        }

        /* Tombol lebih proporsional */
        .d-flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            font-size: 15px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            text-align: center;
            width: 150px; /* Pastikan ukuran konsisten */
        }

        /* Warna tombol lebih kontras */
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #7f0000;
        }

        .btn-warning {
            background-color: #e0a800;
            color: white;
        }

        .btn-warning:hover {
            background-color: #c69500;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #1b5e20;
        }

        /* Footer lebih rapi */
        footer {
            width: 100%;
            padding: 15px;
            text-align: center;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            position: relative;
            bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Form Pembayaran -->
    <div id="formLogin">
        <h3 class="text-center mb-1 "><b>Formulir Pembayaran Administrasi</b></h3>
        <div class="container mt-5">
            <form action="<?= base_url('pendaftaran/formulir_tpa') ?>" method="post">
                
                <!-- Input Tersembunyi: ID Anak -->
                <input type="hidden" name="id_anak" value="<?= $id_anak ?>">

                <!-- Nama Anak -->
                <div class="form-group">
                    <label for="nama_anak">Nama Anak</label>
                    <input type="text" name="nama_anak" id="nama_anak" class="form-control" value="<?= $nama_anak ?>" readonly>
                </div>

                <!-- Keterangan -->
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" value="Administrasi Pendaftaran" readonly>
                </div>

                <!-- Jumlah Bayar -->
                <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Bayar</label>
                    <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="150000" readonly>
                </div>

                <!-- Status -->
                <input type="hidden" name="status" id="status" value="Pending">

                <!-- Tombol Aksi -->
                <div class="d-flex">
                    <a href="<?= base_url('pendaftaran/formulir_tpa') ?>" class="btn btn-danger">Kembali</a>
                    <button type="button" onclick="location.href='<?= base_url('User/bayar_nanti/' . $id_anak) ?>'" class="btn btn-warning">Bayar Nanti</button>
                    <a href="<?= base_url('pendaftaran/qris/' . $id_anak) ?>" class="btn btn-success">Bayar</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
