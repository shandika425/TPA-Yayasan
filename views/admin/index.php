<h3>Data Admin</h3>
<a href="<?= base_url('admin/tambah') ?>">Tambah</a>
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
            <a href="<?= base_url('admin/edit/' . $d->id) ?>">Edit</a>
            <a href="<?= base_url('admin/hapus/' . $d->id) ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
