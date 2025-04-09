<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('kegiatan_model');
    }

    public function index() {
        $data['data'] = $this->kegiatan_model->get_all();
        $this->load->view('kegiatan/index', $data);
    }

    public function tambah() {
        if ($_POST) {
            $this->kegiatan_model->insert($_POST);
            redirect('kegiatan');
        }
        $this->load->view('kegiatan/form');
    }

    public function edit($id) {
        if ($_POST) {
            $this->kegiatan_model->update($id, $_POST);
            redirect('kegiatan');
        }
        $data['row'] = $this->kegiatan_model->get_by_id($id);
        $this->load->view('kegiatan/form', $data);
    }

    public function hapus($id) {
        $this->kegiatan_model->delete($id);
        redirect('kegiatan');
    }
}
