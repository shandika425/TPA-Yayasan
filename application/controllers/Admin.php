<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Pastikan model dimuat
        $this->load->model('User_model');
        $this->load->library('session');

        // Validasi admin login
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
    }

    public function dashboard_admin()
    {
        $data['jumlah_guru'] = $this->User_model->count_guru();
        $data['jumlah_murid'] = $this->User_model->count_murid();
        $data['guru'] = $this->User_model->get_all_guru();
        $data['anak'] = $this->User_model->get_all_anak();
        $data['transaksi'] = $this->User_model->get_all_transaksi();

        $this->load->view('admin/dashboard_admin', $data);
    }

    public function siswa()
    {
        $data['anak'] = $this->User_model->get_all_anak();
        $this->load->view('templates/sidebar');
        $this->load->view('admin/siswa', $data);
    }

    public function administrasi()
    {
        $data['transaksi'] = $this->User_model->get_all_transaksi();
        $this->load->view('admin/administrasi', $data);
    }
    
    public function guru()
    {
        $data['guru'] = $this->User_model->get_all_guru();
        $this->load->view('admin/guru', $data);
    }

    public function edit_anak($id_anak)
    {
        // Ambil data anak berdasarkan id_anak
        $data['anak'] = $this->User_model->get_anak_by_id($id_anak);

        // Periksa jika data anak ditemukan
        if (!$data['anak']) {
            show_404();
        }

        // Jika form disubmit
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $updated_data = [
                'nama_anak' => $this->input->post('nama_anak'),
                'tingkat_sekolah' => $this->input->post('tingkat_sekolah'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'bisa_membaca' => $this->input->post('bisa_membaca'),
                'pengalaman_tpa' => $this->input->post('pengalaman_tpa'),
                'hafalan' => $this->input->post('hafalan')
            ];

            // Update data anak
            if ($this->User_model->update_anak($id_anak, $updated_data)) {
                $this->session->set_flashdata('message', 'Data anak berhasil diperbarui.');
                redirect('admin/siswa');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data anak.');
                $data['anak'] = $updated_data;
                $data['anak']['id_anak'] = $id_anak;
            }
        }

        // Tampilkan view edit anak
        $this->load->view('admin/edit_anak', $data);
    }

    public function hapus_anak($id_anak)
    {
        $this->User_model->delete_anak($id_anak);
        $this->session->set_flashdata('message', 'Data anak berhasil dihapus.');
        redirect('admin/siswa');
    }

    public function set_lunas($id_transaksi) {
        // Muat model
        $this->load->model('Transaksi_model');
        
        // Update status menjadi "Lunas"
        $this->Transaksi_model->updateStatus($id_transaksi, 'Lunas');
        
        // Redirect kembali ke dashboard
        redirect('admin/administrasi');
    }
    
}
