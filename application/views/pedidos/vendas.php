<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid mt-5" ng-controller="vendas">
    <p class="h3">Lista de produtos vendidos</p>
    <table class="table table-hover dataTableCres">
        <thead>
        <tr>
            <th>Nº</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Data</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php if ($pedidos): ?>
            <?php foreach ($pedidos as $pedido): ?>
                <tr id="u<?= $pedido->id; ?>">
                    <td><?= $pedido->id; ?></td>
                    <td><?= $pedido->comprador->nome; ?></td>
                    <td><?= moeda_real($pedido->valor); ?></td>
                    <td><?= date('d/m/Y', strtotime($pedido->fechado)); ?></td>
                    <td>
                        <button class="btn btn-outline-info material-icons" title="detalhes"
                                ng-click="buscar('<?= $pedido->id; ?>')">
                            search
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="detalhes" tabindex="-1" role="dialog" aria-labelledby="detalheTitulo"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalheTitulo">{{mtitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="h4">Dados do comprador</p>
                    <p><b>Nome</b> {{cnome}}</p>
                    <p><b>Email</b> {{cemail}}</p>
                    <p><b>Telefone</b> {{ctel}}</p>
                    <p><b>Celular</b> {{ccel}}</p>
                    <p class="h4 mt-5 border-bottom-0">Dados do pedido</p>
                    <p><b>Código</b> {{pcod}}</p>
                    <p><b>Valor Total</b> {{total}}</p>
                    <p><b>Data do pedido</b> {{data}}</p>
                    <p><b>Data da venda</b> {{venda}}</p>
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