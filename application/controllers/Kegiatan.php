<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model');
        $this->load->library('session');

        // Cek apakah role adalah admin
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
    }

    public function index()
    {
        // Mendapatkan semua data kegiatan
        $data['kegiatan'] = $this->Kegiatan_model->get_all_kegiatan();
        
        // Memuat view
        $this->load->view('templates/sidebar');
        $this->load->view('admin/kegiatan', $data);
    }

    public function keg_tambah()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = [
                'id_guru' => $this->input->post('id_guru'),
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tempat' => $this->input->post('tempat'),
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu'),
                'keterangan' => $this->input->post('keterangan')
            ];

            // Menambahkan kegiatan
            if ($this->Kegiatan_model->insert_kegiatan($data)) {
                $this->session->set_flashdata('message', 'Kegiatan berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan kegiatan.');
            }

            redirect('admin/kegiatan');
        }

        // Memuat view untuk form tambah kegiatan
        $this->load->view('templates/sidebar');
        $this->load->view('admin/keg_tambah');
    }

    public function keg_edit($id_kegiatan)
    {
        // Ambil data kegiatan berdasarkan ID
        $data['kegiatan'] = $this->Kegiatan_model->get_kegiatan_by_id($id_kegiatan);

        // Cek apakah data kegiatan ditemukan
        if (!$data['kegiatan']) {
            $this->session->set_flashdata('error', 'Data kegiatan tidak ditemukan.');
            redirect('admin/kegiatan'); // Redirect ke halaman daftar kegiatan jika tidak ditemukan
        }

        // Proses data POST (update data)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $update_data = [
                'id_guru' => $this->input->post('id_guru'),
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tempat' => $this->input->post('tempat'),
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu'),
                'keterangan' => $this->input->post('keterangan')
            ];

            // Memperbarui data di database
            if ($this->Kegiatan_model->update_kegiatan($id_kegiatan, $update_data)) {
                $this->session->set_flashdata('message', 'Data kegiatan berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data kegiatan. Coba lagi nanti.');
            }

            redirect('admin/kegiatan'); // Redirect ke halaman daftar kegiatan setelah update
        }

        // Jika bukan POST, tampilkan form edit
        $this->load->view('templates/sidebar');
        $this->load->view('admin/keg_edit', $data);
    }


    public function keg_hapus($id_kegiatan)
    {
        // Menghapus kegiatan
        if ($this->Kegiatan_model->delete_kegiatan($id_kegiatan)) {
            $this->session->set_flashdata('message', 'Kegiatan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus kegiatan.');
        }

        redirect('admin/kegiatan');
    }
}
