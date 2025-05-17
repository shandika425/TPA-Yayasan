<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Transaksi_model');
        $this->load->library('session');

        $allowed = ['auth', 'logout'];
        $current_class = $this->router->fetch_class();
        $current_method = $this->router->fetch_method();

        if (!in_array($current_class, $allowed) && !$this->session->userdata('id_user')) {
            redirect('auth/login');
        }
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
    public function bayar_nanti($id_anak) {
        $id_user = $this->session->userdata('id_user');

        // Update transaksi dengan status Pending
        $this->db->set('status', 'Pending');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_anak', $id_anak);
        $this->db->update('transaksi');

        // Redirect ke dashboard
        $this->session->set_flashdata('message', 'Pembayaran ditunda. Status: Pending');
        redirect('user/dashboard_user');
    }

    public function bayar($id)
    {
        // hanya redirect atau load view QRIS, tanpa update status transaksi
        $data['transaksi'] = $this->User_model->get_transaksi_by_id($id);
        $this->load->view('user/qris', $data);
    }


    public function dashboard_user() {
        $id_user = $this->session->userdata('id_user');
        $data['transaksi'] = $this->Transaksi_model->get_by_user($id_user);

        $this->load->view('templates/header');
        $this->load->view('user/dashboard_user', $data);
        $this->load->view('templates/footer');
    }
    

    public function cek_formulir() {
        $id_user = $this->session->userdata('id_user');
        $sudah_isi = $this->User_model->cek_formulir_sudah_isi($id_user);

        if ($sudah_isi) {
            redirect('user/dashboard_user');
        } 
        else {
            redirect('user/formulir_tpa');
        }
    }
    public function selesai_pembayaran($id_user) {
        // Update semua transaksi user menjadi "Lunas"
        $this->db->set('status', 'Lunas');
        $this->db->where('id_user', $id_user);
        $this->db->update('transaksi'); // Pastikan tabel transaksi Anda benar
    
        // Redirect ke dashboard dengan pesan sukses
        $this->session->set_flashdata('message', 'Pembayaran telah berhasil dan data diperbarui menjadi Lunas.');
        redirect('user/dashboard_user');
    }
    
    public function scan_qr($id_transaksi)
    {
        $data['id_transaksi'] = $id_transaksi;
        $this->load->view('user/scan_qr', $data); // Buat view-nya jika belum ada
    }

    public function qris()
    {
        $transaksiIds = $this->input->post('transaksi'); // Ambil daftar transaksi dari form
        
        if (empty($transaksiIds)) {
            $this->session->set_flashdata('error', 'Tidak ada transaksi yang dipilih!');
            redirect('user/dashboard_user');
        }

        $data['transaksi'] = $this->User_model->get_transaksi_batch($transaksiIds);

        if (!$data['transaksi']) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan!');
            redirect('user/dashboard_user');
        }

        $this->load->view('templates/header');
        $this->load->view('user/qris', $data);
        $this->load->view('templates/footer');
    }





    public function konfirmasi_pembayaran($id)
    {
        $this->User_model->update_status_lunas($id);
        $this->session->set_flashdata('success', 'Pembayaran berhasil!');
        redirect('user/dashboard_user');
    }

    public function cetak_invoice($id)
    {
        $data['transaksi'] = $this->User_model->get_transaksi_by_id($id);
        $this->load->view('user/invoice', $data); // buat file invoice.php
    }
    


    

}
?>