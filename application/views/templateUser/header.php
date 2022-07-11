<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/logo/logo-footer.png') ?>" type="image/icon type">
    <title><?= $title ?></title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?= base_url('') ?>assets/fontawesome/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('') ?>assets/fontawesome/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('') ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('') ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('') ?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('') ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('') ?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- Core JS files -->
    <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->
    <script type="text/javascript" src="<?= base_url('assets/js/plugins/forms/selects/select2.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/js/pages/datatables_basic.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/js/pages/components_modals.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <!-- /global stylesheets -->
</head>

<body>

    <!-- Main navbar d-->
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url('anggota'); ?>"><img width="200" height="" src="<?= base_url('assets/logo/logo.png') ?>" alt=""></a>
            <ul class=" nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">

                        <span><?= $nama ?></span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user"></i> My profile</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#logoutModal" id="sweet-waring"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">