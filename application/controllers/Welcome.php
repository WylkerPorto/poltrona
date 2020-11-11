<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $dados = [
            'title' => 'pvc brindes',
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('home');
        $this->load->view('components/footer');
    }

    public function painel()
    {
        admin();
        $dados = [
            'title' => 'painel administrativo',
            'produtos' => ($this->itens_model->find_all()) ? count($this->itens_model->find_all()) : 0,
            'usuarios' => ($this->compradores_model->find_all()) ? count($this->compradores_model->find_all()) : 0,
            'pedidos' => ($this->pedidos_model->getByComprador(null, 2)) ? count($this->pedidos_model->getByComprador(null, 2)) : 0,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('painel');
        $this->load->view('components/footer');
    }

    public function somos()
    {
        $dados = [
            'title' => 'Quem Somos',
            'categorias' => $this->categorias_model->find_all(),
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar_vitrine');
        $this->load->view('somos');
        $this->load->view('components/footer_vitrine');
    }

    public function fale()
    {
        if ($dados_form = $this->input->post()) {

            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('nome', 'nome', 'trim|required');
            $this->form_validation->set_rules('corpo', 'corpo', 'trim|required');

            if (!$this->form_validation->run($dados_form)) {
                set_msg(validation_errors());
            } else {
                $this->load->library('email');
                $para = 'vendas@pvcbrindes.com.br';
                $nomepara = 'PVC Brindes';
                $assunto = 'Contato através do site';
                $corpo = $dados_form['nome'] . ' entrou em contato pelo site para dizer que\n' . $dados_form['corpo'];
                if (enviaEmail($dados_form['email'], $dados_form['nome'], $assunto, $para, $nomepara, $corpo)) {
                    set_msg('Obrigado por nos contactar ' . $dados_form['nome']);
                }
            }
        }

        $dados = [
            'title' => 'Fale Conosco',
            'categorias' => $this->categorias_model->find_all(),
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar_vitrine');
        $this->load->view('fale');
        $this->load->view('components/footer_vitrine');
    }
}
