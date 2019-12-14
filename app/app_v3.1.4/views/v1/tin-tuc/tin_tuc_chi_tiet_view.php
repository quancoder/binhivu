<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div style="margin: 10px 0px">
                    <a href="<?= site_url()?>">Trang Chủ</a>
                    ➝ <a href="<?= site_url('tin-tuc.html')?>">Tin Tức</a>
                    ➝ <a href=""><?php echo htmlentities($info['news_title'])?></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <h2 class="line-title clearfix">
                    <a href="<?=site_url('tin-tuc.html')?>" title="Tin tức ">Tin tức</a>
                </h2>
                <div class="row" style="margin-bottom: 20px;">
                    <!--row1 left-->
                    <div class="col-md-12 col-lg-12">
                        <div class="archive" style="border: none">
                            <h2 class="heading-archive">
                                <?php echo htmlentities($info['news_title'])?>
                            </h2>
                            <p class="meta-archive">
                                <a href="<?= site_url('tin-tuc.html')?>">
                                    <span class="category-name">Tin tức</span></a> -
                                <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($info['news_create_time'])?></span>
                            </p>
                            <p class="sapo-archive"><?php echo htmlentities($info['news_sapo'])?></p>
                            <ul class="news-list">
                                <?php $i = 1; foreach ($news_top as $news){ ?>
                                    <?php if($i <= 4){?>
                                        <li>
                                            <h3>
                                                <a href="<?=toURLFriendly($news['news_title'], 'tt', $news['news_id'])?>"
                                                   title="<?php echo ($news['news_title'])?>"><?php echo ($news['news_title'])?>
                                                </a>
                                            </h3>
                                        </li>
                                    <?php } ?>

                                <?php $i++; } ?>

                            </ul>
                            <div class="content-archive entry-content pt-20 pl-100 pl-5-xs pr-5-xs">
                                <?php echo ($info['news_content']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--LIST LOOP NEWS-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme carousel-custom">
                            <?php $i= 1; foreach ($news_top as $new){ ?>
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
            </div>

            <div class="col-sm-4">
                <div class="zone-most-view">
                    <h2 class="line-title clearfix">
                        <a href="javascript:void(0)" title="TIN TỨC XEM NHIỀU NHẤT">TIN TỨC XEM NHIỀU NHẤT</a>
                    </h2>
                    <!--LIST NEWS MOST VIEWS-->
                    <div class="media-list main-list" style="text-align: justify">
                        <?php $i=1?>
                        <?php foreach ($news_top as $news){?>
                            <?php if($i >= 3 and $i <=6){?>
                                <div class="media" style="padding-bottom: 10px;border-bottom: 2px solid #eee;">
                                    <div class="media-body">
                                        <a class="" href="<?= toURLFriendly(($news['news_title']),'tt', $news['news_id'])?>">
                                            <img class="media-object lazy w-100" src="<?php echo base_url()?>public/images/<?= $news['news_thumbs']?>"
                                                 data-src="<?php echo base_url()?>public/images/<?= $news['news_thumbs']?>" alt="<?= $news['news_title']?>">
                                        </a>
                                        <a href="<?= site_url('tin-tuc.html')?>"><span class="category-name">Tin tức</span></a> -
                                        <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news['news_create_time'])?></span>
                                        <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                            <a href="<?= toURLFriendly(($news['news_title']),'tt', $news['news_id'])?>" style="font-size: 1.6rem">
                                                <?= $news['news_title']?>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php $i++;} ?>
                    </div>
                    <ul class="media-list main-list" style="margin-top: 20px; text-align: justify; display: none">
                        <?php
                        $i = 1;
                        foreach ($news_top as $news){ ?>
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
                        foreach ($news_top as $news){?>
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
                <div id="accordion-document" class="departments" style="margin-bottom: 25px;">
                    <h2 class="home-title">
                        <a href="javascript:void(0)" title="TÀI LIỆU">TÀI LIỆU HAY</a>
                    </h2>
                    <div id="box-tai-lieu" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php $i = 1;foreach ($news_top as $news){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-tai-lieu" href="#<?= 'document-'.$news['news_id'] ?>" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <?= substr($news['news_title'], 0, 40)?>
                                    </h4>
                                </a>
                                <div id="<?= 'document-'.$news['news_id'] ?>" class="panel-collapse collapse" role="tabpanel">
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

                <div id="accordion-book" class="departments" style="margin-bottom: 25px;">
                    <h2 class="home-title">
                        <a href="javascript:void(0)" title="TÀI LIỆU">SÁCH HAY</a>
                    </h2>
                    <div id="box-book" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php $i = 1;foreach ($news_top as $news){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-book" href="#<?= 'book-'.$news['news_id'] ?>" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <?= substr($news['news_title'], 0, 40)?>
                                    </h4>
                                </a>
                                <div id="<?= 'book-'.$news['news_id'] ?>" class="panel-collapse collapse" role="tabpanel">
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
                <div>
                    <h2 class="line-title clearfix">
                        <a href="javascript:void(0)" title="Góc thư giãn ">TRUYỆN XEM NHIỀU NHẤT</a>
                    </h2>
                    <ul class="media-list main-list" style="margin-top: 20px; text-align: justify">
                        <?php
                        $i = 1;
                        foreach ($funs_top as $fun){ ?>
                            <?php if($i <=5){?>
                                <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                    <a class="pull-right-xs w-25 w-100-xs" href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                        <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                             data-src="<?php echo base_url()?>public/images/<?= $fun['funs_thumbs']?>"
                                             alt="<?= $fun['funs_title']?>" style="width: 100%">
                                    </a>
                                    <div class="media-body w-100-xs">
                                        <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                            <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" style="font-size: 1.6rem">
                                                <?= $fun['funs_title']?>
                                            </a>
                                        </h3>
                                        <a href="<?= site_url('goc-thu-gian.html')?>"><span class="category-name">Góc thư giãn</span></a> -
                                        <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                        <span class="time"><i class="glyphicon glyphicon-eye-open"></i> Lượt xem <?= number_format($fun['funs_views'])?></span> -
                                        <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($fun['funs_create_time'])?></span>
                                        <p style="margin-top: 10px; color: #1e1e1e"><?= $fun['funs_sapo']?></p>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php $i++;} ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>