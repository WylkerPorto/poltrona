<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container" ng-controller="vedit" ng-init="buscar('1')">
    <p class="text-center">Selecione os itens que aparecerão na área destaque da vitrine.</p>
    <?= form_open('', 'name="vitrines"'); ?>
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <div class="form-row">
        <div class="form-group col-12 col-lg-4">
            <label for="rand1">Primeiro item</label>
            <select name="rand1" id="rand1" ng-model="rand1" class="custom-select">
                <option value="0">Aleatório</option>
                <?php if ($itens): ?>
                    <?php foreach ($itens as $item): ?>
                        <option value="<?= $item->id; ?>"><?= $item->nome; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group col-12 col-lg-4">
            <label for="rand2">Segundo item</label>
            <select name="rand2" id="rand2" ng-model="rand2" class="custom-select">
                <option value="0">Aleatório</option>
                <?php if ($itens): ?>
                    <?php foreach ($itens as $item): ?>
                        <option value="<?= $item->id; ?>"><?= $item->nome; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group col-12 col-lg-4">
            <label for="rand3">Terceiro item</label>
            <select name="rand3" id="rand3" ng-model="rand3" class="custom-select">
                <option value="0">Aleatório</option>
                <?php if ($itens): ?>
                    <?php foreach ($itens as $item): ?>
                        <option value="<?= $item->id; ?>"><?= $item->nome; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12 col-lg-4">
            <label for="rand4">Quarto item</label>
            <select name="rand4" id="rand4" ng-model="rand4" class="custom-select">
                <option value="0">Aleatório</option>
                <?php if ($itens): ?>
                    <?php foreach ($itens as $item): ?>
                        <option value="<?= $item->id; ?>"><?= $item->nome; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group col-12 col-lg-4">
            <label for="rand5">Quinto item</label>
            <select name="rand5" id="rand5" ng-model="rand5" class="custom-select">
                <option value="0">Aleatório</option>
                <?php if ($itens): ?>
                    <?php foreach ($itens as $item): ?>
                        <option value="<?= $item->id; ?>"><?= $item->nome; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group col-12 col-lg-4">
            <label for="rand6">Sexto item</label>
            <select name="rand6" id="rand6" ng-model="rand6" class="custom-select">
                <option value="0">Aleatório</option>
                <?php if ($itens): ?>
                    <?php foreach ($itens as $item): ?>
                        <option value="<?= $item->id; ?>"><?= $item->nome; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <button class="btn-outline-primary btn material-icons" ng-disabled="vitrines.$invalid">add</button>
    </div>
    <?= form_close(); ?>
</div>