<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container mt-3">
    <div class="h2">Lista de Clientes</div>
    <table class="table table-hover table-sm dataTable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($clientes): ?>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente->id; ?></td>
                    <td><?= $cliente->nome; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
