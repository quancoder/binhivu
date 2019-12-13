<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Owl Stylesheets -->
<script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-sm-12" id="zone-news-list">
                <h2 class="home-title hide">
                    <a href="<?= site_url('tin-tuc.html')?>" title="TIN TỨC">TIN TỨC</a>
                </h2>

                <div style="margin: 10px 0px">
                    <a href="<?= site_url()?>">Trang Chủ</a> ➝ Tin tức
                </div>
                <h2 class="line-title clearfix">
                        <a href="javascript:void(0)" title="DÂN SỰ ">Tin tức mới</a>
                </h2>
                <div class="row" style="margin-bottom: 20px; margin-top: 20px">
                    <!--MAIN LEFT-->
                    <div class="col-md-6 col-lg-6">
                        <div class="featured-article">
                            <a href="<?= toURLFriendly($news_list[0]['news_title'], 'tt', $news_list[0]['news_id'])?>">
                                <img class="w-100" src="<?php echo base_url(); ?>public/images/<?= $news_list[0]['news_image']?>"
                                     alt="<?= $news_list[0]['news_title'] ?>">
                            </a>
                            <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                <h3 class="media-heading" style="font-size: 17px" >
                                    <a href="<?= toURLFriendly($news_list[0]['news_title'], 'tt', $news_list[0]['news_id'])?>" style="color: #fb7e31;" class="archive-i">
                                        <?= $news_list[0]['news_title'] ?></a>
                                </h3>
                                <p>
                                    <a href="<?= site_url('tin-tuc.html')?>">
                                        <span class="category">Tin tức</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news_list[0]['news_update_time'])?></span>
                                </p>

                                <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify">
                                    (Tin tức)  <?= $news_list[0]['news_sapo']?>
                                </p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <ul class="news-list">
                            <?php $i=1?>
                            <?php foreach ($news_list as $new){?>
                                <?php if($i >= 6 and $i <=10){?>
                                    <li>
                                        <h3>
                                            <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>"
                                               title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
                                        </h3>
                                    </li>
                                <?php } ?>
                            <?php $i++;} ?>
                        </ul>
                    </div>
                    <!--MAIN RIGHT-->
                    <div class="col-md-6 col-lg-6">
                        <ul class="media-list main-list">
                            <?php $i= 2; foreach ($news_list as $new){ ?>
                                <?php if($i >=2 and $i <=5){?>
                                    <!-- for moblie -->
                                    <li class="media visible-xs" style="margin-bottom: 10px; margin-top: 0">
                                        <img class="media-object h-auto-xs h-auto-sm lazy" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                             data-src="<?php echo base_url()?>public/images/<?= $new['news_thumbs']?>"
                                             alt="<?= $new['news_title']?>" style="width: 100%;">

                                        <div class="media-body">
                                            <h3 class="media-heading">
                                                <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
                                            </h3>
                                            <p>
                                                <a href="<?= site_url('tin-tuc.html')?>"><span class="category">Tin tức</span></a> -
                                                <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                                <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($new['news_update_time'])?></span>
                                            </p>
                                            <p class="sapo" style="text-align: justify">
                                                (Tin tức)  <?= htmlentities($news_list[0]['news_sapo'])?>
                                            </p>
                                        </div>
                                    </li>
                                    <!-- for tablet pc -->
                                    <li class="media hidden-xs w-50 pull-left" style="padding-right: 10px; margin-top: 0 !important; margin-bottom: 10px; height: 305px">
                                        <img class="media-object lazy" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                             data-src="<?php echo base_url()?>public/images/<?= $new['news_thumbs']?>"
                                             alt="<?= $new['news_title']?>" style="width: 100%; height: 150px">

                                        <div class="media-body">
                                            <h3 class="media-heading">
                                                <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
                                            </h3>
                                            <p>
                                                <a href="<?= site_url('tin-tuc.html')?>"><span class="category">Tin tức</span></a> -
                                                <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                                <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($new['news_update_time'])?></span>
                                            </p>
                                            <p class="sapo" style="text-align: justify">
                                                (Tin tức)  <?= htmlentities($news_list[0]['news_sapo'])?>
                                            </p>
                                        </div>
                                    </li>
                                <?php } ?>
                            <?php $i++;} ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--LIST LOOP NEWS-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            <?php $i= 1; foreach ($news_list as $new){ ?>
                                <div class="item">
                                    <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>">
                                        <img class="owl-lazy" style="width: 100%; height: 150px;"  alt="<?=$new['news_title']?>"
                                             data-src="<?php echo base_url()?>public/images/<?= $new['news_thumbs']?>" >
                                    </a>
                                    <h3 class="media-heading">
                                        <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
                                    </h3>
                                </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <h2 class="line-title clearfix">
                            <a href="javascript:void(0)" title="TIN TỨC XEM NHIỀU NHẤT">TIN TỨC XEM NHIỀU NHẤT</a>
                        </h2>

                        <!--LIST NEWS MOST VIEWS-->
                        <ul class="media-list main-list" style="margin-top: 20px; text-align: justify">
                            <?php
                            $i = 1;
                            foreach ($news_top_view as $news){ ?>
                                <?php if($i <=5){?>
                                    <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                        <a class="pull-left pull-right-xs w-25 w-100-xs" href="<?= toURLFriendly($news['news_title'], 'gt', $news['news_id'])?>">
                                            <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                 data-src="<?php echo base_url()?>public/images/<?= $news['news_thumbs']?>"
                                                 alt="<?= $news['news_title']?>" style="width: ">
                                        </a>
                                        <div class="media-body w-100-xs">
                                            <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                                <a href="<?= toURLFriendly($news['news_title'], 'gt', $news['news_id'])?>" style="font-size: 1.6rem">
                                                    <?= $news['news_title']?>
                                                </a>
                                            </h3>
                                            <a href="<?= site_url('tin-tuc.html')?>"><span class="category">Tin tức</span></a> -
                                            <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                            <span class="time"><i class="glyphicon glyphicon-eye-open"></i> Lượt xem <?= number_format($news['news_views'])?></span> -
                                            <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news['news_update_time'])?></span>
                                            <p style="margin-top: 10px; color: #1e1e1e"><?= $news['news_sapo']?></p>
                                        </div>
                                    </li>
                                <?php } ?>
                            <?php $i++;} ?>
                        </ul>
                        <!-- SMALL LIST LINK-->
                        <ul class="news-list" style="border: none;">
                            <?php
                            $i = 1;
                            foreach ($news_top_view as $news){?>
                                <?php if($i >= 6 and $i <=10){?>
                                    <li>
                                        <h3>
                                            <a href="<?= toURLFriendly($news['news_title'], 'gt', $news['news_id'])?>"
                                               title="<?=$news['news_title'] ?>"><?=$news['news_title'] ?></a>
                                        </h3>
                                    </li>
                                <?php } ?>
                            <?php $i++;} ?>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="departments" style="margin-bottom: 25px;">
                            <h2 class="line-title clearfix">
                                <a href="javascript:void(0)" title="TÀI LIỆU">TÀI LIỆU HAY</a>
                            </h2>
                            <div id="box-tai-lieu" class="accordion" role="tablist" aria-multiselectable="true">
                                <?php $i = 1;foreach ($news_list as $news){?>
                                    <div class="panel">
                                        <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-tai-lieu" href="#<?= 'document-'.$news['news_id'] ?>" aria-expanded="<?= $i==1?'true':'false'?>" aria-controls="collapse1">
                                            <h4 class="panel-title">
                                                <?= substr($news['news_title'], 0, 40)?>
                                            </h4>
                                        </a>
                                        <div id="<?= 'document-'.$news['news_id'] ?>" class="panel-collapse collapse <?= $i==1?'in':''?>" role="tabpanel">
                                            <div class="panel-body">
                                                <div class="item-content clearfix">
                                                    <a class="thumb-image" href="" title="">
                                                        <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy" data-src="<?php echo base_url()?>public/thumbs/<?= $news['news_thumbs']?>" alt="">
                                                    </a>
                                                    <p>
                                                        <?= substr($news['news_sapo'], 0, 200)?>...
                                                    </p>
                                                </div>
                                                <div class="item-footer clearfix">
                                                    <a class="btn-more" href="https://binhivu.com/dan-su" title="">CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++;} ?>
                            </div>
                        </div>

                        <div class="departments" style="margin-bottom: 25px;">
                            <h2 class="line-title clearfix">
                                <a href="javascript:void(0)" title="TÀI LIỆU">SÁCH HAY</a>
                            </h2>
                            <div id="box-book" class="accordion" role="tablist" aria-multiselectable="true">
                                <?php $i = 1;foreach ($news_list as $news){?>
                                    <div class="panel">
                                        <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-book" href="#<?= 'book-'.$news['news_id'] ?>" aria-expanded="<?= $i==1?'true':'false'?>" aria-controls="collapse1">
                                            <h4 class="panel-title">
                                                <?= substr($news['news_title'], 0, 40)?>
                                            </h4>
                                        </a>
                                        <div id="<?= 'book-'.$news['news_id'] ?>" class="panel-collapse collapse <?= $i==1?'in':''?>" role="tabpanel">
                                            <div class="panel-body">
                                                <div class="item-content clearfix">
                                                    <a class="thumb-image" href="" title="">
                                                        <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy" data-src="<?php echo base_url()?>public/thumbs/<?= $news['news_thumbs']?>" alt="">
                                                    </a>
                                                    <p>
                                                        <?= substr($news['news_sapo'], 0, 200)?>...
                                                    </p>
                                                </div>
                                                <div class="item-footer clearfix">
                                                    <a class="btn-more" href="https://binhivu.com/dan-su" title="">CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++;} ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            lazyLoad:true,
            margin:10,
            autoplay:true,
            autoplaySpeed:3000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:4,
                    nav:true,
                    loop:false
                }
            }
        });

        $('.owl-nav').hide();
    })
</script>