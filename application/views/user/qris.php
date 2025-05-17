
<style>
    body {
        background: url('<?= base_url("assets/img/Masjid.jpg") ?>') no-repeat center center fixed;
        background-size: cover;
    }

    #formLogin {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        max-width: 600px;
        margin: 100px auto;
        border-radius: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    img {
        margin: 0 auto;
        display: block;
    }
</style>

<div id="formLogin">
    <h3 class="mb-2"><b>Pembayaran via QRIS</b></h3>
    <p>Silakan scan QR code di bawah ini untuk menyelesaikan pembayaran administrasi.</p>
    <div class="container mt-5">
        <!-- Gambar QR Code -->
        <div class="mb-4">
            <img src="<?= base_url('assets/img/qris.jpeg') ?>" alt="QRIS Code" class="img-fluid" style="max-width: 300px;">
        </div>

        <!-- Informasi Pembayaran -->
        <h5 class="text-muted">
            Jumlah: Rp <?= number_format($transaksi->jumlah_bayar, 0, ',', '.') ?><br>
            Keterangan: <?= $transaksi->keterangan ?>
        </h5>

        <!-- Tombol selesai -->
        <a href="<?= base_url('user/selesai_pembayaran/' . $this->session->userdata('id_user')) ?>" class="btn btn-primary">
            Selesai & Lanjut ke Dashboard
        </a>
    </div>
</div>
