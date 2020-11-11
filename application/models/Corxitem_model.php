<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Corxitem_model extends CI_Model
{
    private $banco = 'corxitem';

    public function __construct()
    {
        parent::__construct();
    }

    public function update($dados)
    {
        $this->db->where('item', $dados['item']);
        $this->db->where('cor', $dados['cor']);
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            $this->db->where('item', $dados['item']);
            $this->db->where('cor', $dados['cor']);
            $this->db->update($this->banco, $dados);
            return true;
        } else {
            $this->db->insert($this->banco, $dados);
            return $this->db->insert_id();
        }
    }

    public function find_all($item = false, $cor = false)
    {
        if ($item) {
            $this->db->where('item', $item);
        }
        if ($cor) {
            $this->db->where('cor', $cor);
        }
        $query = $this->db->get($this->banco);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getColor($item = false)
    {
        $this->db->select('cor');
        if ($item) {
            $this->db->where('item', $item);
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