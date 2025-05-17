<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <style>
        body {
            background: url('<?= base_url("assets/img/Masjid.jpg") ?>') no-repeat center center fixed;
            background-size: cover;
        }

        #formLogin {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            max-width: 1000px;
            margin: 70px auto;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h3 {
            color: rgb(0, 0, 0);
            text-transform: uppercase;
            font-weight: bold;
            font-size: 28px;
            margin-bottom: 20px;
        }
        #logoutNotif {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 320px;
            padding: 20px;
            border-radius: 15px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
            backdrop-filter: blur(10px);
            opacity: 0;
            z-index: 9999;
            transition: opacity 0.5s ease-in-out, transform 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center; /* Pastikan teks dan tombol sejajar */
        }
        
        #logoutNotif h5, #logoutNotif p {
            margin-bottom: 15px; /* Jarak dari teks ke tombol */
        }

        /* Tombol Logout */
        .logout-buttons {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            width: 100%;
            justify-content: center;
            margin-top: 15px; /* Beri jarak antara teks dan tombol */
        }


        .logout-buttons .btn {
            flex: 1;
            padding: 12px;
            font-size: 14px;
            border-radius: 8px;
            transition: 0.3s;
            text-align: center;
            color: white;
        }

        .btn-confirm {
            background-color: #28a745; /* Warna hijau yang lebih terang */
            color: green;
            font-weight: bold;
        }

        .btn-confirm:hover {
            background-color:rgb(18, 196, 30);
        }

        .btn-cancel {
            background-color: #dc3545; /* Warna merah yang lebih jelas */
            color: red;
            font-weight: bold;
        }

        .btn-cancel:hover {
            background-color:rgb(255, 0, 0);
        }

    </style>
</head>
<body>
<div id="formLogin">
    <div class="container mt-3">
        <h3><p>SELAMAT DATANG DI DASHBOARD USER</p></h3>
        <hr>

        <?php if (!empty($this->session->flashdata('message'))) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('message') ?>
            </div>
        <?php endif; ?>

        <h4>Data Administrasi Pembayaran</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Pilih</th> <!-- Kolom baru untuk checkbox -->
                    <th>ID Transaksi</th>
                    <th>Keterangan</th>
                    <th>Nama Anak</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah Bayar</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($transaksi)) : ?>
                    <?php foreach ($transaksi as $row) : ?>
                        <tr>
                            <td>
                                <?php if ($row['status'] == 'Pending'): ?> 
                                    <input type="checkbox" name="transaksi[]" value="<?= $row['id_transaksi'] ?>">
                                <?php endif; ?>
                            </td>
                            <td><?= $row['id_transaksi'] ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td><?= $row['nama_anak'] ?></td>
                            <td><?= $row['tgl_bayar'] ? date('d-m-Y', strtotime($row['tgl_bayar'])) : '-' ?></td>
                            <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                            <td>
                                <span class="badge badge-<?= $row['status'] == 'Lunas' ? 'success' : 'warning' ?>" style="color: black;">
                                    <?= ucfirst($row['status']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($row['status'] == 'Lunas'): ?>
                                    <a href="<?= base_url('user/cetak_invoice/'.$row['id_transaksi']) ?>" class="btn btn-success">
                                        Cetak Invoice
                                    </a>
                                <?php else: ?>
                                    <!-- Kosongkan jika status masih Pending -->
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center text-danger">Belum ada data pembayaran.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            </table>
        </div>
        <div style="text-align:center; margin-top:20px;">
            <button onclick="processPayment()" class="btn btn-primary">Bayar</button>
        </div>

        <a href="javascript:void(0)" onclick="showLogoutNotif()" class="btn btn-danger">Logout</a>
    </div>
</div>

<div id="logoutNotif">
    <h5>Apakah Anda yakin ingin keluar?</h5>
    <div class="logout-buttons">
        <button class="btn btn-cancel" onclick="hideLogoutNotif()">Batal</button>
        <button class="btn btn-confirm" onclick="confirmLogout()">Keluar</button>
    </div>
</div>


<script>
    function processPayment() {
    let checkedBoxes = document.querySelectorAll('input[name="transaksi[]"]:checked');
    
    if (checkedBoxes.length === 0) {
        alert("Pilih transaksi yang ingin dibayar.");
        return;
    }

    let transaksiIds = [];
    checkedBoxes.forEach((box) => {
        transaksiIds.push(box.value);
    });

    // Ubah URL agar sesuai dengan fungsi controller
    let paymentUrl = "<?= base_url('user/qris') ?>?transaksi=" + encodeURIComponent(JSON.stringify(transaksiIds));
    window.location.href = paymentUrl;
}



    function showLogoutNotif() {
        let notif = document.getElementById("logoutNotif");
        notif.style.display = "flex";  // Munculkan pop-up
        setTimeout(() => {
            notif.style.opacity = "1";
            notif.style.transform = "translate(-50%, -50%) scale(1)";
        }, 50);
    }

    function hideLogoutNotif() {
        let notif = document.getElementById("logoutNotif");
        notif.style.opacity = "0";
        notif.style.transform = "translate(-50%, -50%) scale(0.9)";
        setTimeout(() => {
            notif.style.display = "none";
        }, 300);
    }

    function confirmLogout() {
        hideLogoutNotif();
        setTimeout(() => {
            window.location.href = "<?= base_url('auth/logout') ?>";
        }, 300); // Logout hanya terjadi setelah pop-up ditutup
    }
</script>
<br><br>
</body>
</html>
