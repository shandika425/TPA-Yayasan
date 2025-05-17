<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('pendaftaran/index');
        $this->load->view('templates/footer');
    }

    public function proses_pendaftaran() {
        $email = $this->input->post('email');
        $nama_wali = $this->input->post('nama_wali');
        $alamat = $this->input->post('alamat');
        $no_telp_wali = $this->input->post('no_telp_wali');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

        $data_user = array(
            'email' => $email,
            'nama_wali' => $nama_wali,
            'alamat' => $alamat,
            'no_telp_wali' => $no_telp_wali,
            'password' => $password,
            'role' => 'user',
            'created_at' => date('Y-m-d H:i:s')
        );

        $this->db->insert('users', $data_user);

        $this->session->set_flashdata('success', 'Pendaftaran berhasil! Silakan login.');
        redirect('auth/login');
    }

    public function login() {
        redirect('auth/login');
    }

    public function proses_login() {
        redirect('auth/login');
    }

    public function formulir_tpa() {
        $this->load->view('pendaftaran/formulir_tpa');
        $this->load->view('templates/footer');
    }

    public function simpan_formulir() {
        $id_user = $this->session->userdata('id_user');
    
        $data = [
            'id_user' => $id_user,
            'nama_anak' => $this->input->post('nama_anak'),
            'tingkat_sekolah' => $this->input->post('tingkat_sekolah'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'bisa_membaca' => $this->input->post('bisa_membaca'),
            'pengalaman_tpa' => $this->input->post('pengalaman_tpa'),
            'hafalan' => $this->input->post('hafalan'),
        ];
    
        $this->db->insert('data_anak', $data);
        $id_anak = $this->db->insert_id();
    
        // Tambahkan transaksi default
        $pembayaran = [
            [
                'id_user' => $id_user,
                'id_anak' => $id_anak,
                'keterangan' => 'Infaq Masjid',
                'jumlah_bayar' => 150000,
                'status' => 'Pending',
                'tgl_bayar' => NULL
            ],
            [
                'id_user' => $id_user,
                'id_anak' => $id_anak,
                'keterangan' => 'SPP Bulan Januari–Juni',
                'jumlah_bayar' => 30000,
                'status' => 'Pending',
                'tgl_bayar' => NULL
            ]
        ];
        $this->db->insert_batch('transaksi', $pembayaran);
    
        // Arahkan ke pembayaran
        redirect('pendaftaran/formulir_pembayaran/' . $id_anak);
    }
    
    public function formulir_pembayaran($id_anak = null)
    {
        // Jika id_anak tidak diberikan, ambil dari session user
        if ($id_anak === null) {
            $id_user = $this->session->userdata('id_user');
            $id_anak = $this->User_model->get_last_anak_id($id_user);
        }

        // Cek kembali jika id_anak masih null (misalnya user belum isi formulir anak)
        if (!$id_anak) {
            $this->session->set_flashdata('error', 'Data anak tidak ditemukan.');
            redirect('auth/login');
        }

        $data['id_anak'] = $id_anak;

        $anak = $this->db->get_where('data_anak', ['id_anak' => $id_anak])->row();
        $data['nama_anak'] = $anak ? $anak->nama_anak : '';

        $data['transaksi'] = $this->db->get_where('transaksi', ['id_anak' => $id_anak])->result();

        $this->load->view('pendaftaran/formulir_pembayaran', $data);
        $this->load->view('templates/footer');
    }

    

    public function simpan_pembayaran()
    {
        $id_user = $this->session->userdata('id_user');
        $id_anak = $this->input->post('id_anak');
        $nama_anak = $this->input->post('nama_anak');
        $keterangan = $this->input->post('keterangan');
        $jumlah_bayar = $this->input->post('jumlah_bayar');
        $status = $this->input->post('status');
        $aksi = $this->input->post('aksi'); // 'bayar' atau 'nanti'

        $data = [
            'id_user' => $id_user,
            'id_anak' => $id_anak,
            'keterangan' => $keterangan,
            'jumlah_bayar' => $jumlah_bayar,
            'status' => $status,
            'tgl_bayar' => date('Y-m-d H:i:s')
        ];

        // Simpan ke database
        $this->db->insert('transaksi', $data);

        $this->session->set_userdata('last_page', 'user/dashboard');
        // Redirect sesuai aksi
        if ($aksi == 'bayar') {
            redirect('pendaftaran/qris/' . $id_anak);
            return;
        }
        
    }

    public function dashboard_user() {
        $this->load->view('user/dashboard_user');
        $this->load->view('templates/footer');
    }

    public function qris($id_transaksi) {
        $data['transaksi'] = $this->User_model->get_transaksi_by_id($id_transaksi);
        $this->load->view('pendaftaran/qris', $data);
        $this->load->view('templates/footer');
    }
    
    
    
}

