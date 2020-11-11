<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model{
    private $banco = 'categorias';

    public function __construct()
    {
        parent::__construct();
    }

    public function update($dados)
    {
        $this->db->where('id', $dados['id']);
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            $this->db->where('id', $dados['id']);
            $this->db->update($this->banco, $dados);
            return true;
        } else {
            $this->db->insert($this->banco, $dados);
            return $this->db->insert_id();
        }
    }

    public function find_all($id = false, $status = 1)
    {
        if ($id) {
            $this->db->where('id', $id);
        }
        if ($status) {
            $this->db->where('status', $status);
        }
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}