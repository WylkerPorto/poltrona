<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <!-- Jquery -->
    <script src="<?= base_url('node_modules/jquery/dist/jquery.js'); ?>"></script>

    <!-- Popper -->
    <script src="<?= base_url('node_modules/popper.js/dist/umd/popper.js'); ?>"></script>

    <!-- Mascaras -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>

    <!-- Bootstrap -->
    <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.css'); ?>">

    <!-- Angular -->
    <script src="<?= base_url('node_modules/angular/angular.js'); ?>"></script>

    <!-- Material icons -->
    <link rel="stylesheet" href="<?= base_url('node_modules/material-design-icons/iconfont/material-icons.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- DataTables -->
    <script src="<?= base_url('node_modules/datatables.net/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?= base_url('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>">

    <!-- Carousel -->
    <script src="<?= base_url('node_modules/owl.carousel/dist/owl.carousel.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('node_modules/owl.carousel/dist/assets/owl.carousel.css'); ?>">

    <!-- CKEditor -->
    <script src="<?= base_url('node_modules/ckeditor/ckeditor.js'); ?>"></script>

    <!-- My -->
    <script src="<?= base_url('assets/script.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/style.css'); ?>">
</head>
<body ng-app="myapp">