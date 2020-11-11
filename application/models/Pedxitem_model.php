<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pedxitem_model extends CI_Model
{
    private $banco = 'pedxitem';

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

    public function find_all($item = false, $pedido = false)
    {
        if ($item) {
            $this->db->where('item', $item);
        }
        if ($pedido) {
            $this->db->where('pedido', $pedido);
        }
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function delByItem($item)
    {
        $this->db->where('item', $item);
        return $query = $this->db->delete($this->banco);
    }
}