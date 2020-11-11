<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        admin();
    }

    public function del()
    {
        if ($name = $this->input->get('name')) {
            $id = $this->input->get('id');
            $nome = 'sl' . substr($name, 2, 1);
            $url = 'url_sl' . substr($name, 2, 1);
            $itens = $this->sliders_model->find_all($id);
            $itens->$nome = null;
            $itens->$url = null;
            if ($this->sliders_model->update((array)$itens)) {
                if ($foi = unlink('assets/uploads/' . $name)) {
                    $this->output->set_content_type('application/json')->set_output(json_encode($nome));
                    $this->output->set_status_header(200);
                }
            }
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function delet()
    {
        if ($foto = $this->input->get()) {
            if ($this->fotos_model->delete($foto)) {
                if ($foi = unlink($foto['nome'])) {
                    $this->output->set_content_type('application/json')->set_output(json_encode($foto['id']));
                    $this->output->set_status_header(200);
                }
            }
        } else {
            $this->output->set_status_header(401);
        }
    }
}
