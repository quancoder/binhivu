<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" style="font-size: 14px !important;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>BinhiVu | Administrator</title>

    <!-- REQUIRED STYLESHEET --
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link type="image/x-icon" href="<?php echo base_url(); ?>images/logo-min.png" rel="shortcut icon"/>
    <link rel="stylesheet" href="<?php echo base_url() . "skins" . $template_f; ?>custom.css">

    <!-- REQUIRED SCRIPTS LIB-->
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>plugins/tag-input/tagsinput.js"></script>

    <!-- REQUIRED STYLE LIB -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/tag-input/tagsinput.css">

    <!-- REQUIRED SCRIPTS CUSTOM -->
    <script src="<?php echo base_url() . "js" . $template_f; ?>all.js"></script>
    <script src="<?php echo base_url() . "js" . $template_f; ?>common.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!--quanlt model file manager-->
<div class="modal fade quanlt-modal-filemanager" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="height: 80%">
        <div class="modal-content" style="height: 100%">
            <div class="overlay justify-content-center align-items-center">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
                <h4 class="modal-title">Tài nguyên website</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe class="quanlt-iframe-filemanager" frameborder="0"  style="width: 100%; height: 100%"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block ">
                <a href="/" class="nav-link">Trang chủ</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" action="" method="get">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto d-none">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?php echo base_url(); ?>dist/img/user1-128x128.jpg" alt="User Avatar"
                                 class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?php echo base_url(); ?>dist/img/user8-128x128.jpg" alt="User Avatar"
                                 class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?php echo base_url(); ?>dist/img/user3-128x128.jpg" alt="User Avatar"
                                 class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fas fa-th-large"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= site_url()?>" class="brand-link">
            <img src="<?php echo base_url(); ?>images/logo.png" alt="Admin Logo" class="brand-image" style="opacity: 1">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url(); ?>images/user-bg.jpg" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Xin chào, Admin!</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a class="nav-link <?=$module=='dashboard' ?' active' : ''?>" href="/adpanel">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p> Trang chủ </p></a>
                    </li>

                    <li class="nav-header"> QUẢN TRỊ BÀI VIẾT</li>

                    <li class="nav-item">
                        <a href="<?php echo site_url("news", $langcode) ?>" class="nav-link <?=$module=='news' ?' active' : ''?>">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p> Tin tức </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("funs", $langcode) ?>" class="nav-link <?=$module=='funs' ?' active' : ''?>">
                            <i class="nav-icon fas fa-coffee"></i>
                            <p> Góc thư giãn </p>
                        </a>
                    </li>

                    <li class="nav-header"> QUẢN TRỊ TÀI LIỆU / SÁCH</li>

                    <li class="nav-item">
                        <a href="<?php echo site_url("document", $langcode) ?>" class="nav-link <?=$module=='document' ?' active' : ''?>">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p> Tài liệu </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("book", $langcode) ?>" class="nav-link <?=$module=='book' ?' active' : ''?>">
                            <i class="nav-icon fas fa-fw fa-book"></i>
                            <p> Sách </p>
                        </a>
                    </li>

                    <li class="nav-header"> KHÁCH HÀNG</li>

                    <li class="nav-item">
                        <a href="<?php echo site_url("contact", $langcode) ?>" class="nav-link <?=$module=='contact' ?' active' : ''?>">
                            <i class="nav-icon fas fa-comments"></i>
                            <p> Phản hồi khách hàng
                                <span class="right badge badge-info <?=$new_contact > 0?'d-block': 'd-none'?>"><?=$new_contact?></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-header"> QUẢN TRỊ HỆ THỐNG</li>

                    <li class="nav-item">
                        <a href="<?php echo site_url("intro/edit", $langcode) ?>" class="nav-link <?=$module=='intro' ?' active' : ''?>">
                            <i class="nav-icon  fas fa-info-circle"></i>
                            <p> Trang giới thiệu</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="<?php echo site_url("authenticate/change-password", $langcode) ?>" class="nav-link <?=$module=='authenticate' ?' active' : ''?>">
                            <i class="nav-icon fas fa-lock"></i>
                            <p> Thay đổi mật khẩu </p>
                        </a>
                    </li>

                    <li class="nav-item" style="display: none">
                        <a href="<?php echo site_url("settings/mod", $langcode) ?>" class="nav-link <?=$module=='settings' ?' active' : ''?>">
                            <i class="nav-icon  fas fa-info-circle"></i>
                            <p> Thông tin website</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo site_url("authenticate/out", $langcode) ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p> Đăng xuất </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">