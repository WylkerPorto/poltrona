<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        admin();
    }

    public function index()
    {
        $cores = $this->cores_model->find_all(false, 0);
        $dados = [
            'title' => 'cores',
            'cores' => $cores,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('cores/home');
        $this->load->view('components/footer');
    }

    public function init()
    {
        if ($form = $this->input->post()) {
            /* Regras de validação */
            $this->form_validation->set_rules('cor', 'cor', 'trim|required|max_length[100]|is_unique[cores.cor]');

            $form = (object)$form;
            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
            } else {
                $ins = [
                    'id' => $form->id,
                    'cor' => $form->cor,
                    'status' => 1,
                ];
                if (!$this->cores_model->update($ins)) {
                    set_msg('Erro ao inserir dados code:CoINIT.');
                    redirect('cor');
                } else {
                    set_msg('Dados inseridos com sucesso.');
                    redirect('cor');
                }
            }
        }
    }

    public function get()
    {
        if ($id = $this->input->get('id')) {
            $cor = $this->cores_model->find_all($id)[0];
            $this->output->set_content_type('application/json')->set_output(json_encode($cor));
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function desativa()
    {
        if ($id = $this->input->post('id')) {
            $cor = $this->cores_model->find_all($id, 0)[0];
            $cor->status = 0;
            if ($this->cores_model->update((array)$cor)) {
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
            $cor = $this->cores_model->find_all($id, 0)[0];
            $cor->status = 1;
            if ($this->cores_model->update((array)$cor)) {
                $this->output->set_status_header(200);
            } else {
                $this->output->set_status_header(401);
            }
        } else {
            $this->output->set_status_header(401);
        }
    }
}
