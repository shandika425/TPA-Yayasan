<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
            text-transform: uppercase;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="<?= site_url('admin/kegiatan') ?>" class="btn btn-warning">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h2><b>Tambah Kegiatan</b></h2>
    <form action="<?= base_url('admin/keg_tambah') ?>" method="post">
        <label for="id_guru">ID Guru:</label>
        <input type="number" id="id_guru" name="id_guru" class="form-control" required>

        <label for="nama_kegiatan">Nama Kegiatan:</label>
        <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control" required>

        <label for="tempat">Tempat:</label>
        <input type="text" id="tempat" name="tempat" class="form-control" required>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" class="form-control" required>

        <label for="waktu">Waktu:</label>
        <input type="time" id="waktu" name="waktu" class="form-control" required>

        <label for="keterangan">Keterangan:</label>
        <textarea id="keterangan" name="keterangan" class="form-control" rows="4"></textarea>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <input type="reset" class="btn btn-secondary" value="Batal">
        </div>
    </form>
</div>

</body>
</html>
