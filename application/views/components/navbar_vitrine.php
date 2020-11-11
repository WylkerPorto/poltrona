<div class="sticky-top bg-light">
    <div class="collapse d-md-none bg-azul" id="busca">
        <?= form_open(base_url(), 'method="GET"'); ?>
        <input type="text" class="form-control-lg text-uppercase w-100" name="item" placeholder="buscar..">
        <button class="nav-link material-icons enquadra2">search</button>
        <?= form_close(); ?>
    </div>
    <header class="navbar navbar-light navbar-expand-md text-capitalize bd-navbar flex-column p-0 p-md-2">
        <div class="d-flex w-100">
            <div class="text-center">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url('assets/img/logo-vitrine.png'); ?>" alt="logo" class="img-fluid">
                </a>
            </div>
            <div class="w-lg-100 ml-3 ml-sm-5">
                <div class="text-right text-nowrap">
                    <span><i class="material-icons align-bottom">phone</i>Televendas: (99) 9 9999-9999</span>
                </div>
                <div class="d-flex flex-row">
                    <?= form_open(base_url(), 'class="collapse navbar-collapse input-group justify-content-end" method="GET"'); ?>
                    <input type="text" class="form-control-lg text-uppercase" name="item" placeholder="buscar..">
                    <button class="nav-link material-icons enquadra">search</button>
                    <?= form_close(); ?>
                    <button class="nav-link material-icons enquadra d-md-none ml-0" data-toggle="collapse"
                        data-target="#busca" aria-expanded="false" aria-controls="busca">
                        search
                    </button>
                    <a class="nav-link text-capitalize carrinho d-flex" href="<?= base_url('carrinho'); ?>">
                        <i class="material-icons">shopping_cart</i>
                        <div class="my-auto">
                            <span>Meu</span>
                            <span>carrinho</span>
                        </div>
                    </a>
                    <a class="nav-link text-capitalize perfil d-flex" href="<?= base_url('pedidos'); ?>">
                        <i class="material-icons">person</i>
                        <div class="my-auto">
                            <span>perfil</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="my-auto">
                <a class="nav-link p-0 text-capitalize" href="<?= base_url('quem_somos'); ?>">
                    <i class="material-icons text-blue">group</i>
                    <span class="text-blue">quem somos</span>
                </a>
            </div>
            <div class="my-auto">
                <button class="btn btn-light dropdown-toggle btn-sm text-uppercase" data-toggle="collapse"
                    data-target="#mprodutos" aria-expanded="false" aria-controls="mprodutos">
                    Produtos
                </button>
            </div>
            <div class="my-auto">
                <a class="nav-link p-0 text-capitalize" href="<?= base_url('fale_conosco'); ?>">
                    <i class="material-icons text-blue">mail</i>
                    <span class="text-blue">fale conosco</span>
                </a>
            </div>
        </div>
    </header>
    <div class="collapse bg-azul" id="mprodutos">
        <div class="p-2 text-uppercase text-center">
            <?php if ($categorias) : ?>
            <?php foreach ($categorias as $categoria) : ?>
            <a class="mx-2" href="<?= base_url($categoria->id); ?>">
                <span class="text-white d-inline-flex"><?= $categoria->nome; ?></span>
            </a>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>