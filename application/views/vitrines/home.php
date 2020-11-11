<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <?= ($msg = get_msg(true)) ? $msg : null; ?>
    <?php if (isset($vitrines)): ?>
        <div class="text-center h2">Destaques</div>
        <div class="row">
            <?php if ($vitrines): ?>
                <?php foreach ($vitrines as $vitrine): ?>
                    <div class="col-12 col-sm-6 col-md-4 px-sm-1 p-md-2">
                        <a href="<?= base_url('produtos/' . $vitrine->id); ?>">
                            <?php if ($vitrine->foto): ?>
                                <figure class="text-center" style="height: 200px;">
                                    <img src="<?= base_url($vitrine->foto->nome); ?>" alt="<?= $vitrine->nome; ?>" class="figure-img rounded" style="max-width: 100%; max-height: 100%;">
                                </figure>
                            <?php endif; ?>
                            <p class="text-center"><?= $vitrine->nome; ?></p>
                            <p class="text-center"><?= ($vitrine->preco != '0.00') ? 'R$' . $vitrine->preco : null; ?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <?php if ($extras): ?>
            <?php foreach ($extras as $vitrine): ?>
                <?php if ($vitrine): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 px-sm-1 p-md-2">
                        <a href="<?= base_url('produtos/' . $vitrine->id); ?>">
                            <?php if ($vitrine->foto): ?>
                                <figure class="text-center" style="height: 200px;">
                                    <img src="<?= base_url($vitrine->foto->nome); ?>" alt="<?= $vitrine->nome; ?>" class="figure-img rounded" style="max-width: 100%; max-height: 100%;">
                                </figure>
                            <?php endif; ?>
                            <p class="text-center"><?= $vitrine->nome; ?></p>
                            <p class="text-center"><?= ($vitrine->preco != '0.00') ? 'R$' . $vitrine->preco : null; ?></p>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?php if (isset($gifs->sl1)) : if ($gifs->sl1 || $gifs->sl2) : ?>
    <div class="mt-3 mt-lg-5">
        <?php if ($gifs->sl1) : ?>
            <a href="<?= base_url(($gifs->url_sl1 ? $gifs->url_sl1 : '#')); ?>">
                <img class="w-100 h-100" src="<?= base_url('assets/uploads/' . $gifs->sl1); ?>" alt="<?= $gifs->sl1; ?>">
            </a>
        <?php endif; ?>
        <?php if ($gifs->sl2) : ?>
            <a href="<?= base_url(($gifs->url_sl2 ? $gifs->url_sl2 : '#')); ?>">
                <img class="w-100 h-100" src="<?= base_url('assets/uploads/' . $gifs->sl2); ?>" alt="<?= $gifs->sl2; ?>">
            </a>
        <?php endif; ?>
    </div>
<?php endif; endif; ?>
<div class="container mt-3 mt-lg-5">
    <h2>Localização</h2>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1788.1128177969063!2d-48.81336762893701!3d-26.
31919225469078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94deb16e168e863b%3A0x4304b58cbd7e595a!2sR.+
Miosotes%2C+51+-+F%C3%A1tima%2C+Joinville+-+SC%2C+89229-201!5e0!3m2!1spt-BR!2sbr!4v1534437303935"
        width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>