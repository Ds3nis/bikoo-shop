<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Auth\AuthInterface $auth
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bikoo | Admin-Panel</title>
    <base href="/">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="assets/css/customlist.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="admin" class="nav-link">Domovská stránka</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form action="/admin" method="get" class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="admin" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <?php if($auth->user()->role() > 2) {?>
                <a href="/profile" class="d-block">Super Admin</a>
                <?php }else { ?>
                <a href="/profile" class="d-block">Admin</a>
                <?php } ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false" style="">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="/admin/orders" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag" style="color: #ffffff;"></i>
                        <p style="color: white">
                            Objednávky
                            <span class="badge badge-info right"></span>
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="admin/products" class="nav-link">
                        <i class="nav-icon fas fa-bicycle " style="color: #ffffff;"></i>
                        <p style="color: white">
                            Produkty
                            <span class="badge badge-info right">1</span>
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="admin/users" class="nav-link">
                        <i class="nav-icon fas fa-users" style="color: #ffffff;"></i>
                        <p style="color: white">
                            Uživatelé
                            <span class="badge badge-info right">1</span>
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="post" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt" style="color: #ffffff;"></i>
                        <button type="submit" style="color: white; display: inline-block;  border: none;
    background: transparent;
    cursor: pointer;">
                            Odhlasit se
                        </button>
                        </form>

                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">


