<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="home-title hide">
                    <a href="<?= site_url('tin-tuc.html')?>" title="TIN TỨC">TIN TỨC</a>
                </h2>

                <div style="margin: 10px 0px">
                    <a href="<?= site_url()?>">Trang Chủ</a> ➝ Tin tức
                </div>
                <h2 class="line-title">
                        <a href="javascript:void(0)" title="Tin tức mới">Tin tức mới</a>
                </h2>
                <div class="row" style="margin-bottom: 20px; margin-top: 20px">
                    <!--1 NEW NOI BAT-->
                    <div class="col-md-6 col-lg-6">
                        <div class="featured-article">
                            <?php $new = $news_list[0]; ?>
                            <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>">
                                <img class="w-100" src="<?= $new['news_path'] ?>"
                                     alt="<?= $new['news_title'] ?>">
                            </a>
                            <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                <h2 class="media-heading">
                                    <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" style="color: #fb7e31;" class="archive-i">
                                        <?= $new['news_title'] ?></a>
                                </h2>
                                <p>
                                    <a href="<?= site_url('tin-tuc.html')?>">
                                        <span class="category-name">Tin tức</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($new['news_create_time'])?></span>
                                </p>

                                <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify;color: #cccccc">
                                    (Tin tức)  <?= $new['news_sapo']?>
                                </p>
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
                    <!--4 NEW MOI-->
                    <div class="col-md-6 col-lg-6">
                        <?php $i= 2; foreach ($news_list as $new){ ?>
                            <?php if($i >=2 and $i <=5){?>
                                <div class="featured-articles featured-articles-min pull-left w-45 w-100-xs mb-10 mr-10 h-350 min-h-350" >
                                    <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>">
                                        <img class="w-100 h-150 h-xs-auto" src="<?= $new['news_path'] ?>" alt="<?= $new['news_title'] ?>">
                                    </a>
                                    <div class="block-title">
                                        <h2 class="media-heading" >
                                            <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" style="color: #fb7e31;" class="archive-i">
                                                <?= $new['news_title'] ?></a>
                                        </h2>
                                        <p>
                                            <a href="<?= site_url('tin-tuc.html')?>">
                                                <span class="category-name">Tin tức</span></a> -
                                            <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                            <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($new['news_create_time'])?></span>
                                        </p>
                                        <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify; color: #cccccc">
                                            (Tin tức)  <?= (trim_text($new['news_sapo'], 30))?>
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
                            <?php $i= 1; foreach ($news_list as $new){ ?>
                                <div class="item">
                                    <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>">
                                        <img class="owl-lazy h-150 h-xs-auto" style="width: 100%;"  alt="<?=$new['news_title']?>"
                                             data-src="<?= $new['news_path'] ?>" >
                                    </a>
                                    <h3 class="carousel-heading">
                                        <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
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
                                                     data-src="<?= $new['news_path'] ?>" alt="<?= $news['news_title']?>" style="width: ">
                                            </a>
                                            <div class="media-body w-100-xs">
                                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                                    <a href="<?= toURLFriendly($news['news_title'], 'gt', $news['news_id'])?>" style="font-size: 1.6rem">
                                                        <?= $news['news_title']?>
                                                    </a>
                                                </h3>
                                                <a href="<?= site_url('tin-tuc.html')?>"><span class="category-name">Tin tức</span></a> -
                                                <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                                <span class="time"><i class="glyphicon glyphicon-eye-open"></i> Lượt xem <?= number_format($news['news_views'])?></span> -
                                                <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news['news_create_time'])?></span>
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
                    </div>
                    <div class="col-md-4">
                        <div id="accordion-document" class="departments" style="margin-bottom: 25px;">
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
                                                        <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                             data-src="<?= $new['news_path'] ?>" alt="">
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

                        <div id="accordion-book" class="departments" style="margin-bottom: 25px;">
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
                                                        <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                             data-src=" <?= $new['news_path'] ?>" alt="">
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
    })
</script>