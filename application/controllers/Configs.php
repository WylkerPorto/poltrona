<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Configs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        admin();
    }

    public function index()
	{
        $dados = [
            'title' => 'ola',
        ];
        $this->load->vars($dados);
        $this->load->view('components/header');
        $this->load->view('components/navbar');
        $this->load->view('components/leftmenu');
        $this->load->view('configs/home');
        $this->load->view('components/footer');
	}
}
