<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model
{
    private $banco = 'pedidos';

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

    public function getByComprador($comprador = false, $status = false)
    {
        if ($status !== false) {
            $this->db->where('status', $status);
        }
        if ($comprador) {
            $this->db->where('comprador', $comprador);
        }
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getByPedido($comprador, $produto)
    {
        $this->db->where('comprador', $comprador);
        $this->db->where('item', $produto);
        $this->db->where('status', 2);
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function find_all($id = false)
    {
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

    public function remove($id, $usuario)
    {
        $this->db->where('id', $id);
        $this->db->where('comprador', $usuario);
        $this->db->where('status', 2);
        return $this->db->delete($this->banco);
    }
}