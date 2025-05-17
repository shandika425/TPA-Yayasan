<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: url('<?= base_url("assets/img/Masjid.jpg") ?>') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
        text-align: center; /* Agar teks rata tengah */
    }

    /* Wrapper agar semua konten tetap di tengah */
    .wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: calc(100vh - 150px); /* Pastikan tidak terlalu dekat dengan footer */
    }

    /* Form Style */
    #formLogin, #qrisLogin {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 90%;
        max-width: 500px;
        background: rgba(0, 0, 0, 0.5); /* Efek transparan */
        padding: 40px;
        border-radius: 15px;
        color: white; /* Ubah semua teks menjadi putih */
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        opacity: 1;
        margin-top: 80px; /* Jarak dari header */
        margin-bottom: 80px; /* Jarak dari footer */
    }

    /* QR Code */
    .qris-container img {
        margin: 20px auto;
        display: block;
        max-width: 300px;
    }

    /* Form control input */
    .form-control {
        background: rgba(255, 255, 255, 0.85); /* Transparansi input */
        border: none;
        padding: 12px;
        border-radius: 10px;
        font-size: 16px;
        color: #333;
    }

    /* Pastikan teks dari label dan input tetap terlihat jelas */
    .form-control::placeholder,
    label {
        color: white; /* Teks dalam form tetap putih */
    }

    .form-control:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(255, 255, 255, 0.5); /* Efek saat fokus */
    }

    /* Tombol */
    .btn-warning, .btn-success, .btn-danger {
        color: white; /* Pastikan teks pada tombol putih */
        font-weight: bold;
        border-radius: 8px;
        transition: 0.3s;
        padding: 12px 20px;
    }

    .btn-warning {
        background-color: #e0a800;
    }

    .btn-warning:hover {
        background-color: #c69500;
    }

    .btn-success {
        background-color: #2e7d32;
    }

    .btn-success:hover {
        background-color: #1b5e20;
    }

    .btn-danger {
        background-color: #b71c1c;
    }

    .btn-danger:hover {
        background-color: #7f0000;
    }

    /* Footer di bawah */
    footer {
        width: 100%;
        padding: 20px;
        text-align: center;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        position: relative;
        bottom: 0;
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
        <!-- Informasi Tambahan -->
        <h5 class="text-white">
            Jumlah: Rp150.000
            <br><br>
            Keterangan: Administrasi Pendaftaran Anak
        </h5>
        <!-- Tombol kembali -->
        <form action="<?= base_url('User/selesai_pembayaran/' . ($transaksi ? $transaksi->id_transaksi : '0')) ?>" method="post">
            <button type="submit" class="btn btn-success">Saya Sudah Membayar</button>
        </form>
    </div>
</div>
