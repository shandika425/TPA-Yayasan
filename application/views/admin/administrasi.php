<?php $this->load->view('templates/sidebar'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Administrasi</title>
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
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 15px;
        }
        table {
            background-color: white;
        }
        .table thead th {
            vertical-align: middle;
            text-align: center;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>

<div class="content">
    <h2><b>DATA ADMINISTRASI ANAK</b></h2>
    <div class="container-fluid px-0">
        <h4 class="mb-4">Data Administrasi</h4>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-auto">
                    <div id="pembayaranTable_length"></div>
                    <div id="pembayaranTable_filter"></div>
                </div>
                <table class="table table-bordered table-striped" id="pembayaranTable">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Nama Anak</th>
                            <th>Keterangan</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $row): ?>
                            <tr>
                                <td><?= $row['id_transaksi'] ?></td>
                                <td><?= $row['nama_anak'] ?></td>
                                <td><?= $row['keterangan'] ?></td>
                                <td><?= $row['tgl_bayar'] ? date('d-m-Y', strtotime($row['tgl_bayar'])) : '-' ?></td>
                                <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                                <td>
                                    <span class="badge badge-<?= $row['status'] == 'Lunas' ? 'success' : 'warning' ?>">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($row['status'] == 'Pending') : ?>
                                        <a href="#" onclick="confirmLunas('<?= base_url('admin/set_lunas/' . $row['id_transaksi']) ?>')" class="btn btn-sm btn-success">Tandai Lunas</a>
                                    <?php else: ?>
                                        <button class="btn btn-sm btn-secondary" disabled>Lunas</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- card-body -->
        </div> <!-- card -->
    </div> <!-- container-fluid -->
</div> <!-- content -->

<!-- Scripts (Wajib Ditambahkan di BAWAH sebelum </body>) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pembayaranTable').DataTable({
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

    function confirmLunas(url) {
        if (confirm('Apakah Anda yakin wali sudah lunas?')) {
            window.location.href = url;
        }
    }
</script>
</body>
</html>
