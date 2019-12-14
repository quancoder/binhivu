<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="home-title hide">
                    <a href="<?= site_url('tin-tuc.html')?>" title="Góc thư giãn">Góc thư giãn</a>
                </h2>

                <div style="margin: 10px 0px">
                    <a href="<?= site_url()?>">Trang Chủ</a> ➝ Góc thư giãn
                </div>
                <h2 class="line-title">
                        <a href="javascript:void(0)" title="Góc thư giãn mới">Góc thư giãn</a>
                </h2>
                <div class="row" style="margin-bottom: 20px; margin-top: 20px">
                    <!--1 NEW NOI BAT-->
                    <div class="col-md-6 col-lg-6">
                        <div class="featured-article">
                            <?php $fun = $funs_list[0];?>
                            <a href="<?= toURLFriendly($fun['funs_title'],"gtg", $fun['funs_id'])?>">
                                <img class="w-100" src="<?php echo base_url(); ?>public/images/<?= $funs_list[0]['funs_image']?>"
                                     alt="<?= $funs_list[0]['funs_title'] ?>">
                            </a>
                            <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                <h2 class="media-heading">
                                    <a href="<?= toURLFriendly($fun['funs_title'],"gtg", $fun['funs_id'])?>" style="color: #fb7e31;" class="archive-i">
                                        <?= $funs_list[0]['funs_title'] ?></a>
                                </h2>
                                <p>
                                    <a href="<?= site_url('tin-tuc.html')?>">
                                        <span class="category-name">Góc thư giãn</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($funs_list[0]['funs_create_time'])?></span>
                                </p>

                                <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify;color: #cccccc">
                                    (Góc thư giãn)  <?= $funs_list[0]['funs_sapo']?>
                                </p>
                            </div>
                        </div>
                        <ul class="news-list">
                            <?php $i=1?>
                            <?php foreach ($funs_list as $fun){?>
                                <?php if($i >= 6 and $i <=10){?>
                                    <li>
                                        <h3>
                                            <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>"
                                               title="<?= $fun['funs_title']?>"><?= $fun['funs_title']?></a>
                                        </h3>
                                    </li>
                                <?php } ?>
                            <?php $i++;} ?>
                        </ul>
                    </div>
                    <!--4 NEW MOI-->
                    <div class="col-md-6 col-lg-6">
                        <?php $i= 2; foreach ($funs_list as $fun){ ?>
                            <?php if($i >=2 and $i <=5){?>
                                <div class="featured-articles featured-articles-min pull-left w-45 w-100-xs mb-10 mr-10 h-350 min-h-350" >
                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                        <img class="w-100 h-150 h-xs-auto" src="<?php echo base_url(); ?>public/images/<?= $fun['funs_image']?>"
                                             alt="<?= $fun['funs_title'] ?>">
                                    </a>
                                    <div class="block-title">
                                        <h2 class="media-heading" >
                                            <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" style="color: #fb7e31;" class="archive-i">
                                                <?= $fun['funs_title'] ?></a>
                                        </h2>
                                        <p>
                                            <a href="<?= site_url('tin-tuc.html')?>">
                                                <span class="category-name">Góc thư giãn</span></a> -
                                            <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                            <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($fun['funs_create_time'])?></span>
                                        </p>
                                        <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify; color: #cccccc">
                                            (Góc thư giãn)  <?= (trim_text($fun['funs_sapo'], 30))?>
                                        </p>
                                    </div>

                                </div>
                            <?php } ?>
                        <?php $i++;} ?>
                    </div>
                </div>

                <!--LIST LOOP NEWS-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme carousel-custom">
                            <?php $i= 1; foreach ($funs_list as $fun){ ?>
                                <div class="item">
                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" title="<?= $fun['funs_title']?>">
                                        <img class="owl-lazy" style="width: 100%; height: 150px;"  alt="<?=$fun['funs_title']?>"
                                             data-src="<?php echo base_url()?>public/images/<?= $fun['funs_thumbs']?>" >
                                    </a>
                                    <h3 class="media-heading">
                                        <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" title="<?= $fun['funs_title']?>"><?= $fun['funs_title']?></a>
                                    </h3>
                                </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8" >
                        <div class="zone-most-view">
                            <h2 class="line-title clearfix">
                                <a href="javascript:void(0)" title="XEM NHIỀU NHẤT">XEM NHIỀU NHẤT</a>
                            </h2>

                            <!--LIST NEWS MOST VIEWS-->
                            <ul class="media-list main-list" style="margin-top: 20px; text-align: justify">
                                <?php
                                $i = 1;
                                foreach ($funs_top_view as $funs){ ?>
                                    <?php if($i <=5){?>
                                        <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                            <a class="pull-left pull-right-xs w-25 w-100-xs" href="<?= toURLFriendly($funs['funs_title'], 'gtg', $funs['funs_id'])?>">
                                                <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                     data-src="<?php echo base_url()?>public/images/<?= $funs['funs_thumbs']?>"
                                                     alt="<?= $funs['funs_title']?>" style="width: ">
                                            </a>
                                            <div class="media-body w-100-xs">
                                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                                    <a href="<?= toURLFriendly($funs['funs_title'], 'gtg', $funs['funs_id'])?>" style="font-size: 1.6rem">
                                                        <?= $funs['funs_title']?>
                                                    </a>
                                                </h3>
                                                <a href="<?= site_url('tin-tuc.html')?>"><span class="category-name">Góc thư giãn</span></a> -
                                                <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                                <span class="time"><i class="glyphicon glyphicon-eye-open"></i> Lượt xem <?= number_format($funs['funs_views'])?></span> -
                                                <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($funs['funs_create_time'])?></span>
                                                <p style="margin-top: 10px; color: #1e1e1e"><?= $funs['funs_sapo']?></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                <?php $i++;} ?>
                            </ul>
                            <!-- SMALL LIST LINK-->
                            <ul class="news-list" style="border: none;">
                                <?php
                                $i = 1;
                                foreach ($funs_top_view as $funs){?>
                                    <?php if($i >= 6 and $i <=10){?>
                                        <li>
                                            <h3>
                                                <a href="<?= toURLFriendly($funs['funs_title'], 'gtg', $funs['funs_id'])?>"
                                                   title="<?=$funs['funs_title'] ?>"><?=$funs['funs_title'] ?></a>
                                            </h3>
                                        </li>
                                    <?php } ?>
                                <?php $i++;} ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="accordion-document" class="departments" style="margin-bottom: 25px;">
                            <h2 class="line-title clearfix">
                                <a href="javascript:void(0)" title="TÀI LIỆU">TÀI LIỆU HAY</a>
                            </h2>
                            <div id="box-tai-lieu" class="accordion" role="tablist" aria-multiselectable="true">
                                <?php $i = 1;foreach ($funs_list as $funs){?>
                                    <div class="panel">
                                        <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-tai-lieu" href="#<?= 'document-'.$funs['funs_id'] ?>" aria-expanded="<?= $i==1?'true':'false'?>" aria-controls="collapse1">
                                            <h4 class="panel-title">
                                                <?= substr($funs['funs_title'], 0, 40)?>
                                            </h4>
                                        </a>
                                        <div id="<?= 'document-'.$funs['funs_id'] ?>" class="panel-collapse collapse <?= $i==1?'in':''?>" role="tabpanel">
                                            <div class="panel-body">
                                                <div class="item-content clearfix">
                                                    <a class="thumb-image" href="" title="">
                                                        <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy" data-src="<?php echo base_url()?>public/thumbs/<?= $funs['funs_thumbs']?>" alt="">
                                                    </a>
                                                    <p>
                                                        <?= substr($funs['funs_sapo'], 0, 200)?>...
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

                        <div id="accordion-book" class="departments" style="margin-bottom: 25px;">
                            <h2 class="line-title clearfix">
                                <a href="javascript:void(0)" title="TÀI LIỆU">SÁCH HAY</a>
                            </h2>
                            <div id="box-book" class="accordion" role="tablist" aria-multiselectable="true">
                                <?php $i = 1;foreach ($funs_list as $funs){?>
                                    <div class="panel">
                                        <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-book" href="#<?= 'book-'.$funs['funs_id'] ?>" aria-expanded="<?= $i==1?'true':'false'?>" aria-controls="collapse1">
                                            <h4 class="panel-title">
                                                <?= substr($funs['funs_title'], 0, 40)?>
                                            </h4>
                                        </a>
                                        <div id="<?= 'book-'.$funs['funs_id'] ?>" class="panel-collapse collapse <?= $i==1?'in':''?>" role="tabpanel">
                                            <div class="panel-body">
                                                <div class="item-content clearfix">
                                                    <a class="thumb-image" href="" title="">
                                                        <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy" data-src="<?php echo base_url()?>public/thumbs/<?= $funs['funs_thumbs']?>" alt="">
                                                    </a>
                                                    <p>
                                                        <?= substr($funs['funs_sapo'], 0, 200)?>...
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