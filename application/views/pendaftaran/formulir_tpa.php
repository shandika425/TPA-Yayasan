<style>
        /* Struktur utama */
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: url('<?= base_url("assets/img/bgj.jpg") ?>') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    /* Kontainer utama */
    .wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: calc(100vh - 120px); /* Jarak dari footer */
    }

    /* Formulir pendaftaran */
    #formLogin {
        width: 30%;
        max-width: 500px;
        background: rgba(0, 0, 0, 0.6); /* Efek transparan */
        padding: 25px;
        border-radius: 15px;
        color: white;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        text-align: center;
        margin-top: 40px; /* Jarak dari atas */
        margin-bottom: 50px; /* Jarak dari footer */
    }

    /* Form control */
    .form-group {
        width: 100%;
        text-align: left;
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        background: rgba(255, 255, 255, 0.85);
        border: none;
        padding: 8px;
        border-radius: 6px;
        font-size: 16px;
        color: #333;
    }

    /* Pastikan label dan teks tetap putih */
    label {
        color: white;
        font-weight: 500;
    }

    /* Tombol aksi */
    .btn {
        flex: 1; /* Membuat tombol memiliki ukuran yang sama */
        padding: 12px;
        font-size: 16px;
        border-radius: 10px;
        font-weight: bold;
        text-transform: uppercase;
        transition: 0.3s;
        text-align: center;
    }
    .button-group {
        display: flex;
        gap: 15px; /* Menambahkan jarak antar tombol */
    }

    .btn-success {
        background-color: #2e7d32;
        color: white;
    }

    .btn-success:hover {
        background-color: #1b5e20;
    }

    .btn-danger {
        background-color: #b71c1c;
        color: white;
    }

    .btn-danger:hover {
        background-color: #7f0000;
    }

    /* Footer tetap di bawah */
    footer {
        width: 100%;
        padding: 20px;
        text-align: center;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        position: relative;
        bottom: 0;
    }
    .form-control:focus {
        outline: none;
        border: 2px solid #2e7d32; /* Ubah warna garis menjadi hijau */
        box-shadow: 0 0 8px rgba(46, 125, 50, 0.5); /* Tambahkan efek glow hijau */
    }




</style>

<div id="formLogin">
    <h2 class="text-center mb-2">Formulir Pendaftaran Online TPA Harapan Mulya</h2>
        <div class="container mt-5">
        <form action="<?= base_url('pendaftaran/simpan_formulir') ?>" method="post">
            <div class="form-group">
                <label>Nama Anak</label>
                <input type="text" name="nama_anak" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tingkat Sekolah</label>
                <select name="tingkat_sekolah" class="form-control" required>
                    <option value="">Pilih Tingkat Sekolah</option>
                    <option value="TK">TK</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Bisa Membaca Al-Qur'an?</label>
                <select name="bisa_membaca" class="form-control" required>
                    <option value="">Pilih </option>
                    <option value="Ya">Ya</option>
                    <option value="Belum">Belum</option>
                </select>
            </div>
            <div class="form-group">
                <label>Pengalaman di TPA lain?</label>
                <select name="pengalaman_tpa" class="form-control" required>
                    <option value="">Pilih</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </div>
            <div class="form-group">
                <label>Hafalan Surah Pendek yang Dikuasai</label>
                <textarea name="hafalan" class="form-control" rows="3" required></textarea>
            </div>
            
            <div class="d-flex justify-content-between">
            <a href="<?= base_url('auth/login') ?>" class="btn btn-danger mt-3">Kembali</a>
            <button type="submit" class="btn btn-success mt-3">Konfirmasi Pendaftaran</button>
            </div> 
        </div>
        </form>
    </div>
</div>