<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yayasan Harapan Mulya</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Google Font: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />


  <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
    }

    /* Navbar tetap */
    .navbar {
        width: 100%;
        padding: 15px 20px;
        background-color: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .navbar-brand {
        font-weight: 600;
        color: #198754 !important;
    }

    .logo-navbar {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #198754;
    }

    .navbar-nav .nav-link {
        color: #333 !important;
        font-weight: 500;
    }

    .navbar-nav .nav-link:hover {
        color: #198754 !important;
    }

    /* Hero (jika dipakai) */
    .hero {
        background: url('<?= base_url("assets/img/bgj.jpg") ?>') center center/cover no-repeat;
        height: 90vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }

    .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    /* BACKGROUND UTAMA */
    .foto-kegiatan-bg {
        background: url('<?= base_url("assets/img/bgj.jpg") ?>') center center/cover no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        position: relative;
        text-align: center;
    }

    .overlay {
        background-color: rgba(0, 0, 0, 0.6);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Form Modal */
    .form-modal, #kontenSyarat {
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 30px 25px;
        border-radius: 15px;
        box-shadow: 0px 8px 24px rgba(0,0,0,0.3);
        width: 100%;
        max-width: 500px;
        color: white;
        transition: opacity 0.3s ease-in-out;
    }

    #kontenSyarat ul {
        text-align: left;
        padding-left: 20px;
    }

    /* Form */
    .form-group {
        margin-bottom: 1.2rem;
        text-align: left;
    }

    .form-group label {
        color: #fff;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        background-color: rgba(255, 255, 255, 0.95);
        border: none;
        padding: 10px 14px;
        border-radius: 8px;
        width: 100%;
        font-size: 15px;
        color: #333;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        box-shadow: 0 0 0 2px #198754;
    }

    /* Tombol */
    .btn-primary,
    .btn-success {
        border-radius: 5px;
        padding: 4px 13px;
        font-weight: 600;
    }

    .btn-primary:hover,
    .btn-success:hover {
        opacity: 0.95;
    }

    /* Wrapper konten */
    .content {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 550px;
        color: white;
    }

    .dropdown-menu {
        background-color: white;
        border: none;
        display: none;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15);
    }

    .dropdown-item {
        color: black;
    }

    .dropdown-item:hover {
        background-color:rgb(2, 194, 41);
    }

    .show .dropdown-menu {
        display: block !important; /* Paksa dropdown untuk tampil */
    }

  


  </style>
</head>
<body>


<!-- Navbar -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="<?= base_url('assets/img/logo.png') ?>" class="me-2 logo-navbar" alt="Logo">
      Harapan Mulya
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center gap-3">
        <a class="nav-link" href="<?= base_url('home') ?>">Beranda</a>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="visiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Keagamaan
            </a>
            <ul class="dropdown-menu" aria-labelledby="visiDropdown">
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#kajianPekanan">Kajian Pekanan</a></li>
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#ta'limBulanan">Ta'lim Bulanan</a></li>
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#tablighAkbar">Tabligh Akbar</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pendidikanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pendidikan
            </a>
            <ul class="dropdown-menu" aria-labelledby="pendidikanDropdown">
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#spsAlfatah">SPS AL FATAH</a></li>
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#paudqAlfatah">PAUDQ AL FATAH</a></li>
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#tpqAlfatah">TPQ AL FATAH</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="kegiatanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Sosial
            </a>
            <ul class="dropdown-menu" aria-labelledby="kegiatanDropdown">
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#juma'atBerkah">Jum'at Berkah</a></li>
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#santunanDhuafa">Santunan Dhuafa</a></li>
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#khitananMassal">Khitanan Massal</a></li>
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#ambulance">Layanan Mobil Ambulance</a></li>
                <li><a class="dropdown-item" href="<?= base_url('home') ?>#donorDarah">Donor Darah</a></li>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>#kontak">Kontak</a></li>
        <li class="nav-item">
          <a class="btn btn-outline-success btn-sm" href="<?= base_url('pendaftaran') ?>">Pendaftaran Online TPA</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-success btn-sm text-white" href="<?= base_url('auth/login') ?>">Masuk</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="overlayScrollContent" class="overlay-content">
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var dropdowns = document.querySelectorAll(".dropdown-toggle");
    dropdowns.forEach(function (dropdown) {
        dropdown.addEventListener("click", function (event) {
            event.preventDefault();
            var parent = this.parentElement;
            var menu = parent.querySelector(".dropdown-menu");
            menu.classList.toggle("show");
        });
    });

    document.addEventListener("click", function (event) {
        dropdowns.forEach(function (dropdown) {
            var parent = dropdown.parentElement;
            var menu = parent.querySelector(".dropdown-menu");
            if (!parent.contains(event.target)) {
                menu.classList.remove("show");
            }
        });
    });
});
</script>


</body>
</html>
