<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Itens extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        admin();
    }

    public function index()
    {
        $itens = $this->itens_model->find_all();
        if ($itens) {
            foreach ($itens as $item) {
                $item->preco = moeda_real($item->preco);
            }
        }
        $dados = [
            'title' => 'Itens',
            'itens' => $itens,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('itens/home');
        $this->load->view('components/footer');
    }

    public function init()
    {
        if ($form = $this->input->post()) {
            $file = null;
            $fotos = null;
            if ($_FILES) {
                for ($i = 0; $i < count($_FILES['fotos']['name']); $i++) {
                    $file[] = [
                        'name' => $_FILES['fotos']['name'][$i],
                        'type' => $_FILES['fotos']['type'][$i],
                        'tmp_name' => $_FILES['fotos']['tmp_name'][$i],
                        'error' => $_FILES['fotos']['error'][$i],
                        'size' => $_FILES['fotos']['size'][$i],
                    ];
                }
                for ($i = 0; $i < count($file); $i++) {
                    $_FILES['foto'] = $file[$i];
                    $fotos[] = carregaImg('foto');
                }
            }

            /* Regras de validação */
            $this->form_validation->set_rules('nome', 'nome', 'trim|required|max_length[250]');
            $this->form_validation->set_rules('categoria[]', 'categoria', 'trim|required');
            $this->form_validation->set_rules('altura', 'altura', 'trim');
            $this->form_validation->set_rules('largura', 'largura', 'trim');
            $this->form_validation->set_rules('profundidade', 'profundidade', 'trim');
            $this->form_validation->set_rules('peso', 'peso', 'trim');
            $this->form_validation->set_rules('preco', 'preco', 'trim');
            $this->form_validation->set_rules('descricao', 'descricao', 'trim');
            $this->form_validation->set_rules('minimo', 'minimo', 'trim');

            $form = (object)$form;

            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
            } else {
                $ins = [
                    'id' => 0,
                    'nome' => $form->nome,
                    'altura' => $form->altura,
                    'largura' => $form->largura,
                    'profundidade' => $form->profundidade,
                    'peso' => $form->peso,
                    'preco' => $form->preco,
                    'descricao' => $form->descricao,
                    'status' => 1,
                    'minimo' => $form->minimo,
                ];

                if (!$id = $this->itens_model->update($ins)) {
                    set_msg('Erro ao inserir dados code:IINIT');
                } else {
                    foreach ($form->categoria as $categoria) {
                        $ini = [
                            'item' => $id,
                            'categoria' => $categoria,
                        ];
                        $this->catxitem_model->update($ini);
                    }
                    for ($i = 0; $i < count($fotos); $i++) {
                        if ($fotos[$i][0]) {
                            $photo = [
                                'id' => 0,
                                'nome' => $fotos[$i][1],
                                'itens' => $id,
                            ];
                            $this->fotos_model->update($photo);
                        }
                    }

                    if (isset($form->cores)) {
                        for ($i = 0; $i < count($form->cores); $i++) {
                            $color = [
                                'item' => $id,
                                'cor' => $form->cores[$i],
                            ];
                            $this->corxitem_model->update($color);
                        }
                    }

                    set_msg('Dados inseridos com sucesso');
                    redirect('itens');
                }
            }
        }

        $dados = [
            'title' => 'Itens',
            'categorias' => $this->categorias_model->find_all(),
            'cores' => $this->cores_model->find_all(),
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('itens/init');
        $this->load->view('components/footer');
    }

    public function edit($id)
    {
        if ($form = $this->input->post()) {

            $file = null;
            $fotos = null;
            if ($_FILES) {
                for ($i = 0; $i < count($_FILES['fotos']['name']); $i++) {
                    $file[] = [
                        'name' => $_FILES['fotos']['name'][$i],
                        'type' => $_FILES['fotos']['type'][$i],
                        'tmp_name' => $_FILES['fotos']['tmp_name'][$i],
                        'error' => $_FILES['fotos']['error'][$i],
                        'size' => $_FILES['fotos']['size'][$i],
                    ];
                }
                for ($i = 0; $i < count($file); $i++) {
                    $_FILES['foto'] = $file[$i];
                    $fotos[] = carregaImg('foto');
                }
            }

            /* Regras de validação */
            $this->form_validation->set_rules('nome', 'nome', 'trim|required|max_length[250]');
            $this->form_validation->set_rules('categoria[]', 'categoria', 'trim|required');
            $this->form_validation->set_rules('altura', 'altura', 'trim');
            $this->form_validation->set_rules('largura', 'largura', 'trim');
            $this->form_validation->set_rules('profundidade', 'profundidade', 'trim');
            $this->form_validation->set_rules('peso', 'peso', 'trim');
            $this->form_validation->set_rules('preco', 'preco', 'trim');
            $this->form_validation->set_rules('descricao', 'descricao', 'trim');
            $this->form_validation->set_rules('minimo', 'minimo', 'trim');

            $form = (object)$form;

            if (!$this->form_validation->run($form)) {
                set_msg(validation_errors());
            } else {
                $ins = [
                    'id' => $id,
                    'nome' => $form->nome,
                    'altura' => $form->altura,
                    'largura' => $form->largura,
                    'profundidade' => $form->profundidade,
                    'peso' => $form->peso,
                    'preco' => $form->preco,
                    'descricao' => $form->descricao,
                    'status' => 1,
                    'minimo' => $form->minimo,
                ];
                if (!$this->itens_model->update($ins)) {
                    set_msg('Erro ao inserir dados code:IINIT');
                } else {
                    $this->catxitem_model->delByItem($id);
                    foreach ($form->categoria as $categoria) {
                        $ini = [
                            'item' => $id,
                            'categoria' => $categoria,
                        ];
                        $this->catxitem_model->update($ini);
                    }

                    for ($i = 0; $i < count($fotos); $i++) {
                        if ($fotos[$i][0]) {
                            $photo = [
                                'id' => 0,
                                'nome' => $fotos[$i][1],
                                'itens' => $id,
                            ];
                            $this->fotos_model->update($photo);
                        };
                    }

                    if (isset($form->cores)) {
                        if ($this->corxitem_model->delByItem($id)) {
                            for ($i = 0; $i < count($form->cores); $i++) {
                                $color = [
                                    'item' => $id,
                                    'cor' => $form->cores[$i],
                                ];
                                $this->corxitem_model->update($color);
                            }
                        }
                    }

                    set_msg('Dados inseridos com sucesso');
                    redirect('itens');
                }
            }
        }

        $categorias = $this->catxitem_model->find_all($id);
        foreach ($categorias as $categoria => $cat) {
            $categorias[$categoria] = $cat->categoria;
        }

        $dados = [
            'title' => 'Itens',
            'fotos' => $this->fotos_model->getByItem($id),
            'categorias' => $this->categorias_model->find_all(),
            'selected' => $this->corxitem_model->getColor($id),
            'cores' => $this->cores_model->find_all(),
            'id' => $id,
            'produto' => $this->itens_model->find_all($id)[0],
            'sel_cat' => $categorias,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('itens/edit');
        $this->load->view('components/footer');
    }

    public function produto($id)
    {
        if ($id) {
            $produto = $this->itens_model->find_all($id)[0];
            $fotos = $this->fotos_model->getByItem($id);
            if ($produto) {
                $produto->cor = $this->cores_model->find_all($produto->cor)[0]->cor;
            }
            $dados = [
                'title' => 'Produto',
                'fotos' => $fotos,
                'produto' => $produto,
            ];
            $this->load->vars($dados);
            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/leftmenu');
            $this->load->view('itens/produto');
            $this->load->view('components/footer');
        }
    }

    public function get()
    {
        if ($id = $this->input->get('id')) {
            $categorias = $this->catxitem_model->find_all($id);
            foreach ($categorias as $categoria => $cat) {
                $categorias[$categoria] = $cat->categoria;
            }
            $itens = $this->itens_model->find_all($id)[0];
            $itens->categoria = $categorias;
            $this->output->set_content_type('application/json')->set_output(json_encode($itens));
        } else {
            $this->output->set_status_header(401);
        }
    }

    public function desativa()
    {
        if ($id = $this->input->post('id')) {
            $item = $this->itens_model->find_all($id)[0];
            $item->status = 0;
            if ($this->itens_model->update((array)$item)) {
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
            $item = $this->itens_model->find_all($id)[0];
            $item->status = 1;
            if ($this->itens_model->update((array)$item)) {
                $this->output->set_status_header(200);
            } else {
                $this->output->set_status_header(401);
            }
        } else {
            $this->output->set_status_header(401);
        }
    }
}
