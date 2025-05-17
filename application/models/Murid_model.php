<?php

class Murid_model extends CI_Model {
    public function hitung_murid() {
        return $this->db->count_all('data_anak');
    }
}
