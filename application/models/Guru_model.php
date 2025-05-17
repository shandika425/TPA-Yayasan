<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // === Create: Menambahkan Guru Baru ===
    public function guru_tambah($data)
    {
        return $this->db->insert('guru', $data);
    }

    // === Read: Mendapatkan Semua Data Guru ===
    public function get_all_guru()
    {
        return $this->db->get('guru')->result_array();
    }

    // === Read: Mendapatkan Data Guru Berdasarkan ID ===
    public function get_guru_by_id($id_guru)
    {
        return $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
    }

    // === Update: Memperbarui Data Guru ===
    public function update_guru($id_guru, $updatedData)
    {
        $this->db->where('id_guru', $id_guru);
        return $this->db->update('guru', $updatedData);
    }

    // === Delete: Menghapus Data Guru ===
    public function delete_guru($id_guru)
    {
        $this->db->where('id_guru', $id_guru);
        return $this->db->delete('guru');
    }

    // === Hitungan Guru Aktif ===
    public function count_aktif_guru()
    {
        $this->db->where('status', 'aktif');
        return $this->db->count_all_results('guru');
    }

    // === Hitungan Guru Tidak Aktif ===
    public function count_tidak_aktif_guru()
    {
        $this->db->where('status', 'tidak aktif');
        return $this->db->count_all_results('guru');
    }

    // === Mencari Guru Berdasarkan Nama ===
    public function search_guru_by_name($name)
    {
        $this->db->like('nama_guru', $name);
        return $this->db->get('guru')->result_array();
    }
}
