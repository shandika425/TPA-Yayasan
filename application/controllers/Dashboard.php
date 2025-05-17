<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Cek apakah user sudah login
        if (!$this->session->userdata('id_user')) {
            redirect('auth/login');
        }

        // Jika kamu ingin batasi ke role admin/user bisa ditambahkan di sini juga

        $this->load->model('Mkuker');   // Model untuk proyek kuker
        $this->load->model('Myayasan'); // Model untuk proyek yayasan
    }

    // Dashboard utama (sesuaikan proyek)
    public function index($project = 'yayasan')
    {
        // Ambil id user dari session (jika mau digunakan)
        $id_user = $this->session->userdata('id_user');

        if ($project === 'kuker') {
            // Dashboard untuk proyek kuker
            $data['dbproduct'] = $this->Mkuker->get_product()->result();
            $this->load->view("template/head", $data);
            $this->load->view("template/navbar", $data);
            $this->load->view("template/sidebar", $data);
            $this->load->view("template/content", $data);
            $this->load->view("template/footer", $data);
        } else {
            // Dashboard untuk proyek yayasan
            $this->load->view("templates/head");
            $this->load->view("templates/navbar");
            $this->load->view("templates/sidebar");
            $this->load->view("templates/content");
            $this->load->view("templates/footer");
        }
    }

    // Fungsi khusus untuk melihat produk proyek kuker
    public function view_product()
    {
        $data['dbproduct'] = $this->Mkuker->get_product()->result();
        $this->load->view("template/head", $data);
        $this->load->view("template/navbar", $data);
        $this->load->view("template/sidebar", $data);
        $this->load->view("template/content_product", $data);
        $this->load->view("template/footer", $data);
    }
}
