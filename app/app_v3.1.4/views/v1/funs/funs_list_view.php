<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <!--1 NEW NOI BAT-->
            <div class="col-sm-6 col-lg-6">
                <h2 class="home-title">
                    <a href="javascript:void(0)" title="Tin tức mới">Bài viết nổi bật</a>
                </h2>
                <div class="featured-article">
                    <?php $fun = $funs_list[0]; ?>
                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                        <img class="w-100" src="<?= $fun['funs_image'] ?>"
                             alt="<?= $fun['funs_title'] ?>">
                    </a>
                    <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                        <h2 class="media-heading">
                            <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" style="color: #fb7e31;" class="archive-i">
                                <?= $fun['funs_title'] ?></a>
                        </h2>
                        <p>
                            <a href="<?= site_url('goc-giai-tri.html')?>">
                                <span class="category-name">Góc giải trí</span></a> -
                            <span class="author"><i class="glyphicon "></i> binhivu</span> -
                            <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($fun['funs_create_time'])?></span>
                        </p>

                        <p style="font-size: 1rem; margin-bottom: 0; text-align: justify;color: #cccccc">
                            (Góc giải trí)  <?= $fun['funs_sapo']?>
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
            <div class="col-sm-6 col-lg-6">
                <h2 class="home-title">
                    <a href="javascript:void(0)" title="Tin tức mới">Bài viết mới nhất </a>
                </h2>
                <?php $i= 1; foreach ($funs_list as $fun){ ?>
                    <?php if($i >=2 and $i <=5){?>
                        <div class="featured-articles featured-articles-min pull-left w-50 w-100-xs mb-5 pr-5 pr-0-xs h-400 min-h-400 h-xs-auto">
                            <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>">
                                <img class="w-100 h-150 h-xs-auto" src="<?= $fun['funs_image'] ?>" alt="<?= $fun['funs_title'] ?>">
                            </a>
                            <div class="block-title">
                                <h2 class="media-heading" style="font-size: 1.2rem">
                                    <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" style="color: #fb7e31;" class="archive-i">
                                        <?= $fun['funs_title'] ?></a>
                                </h2>
                                <p>
                                    <a href="<?= site_url('goc-giai-tri.html')?>">
                                        <span class="category-name">Tin tức</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($fun['funs_create_time'])?></span>
                                </p>
                                <p style="font-size: 1rem; margin-bottom: 0; text-align: justify; color: #cccccc">
                                    (Góc giải trí)  <?= (trim_text($fun['funs_sapo'], 35))?>
                                </p>
                            </div>

                        </div>
                    <?php } ?>
                    <?php $i++;} ?>
            </div>
        </div>

        <!--LIST LOOP NEWS-->
        <div class="row">
            <div class="col-sm-12">
                <h2 class="home-title clearfix">
                    <a href="javascript:void(0)" title="BÀI VIẾT XEM NHIỀU NHẤT">Đừng bỏ lỡ</a>
                </h2>
                <div class="my-carousel-2 owl-carousel owl-theme carousel-custom">
                    <?php $i= 1; foreach ($funs_list as $fun){ ?>
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
        </div>

        <div class="row">
            <div class="col-sm-7" >
                <div class="zone-most-view">
                    <h2 class="home-title clearfix">
                        <a href="javascript:void(0)" title="BÀI VIẾT XEM NHIỀU NHẤT">BÀI VIẾT XEM NHIỀU NHẤT</a>
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
                                        <a href="<?= site_url('goc-giai-tri.html')?>"><span class="category-name">Góc giải trí</span></a> -
                                        <span class="author"><i class="glyphicon glyphicon-user"></i> binhivu</span> -
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
            <div class="col-sm-5">
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