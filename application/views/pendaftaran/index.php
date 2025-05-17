<main class="foto-kegiatan-bg">
  <div class="overlay"></div>
  <div class="content px-3">

    <!-- Konten Syarat -->
    <div id="kontenSyarat">
      <h3 class="text-center font-weight-bold">SYARAT PENDAFTARAN</h3>
      <ul>
        <li>Mengisi form pendaftaran</li>
        <li>Fotokopi Akta & Kartu Keluarga</li>
        <li>Pas Foto 3x4</li>
        <li>dan lain-lain...</li>
      </ul>
      <div class="text-center mt-4">
        <button onclick="tampilkanFormDaftar()" class="btn btn-primary">Daftar</button>
        <button onclick="tampilkanFormLogin()" class="btn btn-primary ml-2">Login</button>
      </div>
    </div>

    <!-- Formulir Pendaftaran -->
    <div id="formDaftar" class="form-modal" style="display: none;">
      <h3 class="text-center font-weight-bold"><B>DAFTAR AKUN</B></h3>
      <form action="<?= base_url('pendaftaran/proses_pendaftaran') ?>" method="POST">
        <div class="form-group row align-items-center">
          <label class="col-sm-4 col-form-label">Email</label>
          <div class="col-sm-8">
            <input type="email" name="email" class="form-control" required>
          </div>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-sm-4 col-form-label">Nama Wali</label>
          <div class="col-sm-8">
            <input type="text" name="nama_wali" class="form-control" required>
          </div>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-sm-4 col-form-label">Alamat</label>
          <div class="col-sm-8">
            <input type="text" name="alamat" class="form-control" required>
          </div>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-sm-4 col-form-label">Telp Wali</label>
          <div class="col-sm-8">
            <input type="text" name="no_telp_wali" class="form-control" required>
          </div>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-sm-4 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="password" name="password" class="form-control" required>
          </div>
        </div>
        <div class="form-group text-center mt-4">
          <button type="submit" class="btn btn-success w-100">Daftarkan Akun</button>
          <div class="mt-3">
            <span>Sudah punya akun? <a href="#" onclick="tampilkanFormLogin()" class="font-weight-bold text-primary">Klik di sini.</a></span>
          </div>
        </div>
      </form>
    </div>

    <!-- Form Login -->
    <div id="formLogin" class="form-modal" style="display: none;">
      <h3 class="text-center font-weight-bold">MASUKKAN AKUN</h3>
      <form action="<?= base_url('auth/do_login') ?>" method="POST">
        <div class="form-group row align-items-center">
          <label class="col-md-4 col-form-label text-md-right">Email</label>
          <div class="col-md-8">
            <input type="email" name="email" class="form-control" required>
          </div>
        </div>
        <div class="form-group row align-items-center">
          <label class="col-md-4 col-form-label text-md-right">Password</label>
          <div class="col-md-8">
            <input type="password" name="password" class="form-control" required>
          </div>
        </div>
        <div class="form-group text-center mt-4">
          <button type="submit" class="btn btn-primary w-100">Login</button>
          <div class="mt-3">
            <span>Belum punya akun? <a href="#" onclick="tampilkanFormDaftar()" class="font-weight-bold text-primary">Daftar di sini.</a></span>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>


<script>
    // Saat halaman dimuat, tampilkan syarat dulu
    window.onload = function () {
        tampilkanSyarat();
    }

    function tampilkanSyarat() {
        document.getElementById('kontenSyarat').style.display = 'block';
        document.getElementById('formDaftar').style.display = 'none';
        document.getElementById('formLogin').style.display = 'none';
    }

    function tampilkanFormDaftar() {
        document.getElementById('kontenSyarat').style.display = 'none';
        document.getElementById('formDaftar').style.display = 'block';
        document.getElementById('formLogin').style.display = 'none';
    }

    function tampilkanFormLogin() {
        document.getElementById('kontenSyarat').style.display = 'none';
        document.getElementById('formDaftar').style.display = 'none';
        document.getElementById('formLogin').style.display = 'block';
    }
</script>
