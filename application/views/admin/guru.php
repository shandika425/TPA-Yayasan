<?php $this->load->view('templates/sidebar'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <style>
        .content {
            margin-left: 240px;
            padding: 30px;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            padding: 20px;
        }
        table {
            background-color: white;
        }
        .table thead th {
            vertical-align: middle;
            text-align: center;
        }
        .btn-container {
            text-align: left;
            margin-bottom: 10px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="content">
    <h2><b>DATA GURU 2025</b></h2>
    <div class="container-fluid px-0">
        <h4 class="mb-4">Data Guru</h4>
        <div class="card">
            <div class="btn-container">
                <a href="<?= base_url('guru/guru_tambah') ?>" class="btn btn-primary btn-small"><b>Tambah Guru +</b></a>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div id="anakTable_length"></div>
                <div id="anakTable_filter"></div>
            </div>
            <table class="table table-bordered table-striped" id="anakTable">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Mapel</th>
                        <th>Alamat</th>
                        <th>No.Tlp</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($guru as $g): ?>
                        <tr>
                            <td><?= $g['nama_guru'] ?></td>
                            <td><?= $g['nip'] ?></td>
                            <td><?= $g['mapel'] ?></td>
                            <td><?= $g['alamat'] ?></td>
                            <td><?= $g['no_telp'] ?></td>
                            <td><?= $g['status'] ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('admin/guru_edit/' . $g['id_guru']) ?>" class="btn btn-sm btn-warning mb-1">Edit</a> | 
                                <a href="<?= base_url('admin/hapus_guru/' . $g['id_guru']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Scripts (Wajib Ditambahkan di BAWAH sebelum </body>) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#anakTable').DataTable({
            "pageLength": 10,
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(difilter dari total _MAX_ data)",
                "search": "Cari:",
                "paginate": {
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            },
            "dom": '<"d-flex justify-content-between align-items-center mb-3"lfr>t<"bottom"ip>'
        });
    });
</script>
</body>
</html>
