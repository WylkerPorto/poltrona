<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container mt-3" ng-controller="catinit">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <table class="table table-hover dataTable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>
                <button type="button" class="btn btn-outline-success material-icons" ng-click="ini()">
                    add
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if ($categorias): ?>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= $categoria->id; ?></td>
                    <td><?= $categoria->nome; ?></td>
                    <td>
                        <?php if ($categoria->status): ?>
                            <i class="material-icons text-success">check</i>
                        <?php else: ?>
                            <i class="material-icons text-danger">block</i>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-info material-icons"
                                ng-click="buscar('<?= $categoria->id; ?>')">
                            edit
                        </button>
                        <?php if ($categoria->status): ?>
                            <button type="button" class="btn btn-outline-danger material-icons" title="Desativar"
                                    ng-click="desativa('<?= $categoria->id; ?>')" id="b<?= $categoria->id; ?>">
                                cancel
                            </button>
                        <?php else: ?>
                            <button type="button" class="btn btn-outline-success material-icons" title="Reativar"
                                    ng-click="reativa('<?= $categoria->id; ?>')" id="b<?= $categoria->id; ?>">
                                check_circle
                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="categorias" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">{{mtitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('catinit', 'name="categoria"'); ?>
                <div class="modal-body">
                    <input type="text" class="form-control" name="id" ng-model="id" hidden>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" placeholder="categoria" ng-model="nome"
                                   minlength="1" maxlength="50" required>
                            <div class="input-prepend">
                                <div class="input-group-text material-icons text-success" ng-show="categoria.nome.$valid">check</div>
                                <div class="input-group-text material-icons text-danger" ng-show="categoria.nome.$invalid">warning</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-outline-primary btn material-icons" ng-disabled="categoria.$invalid">{{mbutton}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>