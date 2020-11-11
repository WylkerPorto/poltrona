<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container mt-md-5 pt-5 text-capitalize">
    <?= form_open('', 'class="col-8 col-md-6 col-lg-4 mx-auto"'); ?>
    <div class="mb-5">
        <img src="<?= base_url('assets/img/logo-dg.png'); ?>" alt="dg-logo" class="img-fluid mx-auto">
    </div>
    <div class="form-group">
        <?= ($msg = get_msg(true)) ? $msg : null; ?>
        <input type="text" class="form-control" name="login" placeholder="login">
        <input type="password" class="form-control" name="senha" placeholder="senha">
        <button class="btn-primary btn btn-block text-capitalize">entrar</button>
    </div>
    <?= form_close(); ?>
    <div class="form-group mt-3 text-center">
        <a href="#">esqueceu sua senha</a>
    </div>
</div>

<p class="text-center mt-5 pt-5">Dominio Global &copy; 2018</p>