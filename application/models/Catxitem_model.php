<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Catxitem_model extends CI_Model
{
    private $banco = 'catxitem';

    public function __construct()
    {
        parent::__construct();
    }

    public function update($dados)
    {
        $this->db->where('item', $dados['item']);
        $this->db->where('categoria', $dados['categoria']);
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            $this->db->where('item', $dados['item']);
            $this->db->where('categoria', $dados['categoria']);
            $this->db->update($this->banco, $dados);
            return true;
        } else {
            $this->db->insert($this->banco, $dados);
            return $this->db->insert_id();
        }
    }

    public function find_all($item = false, $categoria = false)
    {
        if ($item) {
            $this->db->where('item', $item);
        }
        if ($categoria) {
            $this->db->where('categoria', $categoria);
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