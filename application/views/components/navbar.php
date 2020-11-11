<header class="navbar navbar-light navbar-expand sticky-top bg-cinza p-0 text-capitalize bd-navbar flex-column flex-sm-row">
    <div class="navbar-brand col-12 col-sm-4 col-md-3 col-lg-2 mr-0 bg-azul border-right">
        <img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo" class="img-fluid">
    </div>
    <ul class="navbar-nav flex-row ml-auto">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?= base_url(); ?>" target="_blank">
                <i class="material-icons text-info">view_module</i>
                site
            </a>
        </li>
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?= base_url('logout'); ?>">
                <i class="material-icons text-danger">close</i>
                sair
            </a>
        </li>
    </ul>
    <button class="btn btn-link d-md-none p-0 collapsed material-icons align-items-end" type="button" data-toggle="collapse"
            data-target="#leftmenu" aria-controls="leftmenu" aria-expanded="false" aria-label="Toggle docs navigation">
        dehaze
    </button>
</header>
