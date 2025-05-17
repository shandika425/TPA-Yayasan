<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px; /* Perbesar ukuran */
            margin: 50px auto;
            background-color: white;
            padding: 40px; /* Tambahkan padding */
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
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
    <a href="<?= site_url('admin/guru') ?>" class="btn btn-warning">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h2><b>Tambah Guru</b></h2>
    <form action="<?= base_url('guru/proses_tambah') ?>" method="post">
        <!-- Input ID Guru -->
        <label for="id_guru">ID Guru:</label>
        <input type="number" id="id_guru" name="id_guru" class="form-control" required>

        <!-- Input Nama Guru -->
        <label for="nama_guru">Nama Guru:</label>
        <input type="text" id="nama_guru" name="nama_guru" class="form-control" required>

        <!-- Input NIP -->
        <label for="nip">NIP:</label>
        <input type="text" id="nip" name="nip" class="form-control" required>

        <!-- Input Mapel -->
        <label for="mapel">Mata Pelajaran:</label>
        <input type="text" id="mapel" name="mapel" class="form-control" required>

        <!-- Input Alamat -->
        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" class="form-control" rows="3" required></textarea>

        <!-- Input Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>

        <!-- Input No Telepon -->
        <label for="no_telp">No. Telepon:</label>
        <input type="text" id="no_telp" name="no_telp" class="form-control" required>

        <!-- Input Status -->
        <label for="status">Status:</label>
        <select id="status" name="status" class="form-control" required>
            <option value="aktif">Aktif</option>
            <option value="tidak aktif">Tidak Aktif</option>
        </select>

        <!-- Tombol Simpan -->

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <input type="reset" class="btn btn-secondary" value="Batal">
        </div>
    </form>
</div>

</body>
</html>
