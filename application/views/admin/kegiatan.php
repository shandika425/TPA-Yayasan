<?php $this->load->view('templates/sidebar'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <style>
        /* Styling for the main content area */
        .content {
            margin-left: 240px;
            padding: 30px;
            min-height: 100vh;
            background-color: #f4f6f9;
        }

        h2 {
            color:rgb(0, 0, 0);
            text-transform: uppercase;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 20px;
        }

        h4 {
            color:rgb(0, 0, 0);
            font-weight: bold;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin-bottom: 10px;
        }

        .btn-primary:hover {
            background-color:rgb(57, 150, 251);
            border-color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        /* Table header styling */
        .table thead th {
            vertical-align: middle;
            text-align: center;
            background-color: #007bff;
            color: white;
            font-size: 14px;
            text-transform: uppercase;
        }

        .table td, .table th {
            vertical-align: middle;
            font-size: 14px;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Styling for the Edit and Delete buttons */
        .btn-action {
            padding: 8px 12px;
            border-radius: 4px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 12px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary.btn-small {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 10px; /* Smaller padding */
        font-size: 16px; /* Smaller font size */
        border-radius: 5px;
        }
        
        
        .btn-container {
        text-align: left; /* Align to the left */
        margin-bottom: 10px;
        }

        .btn-action.edit {
            background-color: #ffc107; /* Yellow */
            color: #fff;
        }

        .btn-action.edit:hover {
            background-color: #e0a800; /* Darker Yellow */
        }

        .btn-action.delete {
            background-color: #dc3545; /* Red */
            color: #fff;
        }

        .btn-action.delete:hover {
            background-color: #c82333; /* Darker Red */
        }
    </style>
</head>
<body>
<div class="content">
    <h2>Data Kegiatan 2025</h2>
    <div class="container-fluid px-0">
        <h4 class="mb-4">Daftar Kegiatan</h4>
        <div class="card">
            <div class="btn-container">
                <a href="<?= base_url('admin/keg_tambah') ?>" class="btn btn-primary btn-small"><b>Tambah Kegiatan +</b></a>
            </div>
            <table class="table table-bordered table-striped" id="kegiatanTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tempat</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($kegiatan as $k): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $k->nama_kegiatan ?></td>
                        <td><?= $k->tempat ?></td>
                        <td><?= $k->tanggal ?></td>
                        <td><?= $k->waktu ?></td>
                        <td><?= $k->keterangan ?></td>
                        <td>
                            <a href="<?= base_url('admin/keg_edit/' . $k->id_kegiatan) ?>" class="btn-action edit">Edit</a> | 
                            <a href="<?= base_url('admin/keg_hapus/' . $k->id_kegiatan) ?>" class="btn-action delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kegiatanTable').DataTable({
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
            }
        });
    });
</script>
</body>
</html>
