<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Itens_model extends CI_Model{
    private $banco = 'itens';

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

    public function find_all($id = false, $status = false)
    {
        if ($status) {
            $this->db->where('status', $status);
        }
        if ($id) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByFilter($valmin = false, $valmax = false, $order = false, $limite = false, $contem = false, $id = false)
    {
        if ($contem) {
            $this->db->like('nome', $contem);
        }
        if ($valmin) {
            $this->db->where('preco >=', $valmin);
        }
        if ($valmax) {
            $this->db->where('preco <=', $valmax);
        }
        if ($order) {
            $this->db->order_by('preco', $order);
        }
        if ($id) {
            $this->db->where('id', $id);
        }
        if ($limite) {
            $this->db->limit($limite);
        }
        $this->db->where('status', 1);
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}