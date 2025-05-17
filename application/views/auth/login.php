<?php $this->load->view('templates/header'); ?>

<style>
    body {
        background: url('<?= base_url("assets/img/bgj.jpg") ?>') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .login-box {
        background: rgba(0, 0, 0, 0.6); /* efek transparan gelap */
        padding: 40px;
        max-width: 450px;
        margin: 100px auto;
        border-radius: 15px;
        color: #fff;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }

    .login-box h3 {
        text-align: center;
        font-weight: 600;
        margin-bottom: 30px;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
    }

    .btn-login {
        background-color: #2e7d32;
        border: none;
        padding: 12px;
        font-weight: bold;
        border-radius: 10px;
        transition: 0.3s;
    }

    .btn-login:hover {
        background-color: #1b5e20;
    }

    .alert {
        border-radius: 8px;
    }
</style>

<div class="login-box">
    <h3>Login</h3>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('auth/do_login') ?>" method="post">
        <div class="form-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group mb-4">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-login w-100">Login</button>
    </form>
</div>

<?php $this->load->view('templates/footer'); ?>
