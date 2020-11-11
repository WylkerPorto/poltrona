<div class="container-fluid text-capitalize">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-3 col-lg-2 bd-sidebar bg-cinza sticky-top">
            <nav class="bd-links collapse" id="leftmenu">
                <div class="bd-toc-item">
                    <a class="bd-toc-link dropdown-item" href="<?= base_url('painel'); ?>">
                        <i class="material-icons">home</i>
                        painel
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link dropdown-item" href="<?= base_url('user'); ?>">
                        <i class="material-icons">group</i>
                        usuarios
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link dropdown-item" href="<?= base_url('vitrinedit'); ?>">
                        <i class="material-icons">view_quilt</i>
                        vitrine
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link dropdown-item" href="<?= base_url('slidedit'); ?>">
                        <i class="material-icons">view_carousel</i>
                        slider
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link dropdown-item" href="<?= base_url('gifedit'); ?>">
                        <i class="material-icons">subscriptions</i>
                        gif's
                    </a>
                </div>
                <div class="bd-toc-item active">
                    <span class="bd-toc-link">
                        <i class="material-icons">create</i>
                        cadastros
                    </span>
                    <ul class="nav bd-sidenav">
                        <li class="nav-item">
                        <li>
                            <a class="dropdown-item pl-5" href="<?= base_url('cor'); ?>">
                                <i class="material-icons">color_lens</i>
                                cores
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item pl-5" href="<?= base_url('cat'); ?>">
                                <i class="material-icons">category</i>
                                categorias
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item pl-5" href="<?= base_url('item'); ?>">
                                <i class="material-icons">shopping_basket</i>
                                produtos
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link dropdown-item" href="<?= base_url('requisicoes'); ?>">
                        <i class="material-icons">store</i>
                        orçamentos
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link dropdown-item" href="<?= base_url('vendas'); ?>">
                        <i class="material-icons">trending_up</i>
                        vendas
                    </a>
                </div>
                <div class="bd-toc-item">
                    <a class="bd-toc-link dropdown-item" href="<?= base_url('clientes'); ?>">
                        <i class="material-icons">person</i>
                        clientes
                    </a>
                </div>
            </nav>
        </div>
        <main class="col-12 col-md-9 col-lg-10 py-md-3 pl-md-5 bd-content" role="main">