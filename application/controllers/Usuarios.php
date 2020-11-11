<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        admin();
        $usuarios = $this->usuarios_model->find_all();
        if ($usuarios) {
            foreach ($usuarios as $usuario) {
                $usuario->senha = null;
            }
        }
        $dados = [
            'title' => 'Usuarios',
            'usuarios' => $usuarios,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('usuarios/home');
        $this->load->view('components/footer');
    }

    public function init()
    {
        admin();
        if ($form = $this->input->post()) {

            /* Regras de validação */
            $this->form_validation->set_rules('nome', 'nome', 'trim|required|max_length[150]');
            $this->form_validation->set_rules('login', 'login', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('senha', 'senha', 'trim');

            $form = (object)$form;
            $user = $this->usuarios_model->find_all($form->id)[0];
            if ($form->login != $user->login) {
                $this->form_validation->set_rules('login', 'login', 'trim|required|max_length[50]|is_unique[usuarios.login]');
            }

            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
            } else {
                $ins = [
                    'id' => $form->id,
                    'nome' => $form->nome,
                    'login' => $form->login,
                    'senha' => ($form->senha) ? password_hash($form->senha, PASSWORD_DEFAULT) : $user->senha,
                ];
                if (!$this->usuarios_model->update($ins)) {
                    set_msg('Erro ao inserir dados code:UEDIT');
                    redirect('user');
                } else {
                    set_msg('Dados inseridos com sucesso');
                    redirect('user');
                }
            }
        }
    }

    public function login()
    {
        ($logado = get_sts(false)) ? ($logado->id) ? redirect('painel') : null : null;
        if ($form = $this->input->post()) {
            /* Regras de validação */
            $this->form_validation->set_rules('login', 'login', 'trim|required');
            $this->form_validation->set_rules('senha', 'senha', 'trim|required');

            $form = (object)$form;
            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
            } else {
                if (!$user = $this->usuarios_model->getByLogin($form->login)) {
                    set_msg('Login invalido!');
                } else {
                    if (!password_verify($form->senha, $user->senha)) {
                        set_msg('Senha invalida!');
                    } else {
                        $status = [
                            'id' => $user->id,
                            'nome' => $user->nome,
                            'login' => $user->login,
                            'status' => 1,
                        ];
                        set_sts($status);
                        redirect('painel');
                    }
                }
            }
        }
        $dados = [
            'title' => 'Login',
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('usuarios/login');
        $this->load->view('components/footer');
    }

    public function logout()
    {
        del_ses(true);
        redirect('admin');
    }

    public function get()
    {
        admin();
        if ($id = $this->input->get('id')) {
            $usuario = $this->usuarios_model->find_all($id)[0];
            if ($usuario) {
                $usuario->senha = null;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($usuario));
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function clientes()
    {
        admin();
        $dados = [
            'title' => 'Clientes',
            'clientes' => $this->compradores_model->find_all(),
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('compradores/lista');
        $this->load->view('components/footer');
    }
}
