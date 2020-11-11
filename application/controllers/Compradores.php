<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Compradores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        if ($form = $this->input->post()) {
            $form = (object)$form;
            $form->email = strtolower($form->email);
            $this->form_validation->set_rules('email','email','trim|required');
            $this->form_validation->set_rules('senha','senha','trim|required');

            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
            } else {
                if (!$user = $this->compradores_model->getByEmail($form->email)) {
                    set_msg('email não encontrado');
                } else {
                    if (!password_verify($form->senha, $user->senha)) {
                        set_msg('senha invalida');
                    } else {
                        $sts = [
                            'id' => $user->id,
                            'nome' => $user->nome,
                            'login' => $form->email,
                            'status' => 0,
                        ];
                        set_sts($sts);
                        set_msg('bem vindo ' . $user->nome);
                        if ($compra = get_carrinho()) {
                            redirect('finalizar');
                        } else {
                            redirect(base_url());
                        }
                    }
                }
            }
        }

        $dados = [
            'title' => 'login',
            'categorias' => $this->categorias_model->find_all(),
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar_vitrine');
        $this->load->view('compradores/login');
        $this->load->view('components/footer_vitrine');
	}

    public function cadastro()
    {
        if ($form = $this->input->post()) {
            $form = (object)$form;
            $this->form_validation->set_rules('nome','nome','trim|required');
            $this->form_validation->set_rules('email','email','trim|required|is_unique[compradores.email]');
            $this->form_validation->set_rules('senha','senha','trim|required');

            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
                redirect('login');
            } else {
                $person = [
                    'id' => 0,
                    'nome' => $form->nome,
                    'email' => strtolower($form->email),
                    'senha' => password_hash($form->senha, PASSWORD_DEFAULT),
                ];
                if (!$id = $this->compradores_model->update($person)) {
                    set_msg('Erro ao cadastrar');
                    redirect('login');
                } else {
                    $sts = [
                        'id' => $id,
                        'nome' => $form->nome,
                        'login' => $form->email,
                        'status' => 0,
                    ];
                    set_sts($sts);
                    set_msg('bem vindo ' . $form->nome . ' termine seu cadastro para um melhor aproveitamento.');
                    redirect('perfil');
                }
            }
        }
	}

    public function perfil()
    {
        logado();
        $user = $this->compradores_model->find_all(get_sts(false)->id)[0];

        if ($form = $this->input->post()) {
            $form = (object)$form;
            $this->form_validation->set_rules('nome','nome','trim|required');
            $this->form_validation->set_rules('senha','senha','trim');
            $this->form_validation->set_rules('email','email','trim|required');
            if ($user->email != $form->email) {
                $this->form_validation->set_rules('email','email','trim|required|is_unique[compradores.email]');
            }

            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
            } else {
                $person = [
                    'id' => $user->id,
                    'nome' => $form->nome,
                    'email' => strtolower($form->email),
                    'senha' => ($form->senha) ? password_hash($form->senha, PASSWORD_DEFAULT) : $user->senha,
                    'telefone' => $form->telefone,
                    'celular' => $form->celular,
                ];
                if (!$id = $this->compradores_model->update($person)) {
                    set_msg('Erro ao cadastrar');
                } else {
                    $sts = [
                        'id' => $user->id,
                        'nome' => $form->nome,
                        'login' => $form->email,
                        'status' => 0,
                    ];
                    set_sts($sts);
                    if ($compra = get_carrinho()) {
                        redirect('finalizar');
                    } else {
                        set_msg('bem vindo ' . $form->nome);
                        redirect('pedidos');
                    }
                }
            }

        }

        $user->senha = null;


        $dados = [
            'title' => 'Minha conta',
            'categorias' => $this->categorias_model->find_all(),
            'user' => $user,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar_vitrine');
        $this->load->view('components/navbar_user');
        $this->load->view('compradores/perfil');
        $this->load->view('components/footer');
	}

    public function recupera()
    {
        if ($dados_form = $this->input->post()) {
            $dados_form = (object)$dados_form;

            $this->form_validation->set_rules('email', 'email', 'trim|required');

            if (!$this->form_validation->run($dados_form)) {
                set_msg(validation_errors());
            } else {
                if (!$usuario = $this->compradores_model->getByEmail($dados_form->email)) {
                    set_msg('email não registrado');
                } else {
                    $newpass = gerarSenha(10, true, true, true, true);
                    $this->load->library('email');
                    $de = 'comercial@dominioglobal.com.br';
                    $nomede = 'Dominio Global';
                    $assunto = 'Nova Senha PVC Brindes';
                    $corpo = 'Sua nova senha é: ' . $newpass;
                    if (enviaEmail($de, $nomede, $assunto, $usuario->email, $usuario->nome, $corpo)) {
                        $usuario->senha = password_hash($newpass, PASSWORD_DEFAULT);
                        if ($this->compradores_model->update((array)$usuario)) {
                            set_msg('Nova senha enviada para o email ' . $usuario->email);
                        }
                    }
                }
            }
        }

        $dados = [
            'title' => 'recuperar senha',
            'categorias' => $this->categorias_model->find_all(),
        ];

        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar_vitrine');
        $this->load->view('compradores/recuperar');
        $this->load->view('components/footer_vitrine');
    }

    public function logout()
    {
        del_ses(true);
        redirect();
    }
}
