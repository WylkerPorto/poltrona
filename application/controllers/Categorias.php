<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        admin();
    }

    public function index()
    {
        $categorias = $this->categorias_model->find_all(false, 0);
        $dados = [
            'title' => 'categorias',
            'categorias' => $categorias,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('categorias/home');
        $this->load->view('components/footer');
    }

    public function init()
    {
        if ($form = $this->input->post()) {
            /* Regras de validação */
            $this->form_validation->set_rules('nome', 'nome', 'trim|required|max_length[50]|is_unique[categorias.nome]');

            $form = (object)$form;
            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
            } else {
                $ins = [
                    'id' => $form->id,
                    'nome' => $form->nome,
                    'status' => 1,
                ];
                if (!$this->categorias_model->update($ins)) {
                    set_msg('Erro ao inserir dados code:CaINIT.');
                    redirect('cat');
                } else {
                    set_msg('Dados inseridos com sucesso.');
                    redirect('cat');
                }
            }
        }
    }

    public function get()
    {
        if ($id = $this->input->get('id')) {
            $categoria = $this->categorias_model->find_all($id)[0];
            $this->output->set_content_type('application/json')->set_output(json_encode($categoria));
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function desativa()
    {
        if ($id = $this->input->post('id')) {
            $cat = $this->categorias_model->find_all($id, 0)[0];
            $cat->status = 0;
            if ($this->categorias_model->update((array)$cat)) {
                $this->output->set_status_header(200);
            } else {
                $this->output->set_status_header(401);
            }
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function reativa()
    {
        if ($id = $this->input->post('id')) {
            $cat = $this->categorias_model->find_all($id, 0)[0];
            $cat->status = 1;
            if ($this->categorias_model->update((array)$cat)) {
                $this->output->set_status_header(200);
            } else {
                $this->output->set_status_header(401);
            }
        } else {
            $this->output->set_status_header(401);
        }
    }
}
