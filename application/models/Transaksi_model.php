<?php
class Transaksi_model extends CI_Model {

    public function tambah_transaksi($data) {
        return $this->db->insert('transaksi', $data);
    }

    public function get_by_user($id_user) {
        $this->db->select('transaksi.*, data_anak.nama_anak'); // Ambil data dari transaksi dan data_anak
        $this->db->from('transaksi');
        $this->db->join('data_anak', 'transaksi.id_anak = data_anak.id_anak');
        $this->db->where('transaksi.id_user', $id_user);
        return $this->db->get()->result_array();
    }

    public function updateStatus($id, $status) {
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', ['status' => $status]);
    }
}
