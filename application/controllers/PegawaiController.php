<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class PegawaiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PegawaiModel');
        $this->load->model('DepartemenModel');
        $this->load->library('form_validation');
        
    }
    
    public function index(){
        $data = array(
            'title' => 'List Pegawai',
            'pegawai' => $this->PegawaiModel->getAll()
        );

        $this->load->view('pegawai/index', $data);
    }

    public function create(){
        $this->form_validation->set_rules('name_pegawai','Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('department_id', 'Nama Departemen', 'required|trim');

        if ($this->form_validation->run() == false) {
			$data = array(
				'title' => 'Tambah Data Pegawai',
				'title' => 'Form Pendaftaran Pasien',
                'departemen' => $this->DepartemenModel->get()
			);

			$this->load->view('pegawai/create', $data);
		} else {
			$data = [
				'name_pegawai' => htmlspecialchars($this->input->post('name_pegawai', true)),
				'department_id' => htmlspecialchars($this->input->post('department_id', true)),
			];
			$this->db->insert('pegawai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Pegawai Berhasil Ditambah.</div>');
            redirect('pegawai');
		}
    }

    public function update($id)
    {
        $row = $this->PegawaiModel->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Update Data Pegawai',
                'id_pegawai' => set_value('id_pegawai', $row->id),
                'name' => set_value('name', $row->name_pegawai),
                'departemen' => $this->DepartemenModel->get()
            );
            $this->load->view('pegawai/update', $data);
        } else {
            redirect('pegawai');
        }
    }

    public function update_proses(){
        $this->form_validation->set_rules('name_pegawai','Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('department_id', 'Nama Departemen', 'required|trim');

      
        if($this->form_validation->run() == true) {
            $id = htmlspecialchars($this->input->post('id_pegawai', true));
            $data = [
				'name_pegawai' => htmlspecialchars($this->input->post('name_pegawai', true)),
				'department_id' => htmlspecialchars($this->input->post('department_id', true)),
			];
			$this->PegawaiModel->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Pegawai Berhasil Ubah.</div>');
            redirect('pegawai');
        }
    }

    public function delete($id){
        $this->db->delete('pegawai', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Pegawai Berhasil Dihapus.</div>');
		redirect('pegawai');
    }

}
