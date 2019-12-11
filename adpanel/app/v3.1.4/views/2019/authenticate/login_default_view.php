<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>BinhiVu - Đăng nhập</title>
    <base href="<?php echo base_url(); ?>" />
    <link type="image/png" href="<?php echo base_url();?>images/logo-min.png" rel="icon" />
    <link type="image/png" href="<?php echo base_url();?>images/logo-min.png" rel="shortcut icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="<?php echo isset($metaKeyword) && $metaKeyword != ''? $metaKeyword : ''; ?>" />
    <meta name="description" content="<?php echo isset($metaDesc) && $metaDesc != '' ? ' - ' . $metaDesc : ''; ?>" />
    <meta name="title" content="<?php echo $product_name; echo isset($metaTitle) && $metaTitle != ''? ' - ' . $metaTitle : ''; ?>" />
    <!--load CSS-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . "skins/" . ltrim(URI_PATH . '/', '/') . $template_f; ?>admin/default.css?v=2">
    <link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,300italic,300,100italic,100,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700' rel='stylesheet' type='text/css'>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
</head>
<?php flush();?>
<body class="password-change-body">

<!--end load CSS-->
<div class="logo" style="background-color: #12844e"><img src="<?php echo base_url()."/images/logo.png"?>"/></div>
<div class="main">
    <h2 style="text-align: center; font-weight: bold">Đăng nhập vào quản trị</h2>
    <form name="frmLogin" id="frmLogin" action="<?php echo site_url('authenticate/sign?token=', $langcode); ?>" method="post">
        <?php
        if(isset($error['pw']))
        {
        ?>
            <p class="msg-warning">
                <?php echo $error['pw']; ?>
            </p>
        <?php
        }
        ?>
        <input type="text" name="txtUser" value="<?= $username ?>" id="txtUser" class="name" placeholder="Tên đăng nhập" required="">
        <input type="password" name="txtPass" id="txtPass" class="password" placeholder="Mật khẩu" required=""
               style="<?= isset($error['pw']) ? 'border:1px solid red' : '' ?>">

        <input id="btnLogin" type="submit" value="ĐĂNG NHẬP" />


        <div class="lost-password clearfix" style="display: none">
            <div class="left w-50">
                <a class="block" href="<?php echo site_url('password/lost', $langcode); ?>" >Quên mật khẩu</a>
                <a class="block" style="margin-top: 5px !important;" href="<?php echo site_url('signup', $langcode); ?>" >Đăng ký</a>
            </div>

            <div class="right w-50">
                <input type="button" id="vietidbtn" class="vietid-btn mt-5 cursor-pointer" value="Đăng nhập VietID" />
            </div>
        </div>
    </form>
</div>
<div class="footer">
    <p> &copy; 2019 Binhivu</p>
</div>

<script type="text/javascript">
    $(window).on("load",function(e){

        <?php if(isset($error['pw'])) { ?>
            $('#txtPass').focus();
        <?php }else{ ?>
            $('#txtUser').focus();
        <?php } ?>
    });
</script>
</body>