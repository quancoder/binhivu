<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-md-8">
                <div id="zone-news">
                    <h1 class="home-title">
                        <a href="<?= site_url('tin-tuc.html')?>" title="TIN TỨC">TIN MỚI CẬP NHẬT</a>
                    </h1>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="featured-article mb-20">
                                <?php $new = $news_list[0]?>
                                <a href="<?= toURLFriendly($new['news_title'],'tt', $new['news_id'])?>">
                                    <img class="img-responsive w-100" src="<?=$new['news_image']?>"
                                         data-src="<?=$new['news_image']?>"
                                         alt="<?= $new['news_title']?>">
                                </a>
                                <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                    <h2 class="media-heading">
                                        <a href="<?= toURLFriendly(($new['news_title']),'tt', $new['news_id'])?>" style="color: #fb7e31;" class="archive-i">
                                            <?= $new['news_title']?>
                                        </a>
                                    </h2>
                                    <p>
                                        <a href="<?= site_url('tin-tuc.html')?>"><span class="category-name">Tin tức</span></a> -
                                        <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                        <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($new['news_create_time'])?></span>
                                    </p>
                                    <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify; color: #cccccc">
                                        (Tin tức)  <?= ($news_list[0]['news_sapo'])?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--row1 right-->
                        <div class="col-md-4 mt-20-xs" id="list-news-right">
                            <div class="media-list main-list" style="text-align: justify">
                                <?php $i=1?>
                                <?php foreach ($news_list as $new){?>
                                    <?php if($i >= 2 and $i <=3){?>
                                        <div class="media" style="padding-bottom: 10px;border-bottom: 2px solid #eee;">
                                            <div class="media-body">
                                                <a class="" href="<?= toURLFriendly(($new['news_title']),'tt', $new['news_id'])?>">
                                                    <img class="media-object lazy w-100" src="<?=$new['news_image']?>"
                                                         data-src="<?=$new['news_image']?>" alt="<?= $new['news_title']?>">
                                                </a>
                                                <a href="<?= site_url('tin-tuc.html')?>"><span class="category-name">Tin tức</span></a> -
                                                <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($new['news_create_time'])?></span>
                                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                                    <a href="<?= toURLFriendly(($new['news_title']),'tt', $new['news_id'])?>" style="font-size: 1.8rem">
                                                        <?= $new['news_title']?>
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php $i++;} ?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <!--LIST LOOP NEWS-->
                            <div class="owl-carousel owl-theme carousel-custom">
                                <?php $i=1?>
                                <?php foreach ($news_list as $new){ ?>
                                    <?php if($i >= 4){?>
                                        <div class="item">
                                            <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>">
                                                <img class="owl-lazy h-150 h-xs-auto" style="width: 100%;"  alt="<?=$new['news_title']?>"
                                                     data-src="<?=$new['news_image']?>" >
                                            </a>
                                            <h3 class="carousel-heading">
                                                <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
                                            </h3>
                                        </div>
                                    <?php } ?>
                                <?php $i++;} ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h2 class="line-title clearfix" style="border: none">
                                <a href="javascript:void(0)" title="Góc thư giãn ">TIN NỔI BẬT</a>
                            </h2>
                            <ul class="media-list main-list slimScroll" style="margin-top: 20px; text-align: justify;">
                                <?php
                                $i = 1;
                                foreach ($news_top_view as $new){ ?>
                                    <?php if($i <=3){?>
                                        <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                            <a class="pull-left pull-right-xs w-25 w-100-xs" href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>">
                                                <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                     data-src="<?=$new['news_image']?>"
                                                     alt="<?= $new['news_title']?>" style="width: ">
                                            </a>
                                            <div class="media-body w-100-xs">
                                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                                    <a href="<?= toURLFriendly($new['news_title'], 'gtg', $new['news_id'])?>" style="font-size: 2rem">
                                                        <?= $new['news_title']?>
                                                    </a>
                                                </h3>
                                                <a href="<?= site_url('goc-thu-gian.html')?>"><span class="category-name">Tin tức</span></a> -
                                                <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                                <span class="time"><i class="glyphicon glyphicon-eye-open"></i> Lượt xem <?= number_format($new['news_views'])?></span> -
                                                <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($new['news_create_time'])?></span>
                                                <p style="margin-top: 10px; color: #1e1e1e"><?= $new['news_sapo']?></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                <?php $i++;} ?>
                            </ul>
                            <ul class="news-list" style="border: none;">
                                <?php
                                $i = 1;
                                foreach ($news_top_view as $new){ ?>
                                    <?php if($i >= 6 and $i <=10){?>
                                        <li>
                                            <h3>
                                                <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>"
                                                   title="<?=$new['news_title'] ?>"><?=$new['news_title'] ?></a>
                                            </h3>
                                        </li>
                                    <?php } ?>
                                <?php $i++;} ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="zone-thu-gian">
                    <h1 class="home-title">
                        <a href="<?= site_url('goc-thu-gian.html')?>" title="TIN TỨC">GÓC THƯ GIÃN</a>
                    </h1>
                    <div class="row" style="margin-bottom: 20px;">
                        <!--row1 left-->
                        <div class="col-md-7 col-lg-7">
                            <div class="featured-article">
                                <?php $fun = $funs_list[0]?>
                                <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                    <img class="thumb lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                         data-src="<?=$fun['funs_image']?>"
                                         alt="<?= $fun['funs_title']?>">
                                </a>
                                <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                    <h2 class="media-heading">
                                        <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $funs_list['0']['funs_id'])?>" style="color: #fb7e31;" class="archive-i">
                                            <?= $fun['funs_title']?>
                                        </a>
                                    </h2>
                                    <p>
                                        <a href="<?= site_url('goc-thu-gian.html')?>"><span class="category-name">Góc thư giãn</span></a> -
                                        <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                        <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($fun['funs_create_time'])?></span>
                                    </p>
                                    <p style="font-size: 13px; margin-bottom: 0px">
                                        (Góc thư giãn)  <?= ($fun['funs_sapo'])?>
                                    </p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--row1 right-->
                        <div class="col-md-5 col-lg-5"  id="list-thu-gian-right">
                            <ul class="media-list main-list">
                                <?php $i=1?>
                                <?php foreach ($funs_list as $fun){?>
                                    <?php if($i >= 2 and $i <=4){?>
                                        <li class="media" style="padding-bottom: 10px;">
                                            <a class="pull-left w-40 w-40-xs" href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                                <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                     data-src="<?=$fun['funs_image']?>"
                                                     alt="<?= $fun['funs_title']?>">
                                            </a>
                                            <div class="media-body">
                                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0; font-size: 1.3rem; line-height: 1.4">
                                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                                        <?= $fun['funs_title']?>
                                                    </a>
                                                </h3>
                                                <a href="<?= site_url('goc-thu-gian.html')?>"><span class="category-name">Góc thư giãn</span></a> -
                                                <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($fun['funs_create_time'])?></span>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php $i++;} ?>

                                <ul class="news-list">
                                    <?php $i=1?>
                                    <?php foreach ($funs_list as $fun){?>
                                        <?php if($i >= 8 and $i <=12){?>
                                            <li>
                                                <h3><a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>"
                                                       title="<?= $fun['funs_title']?>"><?= $fun['funs_title']?></a>
                                                </h3>
                                            </li>
                                        <?php } ?>
                                    <?php $i++;} ?>
                                </ul>
                            </ul>
                        </div>

                        <div class="col-md-12">
                            <!--LIST LOOP NEWS-->
                            <div class="owl-carousel owl-theme carousel-custom mt-10">
                                <?php $tmp = array_reverse($funs_list);
                                foreach ($tmp as $fun){ ?>
                                    <div class="item">
                                        <a href="<?= toURLFriendly($fun['funs_title'], 'tt', $fun['funs_id'])?>" title="<?= $fun['funs_title']?>">
                                            <img class="owl-lazy h-150 h-xs-auto" style="width: 100%;"  alt="<?=$fun['funs_title']?>"
                                                 data-src="<?=$fun['funs_image']?>" >
                                        </a>
                                        <h3 class="carousel-heading">
                                            <a href="<?= toURLFriendly($fun['funs_title'], 'gtt', $fun['funs_id'])?>" title="<?= $fun['funs_title']?>"><?= $fun['funs_title']?></a>
                                        </h3>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="zone-most-view">
                    <h2 class="line-title clearfix" style="border: none">
                        <a href="javascript:void(0)" title="Góc thư giãn ">TRUYỆN XEM NHIỀU NHẤT</a>
                    </h2>
                    <ul class="media-list main-list" style="margin-top: 20px; text-align: justify;">
                    <?php
                    $i = 1;
                    foreach ($funs_top_view as $fun){ ?>
                        <?php if($i <=3){?>
                        <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                            <a class="pull-left pull-right-xs w-25 w-100-xs" href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                     data-src="<?=$fun['funs_image']?>"
                                     alt="<?= $fun['funs_title']?>" style="width: ">
                            </a>
                            <div class="media-body w-100-xs">
                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" style="font-size: 2rem">
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

                    <ul class="news-list" style="border: none;">
                        <?php
                        $i = 1;
                        foreach ($funs_top_view as $fun){ ?>
                            <?php if($i >= 6 and $i <=10){?>
                                <li>
                                    <h3>
                                        <a href="<?= toURLFriendly($fun['funs_title'], 'gtgg', $fun['funs_id'])?>"
                                           title="<?=$fun['funs_title'] ?>"><?=$fun['funs_title'] ?></a>
                                    </h3>
                                </li>
                            <?php } ?>
                        <?php $i++;} ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div id="accordion-document" class="departments">
                    <h1 class="home-title">
                        <span>Tài liệu xem nhiều</span>
                    </h1>
                    <div id="box-tai-lieu" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php $i = 1;foreach ($doc_top_view as $doc){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-tai-lieu" href="#<?= 'document-'.$doc['doc_id'] ?>" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <i class="glyphicon glyphicon-file"></i> <?= substr($doc['doc_name'], 0, 40)?>
                                    </h4>
                                </a>
                                <div id="<?= 'document-'.$doc['doc_id'] ?>" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy" data-src="<?=$doc['doc_image']?>" alt="">
                                            </a>
                                            <p>
                                                <?= substr($doc['doc_des'], 0, 200)?>...
                                            </p>
                                        </div>
                                        <div class="item-footer clearfix">
                                            <a class="btn-more" href="<?= toURLFriendly($doc['doc_name'], '##doc', $doc['doc_id'])?>" title="<?= $doc['doc_name']?>">
                                                CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $i++;} ?>
                    </div>
                </div>

                <div id="accordion-book" class="departments" style="margin-bottom: 25px;">
                    <h1 class="home-title">
                        <span>Sách xem nhiều</span>
                    </h1>
                    <div id="box-book" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php $i = 1;foreach ($book_top_view as $book){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-book" href="#<?= 'book-'.$book['b_id'] ?>" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <i class="glyphicon glyphicon-book"></i> <?= substr($book['b_name'], 0, 40)?>
                                    </h4>
                                </a>
                                <div id="<?= 'book-'.$book['b_id'] ?>" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy" data-src="<?=$book['b_image']?>" alt="">
                                            </a>
                                            <p>
                                                <?= substr($book['b_des'], 0, 200)?>...
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
                        <span>LIÊN HỆ TÁC GIẢ</span>
                    </h2>
                    <ul class="contact-data">
                        <li class="clearfix app-mobile">
                            <div class="value"><a href="tel:0926111368">0926111368</a></div>
                        </li>
                        <li class="clearfix app-email">
                            <div class="value"><a href="mailto:binhivu38@gmail.com">binhivu38@gmail.com</a></div>
                        </li>
                        <li class="clearfix app-location">
                            <div class="value">Địa chỉ, Ngọc Thụy Long Biên Hà Nội</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>