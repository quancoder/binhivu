<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="vi" class="">
<head>
    <title>
        <?= $title?>
    </title>
    <!-- meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<meta property="fb:pages" content="572627112940264">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="canonical" href="https://binhivu.com/">
    <meta name="revisit-after" content="1 days">
    <meta name="robots" content="noodp,index,follow">
    <meta name="theme-color" content="#12844e">
    <meta name="msapplication-TileColor" content="#12844e">

    <meta property="og:type" content="website">
    <meta property="og:title" content="binhivu">
    <meta property="og:image" content="">
    <meta property="og:image:secure_url" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="https://binhivu.com">
    <meta property="og:site_name" content="binhivu">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="binhivu">
    <meta name="twitter:creator" content="binhivu">

    <!--   favicon -->
    <link rel="icon" href="<?php echo base_url() . 'images/'; ?>logo-min.png" type="image/x-icon">

    <!--css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'css/' . $template_f; ?>boostrap.3.3.7.css">
    <link rel="stylesheet" type="text/css" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'css/' . $template_f; ?>bundle.scss.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'css/' . $template_f; ?>bpr.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'css/' . $template_f; ?>main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'css/' . $template_f; ?>reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'css/' . $template_f; ?>boostrap.3.3.7.custom.css">

    <!--script-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/' . $template_f; ?>jquery.ui.1.12.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/' . $template_f; ?>jquery.lazy.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/' . $template_f; ?>boostrap.3.3.7.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/' . $template_f; ?>jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'js/' . $template_f; ?>all.js"></script>

</head>
<body style="margin-bottom: 0px;">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=181356779470999&autoLogAppEvents=1"></script>
<div id="main">
    <header class="header">
        <!--header-->
        <div class="ega-top-header visible-lg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="ega-item-top-bar logo-wrap">
                            <h1 class="h1-no-margin-padding">
                                <span style="display: none">BinhiVu</span>
                                <a href="<?= site_url()?>" title="binhivu">
                                    <img alt="binhivu" src="<?php echo base_url() . 'images/'; ?>logo2.png" class="ega-logo">
                                </a>
                            </h1>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="ega-item-top-bar">
                            <form class="ega-form-search-top" role="search" method="get" action="<?=site_url('tim-kiem-tin-tuc.html')?>">
                                <div class="ega-div-top-search">
                                    <input autocomplete="off" name="search" type="search" placeholder="Nhập tên bài viết...">
                                    <input type="hidden" name="type" value="article">
                                    <button type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="ega-item-top-bar">
                            <div class="ega-top-message">
                                    <i class="glyphicon glyphicon-earphone" style="line-height: 1; font-size: 14px; animation: 1s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim"></i>
                                    <a class="ega-phone" href="tel:0926111368">
                                        0926111368
                                    </a>
                                <span class="ega-fz-12 ega-header-top-item hide"> ( 8:00 - 18:00 ) </span>
                                <span class="hidden-xs ega-header-top-item hide">
									<a title="Đăng ký/Đăng nhập" href="https://binhivu.com/account"
                                       style="font-size: 12px; z-index: 10000; position: relative;"
                                       class="ega-a-account-header">
											<span class="glyphicon glyphicon-user"></span>
                                        Đăng ký / Đăng nhập
									</a>
								</span>
                                <span class="ega-header-top-item ega-top-cart-sendo hide">
                                    <a class="ega-a-cart-icon-top hide" href="https://binhivu.com/cart" title="cart">
                                        <span class="glyphicon glyphicon-shopping-cart"> </span>
                                        <span class="ega-a-cart-icon-top__number ega-header-top-item">0</span>
                                    </a>
							    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--menu-->
        <div>
            <div class="navbar yamm navbar-default ega-menu-top">
                <div class="container ega-container-header-sm">
                    <div class="navbar-header hidden-lg">
                        <div class="row ega-xs-menu">
                            <div class="col-xs-2 ega-col-no-padding-xs">
                                <button type="button" class="navbar-toggle collapsed ega-menu-hambuger"
                                        id="ega-btn-menu-hambuger" data-target="#ega-menu-deiv-top"
                                        aria-expanded="false">
                                    <span class="sr-only"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="col-xs-6 col-sm-8 text-center">
                                <div class="logo-wrap">
                                    <a href="<?=site_url()?>">
                                        <img alt="binhivu" src="<?php echo base_url() . 'images/'; ?>logo2.png" class="ega-logo center-block">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-2 text-right ega-search-ico-xs">

                                <a class="ega-a-cart-icon-top ega-top-cart-sendo hide" href="https://binhivu.com/cart"
                                   title="cart">
									<span class="glyphicon glyphicon-shopping-cart">
									</span>
                                    <span class="ega-a-cart-icon-top__number ega-header-top-item">0</span>
                                </a>

                                <button id="btn-click-search-xs" class="btn btn-sm ega-btn">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>

                            </div>
                        </div>
                        <div class="hidden-lg">
                            <div class="row">
                                <div class="col-xs-12">

                                    <form id="ega-search-xs-form" style="display: none" class="ega-form-search-top"
                                          role="search" method="get" action="<?=site_url('tim-kiem-tin-tuc.html')?>">
                                        <div class="ega-div-top-search">
                                            <input autocomplete="off" name="query" type="search"
                                                   placeholder="Nhập tên bài viết...">
                                            <input type="hidden" name="type" value="article">
                                            <button type="submit"><span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="ega-menu-deiv-top" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav w-100">
                            <!--submenu-->
                            <li class="yamm-fw li-ega-menu-no-mega">
                                <a href="<?= site_url()?>" title="Trang chủ" class=" visible-lg <?=$module=='home'? 'active' :''?>" aria-expanded="true">
                                    Trang chủ
                                </a>
                                <div class="visible-ega-table-xs">
                                    <a href="<?=site_url('lien-he.html')?>" title="Giới thiệu">
                                        Trang chủ
                                    </a>
                                </div>
                            </li>

                            <!--submenu-->
                            <li class="yamm-fw li-ega-menu-no-mega">
                                <a href="<?=site_url('tin-tuc.html')?>" title="Tin tức" class="visible-lg <?=$module=='news'? 'active' :''?>" aria-expanded="true">
                                    Tin tức
                                </a>
                                <div class="visible-ega-table-xs">
                                    <a href="<?=site_url('tin-tuc.html')?>" title="Tin tức">
                                        Tin tức
                                    </a>
                                </div>
                            </li>

                            <!--submenu-->
                            <li class="yamm-fw li-ega-menu-no-mega">
                                <a href="<?=site_url('goc-thu-gian.html')?>" title="Góc thư giãn" class=" visible-lg <?=$module=='funs'? 'active' :''?>" aria-expanded="true">
                                    Góc thư giãn
                                </a>
                                <div class="visible-ega-table-xs">
                                    <a href="<?=site_url('goc-thu-gian.html')?>" title="Góc thư giãn">
                                        Góc thư giãn
                                    </a>
                                </div>
                            </li>

                            <!--submenu-->
                            <li class="yamm-fw li-ega-menu-no-mega">
                                <a href="<?=site_url('tai-lieu.html')?>" title="Tài liệu" class=" visible-lg <?=$module=='document'? 'active' :''?>" aria-expanded="true">
                                    Tài liệu
                                </a>
                                <div class="visible-ega-table-xs">
                                    <a href="<?=site_url('tai-lieu.html')?>" title="Tài liệu">
                                        Tài liệu
                                    </a>
                                </div>
                            </li>

                            <!--submenu-->
                            <li class="yamm-fw li-ega-menu-no-mega">
                                <a href="<?=site_url('sach.html')?>" title="Sách" class=" visible-lg <?=$module=='book'? 'active' :''?>" aria-expanded="true">
                                    Sách
                                </a>
                                <div class="visible-ega-table-xs">
                                    <a href="<?=site_url('sach.html')?>" title="Sách">
                                        Sách
                                    </a>
                                </div>
                            </li>

                            <!--submenu-->
                            <li class="yamm-fw li-ega-menu-no-mega">
                                <a href="<?=site_url('lien-he.html')?>" title="Liên hệ" class=" visible-lg <?=$module=='contact'? 'active' :''?>" aria-expanded="true">
                                    Liên hệ
                                </a>
                                <div class="visible-ega-table-xs">
                                    <a href="<?=site_url('lien-he.html')?>" title="Liên hệ">
                                        Liên hệ
                                    </a>
                                </div>
                            </li>

                            <!--submenu-->
                            <li class="yamm-fw li-ega-menu-no-mega">
                                <a href="<?=site_url('gioi-thieu.html')?>" title="Giới thiệu" class=" visible-lg <?=$module=='intro'? 'active' :''?>" aria-expanded="true">
                                    Giới thiệu
                                </a>
                                <div class="visible-ega-table-xs">
                                    <a href="<?=site_url('gioi-thieu.html')?>" title="Giới thiệu">
                                        Giới thiệu
                                    </a>
                                </div>
                            </li>

                            <!--submenu-->
                            <li class="dropdown yamm-fw ega-dropdown-menu li-ega-menu-no-mega pull-right hide">
                                <a href="https://binhivu.com/" title="Vấn đề khác" data-toggle="dropdown"
                                   class="dropdown-toggle visible-lg" aria-expanded="true">
                                    Vấn đề khác
                                    <b class="caret hidden-xs"></b>
                                </a>
                                <div class="visible-ega-table-xs ega-menu-xs-drop-down">
                                    <a href="https://binhivu.com/" title="Vấn đề khác">
                                        Vấn đề khác
                                    </a>
                                    <a href="javascript:void(0)" class="ega-menu-right-down-ico">
                                            <span class="">
											    <span class="glyphicon glyphicon-menu-down"></span>
										    </span>
                                    </a>
                                </div>
                                <ul class="dropdown-menu ega-menu-no-mega ega-menu-no-mega--right">
                                    <li class="dropdown-submenu-2">
                                        <a title="Dịch vụ pháp lý khác" href="https://binhivu.com/dich-vu-phap-ly-khac"
                                           class="ega-sub-menu-a">
                                            <div>
                                                Dịch vụ pháp lý khác
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav hide">
                            <li>
                                <a href="https://binhivu.com/account" title="account">
                                    Đăng nhập/Đăng ký
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </header>
