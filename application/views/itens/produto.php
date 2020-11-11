<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <div class="row">
        <?= var_dump($produto); ?>

        <?php if ($fotos): ?>
            <?php foreach ($fotos as $vitrine): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mx-sm-1 mx-md-1 border">
                    <img src="<?= base_url($vitrine->nome) ?>" alt="<?= $vitrine->nome ?>" class="img-fluid">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>