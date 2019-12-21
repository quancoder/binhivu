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
                                        <option value="-1" <?=$q=='-1'?'selected' : ' '?> >Tất cả tài liệu</option>
                                        <option value="1" <?=$q=='1'?'selected' : ' '?>>Tài liệu miễn phí</option>
                                        <option value="0" <?=$q=='0'?'selected' : ' '?>>Tài liệu tính phí</option>
                                    </select>
                                    <select name="order" class="form-control w-95-xs w-20 mr-10" style="float: right" onchange="this.form.submit()">
                                        <option value="asc" <?=$order=='asc'?'selected' : ''?> >Giá tăng dần</option>
                                        <option value="desc" <?=$order=='desc'?'selected' : ''?> >Giá giảm dần</option>
                                    </select>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <?php foreach ($doc_list as $doc) { ?>
                        <div class="col-xs-12 col-sm-6 col-lg-3 col-lg-3">
                            <div class="media mb-10 ribbon-holder">
                                <?= $doc['doc_free']==1 ? '<span class="sale">Free</span>' : ''?>
                                <a href="<?= toURLFriendly($doc['doc_name'],'document', $doc['doc_id'])?>">
                                    <img class="media-object img-doc h-250 h-xs-auto w-100" src="<?= $doc['doc_image']?>" alt="<?= $doc['doc_name']?>">
                                </a>
                                <div class="media-body h-150 h-xs-auto" style="text-align: left;">
                                    <h3 class="media-heading h-70 h-xs-auto" style="font-size: 1.4rem">
                                        <a href="<?= toURLFriendly($doc['doc_name'],'document', $doc['doc_id'])?>">
                                           <?= $doc['doc_name']?>
                                        </a>
                                    </h3>
                                    <div style="width: 100%; margin: 10px; ">
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

                                            <div style="width: 100%;">
                                                <span style="color: #a6a6a6"><i class="glyphicon glyphicon-user"></i> binhivu</span>
                                                <br/>
                                                <span style="color: #a6a6a6"> <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($doc['doc_create_date']) ?></span>
                                            </div>
                                        </div>
                                        <div style="width: 30%; float: left">
                                            <a class="tlmask button glow" href=""> </a>
                                            <a href="">
                                                <button type="button" class="btn btn-sm btn-warning" style="background-color: #ff914d">Xem ngay</button>
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
                        <?php foreach ($book_top as $book){ ?>
                            <div class="item">
                                <div class="media mb-10 ribbon-holder">
                                    <?= $book['b_free']==1 ? '<span class="sale">Free</span>' : ''?>
                                    <a href="<?= toURLFriendly($book['b_name'],'document', $book['b_id'])?>">
                                        <img class="media-object img-doc h-250 h-xs-auto" src="<?= $book['b_image']?>" alt="<?= $book['b_name']?>">
                                    </a>
                                    <div class="media-body h-150 h-xs-auto" style="">
                                        <h3 class="media-heading h-70 h-xs-auto" style="font-size: 1.4rem">
                                            <a href="<?= toURLFriendly($book['b_name'],'document', $book['b_id'])?>">
                                                <?= $book['b_name']?>
                                            </a>
                                        </h3>
                                        <div style="width: 100%; margin: 10px; text-align: left;">
                                            <span class="author"><i class="glyphicon glyphicon-user"></i> binhivu</span>
                                            - <span class="author""> <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($book['b_create_date']) ?></span>

                                            <div style="width: 55%; float: left">
                                                <div class="" style="width: 100%;">
                                                    <i class="glyphicon glyphicon-usd" style="color:#0092e0"></i>
                                                    <span style="color: red"><?= number_format($book['b_price'])?></span>
                                                    <span class="textstat">vnđ</span>
                                                </div>
                                                <div class="" style="width: 100%">
                                                    <i class="glyphicon glyphicon-download" style="color:#026a1d"></i>
                                                    <span style="color: red"><?=number_format($book['b_download'])?></span>
                                                    <span class="textstat">lượt tải</span>
                                                </div>
                                            </div>
                                            <div style="float: left">
                                                <a class="tlmask button glow" href=""> </a>
                                                <a href="">
                                                    <button type="button" class="btn btn-sm btn-warning" style="background-color: #ff914d">Xem ngay</button>
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