<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container my-5 py-md-5">
    <?= ($msg = get_msg(true)) ? '<div class="alert alert-warning">' . $msg . '</div>' : null; ?>
	<div class="row">
        <div class="col-12 col-md-6 border-right border-left">
            <?= form_open(); ?>
            <p>Entrar</p>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="email" name="email">
                    <div class="input-group-prepend">
                        <span class="input-group-text material-icons">alternate_email</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="senha" name="senha">
                    <div class="input-group-prepend">
                        <span class="input-group-text material-icons">lock</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Entrar</button>
            </div>
            <?= form_close(); ?>
            <p><a href="<?= base_url('recuperar'); ?>">esqueci a senha</a></p>
        </div>
        <div class="col-12 col-md-6 border-right border-left">
            <?= form_open('cadastro'); ?>
            <p>Cadastre-se</p>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="nome" name="nome">
                    <div class="input-group-prepend">
                        <span class="input-group-text material-icons">person</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="email" name="email">
                    <div class="input-group-prepend">
                        <span class="input-group-text material-icons">alternate_email</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="senha" name="senha">
                    <div class="input-group-prepend">
                        <span class="input-group-text material-icons">lock</span>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Cadastrar</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>