<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        logado();

        $pedidos = $this->pedidos_model->getByComprador(get_sts()->id);

        $dados = [
            'title' => 'Minha conta',
            'categorias' => $this->categorias_model->find_all(),
            'pedidos' => $pedidos,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar_vitrine');
        $this->load->view('components/navbar_user');
        $this->load->view('pedidos/home');
        $this->load->view('components/footer');
    }

    public function finalizar()
    {
        logado();

        $carrinho = get_carrinho();
        if ($carrinho) {
            $item = null;
            $pedido = [
                'id' => 0,
                'data' => DatetimeNow(),
                'comprador' => get_sts()->id,
                'status' => 2,
            ];
            $id = $this->pedidos_model->update($pedido);
            $total = 0;
            foreach ($carrinho as $car) {
                if ($produto = $this->itens_model->find_all($car->produto)[0]) {
                    $pedxitem = [
                        'id' => 0,
                        'pedido' => $id,
                        'item' => $car->produto,
                        'qtd' => $car->qtd,
                        'cor' => isset($car->cor) ? $car->cor : null,
                        'valor_uni' => $produto->preco,
                    ];
                    $this->pedxitem_model->update($pedxitem);
                    $total += $produto->preco * $car->qtd;
                    $item .= $produto->nome . ' - ';
                }
            }
            $pedido['id'] = $id;
            $pedido['valor'] = $total;
            $this->pedidos_model->update($pedido);
            del_carrinho();

            $comprador = $this->compradores_model->find_all(get_sts()->id)[0];

            $this->load->library('email');
            $de = $comprador->email;
            $nomede = $comprador->nome;
            $assunto = 'Solicitação de Orçamento Nº ' . $id;
            $corpo = 'Novo pedido feito, itens: ' . $item;
            $para = 'vendas@pvcbrindes.com.br';
            enviaEmail($de, $nomede, $assunto, $para, 'PVC Brindes', $corpo);
        }
        redirect('pedidos');
    }

    public function cancelar()
    {
        logado();
        if (!$form = $this->input->post()) {
            $this->output->set_status_header(401);
        } else {
            $form = (object)$form;
            if ($pedido = $this->pedidos_model->find_all($form->id)[0]) {
                if ($pedido->status == 2 && $pedido->comprador == get_sts()->id) {
                    $pedido->status = 0;
                    $pedido->fechado = DatetimeNow();
                    if ($this->pedidos_model->update((array)$pedido)) {
                        $this->output->set_status_header(200);
                    } else {
                        $this->output->set_status_header(401);
                    }
                } else {
                    $this->output->set_status_header(401);
                }
            } else {
                $this->output->set_status_header(401);
            }
        }
    }

    public function detalhe()
    {
        logado();
        if ($pedido = $this->input->post('pedido')) {
            $pedidos = $this->pedidos_model->find_all($pedido)[0];
            if ($pedidos) {
                $pedidos->item = $this->pedxitem_model->find_all(false, $pedidos->id);
                foreach ($pedidos->item as $item) {
                    $item->item = $this->itens_model->find_all($item->item)[0];
                }
                $pedidos->valor = moeda_real($pedidos->valor);
                $pedidos->data = date('d/m/Y', strtotime($pedidos->data));
                $pedidos->fechado =  ($pedidos->fechado) ? date('d/m/Y', strtotime($pedidos->fechado)) : null;
                $this->output->set_content_type('application/json')->set_output(json_encode($pedidos));
            } else {
                $this->output->set_status_header(401);
            }
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function admin()
    {
        admin();
        $pedidos = $this->pedidos_model->getByComprador(false, 2);
        if ($pedidos) {
            foreach ($pedidos as $pedido) {
                $pedido->comprador = $this->compradores_model->find_all($pedido->comprador)[0];
                $pedido->comprador->senha = null;
            }
        }

        $dados = [
            'title' => 'Configurar vitrine',
            'pedidos' => $pedidos,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('pedidos/admin');
        $this->load->view('components/footer');
    }

    public function vendas()
    {
        admin();
        $pedidos = $this->pedidos_model->getByComprador(false, 1);
        if ($pedidos) {
            foreach ($pedidos as $pedido) {
                $pedido->comprador = $this->compradores_model->find_all($pedido->comprador)[0];
                $pedido->comprador->senha = null;
            }
        }

        $dados = [
            'title' => 'Configurar vitrine',
            'pedidos' => $pedidos,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('pedidos/vendas');
        $this->load->view('components/footer');
    }

    public function detalhes()
    {
        admin();
        if ($pedido = $this->input->post('pedido')) {
            $pedidos = $this->pedidos_model->find_all($pedido)[0];
            if ($pedidos) {
                $pedidos->item = $this->pedxitem_model->find_all(false, $pedidos->id);
                foreach ($pedidos->item as $item) {
                    $item->item = $this->itens_model->find_all($item->item)[0];
                }
                $pedidos->comprador = $this->compradores_model->find_all($pedidos->comprador)[0];
                $pedidos->comprador->senha = null;
                $pedidos->valor = moeda_real($pedidos->valor);
                $pedidos->data = date('d/m/Y', strtotime($pedidos->data));
                $pedidos->fechado =  ($pedidos->fechado) ? date('d/m/Y', strtotime($pedidos->fechado)) : null;
                $this->output->set_content_type('application/json')->set_output(json_encode($pedidos));
            } else {
                $this->output->set_status_header(401);
            }
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function remover()
    {
        admin();
        if (!$form = $this->input->post()) {
            $this->output->set_status_header(401);
        } else {
            $form = (object)$form;
            if ($pedido = $this->pedidos_model->find_all($form->id)[0]) {
                if ($pedido->status == 2) {
                    $pedido->status = 0;
                    $pedido->fechado = DatetimeNow();
                    if ($this->pedidos_model->update((array)$pedido)) {
                        $this->output->set_status_header(200);
                    } else {
                        $this->output->set_status_header(401);
                    }
                } else {
                    $this->output->set_status_header(401);
                }
            } else {
                $this->output->set_status_header(401);
            }
        }
    }

    public function promover()
    {
        admin();
        if (!$form = $this->input->post()) {
            $this->output->set_status_header(401);
        } else {
            $form = (object)$form;
            if ($pedido = $this->pedidos_model->find_all($form->id)[0]) {
                if ($pedido->status == 2) {
                    $pedido->status = 1;
                    $pedido->fechado = DatetimeNow();
                    if ($this->pedidos_model->update((array)$pedido)) {
                        $this->output->set_status_header(200);
                    } else {
                        $this->output->set_status_header(401);
                    }
                } else {
                    $this->output->set_status_header(401);
                }
            } else {
                $this->output->set_status_header(401);
            }
        }
    }
}
