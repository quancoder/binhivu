<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="home-title hide">
                        <a href="<?= site_url('tai-lieu.hml')?>" title="TIN TỨC">Tài liệu</a>
                    </h2>

                    <div style="margin: 10px 0px">
                        <a href="">Trang Chủ</a>
                        ➝ <a href="">Tài liệu</a>
                    </div>
                    <h2 class="line-title clearfix">
                        <a href="https://binhivu.com/dan-su" title="DÂN SỰ ">Tài liệu</a>
                    </h2>
                    <div id="main-tai-lieu" class="row" style="margin-bottom: 20px; margin-top: 20px">
                        <?php foreach ($doc_list as $doc) { ?>
                        <div class="col-xs-12 col-sm-6 col-lg-3 col-lg-3">
                            <div class="media mb-10" style="border: 1px solid #c3c3c3; border-radius: 3px">
                                <img class="media-object lazy w-100 h-250 h-xs-auto" src="images/tai-lieu.png"
                                     data-src="<?= $doc['doc_image']?>"
                                     alt="<?= $doc['doc_name']?>">

                                <div class="media-body h-150 h-xs-auto" style="background-color: #eeeeee">
                                    <h3 class="media-heading h-70 h-xs-auto" style="font-size: 1.4rem">
                                        <a href="<?= toURLFriendly($doc['doc_name'],'document', $doc['doc_id'])?>">
                                           <?= $doc['doc_name']?>
                                        </a>
                                    </h3>
                                    <div style="width: 100%; margin: 10px">
                                        <span class="author"> binhivu</span> - <span style="color: gray">
                                        <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($doc['doc_create_date']) ?></span>

                                        <div style="width: 65%; float: left">
                                            <div class="" style="width: 100%;">
                                                <i class="glyphicon glyphicon-usd" style="color:#0092e0"></i>
                                                <span style="color: red"><?= number_format($doc['doc_price'])?></span>
                                                <span class="textstat">vnđ</span>
                                            </div>
                                            <div class="" style="width: 100%">
                                                <i class="glyphicon glyphicon-download" style="color:#026a1d"></i>
                                                <span style="color: red"><?=number_format($doc['doc_download'])?></span>
                                                <span class="textstat">lượt tải</span>
                                            </div>
                                        </div>
                                        <div style="width: 30%; float: left">
                                            <a class="tlmask button glow" href=""> </a>
                                            <a href="">
                                                <button type="button" class="btn btn-sm btn-warning" style="background-color: #ff914d">Download</button>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <h2 class="line-title clearfix">
                        <a href="<?= site_url('sach.html')?>" title="DÂN SỰ ">Sách</a>
                    </h2>
                    <div class="my-carousel-2 owl-carousel owl-theme carousel-custom">
                        <?php foreach ($doc_list as $doc){ ?>
                            <div class="item">
                                <div class="media mb-10" style="border: 1px solid #c3c3c3; border-radius: 3px">
                                    <img class="media-object lazy w-100 h-250 h-xs-auto" src="images/tai-lieu.png"
                                         data-src="<?= $doc['doc_image']?>"
                                         alt="<?= $doc['doc_name']?>">

                                    <div class="media-body h-150 h-xs-auto" style="background-color: #eeeeee">
                                        <h3 class="media-heading h-70 h-xs-auto" style="font-size: 1.4rem">
                                            <a href="<?= toURLFriendly($doc['doc_name'],'document', $doc['doc_id'])?>">
                                                <?= $doc['doc_name']?>
                                            </a>
                                        </h3>
                                        <div style="width: 100%; margin: 10px">
                                            <span class="author"> binhivu</span> - <span style="color: gray">
                                        <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($doc['doc_create_date']) ?></span>

                                            <div style="width: 65%; float: left">
                                                <div class="" style="width: 100%;">
                                                    <i class="glyphicon glyphicon-usd" style="color:#0092e0"></i>
                                                    <span style="color: red"><?= number_format($doc['doc_price'])?></span>
                                                    <span class="textstat">vnđ</span>
                                                </div>
                                                <div class="" style="width: 100%">
                                                    <i class="glyphicon glyphicon-download" style="color:#026a1d"></i>
                                                    <span style="color: red"><?=number_format($doc['doc_download'])?></span>
                                                    <span class="textstat">lượt tải</span>
                                                </div>
                                            </div>
                                            <div style="width: 30%; float: left">
                                                <a class="tlmask button glow" href=""> </a>
                                                <a href="">
                                                    <button type="button" class="btn btn-sm btn-warning" style="background-color: #ff914d">Download</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
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