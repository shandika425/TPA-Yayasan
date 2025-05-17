<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myayasan extends CI_Model
{
    public function get_member()
    {
        return $this->db->get('users'); // Ambil data dari tabel 'members'
    }
}
?>
