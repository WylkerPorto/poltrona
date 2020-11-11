<?php if ($sliders->sl1): $active = true; ?>
    <div class="carousel slide" data-ride="carousel" data-pause="false" data-interval="4000" id="slider">
        <div class="carousel-inner">
            <?php if ($sliders->sl1): ?>
                <div class="carousel-item <?php if ($active){ echo 'active'; $active = false;} ?>">
                    <a href="<?= base_url(($sliders->url_sl1 ? $sliders->url_sl1 : '#')); ?>">
                        <img class="d-block w-100" src="<?= base_url('assets/uploads/' . $sliders->sl1); ?>" alt="First slide">
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($sliders->sl2): ?>
                <div class="carousel-item <?php if ($active){ echo 'active'; $active = false;} ?>">
                    <a href="<?= base_url(($sliders->url_sl2 ? $sliders->url_sl2 : '#')); ?>">
                        <img class="d-block w-100" src="<?= base_url('assets/uploads/' . $sliders->sl2); ?>" alt="Second slide">
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($sliders->sl3): ?>
                <div class="carousel-item <?php if ($active){ echo 'active'; $active = false;} ?>">
                    <a href="<?= base_url(($sliders->url_sl3 ? $sliders->url_sl3 : '#')); ?>">
                        <img class="d-block w-100" src="<?= base_url('assets/uploads/' . $sliders->sl3); ?>" alt="Third slide">
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
