<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* === Sidebar Styling === */
        .sb-sidenav {
            width: 240px;
            background: linear-gradient(135deg, rgb(5, 0, 96), rgb(0, 0, 0));
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            
        }

        .sb-sidenav-header {
            
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(6px);
            font-size: 18px;
            font-weight: bold;
        }

        .sb-sidenav-header img {
            
            width: 32px;
        }

        .sb-sidenav-menu {
            
            flex-grow: 1;
            padding: 10px 0;
            
        }

        .sb-sidenav-menu-heading {
            
            padding-left: 12px;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 10px;
            opacity: 0.7;
        }

        .nav-link {
            
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: left !important;
            gap: 15px !important;
            padding: 14px 20px;
            padding-left: 40px !important;
            color: white;
            text-decoration: none;
            transition: 0.3s;
            border-radius: 6px;
            margin-bottom: 2px; /* Agar posisi sejajar secara vertikal */
        }

        .nav-link:hover {
            
            background-color: rgb(80, 123, 233);
        }

        .sb-nav-link-icon {
            
            font-size: 18px;
            flex-shrink: 0;
        }

        .sb-sidenav-footer {
            
            padding: 20px;
            font-size: 14px;
            text-align: center;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(6px);
        }

        /* === Notifikasi Logout === */
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
            z-index: 9999; /* Menjadikan paling depan */
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
            justify-content: space-between;
            gap: 15px;
            width: 100%;
        }

        .logout-buttons .btn {
            flex: 1;
            padding: 12px;
            font-size: 14px;
            border-radius: 8px;
            transition: 0.3s;
            text-align: center;
            color: white;
            border: none; /* Pastikan tidak ada border yang mengganggu warna */
            font-weight: bold;
        }

        .btn-confirm {
            background-color: #28a745 !important; /* Warna hijau yang lebih terang */
            color: green;
            font-weight: bold;
        }

        .btn-confirm:hover {
            background-color:rgb(18, 196, 30)!important;
        }

        .btn-cancel {
            background-color: #dc3545!important; /* Warna merah yang lebih jelas */
            color: red;
            font-weight: bold;
        }

        .btn-cancel:hover {
            background-color:rgb(255, 0, 0)!important;
        }

        .profile-section {
            display: flex;
            align-items: center;
            padding: 15px 20px;
        }

        .profile-section img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 12px;
        }

    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sb-sidenav">
    <div class="sb-sidenav-header">
        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo">
        <span>Yayasan Al Fatah</span>
    </div>

    <div class="profile-section">
        <img src="<?= base_url('assets/img/av1.jpg') ?>" alt="Foto Profil">
        <div class="profile-info">
            <strong>Nofal Asyhari, S.T</strong>
            <small>Admin</small>
        </div>
    </div>

    <nav class="sb-sidenav-menu">
        <div class="sb-sidenav-menu-heading mb-2">Beranda</div>
        <a class="nav-link" href="<?= base_url('admin/dashboard_admin') ?>">
            <i class="fas fa-tachometer-alt sb-nav-link-icon mb-3"></i>
            Dashboard
        </a>

        <div class="sb-sidenav-menu-heading mb-3">Manajemen Sekolah</div>
        <a class="nav-link" href="<?= base_url('admin/guru') ?>">
            <i class="fas fa-user-tie sb-nav-link-icon mb-3"></i>
            Guru
        </a>
        <a class="nav-link" href="<?= base_url('admin/siswa') ?>">
            <i class="fas fa-user-graduate sb-nav-link-icon mb-3"></i>
            Siswa
        </a>
        <a class="nav-link" href="<?= base_url('admin/kegiatan') ?>">
            <i class="fas fa-calendar-alt sb-nav-link-icon mb-3"></i>
            Kegiatan
        </a>
        <a class="nav-link" href="<?= base_url('admin/administrasi') ?>">
            <i class="fas fa-file-invoice sb-nav-link-icon mb-3"></i>
            Administrasi
        </a>

        <div class="sb-sidenav-menu-heading">Akun Admin</div>
        <a class="nav-link" href="#" onclick="showLogoutNotif()">
            <i class="fas fa-sign-out-alt sb-nav-link-icon mb-3"></i>
            Logout
        </a>
    </nav>

    
</div>

<!-- Notifikasi Logout -->
<div id="logoutNotif">
    <h5>Apakah Anda yakin ingin keluar?</h5>
    <div class="logout-buttons">
        <button class="btn btn-cancel" onclick="hideLogoutNotif()">Batal</button>
        <button class="btn btn-confirm" onclick="confirmLogout()">Keluar</button>
    </div>
</div>

<script>
    function showLogoutNotif() {
        let notif = document.getElementById("logoutNotif");
        notif.style.display = "flex";
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
        }, 300);
    }
</script>

</body>
</html>