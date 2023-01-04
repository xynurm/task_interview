<?php defined('BASEPATH') or exit('No direct script access allowed');

class DepartemenController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('DepartemenModel');
        $this->load->library('form_validation');
    }


    public function index(){
        $data = array(
            'title' => 'List Departemen',
            'departemen' => $this->DepartemenModel->get()
        );
        $this->load->view('departemen/index',$data);
    }
    public function create(){
        $this->form_validation->set_rules('name_department', 'Nama Departemen', 'required|trim');

        if ($this->form_validation->run() == false){
            $data = array(
                'title' => "Tambah Departemen",
               
            );     
            $this->load->view('departemen/create',$data);
        }else{
            $data = array(
                'name_department' => $this->input->post('name_department')
            );
            $this->db->insert('department', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Departemen Berhasil Ditambah.</div>');
            redirect('pegawai');
        }
    }
}