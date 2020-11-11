<div class="sticky-top">
    <header class="navbar navbar-light navbar-expand-md bg-light p-0 text-capitalize bd-navbar flex-column flex-md-row">
        <div class="col-1 d-none d-lg-block">
            <div class="row border-bottom border-blue"></div>
            <div class="row"></div>
        </div>
        <div class="navbar-brand text-center mx-0 py-0">
            <a href="<?= base_url(); ?>">
                <img src="<?= base_url('assets/img/logo-vitrine.png'); ?>" alt="logo" class="img-fluid">
            </a>
        </div>
        <div class="col-12 col-md-9 col-lg-8">
            <div class="row border-bottom border-blue">
                <ul class="navbar-nav flex-row w-100">
                    <li class="nav-item text-nowrap mr-3 my-auto" style="width: inherit">
                        <?= form_open('' . base_url() . '', 'method="GET"'); ?>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control text-uppercase" name="item" placeholder="buscar..">
                            <div class="input-group-append">
                                <button class="input-group-text material-icons">search</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </li>
                    <li class="nav-item text-nowrap">
                        <a class="nav-link text-capitalize" href="<?= base_url('carrinho'); ?>">
                            <i class="material-icons text-blue">shopping_cart</i>
                            <span class="text-blue">carrinho</span>
                            <span class="badge badge-pill badge-success"><?= ($car = get_carrinho()) ? count($car) : null; ?></span>
                        </a>
                    </li>
                    <li class="nav-item text-nowrap">
                        <a class="nav-link text-capitalize" href="<?= base_url('pedidos'); ?>">
                            <i class="material-icons text-blue">person</i>
                            <span class="text-blue">perfil</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="navbar-nav flex-row w-100 justify-content-around">
                    <div class="nav-item text-nowrap">
                        <a class="nav-link text-capitalize" href="<?= base_url('quem_somos'); ?>">
                            <i class="material-icons text-blue">group</i>
                            <span class="text-blue">quem somos</span>
                        </a>
                    </div>
                    <div class="nav-item my-auto">
                        <button class="btn btn-light dropdown-toggle btn-sm text-uppercase" data-toggle="collapse" data-target="#mprodutos" aria-expanded="false" aria-controls="mprodutos">
                            Produtos
                        </button>
                    </div>
                    <div class="nav-item text-nowrap">
                        <a class="nav-link text-capitalize" href="<?= base_url('fale_conosco'); ?>">
                            <i class="material-icons text-blue">mail</i>
                            <span class="text-blue">fale conosco</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1 d-none d-lg-block">
            <div class="row border-bottom border-blue"></div>
            <div class="row"></div>
        </div>
    </header>
    <div class="collapse bg-azul" id="mprodutos">
        <div class="p-2 text-uppercase text-center">
            <?php if ($categorias): ?>
                <?php foreach ($categorias as $categoria): ?>
                    <a class="mx-2" href="<?= base_url($categoria->id); ?>">
                        <span class="text-white d-inline-flex"><?= $categoria->nome; ?></span>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
