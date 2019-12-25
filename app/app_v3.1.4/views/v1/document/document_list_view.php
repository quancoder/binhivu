<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <h2 class="home-title clearfix mt-10">
            <a href="" title="DÂN SỰ " style="float: left">Tài liệu</a>
            <form method="get" action="">
                <select name="q" class="form-control w-95-xs w-10 mr-10" style="float: right" onchange="this.form.submit()">
                    <option value="-1" <?=$q=='-1'?'selected' : ' '?> >Tất cả</option>
                    <option value="1" <?=$q=='1'?'selected' : ' '?>>Miễn phí</option>
                    <option value="0" <?=$q=='0'?'selected' : ' '?>>Tính phí</option>
                </select>
                <select name="order" class="form-control w-95-xs w-15 mr-10" style="float: right" onchange="this.form.submit()">
                    <option value="asc" <?=$order=='asc'?'selected' : ''?> >Giá tăng dần</option>
                    <option value="desc" <?=$order=='desc'?'selected' : ''?> >Giá giảm dần</option>
                </select>
                <div class="clearfix"></div>
            </form>
        </h2>
        <div id="page-list-tai-lieu" class="row" style="margin-bottom: 20px; margin-top: 20px">
            <?php foreach ($doc_list as $doc) { ?>
            <div class="col-xs-12 col-sm-6 col-lg-3 col-lg-3">
                <div class="media mb-10 ribbon-holder ">
                    <div class="detail-des-image h-280 h-auto-xs">
                        <a href="<?= toURLFriendly($doc['doc_name'], 'document', $doc['doc_id'])?>">
                            <div class="detail-image">
                                <?= $doc['doc_free']==1 ? '<span class="sale">Free</span>' : ''?>
                                <img class="media-object img-doc h-280 h-auto-xs w-100" src="<?= $doc['doc_image']?>" alt="<?= $doc['doc_name']?>">
                            </div>
                            <div class="detail-des">
                                <div class="text"><?= trim_text($doc['doc_des'], 77)?></div>
                            </div>
                        </a>
                    </div>
                    <div class="media-body" style="text-align: left;">
                        <h3 class="media-heading h-70" style="font-size: 1.4rem">
                            <a href="<?= toURLFriendly($doc['doc_name'], 'document', $doc['doc_id'])?>">
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
                                <div class="mt-5" style="width: 100%; color: #666666">
                                    <i class="glyphicon glyphicon-download"></i> <span class="pr-20"><?=number_format($doc['doc_download'])?></span>

                                    <i class="glyphicon glyphicon-eye-open"></i> <span><?=number_format($doc['doc_view'])?></span>
                                </div>

                                <div style="width: 100%; display: none">
                                    <span style="color: #a6a6a6"><i class="glyphicon glyphicon-user"></i> binhivu</span>
                                    <br/>
                                    <span style="color: #a6a6a6"> <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($doc['doc_create_date']) ?></span>
                                </div>
                            </div>
                            <div style="width: 30%; float: left">
                                <a href="<?= toURLFriendly($doc['doc_name'], 'document', $doc['doc_id'])?>">
                                    <button type="button" class="btn btn-warning" style="background-color: #ff914d; float: right">Xem ngay</button>
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
                    <div class="media ribbon-holder">
                        <?= $book['b_free']==1 ? '<span class="sale">Free</span>' : ''?>
                        <a href="<?= toURLFriendly($book['b_name'], 'document', $book['b_id'])?>">
                            <img class="media-object img-doc h-280 h-xs-auto" src="<?= $book['b_image']?>" alt="<?= $book['b_name']?>">
                        </a>
                        <div class="media-body">
                            <h3 class="media-heading h-70 h-xs-auto" style="font-size: 1.4rem">
                                <a href="<?= toURLFriendly($book['b_name'], 'document', $book['b_id'])?>">
                                    <?= $book['b_name']?>
                                </a>
                            </h3>
                            <div style="width: 100%; margin: 10px; text-align: left;">
                                <div style="width: 55%; float: left">
                                    <div class="" style="width: 100%;">
                                        <i class="glyphicon glyphicon-usd" style="color:#0092e0"></i>
                                        <span style="color: red"><?= number_format($book['b_price'])?></span>
                                        <span class="textstat">vnđ</span>
                                    </div>
                                    <div class="mt-5" style="width: 100%; color: #666666">
                                        <i class="glyphicon glyphicon-download"></i> <span class="pr-20"><?=number_format($book['b_download'])?></span>
                                        <i class="glyphicon glyphicon-eye-open"></i> <span><?=number_format($book['b_view'])?></span>
                                    </div>
                                    <div style="width: 100%; display: none">
                                        <span style="color: #a6a6a6"><i class="glyphicon glyphicon-user"></i> binhivu</span>
                                        <br/>
                                        <span style="color: #a6a6a6"> <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($book['b_create_date']) ?></span>
                                    </div>
                                </div>
                                <div style="float: left">
                                    <a href="<?= toURLFriendly($book['b_name'], 'document', $book['b_id'])?>">
                                        <button type="button" class="btn btn-warning" style="background-color: #ff914d; float: right">Xem ngay</button>
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
</main>