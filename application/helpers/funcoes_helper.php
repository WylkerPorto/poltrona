<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('set_msg')) {
    /*seta uma mensagem via session para ser lida posteriormente*/
    function set_msg($msg = null)
    {
        $ci = &get_instance();
        $ci->session->set_userdata('pol_aviso', $msg);
    }
}

if (!function_exists('get_msg')) {
    /*pega uma mensagem via session e destroi a session*/
    function get_msg($destroy = true)
    {
        $ci = &get_instance();
        $retorno = $ci->session->userdata('pol_aviso');
        if ($destroy) {
            $ci->session->unset_userdata('pol_aviso');
        }
        return $retorno;
    }
}

if (!function_exists('DatetimeNow')) {
    /*pega dia e hora atual*/
    function DatetimeNow()
    {
        $tz_object = new DateTimeZone('Brazil/East');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }
}

if (!function_exists('set_sts')) {
    /*seta uma mensagem via session para ser lida posteriormente*/
    function set_sts($msg = null)
    {
        $ci = &get_instance();
        $ci->session->set_userdata('pol_status', (object)$msg);
    }
}

if (!function_exists('get_sts')) {
    /*pega uma mensagem via session e destroi a session*/
    function get_sts($destroy = false)
    {
        $ci = &get_instance();
        $retorno = $ci->session->userdata('pol_status');
        if ($destroy) {
            $ci->session->unset_userdata('pol_status');
        }
        return $retorno;
    }
}

if (!function_exists('del_ses')) {
    /*pega uma mensagem via session e destroi a session*/
    function del_ses($destroy = true)
    {
        $ci = &get_instance();
        if ($destroy) {
            $ci->session->sess_destroy();
        }
    }
}

if (!function_exists('logado')) {
    /*verifica se esta logado como admin*/
    function logado()
    {
        if ($logado = get_sts(false)) {
            if (!$logado->id || $logado->status !== 0) {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }
}

if (!function_exists('admin')) {
    /*verifica se esta logado como admin*/
    function admin()
    {
        if ($logado = get_sts(false)) {
            if (!$logado->id || !$logado->status) {
                redirect('admin');
            }
        } else {
            redirect('admin');
        }
    }
}

if (!function_exists('moeda_real')) {
    /*pega uma mensagem via session e destroi a session*/
    function moeda_real($num)
    {
        return number_format($num, 2, ',', '.');
    }
}

if (!function_exists('add_carrinho')) {
    /*adiciona produto no carrinho da sessão*/
    function add_carrinho($produto)
    {
        $ci = &get_instance();
        $kart = $ci->session->userdata('pol_kart');
        $kart = (array)$kart;
        $kart[] = $produto;
        $ci->session->set_userdata('pol_kart', (object)$kart);
    }
}

if (!function_exists('edit_carrinho')) {
    /*adiciona produto no carrinho da sessão*/
    function edit_carrinho($produto)
    {
        $ci = &get_instance();
        $kart = $ci->session->userdata('pol_kart');
        if ($kart) {
            foreach ($kart as $item => $k) {
                if (($k->produto == $produto->produto) && ($k->cor == $produto->cor) ) {
                    $kart->$item = $produto;
                }
            }
        }
        $ci->session->set_userdata('pol_kart', $kart);
    }
}

if (!function_exists('rem_carrinho')) {
    /*adiciona produto no carrinho da sessão*/
    function rem_carrinho($produto)
    {
        $ci = &get_instance();
        $kart = $ci->session->userdata('pol_kart');
        if ($kart) {
            foreach ($kart as $item => $k) {
                if (($k->produto == $produto->produto) && ($k->cor == $produto->cor) ) {
                    unset($kart->$item);
                }
            }
        }
        $ci->session->set_userdata('pol_kart', (object)$kart);
    }
}

if (!function_exists('get_carrinho')) {
    /*adiciona produto no carrinho da sessão*/
    function get_carrinho()
    {
        $ci = &get_instance();
        $kart = $ci->session->userdata('pol_kart');
        $kart = (array)$kart;
        return $kart;
    }
}

if (!function_exists('del_carrinho')) {
    /*adiciona produto no carrinho da sessão*/
    function del_carrinho()
    {
        $ci = &get_instance();
        $ci->session->unset_userdata('pol_kart');
    }
}

if (!function_exists('carregaImg')) {
    /*pega uma imagem via $_FILE salva na pasta*/
    function carregaImg($file_input)
    {
        $CI = &get_instance();

        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 4096;
        $config['max_width'] = 2048;
        $config['max_height'] = 2048;
        $config['encrypt_name'] = TRUE;

        $image_data = array();

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0775, $recursive = true);
        }

        $CI->load->library('upload');
        $CI->upload->initialize($config);
        if (!$CI->upload->do_upload($file_input)) {
            return array(false, $CI->upload->display_errors());
        } else {
            $image_data = $CI->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $image_data['full_path'];
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 500;
            $config['height'] = 500;
            $CI->load->library('image_lib');
            $CI->image_lib->clear();
            $CI->image_lib->initialize($config);
            if (!$CI->image_lib->resize()) {
                return array(false, $CI->image_lib->display_errors());
            }
            return array(true, 'assets/uploads/' . $image_data['file_name']);
        }
    }
}

if (!function_exists('gerarSenha')) {
    /* gera uma senha nova ja encriptada */
    function gerarSenha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos)
    {
        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%&*()_+="; // $si contem os símbolos
        $caracter = "";

        if ($maiusculas) {
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
            $caracter .= str_shuffle($ma);
        }

        if ($minusculas) {
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
            $caracter .= str_shuffle($mi);
        }

        if ($numeros) {
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
            $caracter .= str_shuffle($nu);
        }

        if ($simbolos) {
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
            $caracter .= str_shuffle($si);
        }

        // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($caracter), 0, $tamanho);
    }
}

if (!function_exists('enviaEmail')) {
    /* envia email */
    function enviaEmail($de, $denome, $assunto, $para, $paranome, $conteudo)
    {
        $CI = &get_instance();
        $CI->load->library('email');

        $config['protocol'] = 'mail';
        $config['wordwrap'] = TRUE;
        $config['validate'] = TRUE;
        $config['mailtype'] = 'text';

        $CI->email->initialize($config);
        $CI->email->from($de, $denome);
        $CI->email->to($para ,$paranome);

        $CI->email->subject($assunto);
        $CI->email->message($conteudo);

        return $CI->email->send();
    }
}