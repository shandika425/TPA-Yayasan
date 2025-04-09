<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guru extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('guru_model');
    }

    public function index() {
        $data['data'] = $this->guru_model->get_all();
        $this->load->view('guru/index', $data);
    }

    public function tambah() {
        if ($_POST) {
            $this->guru_model->insert($_POST);
            redirect('guru');
        }
        $this->load->view('guru/form');
    }

    public function edit($id) {
        if ($_POST) {
            $this->guru_model->update($id, $_POST);
            redirect('guru');
        }
        $data['row'] = $this->guru_model->get_by_id($id);
        $this->load->view('guru/form', $data);
    }

    public function hapus($id) {
        $this->guru_model->delete($id);
        redirect('guru');
    }
}
