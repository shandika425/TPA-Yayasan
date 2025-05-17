<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Anak</title>
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
    <a href="<?= site_url('admin/siswa') ?>" class="btn btn-warning">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h3>EDIT DATA ANAK</h3>
    <form method="post" action="<?= base_url('admin/edit_anak/' . $anak['id_anak']) ?>">
        <div class="form-group">
            <label>Nama Anak</label>
            <input type="text" name="nama_anak" class="form-control" value="<?= $anak['nama_anak'] ?>" required>
        </div>

        <div class="form-group">
            <label>Tingkat Sekolah</label>
            <input type="text" name="tingkat_sekolah" class="form-control" value="<?= $anak['tingkat_sekolah'] ?>" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" <?= $anak['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $anak['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Bisa Membaca Al-Qur'an</label>
            <select name="bisa_membaca" class="form-control" required>
                <option value="Ya" <?= $anak['bisa_membaca'] == 'Ya' ? 'selected' : '' ?>>Ya</option>
                <option value="Belum" <?= $anak['bisa_membaca'] == 'Belum' ? 'selected' : '' ?>>Belum</option>
            </select>
        </div>

        <div class="form-group">
            <label>Pengalaman TPA</label>
            <select name="pengalaman_tpa" class="form-control" required>
                <option value="Ya" <?= $anak['pengalaman_tpa'] == 'Ya' ? 'selected' : '' ?>>Ya</option>
                <option value="Tidak" <?= $anak['pengalaman_tpa'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
            </select>
        </div>

        <div class="form-group">
            <label>Hafalan Surah Pendek</label>
            <input type="text" name="hafalan" class="form-control" value="<?= isset($anak['hafalan']) ? $anak['hafalan'] : '' ?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <input type="reset" class="btn btn-secondary" value="Batal">
        </div>
    </form>
</div>

</body>
</html>
