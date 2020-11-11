<?php defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('session', 'form_validation', 'upload', 'database');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'file', 'form', 'funcoes');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('categorias_model', 'configs_model', 'cores_model', 'fotos_model', 'itens_model', 'usuarios_model',
    'vitrines_model', 'sliders_model', 'corxitem_model', 'compradores_model', 'pedidos_model', 'catxitem_model', 'pedxitem_model');
