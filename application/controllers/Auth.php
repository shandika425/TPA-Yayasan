<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function do_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        // Validasi user berdasarkan email
        $user = $this->User_model->get_by_email($email);

        if ($user && password_verify($password, $user->password)) {
            // Simpan data session
            $this->session->set_userdata([
                'id_user' => $user->id_user,
                'role'    => $user->role // Simpan role user ke session
            ]);

            // Periksa role user
            if ($user->role == 'admin') {
                redirect('admin/dashboard_admin');
            } elseif ($user->role == 'user') {
                // Periksa apakah user sudah mendaftarkan data anak
                $is_registered = $this->User_model->is_child_registered($user->id_user);
                if (!$is_registered) {
                    redirect('pendaftaran/formulir_tpa');
                }

                // Periksa apakah user memiliki pembayaran pending
                $has_pending_payment = $this->User_model->has_pending_payment($user->id_user);
                if ($has_pending_payment) {
                    redirect('pendaftaran/formulir_pembayaran');
                }

                // Jika semua sudah selesai, arahkan ke dashboard
                redirect('user/dashboard_user');
            } else {
                $this->session->set_flashdata('error', 'Role tidak dikenali.');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Login gagal. Email atau password salah.');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        echo "<script>sessionStorage.removeItem('loggedIn');</script>";
        redirect('auth/login');
    }
    
    public function hash_password_admin()
    {
        $password_baru = password_hash("kelompok11", PASSWORD_BCRYPT);
        echo $password_baru;
    }
    
}
