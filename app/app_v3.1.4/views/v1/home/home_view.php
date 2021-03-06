<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-sm-7">
                <div id="zone-news">
                    <h1 class="home-title">
                        <a href="<?= site_url('tin-tuc.html')?>" >TIN TỨC MỚI NHẤT</a>
                    </h1>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="featured-article mb-5">
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
                                    <p style="margin-bottom: 0; color: #cccccc">
                                        (Tin tức)  <?= ($news_list[0]['news_sapo'])?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--row1 right-->
                        <div class="col-sm-4" id="list-news-right">
                            <div class="media-list main-list">
                                <?php $i=1?>
                                <?php foreach ($news_list as $new){?>
                                    <?php if($i >= 2 and $i <=3){?>
                                        <div class="featured-article mb-5">
                                            <a href="<?= toURLFriendly($new['news_title'],'tt', $new['news_id'])?>">
                                                <img class="img-responsive w-100" src="<?=$new['news_image']?>"
                                                     data-src="<?=$new['news_image']?>"
                                                     alt="<?= $new['news_title']?>">
                                            </a>
                                            <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                                <h2 class="media-heading">
                                                    <a href="<?= toURLFriendly(($new['news_title']),'tt', $new['news_id'])?>" style="color: #fb7e31; font-size: 1rem" class="archive-i">
                                                        <?= $new['news_title']?>
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php $i++;} ?>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h2 class="line-title clearfix" style="border: none">
                                <a href="javascript:void(0)" title="Góc thư giãn ">NỔI BẬT NHẤT</a>
                            </h2>
                            <ul class="media-list main-list mt-10" >
                                <?php
                                $i = 1;
                                foreach ($news_top_view as $new){ ?>
                                    <?php if($i <=3){?>
                                        <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                            <a class="pull-left pull-right-xs w-35 w-100-xs" href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>">
                                                <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                     data-src="<?=$new['news_image']?>"
                                                     alt="<?= $new['news_title']?>" style="width: ">
                                            </a>
                                            <div class="media-body w-100-xs">
                                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                                    <a href="<?= toURLFriendly($new['news_title'], 'gtg', $new['news_id'])?>" style="font-size: 1.2rem">
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
                        <div class="col-sm-12">
                            <!--LIST LOOP NEWS-->
                            <h2 class="line-title clearfix" style="border: none;">
                                <a href="javascript:void(0)" title="Góc thư giãn ">ĐỪNG BỎ LỠ</a>
                            </h2>
                            <div class="my-carousel-1 owl-carousel owl-theme carousel-custom">
                                <?php $i=1?>
                                <?php foreach ($news_list as $new){ ?>
                                    <?php if($i >= 4){?>
                                        <div class="item">
                                            <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>">
                                                <img class="owl-lazy h-150 h-xs-auto" style="width: 100%;"  alt="<?=$new['news_title']?>"
                                                     data-src="<?=$new['news_image']?>" >
                                            </a>
                                            <h3 class="carousel-heading">
                                                <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>"><?= trim_text($new['news_title'], 17)?></a>
                                            </h3>
                                        </div>
                                    <?php } ?>
                                    <?php $i++;} ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="zone-thu-gian">
                    <h1 class="home-title">
                        <a href="<?= site_url('goc-thu-gian.html')?>" >GÓC THƯ GIÃN</a>
                    </h1>
                    <div class="row" style="margin-bottom: 10px;">
                        <!--row1 left-->
                        <div class="col-sm-8 col-lg-8">
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
                                    <p style="margin-bottom: 0px; color: #cccccc">
                                        (Góc thư giãn)  <?= ($fun['funs_sapo'])?>
                                    </p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--row1 right-->
                        <div class="col-sm-4 col-lg-4"  id="list-thu-gian-right">
                            <?php $i=1?>
                            <?php foreach ($funs_list as $fun){?>
                                <?php if($i >= 2 and $i <=3){?>
                                    <div class="featured-article mb-5">
                                        <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                            <img class="thumb lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                 data-src="<?=$fun['funs_image']?>"
                                                 alt="<?= $fun['funs_title']?>">
                                        </a>
                                        <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                            <h2 class="media-heading">
                                                <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $funs_list['0']['funs_id'])?>" style="color: #fb7e31; font-size: 1rem" class="archive-i">
                                                    <?= $fun['funs_title']?>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php $i++;} ?>
                        </div>
                    </div>
                </div>

                <div class="zone-most-view">
                    <h2 class="line-title clearfix" style="border: none">
                        <a href="javascript:void(0)" title="Góc thư giãn ">NỔI BẬT NHẤT</a>
                    </h2>
                    <ul class="media-list main-list" >
                    <?php
                    $i = 1;
                    foreach ($funs_top_view as $fun){ ?>
                        <?php if($i <=3){?>
                        <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                            <a class="pull-left pull-right-xs w-35 w-100-xs" href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                     data-src="<?=$fun['funs_image']?>"
                                     alt="<?= $fun['funs_title']?>" style="width: ">
                            </a>
                            <div class="media-body w-100-xs">
                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" style="font-size: 1.2rem">
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

                <div class="col-sm-12">
                    <!--LIST LOOP NEWS-->
                    <h2 class="line-title clearfix" style="border: none">
                        <a href="javascript:void(0)" title="Góc thư giãn ">ĐỪNG BỎ LỠ</a>
                    </h2>
                    <div class="my-carousel-1 owl-carousel owl-theme carousel-custom mt-10">
                        <?php $tmp = array_reverse($funs_list);
                        foreach ($tmp as $fun){ ?>
                            <div class="item">
                                <a href="<?= toURLFriendly($fun['funs_title'], 'tt', $fun['funs_id'])?>" title="<?= $fun['funs_title']?>">
                                    <img class="owl-lazy h-150 h-xs-auto" style="width: 100%;"  alt="<?=$fun['funs_title']?>"
                                         data-src="<?=$fun['funs_image']?>" >
                                </a>
                                <h3 class="carousel-heading">
                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtt', $fun['funs_id'])?>" title="<?= $fun['funs_title']?>"><?= trim_text($fun['funs_title'], 17)?></a>
                                </h3>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-5">
                <div id="accordion-document" class="departments">
                    <h1 class="home-title">
                        <a href="<?= site_url('tai-lieu.html')?>" >Tài liệu mới nhất</a>
                    </h1>
                    <div id="box-tai-lieu" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php $i = 1;foreach ($doc_top_view as $doc){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-tai-lieu" href="javascript:void(0)<?= 'document-'.$doc['doc_id'] ?>"
                                   aria-expanded="<?= in_array($i, array(1,2,3,4,5)) ? 'true': 'true'?>" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <i class="glyphicon glyphicon-file"></i> <strong><?= ucwords(trim_text($doc['doc_name'], 9)); ?></strong>
                                    </h4>
                                </a>
                                <div id="<?= 'document-'.$doc['doc_id'] ?>" class="panel-collapse collapse <?= in_array($i, array(1,2,3,4,5)) ? 'in': 'in'?>" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="<?= toURLFriendly($doc['doc_name'], 'document', $doc['doc_id'])?>" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy" data-src="<?=$doc['doc_image']?>" alt="">
                                            </a>
                                            <strong><?=$doc['doc_name']?></strong>
                                            <p>
                                                <?= trim_text($doc['doc_des'], 45)?>
                                            </p>
                                        </div>
                                        <div class="item-footer clearfix">
                                            <span class="time mr-20"><i class="glyphicon glyphicon-download"></i> <?= number_format($doc['doc_download'])?> Lượt tải </span>
                                            <span class="time"><i class="glyphicon glyphicon-eye-open"></i> <?= number_format($doc['doc_view'])?> Lượt xem </span>
                                            <a class="btn-more" href="<?= toURLFriendly($doc['doc_name'], 'document', $doc['doc_id'])?>" title="<?= $doc['doc_name']?>">
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
                        <a href="<?= site_url('sach.html')?>" >Sách mới nhất</a>
                    </h1>
                    <div id="box-book" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php $i = 1;foreach ($book_top_view as $book){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-book" href="javascript:void(0)<?= 'book-'.$book['b_id'] ?>"
                                   aria-expanded="<?= in_array($i, array(1,2,3,4,5)) ? 'true': 'true'?>" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <i class="glyphicon glyphicon-book"></i> <strong><?= ucwords(trim_text($book['b_name'], 9)); ?></strong>
                                    </h4>
                                </a>
                                <div id="<?= 'book-'.$book['b_id'] ?>" class="panel-collapse collapse <?= in_array($i, array(1,2,3,4,5)) ? 'in': 'in'?>" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="<?= toURLFriendly($book['b_name'], 'book', $book['b_id'])?>" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy" data-src="<?=$book['b_image']?>" alt="">
                                            </a>
                                            <strong><?= $book['b_name']; ?></strong>
                                            <p>
                                                <?= trim_text($book['b_des'], 45); ?>
                                            </p>
                                        </div>
                                        <div class="item-footer clearfix">
                                            <span class="time mr-20"><i class="glyphicon glyphicon-download"></i> <?= number_format($book['b_download'])?> Lượt tải </span>
                                            <span class="time"><i class="glyphicon glyphicon-eye-open"></i> <?= number_format($book['b_view'])?> Lượt xem </span>
                                            <a class="btn-more" href="<?= toURLFriendly($book['b_name'], 'book', $book['b_id'])?>" title="Xem ngay">CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i></a>
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
<script>
    $('.panel-heading a').on('click',function(e){
        if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
            e.stopPropagation();
        }
        // You can also add preventDefault to remove the anchor behavior that makes
        // the page jump
        // e.preventDefault();
    });
</script>