<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container mb-5">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <div class="row mt-3">
        <div class="col-12 col-md-6">
            <?php if ($item->foto): ?>
                <?php if (count($item->foto) == 1): ?>
                    <img src="<?= base_url($item->foto[0]->nome); ?>" alt="imagem" class="img-fluid border">
                <?php elseif (count($item->foto) > 1): ?>
                    <div id="carouselExampleIndicators" class="carousel max500">
                        <div class="carousel-inner">
                            <?php foreach ($item->foto as $produto => $p): ?>
                                <?php if ($produto == 0): ?>
                                    <div class="carousel-item active">
                                        <img src="<?= base_url($p->nome); ?>" alt="produto<?= $produto; ?>"
                                             class="img-fluid my-auto">
                                    </div>
                                <?php else: ?>
                                    <div class="carousel-item">
                                        <img src="<?= base_url($p->nome); ?>" alt="produto<?= $produto; ?>"
                                             class="img-fluid my-auto">
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="material-icons text-dark" aria-hidden="true">arrow_back_ios</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="material-icons text-dark" aria-hidden="true">arrow_forward_ios</span>
                            <span class="sr-only">Nextaaaaa</span>
                        </a>
                    </div>
                    <div id="controllers" class="owl-carousel">
                        <?php foreach ($item->foto as $produto => $p): ?>
                            <div class="item">
                                <img src="<?= base_url($p->nome); ?>" data-target="#carouselExampleIndicators"
                                     data-slide-to="<?= $produto; ?>" class="img-fluid active">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="col-12 col-md-6">
            <p class="h1 text-uppercase"><?= $item->nome; ?></p>
            <?= ($item->altura) ? '<p class="m-0 p-0 text-capitalize">Altura ' . $item->altura . 'cm</p>' : null; ?>
            <?= ($item->largura) ? '<p class="m-0 p-0 text-capitalize">Largura ' . $item->largura . 'cm</p>' : null; ?>
            <?= ($item->profundidade) ? '<p class="m-0 p-0 text-capitalize">Profundidade ' . $item->profundidade . 'cm</p>' : null; ?>
            <?= ($item->peso != '0.00' && $item->peso) ? '<p class="m-0 p-0 text-capitalize">Peso ' . $item->peso . 'g</p>' : null; ?>

            <?= form_open('carrinhoadd'); ?>
            <?php if ($cores): ?>
                <div class="form-group">
                    <label for="cor" class="text-uppercase">Cores disponíves</label>
                    <select class="custom-select" name="cor">
                        <option value="" hidden>Escolha a Cor</option>
                        <?php foreach ($cores as $cor): ?>
                            <option value="<?= $cor; ?>"><?= $cor; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>

            <?= ($item->preco != '0.00') ? '<p class="mt-lg-3 h4 text-success">R$ ' . moeda_real($item->preco) . '</p>' : null; ?>
            <div class="form-inline">
                <label for="qtd">quantidade</label>
                <input type="number" class="form-control col-2" name="qtd" min="<?= $item->minimo ? $item->minimo : 1; ?>" value="<?= $item->minimo ? $item->minimo : 1; ?>">
                <button class="btn btn-outline-primary ml-3" name="produto" value="<?= $item->id; ?>">
                    Solicitar Orçamento
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col mt-3 mt-lg-5">
            <p class="h5">Descrição</p>
            <p><?= $item->descricao; ?></p>
        </div>
    </div>
</div>