<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-5" ng-controller="pview">
    <p class="h3">Lista de orçamentos</p>
    <table class="table table-hover dataTable">
        <thead>
        <tr>
            <th>Nº</th>
            <th>valor</th>
            <th>Data</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if ($pedidos): ?>
            <?php foreach ($pedidos as $pedido): ?>
                <tr id="u<?= $pedido->id; ?>">
                    <td><?= $pedido->id; ?></td>
                    <td><?= moeda_real($pedido->valor); ?></td>
                    <td><?= date('d/m/Y', strtotime($pedido->data)); ?></td>
                    <td class="text-white text-uppercase <?= ($pedido->status) ? (($pedido->status == 1) ? 'bg-success' : 'bg-primary') : 'bg-danger'; ?>"><?= ($pedido->status) ? (($pedido->status == 1) ? 'finalizado' : 'aberto') : 'cancelado'; ?></td>
                    <td>
                        <button class="btn btn-outline-info material-icons" title="ver pedido"
                                ng-click="ver('<?= $pedido->id; ?>')">
                            search
                        </button>
                        <?php if ($pedido->status == 2): ?>
                            <button class="btn btn-outline-danger material-icons" title="remover pedido"
                                    ng-click="remove('<?= $pedido->id; ?>')">
                                delete
                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="mTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mTitle">Detalhes do Orçamento Nº {{numero}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="h4">Dados do Pedido</p>
                    <p><b>Número</b> {{numero}}</p>
                    <p><b>Data do Pedido</b> {{datap}}</p>
                    <p><b>Valor Total</b> {{total}}</p>
                    <p class="h5 mt-5 border-bottom-0">Dados do(s) Itens</p>
                    <div ng-repeat="item in itens">
                        <hr>
                        <p><b>Nome</b> {{item.item.nome}}</p>
                        <p ng-if="item.cor"><b>Cor</b> {{item.cor}}</p>
                        <p><b>Quantidade</b> {{item.qtd}}</p>
                        <p ng-if="item.valor"><b>Valor Unitário</b> {{item.valor_uni}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>