<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="row">
                <div class="col-sm-12">
                    <div style="margin: 10px 0px">
                        <a href="">Trang Chủ</a>
                        ➝ <a href="">Tài liệu</a>
                    </div>
                    <h2 class="home-title clearfix">
                        <a href="" title="DÂN SỰ " style="float: left">Tài liệu</a>
                    </h2>
                    <div id="main-tai-lieu" class="row" style="margin-bottom: 20px; margin-top: 20px">
                        <div class="col-12">
                            <div class="mb-10">
                                <form method="get" action="">
                                    <select name="q" class="form-control w-95-xs w-20 mr-10" style="float: right" onchange="this.form.submit()">
                                        <option value="all" <?=$q=='-1'?'selected' : ' '?> >Tất cả tài liệu</option>
                                        <option value="free" <?=$q=='0'?'selected' : ' '?>>Tài liệu miễn phí</option>
                                        <option value="fees" <?=$q=='1'?'selected' : ' '?>>Tài liệu tính phí</option>
                                    </select>
                                    <select name="order" class="form-control w-95-xs w-20 mr-10" style="float: right" onchange="this.form.submit()">
                                        <option value="asc" <?=$order=='asc'?'selected' : ' '?>>Giá tăng dần</option>
                                        <option value="desc" <?=$order=='desc'?'selected' : ' '?>>Giá giảm dần</option>
                                    </select>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <?php foreach ($doc_list as $doc) { ?>
                        <div class="col-xs-12 col-sm-6 col-lg-3 col-lg-3">
                            <div class="media mb-10 ribbon-holder" style="border: 1px solid #f5f5f5; border-radius: 3px; position: relative">
                                <?= $doc['doc_free']==1 ? '<span class="sale">Free</span>' : ''?>
                                <img class="media-object w-100 h-250 h-xs-auto" src="<?= $doc['doc_image']?>" alt="<?= $doc['doc_name']?>">
                                <div class="media-body h-150 h-xs-auto" style="background-color: #eeeeee">
                                    <h3 class="media-heading h-70 h-xs-auto" style="font-size: 1.4rem">
                                        <a href="<?= toURLFriendly($doc['doc_name'],'document', $doc['doc_id'])?>">
                                           <?= $doc['doc_name']?>
                                        </a>
                                    </h3>
                                    <div style="width: 100%; margin: 10px">
                                        <span class="author"> binhivu</span>
                                        - <span class="author""> <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($doc['doc_create_date']) ?></span>

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
                    <h2 class="home-title clearfix">
                        <a href="<?= site_url('sach.html')?>" title="DÂN SỰ ">Sách đang được quan tâm</a>
                    </h2>
                        <div class="my-carousel-2 owl-carousel owl-theme carousel-custom">
                        <?php foreach ($book_top as $boook){ ?>
                            <div class="item">
                                <div class="media mb-10" style="border: 1px solid #c3c3c3; border-radius: 3px">
                                    <img class="media-object lazy w-100 h-250 h-xs-auto" src="images/tai-lieu.png"
                                         data-src="<?= $boook['b_image']?>"
                                         alt="<?= $boook['b_name']?>">

                                    <div class="media-body h-150 h-xs-auto" style="background-color: #eeeeee">
                                        <h3 class="media-heading h-70 h-xs-auto" style="font-size: 1.4rem">
                                            <a href="<?= toURLFriendly($boook['b_name'],'document', $boook['b_id'])?>">
                                                <?= $boook['b_name']?>
                                            </a>
                                        </h3>
                                        <div style="width: 100%; margin: 10px">
                                            <span class="author"> binhivu</span> - <span style="color: gray">
                                        <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($boook['b_create_date']) ?></span>

                                            <div style="width: 65%; float: left">
                                                <div class="" style="width: 100%;">
                                                    <i class="glyphicon glyphicon-usd" style="color:#0092e0"></i>
                                                    <span style="color: red"><?= number_format($boook['b_price'])?></span>
                                                    <span class="textstat">vnđ</span>
                                                </div>
                                                <div class="" style="width: 100%">
                                                    <i class="glyphicon glyphicon-download" style="color:#026a1d"></i>
                                                    <span style="color: red"><?=number_format($boook['b_download'])?></span>
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