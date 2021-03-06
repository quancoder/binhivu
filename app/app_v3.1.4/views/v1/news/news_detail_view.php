<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-sm-8">
                <h2 class="home-title clearfix">
                    <a href="<?=site_url('tin-tuc.html')?>" title="Tin tức ">Tin tức</a>
                </h2>
                <div class="row" style="margin-bottom: 20px;">
                    <!--row1 left-->
                    <div class="col-sm-12 col-lg-12">
                        <div class="archive" style="border: none">
                            <h2 class="heading-archive">
                                <?php echo ($info['news_title'])?>
                            </h2>
                            <div class="entry-content pl-100 pr-100 pl-5-xs pr-5-xs">
                                <div style="clear: both"></div>
                                <p class="sapo-archive mt-20" ><?php echo ($info['news_sapo'])?></p>
                                <ul class="news-list" style="border: none; border-top: 1px solid #eeeeee;">
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
                                <div class="meta-archive">
                                    <div style="float: left">
                                        <span class="author mr-10"><i class="glyphicon  glyphicon-user"></i> binhivu</span>
                                        <span class="time mr-10"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($info['news_create_time'])?></span>
                                        <span class="time"><i class="glyphicon glyphicon-eye-open"></i> <?= number_format($info['news_views'])?> </span>
                                    </div>
                                    <div style="float: right">
                                        <div class="fb-like" data-href="<?=toURLFriendly($info['news_title'], 'tt', $info['news_id'])?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                                    </div>
                                </div>
                                <div style="clear: both"></div>
                                <div class="content-archive mb-10 mt-10 article" >
                                    <?php echo ($info['news_content']) ?>
                                </div>
                                <div class="mb-10 pb-10" style="border-bottom: 1px solid #eeeeee;">
                                    <?php $tag = explode(',', $info['news_tags']) ?>
                                    <?php foreach ($tag as $value){?>
                                        <a href="<?= site_url('tim-kiem-tin-tuc.html').'?tag='.$value?>">
                                            <span class="badge mr-5 mb-5"><i class="glyphicon glyphicon-tag"></i> <?=$value?></span>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="fb-like" data-href="<?=toURLFriendly($info['news_title'], 'tt', $info['news_id'])?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                                <div class="fb-comments" data-href="<?=toURLFriendly($info['news_title'], 'tt', $news['news_id'])?>" data-width="100%" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--LIST LOOP NEWS-->
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="line-title clearfix" style="border: none">
                            <a href="javascript:void(0)" title="Góc thư giãn ">ĐỪNG BỎ LỠ</a>
                        </h2>
                        <div class="my-carousel-1 owl-carousel owl-theme carousel-custom">
                            <?php $i= 1; foreach ($news_top as $new){ ?>
                                <div class="item">
                                    <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>">
                                        <img class="owl-lazy h-150 h-xs-auto" style="width: 100%;"  alt="<?=$new['news_title']?>"
                                             data-src="<?= $new['news_image'] ?>" >
                                    </a>
                                    <h3 class="carousel-heading">
                                        <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>" title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
                                    </h3>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="zone-most-view">
                            <h2 class="line-title clearfix" style="border: none">
                                <a href="javascript:void(0)" title="Góc thư giãn ">CÙNG CHUYÊN MỤC</a>
                            </h2>
                            <!--LIST NEWS MOST VIEWS-->
                            <ul class="media-list main-list" style="margin-top: 20px; ">
                                <?php
                                $i = 1;
                                foreach ($news_top_view as $news){ ?>
                                    <?php if($i <= 2){?>
                                        <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                            <a class="pull-left pull-right-xs w-25 w-100-xs" href="<?= toURLFriendly($news['news_title'], 'tt', $news['news_id'])?>">
                                                <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                     data-src="<?= $news['news_image'] ?>" alt="<?= $news['news_title']?>" style="width: ">
                                            </a>
                                            <div class="media-body w-100-xs">
                                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0; font-size: 1.2rem">
                                                    <a href="<?= toURLFriendly($news['news_title'], 'tt', $news['news_id'])?>" >
                                                        <?= $news['news_title']?>
                                                    </a>
                                                </h3>
                                                <a href="<?= site_url('tin-tuc.html')?>"><span class="category-name">Tin tức</span></a> -
                                                <span class="author"><i class="glyphicon  glyphicon-user"></i> binhivu</span> -
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
                                    <?php if($i >= 3 and $i <=10){?>
                                        <li>
                                            <h3>
                                                <a href="<?= toURLFriendly($news['news_title'], 'tt', $news['news_id'])?>"
                                                   title="<?=$news['news_title'] ?>">
                                                    <?=$news['news_title'] ?>
                                                </a>
                                            </h3>
                                        </li>
                                    <?php } ?>
                                    <?php $i++;} ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <h2 class="line-title clearfix">
                    <a href="javascript:void(0)" title="Góc thư giãn ">TIN XEM NHIỀU NHẤT</a>
                </h2>
                <ul class="media-list main-list">
                    <?php $i=1?>
                    <?php foreach ($news_top as $new){?>
                        <?php if($i <=4){?>
                            <li class="media" style="padding-bottom: 10px;">
                                <a class="pull-left w-40 w-40-xs" href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>">
                                    <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                         data-src="<?=$new['news_image']?>"
                                         alt="<?= $new['news_title']?>">
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0; font-size: 1rem; line-height: 1.2">
                                        <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>">
                                            <?= $new['news_title']?>
                                        </a>
                                    </h3>
                                    <a href="<?= site_url('tin-tuc.html')?>"><span class="category-name">Tin tức</span></a> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($new['news_create_time'])?></span>
                                    <p>
                                        <span class="time"><i class="glyphicon glyphicon-eye-open"></i> <?= number_format($news['news_views'])?> Lượt xem </span>
                                    </p>
                                </div>
                            </li>
                        <?php } ?>
                        <?php $i++;} ?>

                    <ul class="news-list">
                        <?php $i=1?>
                        <?php foreach ($news_top as $new){?>
                            <?php if($i >= 5 and $i <=12){?>
                                <li>
                                    <h3>
                                        <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>"
                                           title="<?= $new['news_title']?>" style="font-size: 1rem"><?= $new['news_title']?></a>
                                    </h3>
                                </li>
                            <?php } ?>
                        <?php $i++;} ?>
                    </ul>
                </ul>
                <div id="accordion-document" class="departments" style="margin-bottom: 25px;">
                    <h2 class="home-title clearfix">
                        <a href="javascript:void(0)" title="TÀI LIỆU">TÀI LIỆU HAY</a>
                    </h2>
                    <div id="box-tai-lieu" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php foreach ($doc_top_view as $doc){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-tai-lieu" href="#<?= 'document-'.$doc['doc_id'] ?>" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <i class="glyphicon glyphicon-file"></i> <strong><?= ucwords(trim_text($doc['doc_name'], 9)); ?></strong>
                                    </h4>
                                </a>
                                <div id="<?= 'document-'.$doc['doc_id'] ?>" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="<?= toURLFriendly($doc['doc_name'], 'document', $doc['doc_id'])?>" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                     data-src="<?= $doc['doc_image'] ?>" alt="">
                                            </a>
                                            <strong><?=$doc['doc_name']?></strong>
                                            <p>
                                                <?= trim_text($doc['doc_des'], 45)?>
                                            </p>
                                        </div>
                                        <div class="item-footer clearfix">
                                            <span class="time mr-20"><i class="glyphicon glyphicon-download"></i> <?= number_format($doc['doc_download'])?> Lượt tải </span>
                                            <span class="time"><i class="glyphicon glyphicon-eye-open"></i> <?= number_format($doc['doc_view'])?> Lượt xem </span>
                                            <a class="btn-more" href="<?= toURLFriendly($doc['doc_name'], 'document', $doc['doc_id'])?>" title="">CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div id="accordion-book" class="departments" style="margin-bottom: 25px;">
                    <h2 class="home-title clearfix">
                        <a href="javascript:void(0)" title="TÀI LIỆU">SÁCH HAY</a>
                    </h2>
                    <div id="box-book" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php foreach ($book_top_view as $book){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-book" href="#<?= 'book-'.$book['b_id'] ?>" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <i class="glyphicon glyphicon-book"></i> <strong><?= ucwords(trim_text($book['b_name'], 9)); ?></strong>
                                    </h4>
                                </a>
                                <div id="<?= 'book-'.$book['b_id'] ?>" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="<?= toURLFriendly($book['b_name'], 'book', $book['b_id'])?>" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                     data-src=" <?= $book['b_image'] ?>" alt="">
                                            </a>
                                            <strong><?= $book['b_name']; ?></strong>
                                            <p>
                                                <?= trim_text($book['b_des'], 45)?>
                                            </p>
                                        </div>
                                        <div class="item-footer clearfix">
                                            <span class="time mr-20"><i class="glyphicon glyphicon-download"></i> <?= number_format($book['b_download'])?> Lượt tải </span>
                                            <span class="time"><i class="glyphicon glyphicon-eye-open"></i> <?= number_format($book['b_view'])?> Lượt xem </span>
                                            <a class="btn-more" href="<?= toURLFriendly($book['b_name'], 'book', $book['b_id'])?>" title="">CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>