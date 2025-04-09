<h3>Data Administrasi</h3>
<a href="<?= base_url('administrasi/tambah') ?>">Tambah</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>Data</th>
        <th>Aksi</th>
    </tr>
    <?php $no=1; foreach($data as $d): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= json_encode($d) ?></td>
        <td>
            <a href="<?= base_url('administrasi/edit/' . $d->id) ?>">Edit</a>
            <a href="<?= base_url('administrasi/hapus/' . $d->id) ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
