<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid mt-3">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <div class="card-deck flex-md-row">
        <div class="card border-info m-3" style="width: 200px; flex: none;">
            <div class="card-header py-3">
                <span class="text-info material-icons" style="font-size: 48px">shopping_basket</span>
                <span class="h5">Produtos</span>
            </div>
            <div class="card-body p-0 text-center">
                <h2><?= $produtos; ?></h2>
            </div>
        </div>

        <div class="card border-success m-3" style="width: 200px; flex: none;">
            <div class="card-header py-3">
                <span class="material-icons text-success"  style="font-size: 48px">person</span>
                <span class="h5">Clientes</span>
            </div>
            <div class="card-body p-0 text-center">
                <h2><?= $usuarios; ?></h2>
            </div>
        </div>

        <div class="card border-danger m-3" style="width: 200px; flex: none;">
            <div class="card-header py-3">
                <span class="material-icons text-danger"  style="font-size: 48px">store</span>
                <span class="h5">Pedidos</span>
            </div>
            <div class="card-body p-0 text-center">
                <h2><?= $pedidos; ?></h2>
            </div>
        </div>
    </div>
</div>