<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container my-5">
    <?= form_open('', 'class="col-6 mx-auto"'); ?>
    <h2>Entre em contato conosco.</h2>
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <div class="form-group mt-5">
        <label for="nome">Nome</label>
        <input type="email" class="form-control" id="nome" name="nome" placeholder="Ex: Edilson">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Ex: edilson@example.com">
    </div>
    <div class="form-group">
        <label for="corpo">Mensagem</label>
        <textarea class="form-control" id="corpo" name="corpo" rows="5" style="resize: none;"></textarea>
    </div>
    <button class="btn btn-success">enviar</button>
    <?= form_close(); ?>
</div>