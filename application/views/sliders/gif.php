<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container" ng-controller="sledit">
    <p class="text-center">Selecione as imagens que aparecerão na parte inferior da vitrine.</p>
    <?= form_open_multipart('', 'name="slider"'); ?>
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <div class="form-row">
        <div class="form-group col-12">
            <label for="img1">Primeira imagem</label>
            <input type="text" name="url_sl1" class="form-control" placeholder="Link" value="<?= ($itens->url_sl1) ? $itens->url_sl1 : null ; ?>" id="url_sl1">
            <input type="file" name="img1" accept=".jpg, .png, .gif">
        </div>
        <div class="form-group col-12">
            <label for="img2">Segunda imagem</label>
            <input type="text" name="url_sl2" class="form-control" placeholder="Link" value="<?= ($itens->url_sl2) ? $itens->url_sl2 : null ; ?>" id="url_sl2">
            <input type="file" name="img2" accept=".jpg, .png, .gif">
        </div>
        <div class="form-group">
            <button class="btn-outline-primary btn material-icons btn-lg">add</button>
        </div>
    </div>
    <?= form_close(); ?>

    <div class="row">
        <?php if ($itens): ?>
            <?php $i = 0; ?>
            <?php foreach ($itens as $k => $item): ?>
                <?php if ($item): ?>
                    <?php if (($k == 'sl1') || ($k == 'sl2') || ($k == 'sl3')): ?>
                        <div class="col-12 col-md-4" id="sl<?= $i; ?>">
                            imagem <?= $i; ?>
                            <div>
                                <img src="<?= base_url('assets/uploads/' . $item); ?>" alt="slider" class="img-fluid mx-auto">
                            </div>
                            <div class="row">
                                <button class="btn btn-outline-danger material-icons w-100" ng-click="deletar(2, '<?= $item ?>')">
                                    delete
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>