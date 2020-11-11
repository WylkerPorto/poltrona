<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<footer class="border-top border-blue pt-5">
    <div class="row m-0">
        <div class="col-12 col-lg-4 text-center text-lg-left align-self-center pl-lg-5">
            <img src="<?= base_url('assets/img/logo-vitrine.png') ?>" alt="logo" class="img-fluid">
        </div>
        <div class="col-12 col-lg-3 text-center text-lg-left">
            <div class="text-success my-3">
                <p class="mb-0">
                    <span class="material-icons">call</span>Televendas
                </p>
                <p class="mt-0">(99) 9 9999-9999</p>
            </div>
            <div class="text-primary my-3">
                <p class="mb-0">
                    <span class="material-icons">email</span>e-mail
                </p>
                <p class="mt-0">vendas@LOCAL.com.br</p>
            </div>
            <div class="text-blue my-3">
                <p class="mb-0">
                    <span class="material-icons">location_on</span>Rua dos testes 123
                </p>
                <p class="mt-0">algum lugar/SP - CEP 12345-123</p>
            </div>
        </div>
        <div class="col-12 col-lg-5 text-center text-lg-left align-self-center pr-lg-5">
            <p class="text-blue">
                <a href="<?= base_url('quem_somos'); ?>">
                    <i class="material-icons text-blue">group</i>
                    <span class="text-blue">Quem Somos</span>
                </a>
                <a href="<?= base_url('perfil'); ?>">
                    <i class="material-icons text-blue">person</i>
                    <span class="text-blue">Meu Cadastro</span>
                </a>
                <a href="<?= base_url('fale_conosco'); ?>">
                    <i class="material-icons text-blue">mail</i>
                    <span class="text-blue">Fale Conosco</span>
                </a>
            </p>
            <p class="mb-0">Cadastre seu e-mail e receba nossas novidades!</p>
            <div class="input-group col-7 col-lg-12 mx-auto mx-lg-0 px-0">
                <input type="text" class="form-control text-uppercase" name="item" placeholder="email...">
                <div class="input-group-prepend">
                    <button class="input-group-text btn btn-blue">CADASTRAR</button>
                </div>
            </div>
            <p class="mt-3">Acompanhe-nos!
                <button class="btn btn-primary">Facebook</button>
                <button class="btn btn-light"><i class="material-icons">photo_camera</i>Instagram</button>
            </p>
        </div>
        <div class="col-12 text-blue">
            <p class="text-center mb-0">Desenvolvido por <a href="http://nesterlabs.com.br/" target="_blank"><b>Nester
                        Labs</b></a></p>
        </div>
    </div>
</footer>

</body>

</html>