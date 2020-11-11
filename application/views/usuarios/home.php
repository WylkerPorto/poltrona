<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container" ng-controller="uinit">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <table class="table table-hover dataTable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Login</th>
            <th>
                <button type="button" class="btn btn-outline-success material-icons" ng-click="ini()">
                    add
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if ($usuarios): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario->id; ?></td>
                    <td><?= $usuario->nome; ?></td>
                    <td><?= $usuario->login; ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-info material-icons"
                                ng-click="buscar('<?= $usuario->id; ?>')">
                            edit
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">{{mtitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('userinit', 'name="usuarios"'); ?>
                <div class="modal-body">
                    <input type="text" class="form-control" name="id" ng-model="id" hidden>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" placeholder="nome" ng-model="nome"
                                   minlength="3" maxlength="150" required>
                            <div class="input-prepend">
                                <div class="input-group-text material-icons text-success"
                                     ng-show="usuarios.nome.$valid">check
                                </div>
                                <div class="input-group-text material-icons text-danger"
                                     ng-show="usuarios.nome.$invalid">warning
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="login" placeholder="login" ng-model="login"
                                   minlength="5" maxlength="50" required>
                            <div class="input-prepend">
                                <div class="input-group-text material-icons text-success"
                                     ng-show="usuarios.login.$valid">check
                                </div>
                                <div class="input-group-text material-icons text-danger"
                                     ng-show="usuarios.login.$invalid">warning
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control" name="senha" placeholder="senha"
                                   ng-model="senha" minlength="5" maxlength="50">
                            <div class="input-prepend">
                                <div class="input-group-text material-icons text-success"
                                     ng-show="usuarios.senha.$valid">check
                                </div>
                                <div class="input-group-text material-icons text-danger"
                                     ng-show="usuarios.senha.$invalid">warning
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-outline-primary btn material-icons" ng-disabled="usuarios.$invalid">{{mbutton}}
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">{{mptitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('passedit', 'name="passw"'); ?>
                <div class="modal-body">
                    <input type="text" class="form-control" name="id" ng-model="id">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control" name="senha" placeholder="senha"
                                   ng-model="senha" minlength="5"
                                   maxlength="50" required>
                            <div class="input-prepend">
                                <div class="input-group-text material-icons text-success" ng-show="passw.senha.$valid">
                                    check
                                </div>
                                <div class="input-group-text material-icons text-danger" ng-show="passw.senha.$invalid">
                                    warning
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-outline-primary btn material-icons" ng-disabled="passw.$invalid">{{mpbutton}}
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>