<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vitrines extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $vitrine = $this->vitrines_model->find_all();
        $saida = [];
        if ($vitrine) {
            $i = 0;
            foreach ($vitrine as $item) {
                $i++;
                if ($item) {
                    $item = $this->itens_model->find_all($item, 1)[0];
                } else {
                    $total = ($this->itens_model->find_all(false)) ? count($this->itens_model->find_all(false)) : 0;
                    $item = $this->itens_model->find_all(rand(1, $total), 1)[0];
                }
                if ($item) {
                    $item->foto = $this->fotos_model->getByItem($item->id)[0];
                    $saida[$i] = $item;
                }
            }
        }

        $valmin = $this->input->get('valmin');
        $valmax = $this->input->get('valmax');
        $order = $this->input->get('order');
        $contem = $this->input->get('item');
        $vitrine = $this->itens_model->getByFilter($valmin, $valmax, $order, 24, $contem);
        $saida = ($valmin || $valmax || $order || $contem) ? null : $saida;
        $vitrine = ($valmin || $valmax || $order || $contem) ? $vitrine : null;

        if ($vitrine) {
            foreach ($vitrine as $item) {
                if ($item) {
                    $item->foto = $this->fotos_model->getByItem($item->id)[0];
                }
            }
        }

        $dados = [
            'title' => 'Vitrine de Produtos',
            'vitrines' => $saida,
            'extras' => $vitrine,
            'categorias' => $this->categorias_model->find_all(),
            'sliders' => $this->sliders_model->find_all(1),
            'gifs' => $this->sliders_model->find_all(2),
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar_vitrine');
        $this->load->view('components/slider');
        $this->load->view('vitrines/home');
        $this->load->view('components/footer_vitrine');
    }

    public function buscar($cat = null)
    {
        $valmin = $this->input->get('valmin');
        $valmax = $this->input->get('valmax');
        $order = $this->input->get('order');
        $contem = $this->input->get('item');
        $vitrine = false;

        if (!$ativa = $this->categorias_model->find_all($cat)) {
            redirect();
        }

        $categorias = $this->catxitem_model->find_all(false, $cat);
        if ($categorias) {
            foreach ($categorias as $categoria) {
                $vitrine[] = $this->itens_model->getByFilter($valmin, $valmax, $order, false, $contem, $categoria->item)[0];
            }
        }

        if ($vitrine) {
            foreach ($vitrine as $item) {
                if ($item) {
                    $item->foto = $this->fotos_model->getByItem($item->id)[0];
                }
            }
        }

        $dados = [
            'title' => $ativa[0]->nome,
            'extras' => $vitrine,
            'categorias' => $this->categorias_model->find_all(),
            'sliders' => $this->sliders_model->find_all(1),
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar_vitrine');
        $this->load->view('vitrines/home');
        $this->load->view('components/footer_vitrine');
    }

    public function preview($id = null)
    {
        if ($item = $this->itens_model->find_all($id, 1)[0]) {
            $item->foto = $this->fotos_model->getByItem($item->id);
            $cores = $this->corxitem_model->getColor($id);
            if ($cores) {
                foreach ($cores as $c => $cor) {
                    $cores[$c] = $this->cores_model->find_all((int)$cor->cor)[0]->cor;
                }
            }
            $dados = [
                'title' => $item->nome,
                'item' => $item,
                'categorias' => $this->categorias_model->find_all(),
                'cores' => $cores,
            ];
            $this->load->vars($dados);
            $this->load->view('components/header');
            $this->load->view('components/navbar_vitrine');
            $this->load->view('vitrines/preview');
            $this->load->view('components/footer_vitrine');
        } else {
            set_msg('item indisponível');
            redirect();
        }

    }

    public function edit()
    {
        admin();
        if ($form = $this->input->post()) {
            /* Regras de validação */
            $this->form_validation->set_rules('rand1', 'rand1', 'trim|integer');
            $this->form_validation->set_rules('rand2', 'rand2', 'trim|integer');
            $this->form_validation->set_rules('rand3', 'rand3', 'trim|integer');
            $this->form_validation->set_rules('rand4', 'rand4', 'trim|integer');
            $this->form_validation->set_rules('rand5', 'rand5', 'trim|integer');
            $this->form_validation->set_rules('rand6', 'rand6', 'trim|integer');

            $form = (object)$form;
            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
            } else {
                $ins = [
                    'id' => 1,
                    'rand_v1' => $form->rand1,
                    'rand_v2' => $form->rand2,
                    'rand_v3' => $form->rand3,
                    'rand_v4' => $form->rand4,
                    'rand_v5' => $form->rand5,
                    'rand_v6' => $form->rand6,
                ];
                if (!$this->vitrines_model->update($ins)) {
                    set_msg('Erro ao configurar vitrine code:VEDIT');
                } else {
                    set_msg('Vitrine configurada com sucesso');
                    redirect();
                }
            }
        }
        $dados = [
            'title' => 'Configurar vitrine',
            'itens' => $this->itens_model->find_all(false, 1),
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('vitrines/edit');
        $this->load->view('components/footer');
    }

    public function get()
    {
        if ($id = $this->input->get('id')) {
            $itens = $this->vitrines_model->find_all();
            $this->output->set_content_type('application/json')->set_output(json_encode($itens));
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function vitrine()
    {
        if ($id = $this->input->get('id')) {
            $vitrine = $this->vitrines_model->find_all();
            if ($vitrine) {
                foreach ($vitrine as $item) {
                    if ($item) {
                        $item = $this->fotos_model->find_all($item);
                    } else {
                        $total = count($this->fotos_model->find_all());
                        $item = $this->fotos_model->find_all(rand(1, $total));
                    }
                }
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($vitrine));
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function carrinho()
    {
        if ($this->input->post('produto')) {
            $form = $this->input->post();
            rem_carrinho((object)$form);
        }
        $itens = null;
        if ($carrinho = get_carrinho()) {
            foreach ($carrinho as $produto) {
                $temp['qtd'] = $produto->qtd;
                $temp['cor'] = isset($produto->cor) ? $produto->cor : false;
                $temp['produto'] = $this->itens_model->find_all($produto->produto)[0];
                $temp['img'] = $this->fotos_model->getByItem($produto->produto)[0];
                $itens[] = (object)$temp;
            }
        }
        $dados = [
            'title' => 'Pré visualização',
            'categorias' => $this->categorias_model->find_all(),
            'itens' => $itens,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar_vitrine');
        $this->load->view('vitrines/carrinho');
        $this->load->view('components/footer_vitrine');
    }

    public function addcarrinho()
    {
        if ($form = $this->input->post()) {
            $form = (object)$form;
            add_carrinho($form);
            redirect('carrinho');
        }
    }

    public function editcarrinho()
    {
        if ($form = $this->input->post()) {
            $form = (object)$form;
            edit_carrinho($form);
            redirect('carrinho');
        }
    }
}
