<?php $this->load->view('templates/sidebar'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <style>

        /* === Content Styling === */
        .content {
            margin-left: 260px;
            padding: 30px;
        }

        .box {
            background-color:rgb(5, 0, 61);
            color:white;
            font-size: 20px;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(70, 68, 68, 0.1);
        }

        table {
            background-color: white;
        }
    </style>
</head>
<body>


<div class="content">
    <h2><b>DASHBOARD KETUA YAYASAN</b></h2>
    <h4 class="mb-4">Dashboard Umum</h4>
    <div class="row">
        <div class="col-md-3">
            <!-- Box Jumlah Guru -->
            <a href="<?= base_url('admin/guru') ?>" class="box-link">
                <div class="box">
                    <p>Jumlah Guru</p>
                    <h4><?= $jumlah_guru ?></h4>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <!-- Box Jumlah Murid -->
            <a href="<?= base_url('admin/siswa') ?>" class="box-link">
                <div class="box">
                    <p>Jumlah Siswa</p>
                    <h4><?= $jumlah_murid ?></h4>
                </div>
            </a>
        </div>


    <!-- ========== Tambahan Data Anak ========== -->
    <div class="mt-5">
        <h5>Data Anak</h5>
        <table class="table table-bordered table-striped" id="anakTable">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Nama Wali</th>
                    <th>Nama Anak</th>
                    <th>Tingkat Sekolah</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Membaca</th>
                    <th>Pengalaman TPA</th>
                    <th>Hafalan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($anak as $a): ?>
                    <tr>
                        <td><?= $a['nama_wali'] ?></td>
                        <td><?= $a['nama_anak'] ?></td>
                        <td><?= $a['tingkat_sekolah'] ?></td>
                        <td><?= $a['jenis_kelamin'] ?></td>
                        <td><?= $a['bisa_membaca'] ?></td>
                        <td><?= $a['pengalaman_tpa'] ?></td>
                        <td><?= $a['hafalan'] ?></td>
                        <td>
                            <a href="<?= base_url('admin/edit_anak/' . $a['id_anak']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('admin/hapus_anak/' . $a['id_anak']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>  
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#guruTable').DataTable({ "pageLength": 5 });
        $('#anakTable').DataTable({ "pageLength": 5 });
        $('#pembayaranTable').DataTable({ "pageLength": 5 });
    });
</script>

</body>
</html>

