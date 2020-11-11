<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container" ng-controller="iedit">
    <?= form_open_multipart('', 'name="item"'); ?>
    <?= ($msg = get_msg(true)) ? $msg : null; ?>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" placeholder="Ex: Vermila" value="<?= $produto->nome; ?>" minlength="3" maxlength="250" required>
    </div>
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <select class="custom-select" name="categoria[]" multiple required>
            <?php if ($categorias): ?>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria->id; ?>" <?= (in_array($categoria->id, $sel_cat, true)) ? 'selected' : null; ?>><?= $categoria->nome; ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="cores">Cores</label>
        <div class="row">
            <?php if ($cores): ?>
                <?php foreach ($cores as $cor): ?>
                    <div class="col-2">
                        <input type="checkbox" name="cores[]" value="<?= $cor->id; ?>" id="<?= $cor->cor; ?>"
                            <?php if ($selected) {
                                for ($i = 0; $i < count($selected); $i++) {
                                    echo ($selected[$i]->cor == $cor->id) ? 'checked' : null;
                                }
                            } ?>>
                        <label for="<?= $cor->cor; ?>"><?= $cor->cor; ?></label>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group">
        <label for="altura">Altura em cm</label>
        <input type="number" class="form-control" name="altura" placeholder="Ex: 115" value="<?= $produto->altura; ?>" step=".01">
    </div>
    <div class="form-group">
        <label for="largura">Largura em cm</label>
        <input type="number" class="form-control" name="largura" placeholder="Ex: 300" value="<?= $produto->largura; ?>" step=".01">
    </div>
    <div class="form-group">
        <label for="profundidade">Profundidade em cm</label>
        <input type="number" class="form-control" name="profundidade" placeholder="Ex: 50" value="<?= $produto->profundidade; ?>" step=".01">
    </div>
    <div class="form-group">
        <label for="peso">Peso em gramas</label>
        <input type="number" class="form-control" name="peso" placeholder="Ex: 6500" value="<?= $produto->peso; ?>" step=".01">
    </div>
    <div class="form-group">
        <label for="preco">Preço</label>
        <input type="number" class="form-control" name="preco" placeholder="1350.50" value="<?= $produto->preco; ?>" step=".01">
    </div>
    <div class="form-group">
        <label for="minimo">Minímo</label>
        <input type="number" class="form-control" name="minimo" placeholder="100" value="<?= $produto->minimo; ?>" step="1">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" class="form-control" ck-editor placeholder="Ex: caneta legal" rows="10"><?= $produto->descricao; ?></textarea>
    </div>
    <div class="row">
        <?php if ($fotos): ?>
            <?php foreach ($fotos as $foto): ?>
                <div class="col-12 col-md-4 col-lg-3" id="<?= $foto->id; ?>">
                    <div class="row h-75">
                        <img src="<?= base_url($foto->nome); ?>" alt="foto" class="img-fluid mx-auto">
                    </div>
                    <div class="row">
                        <button class="btn btn-outline-danger w-100 material-icons" type="button" ng-click="deletar('<?= $foto->id; ?>', '<?= $foto->nome; ?>')">delete</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="descricao">Fotos (max 2048 x 2048 4mb)</label>
        <input type="file" name="fotos[]" accept=".png, .jpg, .gif" multiple>

        <div class="form-group">
            <button class="btn-outline-primary btn" ng-disabled="item.$invalid"><i class="material-icons">add</i>Salvar</button>
        </div>
        <?= form_close(); ?>
    </div>
</div>