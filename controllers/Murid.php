<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class murid extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('murid_model');
    }

    public function index() {
        $data['data'] = $this->murid_model->get_all();
        $this->load->view('murid/index', $data);
    }

    public function tambah() {
        if ($_POST) {
            $this->murid_model->insert($_POST);
            redirect('murid');
        }
        $this->load->view('murid/form');
    }

    public function edit($id) {
        if ($_POST) {
            $this->murid_model->update($id, $_POST);
            redirect('murid');
        }
        $data['row'] = $this->murid_model->get_by_id($id);
        $this->load->view('murid/form', $data);
    }

    public function hapus($id) {
        $this->murid_model->delete($id);
        redirect('murid');
    }
}
