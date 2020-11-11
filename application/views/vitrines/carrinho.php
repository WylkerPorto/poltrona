<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $totini = 0;
$tottal = 0; ?>
<div class="container-fluid"  style="height: 100vh">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th width="100px">Produto</th>
            <th></th>
            <th width="150px">Quantidade</th>
            <th>Cor</th>
            <th>Val. Uni.</th>
            <th>Val. Total</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if ($itens): ?>
            <?php foreach ($itens as $item): ?>
                <tr>
                    <td>
                        <?php if ($item->img): ?>
                            <img src="<?= base_url($item->img->nome); ?>" alt="produto<?= $item->produto->id; ?>"
                                 style="max-height: 100px; max-width: 150px;">
                        <?php endif; ?>
                    </td>
                    <td><?= $item->produto->nome; ?></td>
                    <td>
                        <?= form_open('carrinhoedit'); ?>
                        <input type="text" name="cor" value="<?= $item->cor; ?>" hidden>
                        <div class="input-group">
                            <input type="number" name="qtd" min="1" value="<?= $item->qtd; ?>"
                                   class="form-control">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-info material-icons input-group-text" name="produto"
                                        value="<?= $item->produto->id; ?>">
                                    autorenew
                                </button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </td>
                    <td><?= $item->cor; ?></td>
                    <td><?php echo moeda_real($item->produto->preco);
                        $totini += $item->produto->preco; ?></td>
                    <td><?php echo moeda_real($item->produto->preco * $item->qtd);
                        $tottal += ($item->produto->preco * $item->qtd); ?></td>
                    <td>
                        <?= form_open(); ?>
                        <input type="text" name="cor" value="<?= $item->cor; ?>" hidden>
                        <button class="btn btn-outline-danger material-icons" name="produto" type="submit"
                                value="<?= $item->produto->id; ?>">
                            cancel
                        </button>
                        <?= form_close(); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?= moeda_real($totini); ?></td>
            <td><?= moeda_real($tottal); ?></td>
            <td>
                <?php if ($itens): ?>
                    <a href="finalizar" class="btn btn-outline-success">Finalizar</a>
                <?php endif; ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>