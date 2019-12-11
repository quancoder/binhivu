<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	
	<meta property="og:url" 				content="<?php echo getCurrentUrl(); ?>" />
	<meta property="og:type"               content="blog" />
	<meta property="og:title"              content="<?php echo isset($metaTitle) && $metaTitle != ''? ' - ' . $metaTitle : ''; ?>" />
	<meta property="og:description"        content="<?php echo isset($metaDesc) && $metaDesc != '' ? ' - ' . $metaDesc : ''; ?>" />
	<meta property="og:site_name" content="<?php echo PRODUCT_DOMAIN; ?>"/>
	
	<base href="<?php echo base_url(); ?>" />
	
	<title><?php echo isset($title) && $title != '' ? $title : ''; ?></title>
	<meta name="title" content="<?php echo isset($title) && $title != '' ? $title : ''; ?>" />
	<meta name="keywords" content="<?php echo isset($title) && $title != '' ? $title : ''; ?>" />
	<meta name="description" content="<?php echo isset($title) && $title != '' ? $title : ''; ?>" />
	
	<link rel="canonical" href="<?php echo getCurrentUrl(); ?>" />
	<link type="image/x-icon" href="<?php echo base_url();?>images/logo-min.png" rel="icon" />
	<link type="image/x-icon" href="<?php echo base_url();?>images/logo-min.png" rel="shortcut icon" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "skins/" . $template_f; ?>bootstrap-4.0.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "skins/" . $template_f; ?>reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "skins/" . $template_f; ?>style.css"/>
	<link href="<?php echo base_url() . "skins/" . $template_f; ?>font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>jquery_2.1.4.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>common.js"></script>
	
    <!-- confirm-->
    <link href="<?php echo base_url() . "skins/" . $template_f; ?>jquery-confirm.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>jquery-confirm.js"></script>
	
	<!-- dake picker -->
	<link href="<?php echo base_url() . "skins/" . $template_f; ?>datepicker.css?v=1" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>datepicker_v2.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>detect.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>fastclick.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>jquery.nicescroll.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/<?php echo $template_f; ?>jquery.twbsPagination.min.js"></script>
    <script type="text/javascript">var langcode = '<?php echo isset($langcode_url) ? $langcode_url : ''; ?>';</script>

    <!--    fancybox-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" media="screen" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <!--    tinymce-->
    <script src="<?php echo base_url(); ?>plugins/tinymce/tinymce.min.js"></script>
</head>
<?php flush();?>

<body class="adminbody">
	<div id="main">

		<!-- top bar navigation -->
		<div class="headerbar">

			<!-- LOGO -->
	        <div class="headerbar-left">
				<a href="<?php echo $this->config->item('base_url'); ?>" class="logo">
					<img alt="Logo" src="<?= site_url()?>/images/logo-min.PNG" /> <span class="font-weight-bold">Admin</span>
				</a>

	        </div>
	        <nav class="navbar-custom">
                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?= site_url()?>/images/user-bg.jpg" alt="Profile image" class="avatar-rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small>Xin chào, admin</small></h5>
                            </div>
                            <!-- item-->
                            <a href="<?php echo site_url('authenticate/out', $langcode); ?>" class="dropdown-item notify-item">
                                <i class="fa fa-power-off"></i> <span>Đăng xuất</span>
                            </a>

                        </div>
                    </li>
                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left">
							<i class="fa fa-fw fa-bars"></i>
                        </button>
                    </li>
                </ul>

	        </nav>

		</div>
		<!-- End Navigation -->


		<!-- Left Sidebar -->
		<div class="left main-sidebar">

			<div class="sidebar-inner leftscroll">
	
				<div id="sidebar-menu">
					<ul>
						<li class="submenu">
							<a class="active" href="/adpanel"><i class="fa fa-fw fa-dashboard"></i><span> Dashboard </span> </a>
	                    </li>
	                    
						<li class="submenu">
	                        <a href="<?php echo site_url("news", $langcode) ?>"><i class="fa fa-fw fa-newspaper-o"></i><span> Tin tức </span> </a>
	                    </li>
                        <li class="submenu">
                            <a href="<?php echo site_url("relax", $langcode) ?>"><i class="fa fa-fw fa-coffee"></i><span> Góc thư giãn </span> </a>
                        </li>
                        <li class="submenu">
                            <a href="<?php echo site_url("document", $langcode) ?>"><i class="fa fa-fw fa-file-archive-o"></i><span> Tài liệu </span> </a>
                        </li>
                        <li class="submenu">
                            <a href="<?php echo site_url("book", $langcode) ?>"><i class="fa fa-fw fa-book"></i><span> Sách </span> </a>
                        </li>

                        <li class="submenu">
                            <a href="<?php echo site_url("book", $langcode) ?>"><i class="fa fa-fw fa-mail-reply-all"></i><span> Phản hồi liên hệ </span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0)" class="<?php echo in_array($module, array('settings'))? 'active':'' ?>">
                                <i class="fa fa-fw fa-table"></i> <span>Quản lý hệ thống</span> <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li class="<?php echo in_array($function, array('mod'))? 'active':'' ?>">
                                    <a href="<?php echo site_url("settings/mod", $langcode) ?>"><i class="fa fa-lock"></i><span> Thay đổi mật khẩu </span> </a>
                                </li>
                                <li class="<?php echo in_array($function, array('mod'))? 'active':'' ?>">
                                    <a href="<?php echo site_url("settings/mod", $langcode) ?>"><i class="fa fa-info-circle"></i><span> Thay đổi thông tin </span> </a>
                                </li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="<?php echo site_url("authenticate/out", $langcode) ?>"><i class="fa fa-fw fa-sign-out"></i><span> Đăng xuất </span> </a>
                        </li>
		            </ul>
	
	            	<div class="clearfix"></div>
	
				</div>
	        
				<div class="clearfix"></div>
	
			</div>
	
		</div>
		<!-- End Sidebar -->
		
		<div class="content-page">