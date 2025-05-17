<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->helper('url');
    }

    
    // Menampilkan daftar guru
    public function index()
    {
        $data['guru'] = $this->Guru_model->get_all_guru();
        $this->load->view('admin/guru_list', $data);
    }

    // Menampilkan form tambah guru
    public function guru_tambah()
    {
        $this->load->view('admin/guru_tambah');
    }

    // Memproses tambah data guru
    public function proses_tambah()
    {
        $data = [
            'nama_guru' => $this->input->post('nama_guru'),
            'nip'       => $this->input->post('nip'),
            'mapel'     => $this->input->post('mapel'),
            'alamat'    => $this->input->post('alamat'),
            'email'     => $this->input->post('email'),
            'no_telp'   => $this->input->post('no_telp'),
            'status'    => $this->input->post('status')
        ];
        $this->Guru_model->guru_tambah($data);
        redirect('guru');
    }

    public function hapus_guru($id_guru)
    {
        // Menghapus guru
        if ($this->Guru_model->delete_guru($id_guru)) {
            $this->session->set_flashdata('message', 'guru berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus guru.');
        }

        redirect('admin/guru');
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

    public function guru_edit($id_guru)
    {
        // Ambil data guru berdasarkan ID
        $data['guruData'] = $this->Guru_model->get_guru_by_id($id_guru);

        // Cek apakah data guru ditemukan
        if (!$data['guruData']) {
            $this->session->set_flashdata('error', 'Data guru tidak ditemukan.');
            redirect('guru'); // Redirect ke halaman daftar guru jika tidak ditemukan
        }

        // Proses data POST (update data)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $updatedData = [
                'nama_guru' => $this->input->post('nama_guru'),
                'nip'       => $this->input->post('nip'),
                'mapel'     => $this->input->post('mapel'),
                'alamat'    => $this->input->post('alamat'),
                'email'     => $this->input->post('email'),
                'no_telp'   => $this->input->post('no_telp'),
                'status'    => $this->input->post('status')
            ];

            // Memperbarui data di database
            if ($this->Guru_model->update_guru($id_guru, $updatedData)) {
                $this->session->set_flashdata('message', 'Data guru berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data guru. Coba lagi nanti.');
            }

            redirect('guru'); // Redirect ke halaman daftar guru setelah update
        }

        // Tampilkan form edit jika tidak ada POST data
        $this->load->view('admin/guru_edit', $data);
    }

}
