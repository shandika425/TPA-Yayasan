<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Anak</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Edit Data Anak</h3>

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
            <a href="<?= base_url('admin/siswa') ?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

</body>
</html>