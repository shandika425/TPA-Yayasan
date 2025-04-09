<h3>Form Admin</h3>
<form method="post">
    <!-- Tambahkan input sesuai kebutuhan -->
    <input type="text" name="nama" placeholder="Nama" value="<?= isset($row) ? $row->nama : '' ?>">
    <button type="submit">Simpan</button>
</form>
