<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container my-5 py-md-5">
    <?= ($msg = get_msg(true)) ? '<div class="alert alert-warning">' . $msg . '</div>' : null; ?>
	<div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <?= form_open(); ?>
            <p>Recuperação de senha</p>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="email" name="email">
                    <div class="input-group-prepend">
                        <span class="input-group-text material-icons">alternate_email</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Recuperar</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>