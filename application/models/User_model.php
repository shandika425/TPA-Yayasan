<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // === Untuk Data Anak ===
    public function get_all_anak()
    {
        $this->db->select('data_anak.*, users.nama_wali');
        $this->db->from('data_anak');
        $this->db->join('users', 'users.id_user = data_anak.id_user');
        return $this->db->get()->result_array();
    }

    public function get_anak_by_id($id_anak)
    {
        return $this->db->get_where('data_anak', ['id_anak' => $id_anak])->row_array();
    }

    public function update_anak($id_anak, $data)
    {
        $this->db->where('id_anak', $id_anak);
        return $this->db->update('data_anak', $data);
    }

    public function delete_anak($id_anak)
    {
        return $this->db->delete('data_anak', ['id_anak' => $id_anak]);
    }

    // === Untuk Transaksi Pembayaran ===
    public function get_all_transaksi()
    {
        $this->db->select('transaksi.*, data_anak.nama_anak');
        $this->db->from('transaksi');
        $this->db->join('data_anak', 'transaksi.id_anak = data_anak.id_anak');
        return $this->db->get()->result_array();
    }

    public function update_status_lunas($id_transaksi)
    {
        $data = [
            'status' => 'Lunas',
            'tgl_bayar' => date('Y-m-d')
        ];
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }

    // === Hitungan Guru & Murid ===
    public function count_guru()
    {
        return $this->db->count_all('guru');
    }

    public function count_murid()
    {
        return $this->db->count_all('data_anak');
    }

    public function get_all_guru()
    {
        return $this->db->get('guru')->result_array();
    }

    // === Metode Tambahan: get_by_email() ===
    public function get_by_email($email) {
        $this->db->where('email', $email);
        return $this->db->get('users')->row();
    }

    public function cek_formulir_sudah_isi($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('data_anak');
        return $query->num_rows() > 0;
    }

    public function get_transaksi_by_id($id) {
        $query = $this->db->get_where('transaksi', ['id_transaksi' => $id]);
        return $query->row(); // Kembalikan satu baris data
    }
    

    public function get_last_anak_id($id_user) {
        $this->db->select('id_anak');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_anak', 'DESC');
        $query = $this->db->get('data_anak', 1);
        return $query->row()->id_anak ?? null;
    }

    public function simpan_formulir_tpa($data)
    {
        return $this->db->insert('data_anak', $data);
    }

    public function is_child_registered($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('data_anak');
        return $query->num_rows() > 0;
    }

    public function has_pending_payment($id_user) {
        $this->db->where('id_user', $id_user);
        $this->db->where('status', 'Pending');
        $query = $this->db->get('transaksi');
        return $query->num_rows() > 0;
    }

    public function update_status_transaksi($id_transaksi, $status)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', ['status' => $status]);
    }

    public function get_transaksi_batch($transaksiIds)
    {
        if (empty($transaksiIds)) return false;

        $this->db->where_in('id_transaksi', $transaksiIds);
        $query = $this->db->get('transaksi')->result_array();

        // Debugging: cek isi hasil query
        var_dump($query);
        exit;
    }




    
}
