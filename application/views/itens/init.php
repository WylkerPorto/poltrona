<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <?= form_open_multipart('', 'name="item"'); ?>
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <div class="form-group">
        <label for="nome">Nome</label>
        <div class="input-group">
            <input type="text" class="form-control" name="nome" placeholder="Ex: Vermila" ng-model="nome" minlength="3" maxlength="250" required>
            <div class="input-prepend">
                <div class="input-group-text material-icons text-success" ng-show="item.nome.$valid">check</div>
                <div class="input-group-text material-icons text-danger" ng-show="item.nome.$invalid">warning</div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="categoria">Categoria(s)</label>
        <div class="input-group">
            <select class="custom-select" name="categoria[]" ng-model="categoria" multiple required>
                <?php if ($categorias): ?>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria->id; ?>"><?= $categoria->nome; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <div class="input-prepend">
                <div class="input-group-text material-icons text-success" ng-show="item.categoria.$valid">check</div>
                <div class="input-group-text material-icons text-danger" ng-show="item.categoria.$invalid">warning</div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="cores">Cores</label>
        <div class="row">
            <?php if ($cores): ?>
                <?php foreach ($cores as $cor): ?>
                    <div class="col-2">
                        <input type="checkbox" name="cores[]" value="<?= $cor->id; ?>"><?= $cor->cor; ?></input>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <label for="altura">Altura em cm</label>
        <input type="number" class="form-control" name="altura" placeholder="Ex: 115" ng-model="altura" step=".01">
    </div>
    <div class="form-group">
        <label for="largura">Largura em cm</label>
        <input type="number" class="form-control" name="largura" placeholder="Ex: 300" ng-model="largura" step=".01">
    </div>
    <div class="form-group">
        <label for="profundidade">Profundidade em cm</label>
        <input type="number" class="form-control" name="profundidade" placeholder="Ex: 50" ng-model="profundidade" step=".01">
    </div>
    <div class="form-group">
        <label for="peso">Peso em gramas</label>
        <input type="number" class="form-control" name="peso" placeholder="Ex: 6500" ng-model="peso" step=".01">
    </div>
    <div class="form-group">
        <label for="preco">Preço</label>
        <input type="number" class="form-control" name="preco" placeholder="1350.50" ng-model="preco" step=".01">
    </div>
    <div class="form-group">
        <label for="minimo">Minímo</label>
        <input type="number" class="form-control" name="minimo" placeholder="100" ng-model="minimo" step="1">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" class="form-control" ck-editor placeholder="Ex: caneta legal" rows="10" style="resize: none" ng-model="descricao"></textarea>
    </div>
    <div class="form-group">
        <label for="descricao">Fotos (max 2048 x 2048 4mb)</label>
        <input type="file" name="fotos[]" accept=".png, .jpg, .gif" multiple>
    </div>
    <div class="form-group">
        <button class="btn-outline-primary btn btn-lg" ng-disabled="item.$invalid"><i class="material-icons">add</i>Salvar</button>
    </div>
    <?= form_close(); ?>
</div>

<script>
    CKEDITOR.replace('ckeditor');
</script>