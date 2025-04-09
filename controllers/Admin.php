<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index() {
        $data['data'] = $this->admin_model->get_all();
        $this->load->view('admin/index', $data);
    }

    public function tambah() {
        if ($_POST) {
            $this->admin_model->insert($_POST);
            redirect('admin');
        }
        $this->load->view('admin/form');
    }

    public function edit($id) {
        if ($_POST) {
            $this->admin_model->update($id, $_POST);
            redirect('admin');
        }
        $data['row'] = $this->admin_model->get_by_id($id);
        $this->load->view('admin/form', $data);
    }

    public function hapus($id) {
        $this->admin_model->delete($id);
        redirect('admin');
    }
}
