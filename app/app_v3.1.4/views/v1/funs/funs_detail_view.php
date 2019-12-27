<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-sm-8">
                <h2 class="home-title clearfix">
                    <a href="<?=site_url('go-thu-gian.html')?>" title="Góc thư giãn ">Góc thư giãn</a>
                </h2>
                <div class="row" style="margin-bottom: 20px;">
                    <!--row1 left-->
                    <div class="col-sm-12 col-lg-12">
                        <div class="archive" style="border: none">
                            <h2 class="heading-archive ml-20-xs mr-20-xs">
                                <?php echo ($info['funs_title'])?>
                            </h2>
                            <div class="entry-content pl-100 pr-100 pl-5-xs pr-5-xs">
                                <p class="sapo-archive mt-20" style="font-size: 1rem"><?php echo ($info['funs_sapo'])?></p>
                                <ul class="news-list" style="border: none;border-top: 1px solid #eeeeee; ">
                                    <?php $i = 1; foreach ($funs_top as $fun){ ?>
                                        <?php if($i <= 4){?>
                                            <li>
                                                <h3>
                                                    <a href="<?=toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>"
                                                       title="<?php echo ($fun['funs_title'])?>"><?php echo ($fun['funs_title'])?>
                                                    </a>
                                                </h3>
                                            </li>
                                        <?php } ?>
                                    <?php $i++; } ?>
                                </ul>
                                <div class="meta-archive">
                                    <div style="float: left">
                                        <span class="author mr-10"><i class="glyphicon glyphicon-user"></i> binhivu</span>
                                        <span class="time mr-10"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($info['funs_create_time'])?></span>
                                        <span class="time"><i class="glyphicon glyphicon-eye-open"></i> <?= ($info['funs_views'])?> Lượt xem</span>
                                    </div>
                                    <div style="float: right">
                                        <div class="fb-like" data-href="<?=toURLFriendly($info['funs_title'], 'gtg', $info['funs_id'])?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                                        <div class="fb-save" style="float: right" data-uri="<?=toURLFriendly($info['funs_title'], 'gtg', $info['funs_id'])?>" data-size="small"></div>
                                    </div>
                                </div>
                                <div style="clear: both"></div>
                                <div class="content-archive mb-20 mt-10" style="font-size: 1rem">
                                    <?php echo ($info['funs_content']) ?>
                                </div>
                                <div class="fb-like" data-href="<?=toURLFriendly($info['funs_title'], 'gtg', $info['funs_id'])?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                                <div class="fb-save" style="float: right" data-uri="<?=toURLFriendly($info['funs_title'], 'gtg', $info['funs_id'])?>" data-size="small"></div>
                                <div class="fb-comments" data-href="<?=toURLFriendly($info['funs_title'], 'gtg', $fun['funs_id'])?>" data-width="100%" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--LIST LOOP NEWS-->
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="line-title clearfix" style="border: none">
                            <a href="javascript:void(0)" title="Góc thư giãn ">Đừng bỏ lỡ</a>
                        </h2>
                        <div class="my-carousel-1 owl-carousel owl-theme carousel-custom">
                            <?php $i= 1; foreach ($funs_top as $fun){ ?>
                                <div class="item">
                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" title="<?= $fun['funs_title']?>">
                                        <img class="owl-lazy h-150 h-xs-auto" style="width: 100%;"  alt="<?=$fun['funs_title']?>"
                                             data-src="<?= $fun['funs_image'] ?>" >
                                    </a>
                                    <h3 class="carousel-heading">
                                        <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" title="<?= $fun['funs_title']?>"><?= $fun['funs_title']?></a>
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
                            <ul class="media-list main-list" style="margin-top: 20px; text-align: justify">
                                <?php
                                $i = 1;
                                foreach ($funs_top_view as $fun){ ?>
                                    <?php if($i <= 4){?>
                                        <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                            <a class="pull-left pull-right-xs w-25 w-100-xs" href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                                <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                     data-src="<?= $fun['funs_image'] ?>" alt="<?= $fun['funs_title']?>" style="width: ">
                                            </a>
                                            <div class="media-body w-100-xs">
                                                <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" style="font-size: 1.2rem">
                                                        <?= $fun['funs_title']?>
                                                    </a>
                                                </h3>
                                                <a href="<?= site_url('go-thu-gian.html')?>"><span class="category-name">Góc thư giãn</span></a> -
                                                <span class="author"><i class="glyphicon  glyphicon-user"></i> binhivu</span> -
                                                <span class="time"><i class="glyphicon glyphicon-eye-open"></i> Lượt xem <?= number_format($fun['funs_views'])?></span> -
                                                <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($fun['funs_create_time'])?></span>
                                                <p style="margin-top: 10px; color: #1e1e1e"><?= $fun['funs_sapo']?></p>
                                            </div>
                                        </li>
                                    <?php } ?>
                                    <?php $i++;} ?>
                            </ul>
                            <!-- SMALL LIST LINK-->
                            <ul class="news-list" style="border: none;">
                                <?php
                                $i = 1;
                                foreach ($funs_top_view as $fun){?>
                                    <?php if($i >= 5 and $i <=10){?>
                                        <li>
                                            <h3>
                                                <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>"
                                                   title="<?=$fun['funs_title'] ?>">
                                                    <?=$fun['funs_title'] ?>
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
                <!-- SMALL LIST LINK-->
                <ul class="news-list hide" style="border: none;">
                    <?php
                    $i = 1;
                    foreach ($funs_top_view as $fun){?>
                        <?php if($i >= 5 and $i <=10){?>
                            <li>
                                <h3>
                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>"
                                       title="<?=$fun['funs_title'] ?>">
                                        <?=$fun['funs_title'] ?>
                                    </a>
                                </h3>
                            </li>
                        <?php } ?>
                        <?php $i++;} ?>
                </ul>
                <h2 class="line-title clearfix">
                    <a href="javascript:void(0)" title="Góc thư giãn ">BÀI VIẾT XEM NHIỀU NHẤT</a>
                </h2>
                <ul class="media-list main-list">
                    <?php $i=1?>
                    <?php foreach ($funs_top_view as $funs){?>
                        <?php if($i <=4){?>
                            <li class="media" style="padding-bottom: 10px;">
                                <a class="pull-left w-40 w-40-xs" href="<?= toURLFriendly($funs['funs_title'], 'gtg', $funs['funs_id'])?>">
                                    <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                         data-src="<?=$funs['funs_image']?>"
                                         alt="<?= $funs['funs_title']?>">
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0; font-size: 1.2rem; line-height: 1.4">
                                        <a href="<?= toURLFriendly($funs['funs_title'], 'gtg', $funs['funs_id'])?>">
                                            <?= $funs['funs_title']?>
                                        </a>
                                    </h3>
                                    <a href="<?= site_url('goc-thu-gian.html')?>"><span class="category-name">Góc thư giãn</span></a> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($funs['funs_create_time'])?></span>
                                </div>
                            </li>
                        <?php } ?>
                        <?php $i++;} ?>

                    <ul class="news-list ">
                        <?php $i=1?>
                        <?php foreach ($funs_top_view as $funs){?>
                            <?php if($i >= 5 and $i <=12){?>
                                <li>
                                    <h3>
                                        <a href="<?= toURLFriendly($funs['funs_title'], 'gtg', $funs['funs_id'])?>"
                                           title="<?= $funs['funs_title']?>" style="font-size: 1rem">
                                            <?= $funs['funs_title']?>
                                        </a>
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
                                        <i class="glyphicon glyphicon-file"></i> <?= substr($doc['doc_des'], 0, 40)?>
                                    </h4>
                                </a>
                                <div id="<?= 'document-'.$doc['doc_id'] ?>" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                     data-src="<?= $doc['doc_image'] ?>" alt="">
                                            </a>
                                            <p>
                                                <?= substr($doc['doc_des'], 0, 200)?>...
                                            </p>
                                        </div>
                                        <div class="item-footer clearfix">
                                            <a class="btn-more" href="<?= toURLFriendly($doc['doc_name'], 'tailieu', $doc['doc_id'])?>" title="">CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i></a>
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
                                        <i class="glyphicon glyphicon-book"></i> <?= substr($book['b_name'], 0, 40)?>
                                    </h4>
                                </a>
                                <div id="<?= 'book-'.$book['b_id'] ?>" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                     data-src=" <?= $book['b_image'] ?>" alt="">
                                            </a>
                                            <p>
                                                <?= substr($book['b_des'], 0, 200)?>...
                                            </p>
                                        </div>
                                        <div class="item-footer clearfix">
                                            <a class="btn-more" href="<?= toURLFriendly($book['b_name'], '#book', $book['b_id'])?>" title="">CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i></a>
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