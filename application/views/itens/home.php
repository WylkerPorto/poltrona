<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container mt-3" ng-controller="ihome">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <table class="table table-hover dataTable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Status</th>
            <th>
                <a href="<?= base_url('iteminit'); ?>" class="btn btn-outline-success material-icons" title="Novo">
                    add
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if ($itens): ?>
            <?php foreach ($itens as $item): ?>
                <tr>
                    <td><?= $item->id; ?></td>
                    <td><?= $item->nome; ?></td>
                    <td><?= $item->preco; ?></td>
                    <td>
                        <?php if ($item->status): ?>
                            <i class="material-icons text-success">check</i>
                        <?php else: ?>
                            <i class="material-icons text-danger">block</i>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="grupo de botões">
                            <a href="<?= base_url('itemedit/' . $item->id); ?>" class="btn btn-outline-info material-icons"
                               title="editar">
                                edit
                            </a>
                            <?php if ($item->status): ?>
                                <button class="btn btn-outline-danger material-icons" title="Pausar a venda"
                                        ng-click="desativa('<?= $item->id; ?>')" id="b<?= $item->id; ?>">
                                    event_busy
                                </button>
                            <?php else: ?>
                            <button class="btn btn-outline-success material-icons" title="Retomar a venda"
                                    ng-click="reativa('<?= $item->id; ?>')" id="b<?= $item->id; ?>">
                                event_available
                            </button>
                        </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>