<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container mt-3" ng-controller="corinit">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <table class="table table-hover dataTable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Cor</th>
            <th>Status</th>
            <th>
                <button type="button" class="btn btn-outline-success material-icons" ng-click="ini()">
                    add
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if ($cores): ?>
            <?php foreach ($cores as $cor): ?>
                <tr>
                    <td><?= $cor->id; ?></td>
                    <td><?= $cor->cor; ?></td>
                    <td>
                        <?php if ($cor->status): ?>
                            <i class="material-icons text-success">check</i>
                        <?php else: ?>
                            <i class="material-icons text-danger">block</i>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-info material-icons"
                                ng-click="buscar('<?= $cor->id; ?>')">
                            edit
                        </button>
                        <?php if ($cor->status): ?>
                            <button type="button" class="btn btn-outline-danger material-icons" title="Desativar"
                                    ng-click="desativa('<?= $cor->id; ?>')"id="b<?= $cor->id; ?>">
                                cancel
                            </button>
                        <?php else: ?>
                            <button type="button" class="btn btn-outline-success material-icons" title="Reativar"
                                    ng-click="reativa('<?= $cor->id; ?>')"id="b<?= $cor->id; ?>">
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
    <div class="modal fade" id="cores" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">{{mtitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('corinit', 'name="cor"'); ?>
                <div class="modal-body">
                    <input type="text" class="form-control" name="id" ng-model="id" hidden>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="cor" placeholder="cor" ng-model="nome"
                                   minlength="3" maxlength="100" required>
                            <div class="input-prepend">
                                <div class="input-group-text material-icons text-success" ng-show="cor.cor.$valid">
                                    check
                                </div>
                                <div class="input-group-text material-icons text-danger" ng-show="cor.cor.$invalid">
                                    warning
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-outline-primary btn material-icons" ng-disabled="cor.$invalid">{{mbutton}}
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
