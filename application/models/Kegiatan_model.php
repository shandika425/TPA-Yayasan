<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {

    public function get_all_kegiatan()
    {
        // Mengambil semua data kegiatan
        return $this->db->get('kegiatan')->result();
    }

    public function insert_kegiatan($data)
    {
        // Menambahkan data kegiatan baru
        return $this->db->insert('kegiatan', $data);
    }

    public function get_kegiatan_by_id($id_kegiatan)
    {
        // Mengambil data kegiatan berdasarkan ID
        return $this->db->get_where('kegiatan', ['id_kegiatan' => $id_kegiatan])->row();
    }

    public function update_kegiatan($id_kegiatan, $data)
    {
        // Memperbarui data kegiatan berdasarkan ID
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->update('kegiatan', $data);
    }

    public function delete_kegiatan($id_kegiatan)
    {
        // Menghapus data kegiatan berdasarkan ID
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->delete('kegiatan');
    }
}
