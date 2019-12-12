<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Owl Stylesheets -->
<script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-md-8">
                <h1 class="home-title">
                    <a href="<?= site_url('tin-tuc.html')?>" title="TIN TỨC">TIN TỨC</a>
                </h1>
                <div class="row" style="margin-bottom: 20px;">
                    <!--row1 left-->
                    <div class="col-md-8">
                        <div class="featured-article">
                            <a href="<?= toURLFriendly(site_url($news_list[0]['news_title']),'tt', $news_list[0]['news_id'])?>">
                                <img class="img-responsive w-100" src="<?php echo base_url(); ?>public/images/<?= $news_list[0]['news_image']?>"
                                     data-src="<?php echo base_url(); ?>public/images/<?= $news_list[0]['news_image']?>"
                                     alt="<?= $news_list[0]['news_title']?>">
                            </a>
                            <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                <h2 class="media-heading">
                                    <a href="<?= toURLFriendly(site_url($news_list[0]['news_title']),'tt', $news_list[0]['news_id'])?>" style="color: #fb7e31;" class="archive-i">
                                        <?= $news_list[0]['news_title']?>
                                    </a>
                                </h2>
                                <p>
                                    <a href="<?= site_url('tin-tuc.html')?>"><span class="category">Tin tức</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news_list[0]['news_update_time'])?></span>
                                </p>
                                <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify; color: #cccccc">
                                    (Tin tức)  <?= htmlentities($news_list[0]['news_sapo'])?>
                                </p>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="featured-article">
                            <a href="<?= toURLFriendly(site_url($news_list[1]['news_title']),'tt', $news_list[1]['news_id'])?>">
                                <img class="img-responsive w-100" src="<?php echo base_url(); ?>public/images/<?= $news_list[1]['news_image']?>"
                                     data-src="<?php echo base_url(); ?>public/images/<?= $news_list[1]['news_image']?>"
                                     alt="<?= $news_list[1]['news_title']?>">
                            </a>
                            <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                <h2 class="media-heading">
                                    <a href="<?= toURLFriendly(site_url($news_list[1]['news_title']),'tt', $news_list[1]['news_id'])?>" style="color: #fb7e31;" class="archive-i">
                                        <?= $news_list[0]['news_title']?>
                                    </a>
                                </h2>
                                <p>
                                    <a href="<?= site_url('tin-tuc.html')?>"><span class="category">Tin tức</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news_list[1]['news_update_time'])?></span>
                                </p>
                                <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify; color: #cccccc">
                                    (Tin tức)  <?= htmlentities($news_list[1]['news_sapo'])?>
                                </p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!--row1 right-->
                    <div class="col-md-4">
                        <div class="media-list main-list" style="text-align: justify">
                            <?php $i=1?>
                            <?php foreach ($news_list as $news){?>
                                <?php if($i >= 3 and $i <=6){?>
                                    <div class="media" style="padding-bottom: 10px;border-bottom: 2px solid #eee;">
                                        <div class="media-body">
                                            <a class="" href="<?= toURLFriendly(site_url($news['news_title']),'tt', $news['news_id'])?>">
                                                <img class="media-object lazy w-100" src="<?php echo base_url()?>public/images/<?= $news['news_thumbs']?>"
                                                     data-src="<?php echo base_url()?>public/images/<?= $news['news_thumbs']?>" alt="<?= $news['news_title']?>">
                                            </a>
                                            <a href="<?= site_url('tin-tuc.html')?>"><span class="category">Tin tức</span></a> -
                                            <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news['news_update_time'])?></span>
                                            <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0; text-align: justify">
                                                <a href="<?= toURLFriendly(site_url($news['news_title']),'tt', $news['news_id'])?>" style="font-size: 1.6rem">
                                                    <?= $news['news_title']?>
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php $i++;} ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div id="myCarousel" class="owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-1144px, 0px, 0px); transition: all 0s ease 0s; width: 4578px;">
                                    <?php $i= 1; foreach ($news_list as $new){ ?>
                                        <?php if($i >=1 and $i <=12){?>
                                            <div class="owl-item active" style="width: 381.5px;">
                                                <div class="item">
                                                    <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>">
                                                        <img class="lazy" src="<?php echo base_url()?>public/images/<?= $new['news_thumbs']?>"
                                                             data-src="<?php echo base_url()?>public/images/<?= $new['news_thumbs']?>"
                                                             alt="<?= $new['news_title']?>" style="width: 100%; height: 150px">
                                                    </a>
                                                    <h3 class="media-heading">
                                                        <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php $i++;} ?>
                                </div>
                            </div>
                            <div class="owl-nav disabled">
                                <div class="owl-prev">◀</div>
                                <div class="owl-next">▶</div>
                            </div>
                        </div>
                    </div>
                </div>

                <h1 class="home-title">
                    <a href="<?= site_url('giai-tri.html')?>" title="TIN TỨC">TRUYỆN NGẮN</a>
                </h1>
                <div class="row" style="margin-bottom: 20px;">
                    <!--row1 left-->
                    <div class="col-md-7 col-lg-7">
                        <div class="featured-article">
                            <a href="<?= toURLFriendly($funs_list[0]['funs_title'], 'gt', $funs_list['0']['funs_id'])?>">
                                <img class="thumb lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                     data-src="<?php echo base_url(); ?>public/images/<?= $funs_list[0]['funs_image']?>"
                                     alt="<?= $funs_list[0]['funs_title']?>">
                            </a>
                            <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                <h2 class="media-heading">
                                    <a href="<?= toURLFriendly($funs_list[0]['funs_title'], 'gt', $funs_list['0']['funs_id'])?>" style="color: #fb7e31;" class="archive-i">
                                        <?= $funs_list[0]['funs_title']?>
                                    </a>
                                </h2>
                                <p>
                                    <a href="<?= site_url('giai-tri.html')?>"><span class="category">Truyện ngắn</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($funs_list[0]['funs_update_time'])?></span>
                                </p>
                                <p style="font-size: 13px; margin-bottom: 0px">
                                    (Truyện ngắn)  <?= htmlentities($funs_list[0]['funs_sapo'])?>
                                </p>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="featured-article">
                            <a href="<?= toURLFriendly($funs_list[1]['funs_title'], 'gt', $funs_list['1']['funs_id'])?>">
                                <img class="thumb lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                     data-src="<?php echo base_url(); ?>public/images/<?= $funs_list[1]['funs_image']?>"
                                     alt="<?= $funs_list[1]['funs_title']?>">
                            </a>
                            <div class="block-title" style="margin-top: 10px;">
                                <h2 class="media-heading">
                                    <a href="<?= toURLFriendly($funs_list[1]['funs_title'], 'gt', $funs_list['1']['funs_id'])?>">
                                        <?= $funs_list[1]['funs_title']?>
                                    </a>
                                </h2>
                                <p>
                                    <a href="<?= site_url('giai-tri.html')?>"><span class="category">Truyện ngắn</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($funs_list[1]['funs_update_time'])?></span>
                                </p>
                                <p style="font-size: 13px; margin-bottom: 0px">
                                    (Truyện ngắn) <?= htmlentities($funs_list[1]['funs_sapo'])?>
                                </p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!--row1 right-->
                    <div class="col-md-5 col-lg-5">
                        <ul class="media-list main-list">
                            <?php $i=1?>
                            <?php foreach ($funs_list as $funs){?>
                                <?php if($i >= 3 and $i <=7){?>
                                    <li class="media" style="padding-bottom: 10px;">
                                        <a class="pull-left img-thumbnail" href="<?= toURLFriendly($funs['funs_title'], 'gt', $funs['funs_id'])?>">
                                            <img class="media-object lazy" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                 data-src="<?php echo base_url()?>public/thumbs/<?= $funs['funs_thumbs']?>"
                                                 alt="<?= $funs['funs_title']?>">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0; text-align: justify">
                                                <a href="<?= toURLFriendly($funs['funs_title'], 'gt', $funs['funs_id'])?>">
                                                    <?= $funs['funs_title']?>
                                                </a>
                                            </h3>
                                            <a href="<?= site_url('giai-tri.html')?>"><span class="category">Truyện ngắn</span></a> -
                                            <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($funs['funs_update_time'])?></span>
                                        </div>
                                    </li>
                                <?php } ?>
                                <?php $i++;} ?>

                            <ul class="news-list">
                                <?php $i=1?>
                                <?php foreach ($funs_list as $funs){?>
                                    <?php if($i >= 8 and $i <=12){?>
                                        <li>
                                            <h3><a href="<?= site_url($funs['funs_title'])?>"
                                                   title="<?= $news['news_title']?>"><?= $funs['funs_title']?></a>
                                            </h3>
                                        </li>
                                    <?php } ?>
                                <?php $i++;} ?>
                            </ul>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2 class="line-title clearfix">
                            <a href="<?= site_url('truyen-ngan')?>" title="Truyện ngắn ">TRUYỆN NGẮN XEM NHIỀU NHẤT</a>
                        </h2>
                        <ul class="media-list main-list" style="margin-top: 20px; text-align: justify">
                        <?php
                        $i = 1;
                        foreach ($funs_top_view as $funs){ ?>
                            <?php if($i <=5){?>
                            <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                <a class="pull-left pull-right-xs w-25 w-100-xs" href="<?= toURLFriendly($funs['funs_title'], 'gt', $funs['funs_id'])?>">
                                    <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                         data-src="<?php echo base_url()?>public/images/<?= $funs['funs_thumbs']?>"
                                         alt="<?= $funs['funs_title']?>" style="width: ">
                                </a>
                                <div class="media-body w-100-xs">
                                    <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                        <a href="<?= toURLFriendly($funs['funs_title'], 'gt', $funs['funs_id'])?>" style="font-size: 1.6rem">
                                            <?= $funs['funs_title']?>
                                        </a>
                                    </h3>
                                    <a href="<?= site_url('giai-tri.html')?>"><span class="category">Truyện ngắn</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-eye-open"></i> Lượt xem <?= number_format($funs['funs_views'])?></span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($funs['funs_update_time'])?></span>
                                    <p style="margin-top: 10px; color: #1e1e1e"><?= $funs['funs_sapo']?></p>
                                </div>
                            </li>
                                <?php } ?>
                        <?php $i++;} ?>
                        </ul>

                        <ul class="news-list" style="border: none;">
                            <?php
                            $i = 1;
                            foreach ($funs_top_view as $funs){ ?>
                                <?php if($i >= 6 and $i <=10){?>
                                    <li>
                                        <h3>
                                            <a href="<?= toURLFriendly($funs['funs_title'], 'gt', $funs['funs_id'])?>"
                                               title="<?=$funs['funs_title'] ?>"><?=$funs['funs_title'] ?></a>
                                        </h3>
                                    </li>
                                <?php } ?>
                            <?php $i++;} ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="departments" style="margin-bottom: 25px;">
                    <h1 class="home-title">
                        <span>Tài liệu</span>
                    </h1>
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
                    <h1 class="home-title">
                        <span>Sách</span>
                    </h1>
                    <div id="box-book" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php $i = 1;foreach ($news_list as $news){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading" role="button" data-toggle="collapse" data-parent="#box-book" href="#<?= 'book-'.$news['news_id'] ?>" aria-expanded="<?= $i==1?'true':'false'?>" aria-controls="collapse1">
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

                <div id="appointment" class="widget appointment-widget sidebar-box">
                    <h2 class="home-title">
                        <span>LIÊN HỆ</span>
                    </h2>
                    <ul class="contact-data">

                        <li class="clearfix app-location">
                            <div class="value">Đường Lê Văn Lương, Q. Thanh Xuân, Hà Nội</div>
                        </li>


                        <li class="clearfix app-mobile">
                            <div class="value"><a href="tel:123.456.789">123.456.789</a></div>
                        </li>


                        <li class="clearfix app-email">
                            <div class="value"><a href="mailto:binhivu@binhivu.com">binhivu@binhivu.com</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function () {
        $('#myCarousel').owlCarousel({
            items: 3,
            loop: true,
            nav: false,
            dots: true,
            responsiveClass:true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                991: {
                    items: 4
                }
            },
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });
    })
</script>