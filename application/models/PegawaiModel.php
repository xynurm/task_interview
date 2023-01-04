<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PegawaiModel extends CI_Model
{
    public $table = 'pegawai';
    public $id = 'id';

    public function getAll()
    {
        $query = $this->db->select("*, pegawai.id as pegawai_id , department.id as department_id", false);
        $this->db->from("pegawai");
        $this->db->join('department','department.id= pegawai.department_id');
        return $query->get()->result();
    }   

    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    public function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}
}