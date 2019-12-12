<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-sm-8">
                <h1 class="home-title">
                    <a href="<?= site_url('tin-tuc.html')?>" title="TIN TỨC">TIN TỨC</a>
                </h1>
                <div class="row" style="margin-bottom: 20px;">
                    <!--row1 left-->
                    <div class="col-md-7 col-lg-7">
                        <div class="featured-article">
                            <a href="<?= site_url('tin-tuc/'.$news_list[0]['news_title'], $langcode)?>">
                                <img class="thumb" src="<?php echo base_url(); ?>public/images/<?= $news_list[0]['news_image']?>"
                                     data-src="<?php echo base_url(); ?>public/images/<?= $news_list[0]['news_image']?>"
                                     alt="<?= $news_list[0]['news_title']?>">
                            </a>
                            <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                <h2 class="media-heading">
                                    <a href="<?= site_url('tin-tuc/'.$news_list[0]['news_title'], $langcode)?>" style="color: #fb7e31;" class="archive-i">
                                        <?= $news_list[0]['news_title']?>
                                    </a>
                                </h2>
                                <p>
                                    <a href="<?= site_url('tin-tuc')?>"><span class="category">Tin tức</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news_list[0]['news_update_time'])?></span>
                                </p>
                                <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify">
                                    (Tin tức)  <?= htmlentities($news_list[0]['news_sapo'])?>
                                </p>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="featured-article">
                            <a href="<?= site_url('tin-tuc/'.$news_list[1]['news_title'], $langcode)?>">
                                <img class="thumb" src="<?php echo base_url(); ?>public/images/<?= $news_list[1]['news_image']?>"
                                     data-src="<?php echo base_url(); ?>public/images/<?= $news_list[1]['news_image']?>"
                                     alt="<?= $news_list[1]['news_title']?>">
                            </a>
                            <div class="block-title" style="margin-top: 10px;">
                                <h2 class="media-heading">
                                    <a href="<?= site_url('tin-tuc/'.$news_list[1]['news_title'], $langcode)?>" >
                                        <?= $news_list[1]['news_title']?>
                                    </a>
                                </h2>
                                <p>
                                    <a href="<?= site_url('tin-tuc')?>"><span class="category">Tin tức</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news_list[1]['news_update_time'])?></span>
                                </p>
                                <p style="font-size: 13px; margin-bottom: 0px">
                                    (Tin tức)  <?= htmlentities($news_list[1]['news_sapo'])?>
                                </p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!--row1 right-->
                    <div class="col-md-5 col-lg-5">
                        <ul class="media-list main-list" style="text-align: justify">
                            <?php $i=1?>
                            <?php foreach ($news_list as $news){?>
                                <?php if($i >= 3 and $i <=7){?>
                                    <li class="media" style="padding-bottom: 10px;">
                                        <a class="pull-left img-thumbnail"
                                           href="<?= site_url($news['news_title'])?>">
                                            <img class="media-object lazy" src="<?php echo base_url()?>public/thumbs/<?= $news['news_thumbs']?>"
                                                 data-src="<?php echo base_url()?>public/thumbs/<?= $news['news_thumbs']?>"
                                                 alt="<?= $news['news_title']?>">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0; text-align: justify">
                                                <a href="<?= site_url($news['news_title'])?>">
                                                    <?= $news['news_title']?>
                                                </a>
                                            </h3>
                                            <a href="<?= site_url('tin-tuc')?>"><span class="category">Tin tức</span></a>-
                                            <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news['news_update_time'])?></span>
                                        </div>
                                    </li>
                                <?php } ?>
                            <?php $i++;} ?>

                            <ul class="news-list">
                                <?php $i=1?>
                                <?php foreach ($news_list as $news){?>
                                    <?php if($i >= 8 and $i <=12){?>
                                    <li>
                                        <h3><a href="<?= site_url($news['news_title'])?>"
                                               title="Sống thử có hợp pháp hay không?"><?= $news['news_title']?></a>
                                        </h3>
                                    </li>
                                    <?php } ?>
                                <?php $i++;} ?>
                            </ul>
                        </ul>
                    </div>
                </div>

                <h1 class="home-title">
                    <a href="https://binhivu.com/tin-tuc" title="TIN TỨC">TRUYỆN NGẮN</a>
                </h1>
                <div class="row" style="margin-bottom: 20px;">
                    <!--row1 left-->
                    <div class="col-md-7 col-lg-7">
                        <div class="featured-article">
                            <a href="<?= toURLFriendly($funs_list[0]['funs_title'], 'gt', $funs_list['0']['funs_id'])?>">
                                <img class="thumb lazy" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
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
                                    <a href="<?= site_url('tin-tuc')?>"><span class="category">Truyện ngắn</span></a> -
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
                                <img class="thumb lazy" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
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
                                        <a class="pull-left img-thumbnail"
                                           href="<?= site_url($funs['funs_title'])?>">
                                            <img class="media-object lazy" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                                 data-src="<?php echo base_url()?>public/thumbs/<?= $funs['funs_thumbs']?>"
                                                 alt="<?= $funs['funs_title']?>">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0; text-align: justify">
                                                <a href="<?= site_url($funs['funs_title'])?>">
                                                    <?= $funs['funs_title']?>
                                                </a>
                                            </h3>
                                            <a href="<?= site_url('tin-tuc')?>"><span class="category">Truyện ngắn</span></a> -
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
                                <a class="pull-left img-thumbnail" href="<?= site_url($funs['funs_title'])?>">
                                    <img class="media-object lazy" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                         data-src="<?php echo base_url()?>public/thumbs/<?= $funs['funs_thumbs']?>"
                                         alt="<?= $funs['funs_title']?>">
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                        <a href="<?= site_url($funs['funs_title'])?>" style="font-size: 1.6rem">
                                            <?= $funs['funs_title']?>
                                        </a>
                                    </h3>
                                    <a href="<?= site_url('tin-tuc')?>"><span class="category">Truyện ngắn</span></a> -
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
                                            <a href="<?= site_url('truyen-ngan/'.$funs['funs_title'])?>"
                                               title="<?=$funs['funs_title'] ?>"><?=$funs['funs_title'] ?></a>
                                        </h3>
                                    </li>
                                <?php } ?>
                            <?php $i++;} ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="departments" style="margin-bottom: 25px;">
                    <h1 class="home-title">
                        <span>Tài liệu</span>
                    </h1>
                    <div id="box-tai-lieu" class="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel">
                            <a style="display: block" class="panel-heading " role="button" data-toggle="collapse"
                               data-parent="#box-tai-lieu" href="https://binhivu.com/#collapse1" aria-expanded="true"
                               aria-controls="collapse1">
                                <h4 class="panel-title">
                                    Tài liệu số 1
                                </h4>
                            </a>
                            <div id="collapse1" class="panel-collapse collapse in" role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dan-su"
                                           title="Tài liệu dân sự">
                                            <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_1.jpg?1572658067805"
                                                 alt="Tài liệu dân sự">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dan-su"
                                           title="Tài liệu dân sự">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-tai-lieu" href="https://binhivu.com/#collapse2"
                               aria-expanded="false" aria-controls="collapse2">
                                <h4 class="panel-title">
                                    Tài liệu số 2
                                </h4>
                            </a>
                            <div id="collapse2" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/hinh-su"
                                           title="Tài liệu hình sự">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="<?php echo base_url() . 'images/'; ?>tai-lieu.png"
                                                 alt="Tài liệu hình sự">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/hinh-su"
                                           title="Tài liệu hình sự">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-tai-lieu" href="https://binhivu.com/#collapse2"
                               aria-expanded="false" aria-controls="collapse3">
                                <h4 class="panel-title">
                                    Tài liệu số 3
                                </h4>
                            </a>
                            <div id="collapse3" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/hinh-su"
                                           title="Tài liệu hình sự">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="<?php echo base_url() . 'images/'; ?>tai-lieu.png"
                                                 alt="Tài liệu hình sự">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/hinh-su"
                                           title="Tài liệu hình sự">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-tai-lieu" href="https://binhivu.com/#collapse4"
                               aria-expanded="false" aria-controls="collapse4">
                                <h4 class="panel-title">
                                    Tài liệu số 4
                                </h4>
                            </a>
                            <div id="collapse4" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-ly-hon-nhanh"
                                           title="Tài liệu hôn nhân">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_4.jpg?1572658067805"
                                                 alt="Tài liệu hôn nhân">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-ly-hon-nhanh"
                                           title="Tài liệu hôn nhân">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-tai-lieu" href="https://binhivu.com/#collapse5"
                               aria-expanded="false" aria-controls="collapse5">
                                <h4 class="panel-title">
                                    Tài liệu số 5
                                </h4>
                            </a>
                            <div id="collapse5" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-lao-dong"
                                           title="Tài liệu lao động">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_5.jpg?1572658067805"
                                                 alt="Tài liệu lao động">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-lao-dong"
                                           title="Tài liệu lao động">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-tai-lieu" href="https://binhivu.com/#collapse6"
                               aria-expanded="false" aria-controls="collapse6">
                                <h4 class="panel-title">

                                    Tài liệu số 6
                                </h4>
                            </a>
                            <div id="collapse6" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-cho-doanh-nghiep"
                                           title="Tài liệu doanh nghiệp">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_6.jpg?1572658067805"
                                                 alt="Tài liệu doanh nghiệp">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-cho-doanh-nghiep"
                                           title="Tài liệu doanh nghiệp">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-tai-lieu" href="https://binhivu.com/#collapse7"
                               aria-expanded="false" aria-controls="collapse7">
                                <h4 class="panel-title">
                                    Tài liệu số 7
                                </h4>
                            </a>
                            <div id="collapse7" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-so-huu-tri-tue"
                                           title="Tài liệu sở hữu trí tuệ">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_7.jpg?1572658067805"
                                                 alt="Tài liệu sở hữu trí tuệ">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-so-huu-tri-tue"
                                           title="Tài liệu sở hữu trí tuệ">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-tai-lieu" href="https://binhivu.com/#collapse8"
                               aria-expanded="false" aria-controls="collapse8">
                                <h4 class="panel-title">
                                    Tài liệu số 8
                                </h4>
                            </a>
                            <div id="collapse8" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-giao-thong"
                                           title="Tài liệu giao thông">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_8.jpg?1572658067805"
                                                 alt="Tài liệu giao thông">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-giao-thong"
                                           title="Tài liệu giao thông">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="departments" style="margin-bottom: 25px;">
                    <h1 class="home-title">
                        <span>Sách</span>
                    </h1>
                    <div id="box-book" class="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel">
                            <a style="display: block" class="panel-heading " role="button" data-toggle="collapse"
                               data-parent="#box-book" href="https://binhivu.com/#collapse1" aria-expanded="true"
                               aria-controls="book1">
                                <h4 class="panel-title">
                                    Sách số 1
                                </h4>
                            </a>
                            <div id="book1" class="panel-collapse collapse in" role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dan-su"
                                           title="Sách dân sự">
                                            <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_1.jpg?1572658067805"
                                                 alt="Sách dân sự">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dan-su"
                                           title="Sách dân sự">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-book" href="https://binhivu.com/#collapse2"
                               aria-expanded="false" aria-controls="book2">
                                <h4 class="panel-title">
                                    Sách số 2
                                </h4>
                            </a>
                            <div id="book2" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/hinh-su"
                                           title="Sách hình sự">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="<?php echo base_url() . 'images/'; ?>tai-lieu.png"
                                                 alt="Sách hình sự">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/hinh-su"
                                           title="Sách hình sự">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-book" href="https://binhivu.com/#collapse2"
                               aria-expanded="false" aria-controls="book3">
                                <h4 class="panel-title">
                                    Sách số 3
                                </h4>
                            </a>
                            <div id="book3" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/hinh-su"
                                           title="Sách hình sự">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="<?php echo base_url() . 'images/'; ?>tai-lieu.png"
                                                 alt="Sách hình sự">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/hinh-su"
                                           title="Sách hình sự">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-book" href="https://binhivu.com/#collapse4"
                               aria-expanded="false" aria-controls="book4">
                                <h4 class="panel-title">
                                    Sách số 4
                                </h4>
                            </a>
                            <div id="book4" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-ly-hon-nhanh"
                                           title="Sách hôn nhân">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_4.jpg?1572658067805"
                                                 alt="Sách hôn nhân">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-ly-hon-nhanh"
                                           title="Sách hôn nhân">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-book" href="https://binhivu.com/#collapse5"
                               aria-expanded="false" aria-controls="book5">
                                <h4 class="panel-title">
                                    Sách số 5
                                </h4>
                            </a>
                            <div id="book5" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-lao-dong"
                                           title="Sách lao động">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_5.jpg?1572658067805"
                                                 alt="Sách lao động">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-lao-dong"
                                           title="Sách lao động">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-book" href="https://binhivu.com/#collapse6"
                               aria-expanded="false" aria-controls="book6">
                                <h4 class="panel-title">
                                    Sách số 6
                                </h4>
                            </a>
                            <div id="book6" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-cho-doanh-nghiep"
                                           title="Sách doanh nghiệp">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_6.jpg?1572658067805"
                                                 alt="Sách doanh nghiệp">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-cho-doanh-nghiep"
                                           title="Sách doanh nghiệp">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-book" href="https://binhivu.com/#collapse7"
                               aria-expanded="false" aria-controls="book7">
                                <h4 class="panel-title">
                                    Sách số 7
                                </h4>
                            </a>
                            <div id="book7" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-so-huu-tri-tue"
                                           title="Sách sở hữu trí tuệ">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_7.jpg?1572658067805"
                                                 alt="Sách sở hữu trí tuệ">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-so-huu-tri-tue"
                                           title="Sách sở hữu trí tuệ">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <a style="display: block" class="panel-heading collapsed" role="button"
                               data-toggle="collapse" data-parent="#box-book" href="https://binhivu.com/#collapse8"
                               aria-expanded="false" aria-controls="book8">
                                <h4 class="panel-title">
                                    Sách số 8
                                </h4>
                            </a>
                            <div id="book8" class="panel-collapse collapse " role="tabpanel">
                                <div class="panel-body">
                                    <div class="item-content clearfix">
                                        <a class="thumb-image" href="https://binhivu.com/dich-vu-giao-thong"
                                           title="Sách giao thông">
                                            <img width="100" height="100" src="<?php echo base_url() . 'images/'; ?>rolling.svg" class="lazy"
                                                 data-src="//bizweb.dktcdn.net/100/306/071/themes/734876/assets/department_image_8.jpg?1572658067805"
                                                 alt="Sách giao thông">
                                        </a>
                                        <p>Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    </div>
                                    <div class="item-footer clearfix">
                                        <a class="btn-more" href="https://binhivu.com/dich-vu-giao-thong"
                                           title="Sách giao thông">CHI TIẾT <i
                                                    class="glyphicon glyphicon-menu-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
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