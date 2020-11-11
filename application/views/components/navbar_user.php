<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-5">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="pedidos">
                <i class="material-icons">shopping_cart</i>
                Pedidos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="material-icons">email</i>
                Mensagens
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('perfil'); ?>">
                <i class="material-icons">perm_identity</i>
                Editar
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="<?= base_url('logoff'); ?>">
                <i class="material-icons">clear</i>
                Sair
            </a>
        </li>
    </ul>
</div>