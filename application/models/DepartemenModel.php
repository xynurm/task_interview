<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class DepartemenModel extends CI_Model
{
    public $table = 'department';
    public $id = 'id';

    public function get()
    {
        return $this->db->get($this->table)->result();
    }

}


