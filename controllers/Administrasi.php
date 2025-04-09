<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('administrasi_model');
    }

    public function index() {
        $data['data'] = $this->administrasi_model->get_all();
        $this->load->view('administrasi/index', $data);
    }

    public function tambah() {
        if ($_POST) {
            $this->administrasi_model->insert($_POST);
            redirect('administrasi');
        }
        $this->load->view('administrasi/form');
    }

    public function edit($id) {
        if ($_POST) {
            $this->administrasi_model->update($id, $_POST);
            redirect('administrasi');
        }
        $data['row'] = $this->administrasi_model->get_by_id($id);
        $this->load->view('administrasi/form', $data);
    }

    public function hapus($id) {
        $this->administrasi_model->delete($id);
        redirect('administrasi');
    }
}
