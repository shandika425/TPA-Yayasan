<?php

class DataAdmPndftrn extends CI_Controller {

    public function index()
    {
        $this->load->database();
        $data['judul'] = 'Data Administrasi Pendaftaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/index', $data);
        $this->load->view('templates/footer');
    }
}