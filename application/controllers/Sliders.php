<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        admin();
    }

    public function edit()
    {
        $ini = $this->sliders_model->find_all(1);
        if ($form = $_FILES) {
            if (!$ini) {
                $ini = (object)[];
            }
            $ini->id = 1;
            if (isset($form['img1'])) {
                if ($form['img1']['name']) {
                    $nome = $this->salva_image('sl1', 'img1');
                    if ($nome[0] == 1) {
                        $ini->sl1 = $nome[1];
                    }
                }
            }
            if (isset($form['img2'])) {
                if ($form['img2']['name']) {
                    $nome = $this->salva_image('sl2', 'img2');
                    if ($nome[0] == 1) {
                        $ini->sl2 = $nome[1];
                    }
                }
            }
            if (isset($form['img3'])) {
                if ($form['img3']['name']) {
                    $nome = $this->salva_image('sl3', 'img3');
                    if ($nome[0] == 1) {
                        $ini->sl3 = $nome[1];
                    }
                }
            }
        }

        if ($form = $this->input->post()) {
            $ini->url_sl1 = ($form['url_sl1']) ? $form['url_sl1'] : $ini->url_sl1;
            $ini->url_sl2 = ($form['url_sl2']) ? $form['url_sl2'] : $ini->url_sl2;
            $ini->url_sl3 = ($form['url_sl3']) ? $form['url_sl3'] : $ini->url_sl3;
            $this->sliders_model->update((array)$ini);
        }

        $dados = [
            'title' => 'Configurar slider',
            'itens' => $ini,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('sliders/edit');
        $this->load->view('components/footer');
    }

    public function gif()
    {
        $ini = $this->sliders_model->find_all(2);
        if ($form = $_FILES) {
            if (!$ini) {
                $ini = (object)[];
            }
            $ini->id = 2;
            if (isset($form['img1'])) {
                if ($form['img1']['name']) {
                    $nome = $this->salva_image('gf1', 'img1');
                    if ($nome[0] == 1) {
                        $ini->sl1 = $nome[1];
                    }
                }
            }
            if (isset($form['img2'])) {
                if ($form['img2']['name']) {
                    $nome = $this->salva_image('gf2', 'img2');
                    if ($nome[0] == 1) {
                        $ini->sl2 = $nome[1];
                    }
                }
            }
        }

        if ($form = $this->input->post()) {
            $ini->url_sl1 = ($form['url_sl1']) ? $form['url_sl1'] : $ini->url_sl1;
            $ini->url_sl2 = ($form['url_sl2']) ? $form['url_sl2'] : $ini->url_sl2;
            $this->sliders_model->update((array)$ini);
        }

        $dados = [
            'title' => 'Configurar Gifs',
            'itens' => $ini,
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('sliders/gif');
        $this->load->view('components/footer');
    }

    public function get()
    {
        if ($id = $this->input->get('id')) {
            $itens = $this->sliders_model->find_all(1);
            $this->output->set_content_type('application/json')->set_output(json_encode($itens));
        } else {
            $this->output->set_status_header(401);
        }
    }

    private function salva_image($filename, $pathname)
    {
        /* Tenta salvar imagem */
        $config['file_name'] = $filename;
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;
        $config['overwrite'] = true;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0775);
        }

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($pathname)) {
            /* verifica se o erro é de arquivo não selecionado */
            if (strlen($this->upload->display_errors()) != 43) {
                return $this->upload->display_errors();
            } else {
                return [1, $this->upload->data('file_name')];
            }
        } else {
            return [1, $this->upload->data('file_name')];
        }

    }
}
