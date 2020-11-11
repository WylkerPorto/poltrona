<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-5">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <?= form_open(); ?>
    <p>Alterar informações de perfil</p>
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="nome" name="nome" value="<?= $user->nome; ?>">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">person</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="email" class="form-control" placeholder="email" name="email" value="<?= $user->email; ?>">
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
        <div class="input-group">
            <input type="tel" class="form-control tel" placeholder="telefone" name="telefone"
                   value="<?= $user->telefone; ?>">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">phone</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="tel" class="form-control cel" placeholder="celular" name="celular"
                   value="<?= $user->celular; ?>">
            <div class="input-group-prepend">
                <span class="input-group-text material-icons">smartphone</span>
            </div>
        </div>
    </div>
    <button class="btn btn-primary">Atualizar</button>
    <?= form_close(); ?>
</div>