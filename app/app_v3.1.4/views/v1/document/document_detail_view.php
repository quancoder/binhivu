<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container-fluid" style="padding: 0">
        <div style="text-align: center; width: 100%; position: relative; padding: 50px 0">

            <div class="scrollblock-img" style="background-image:url('https://tailieu.vn/image/gdocsection/2019/20190330/155487833945.jpg');"></div>

            <div style="z-index: 9;position: relative;">
                <div class="tieude1">
                    <p style="text-align:center; font-size:2rem;color:#FFFFFF; font-family:tahoma,geneva,sans-serif">
                        <strong>TÀI LIỆU</strong>
                    </p>
                </div>

                <div class="tieude2 w-70 w-100-xs" style="margin: 0 auto">
                    <p style="text-align:center;color:#FF8C00; font-size:3rem;  font-family:tahoma,geneva,sans-serif">
                        <strong> <?= $info['doc_name'] ?> </strong>
                    </p>
                </div>

                <div class="stat1">
                    <p style="text-align:center; font-size:1.4rem;color:#FFFFFF; font-family:tahoma,geneva,sans-serif">
                        <i class="glyphicon glyphicon-download"></i> <?= $info['doc_download'] ?> tải xuống
                        &nbsp;&nbsp;&nbsp;
                        <i class="glyphicon glyphicon-eye-open"></i> <?= $info['doc_view'] ?> xem
                    </p>
                </div>

                <div>
                    <div class="fb-like"
                         data-href="<?= toURLFriendly($info['doc_name'], 'document', $info['doc_id']) ?>" data-width=""
                         data-layout="button" data-action="like" data-size="large" data-share="true"></div>
                    <div class="fb-save"
                         data-uri="<?= toURLFriendly($info['doc_name'], 'document', $info['doc_id']) ?>"
                         data-size="large"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-10">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <img src="<?= $info['doc_image'] ?>">
                <div class="tag-item mt-20">
                    <p>
                        <?php $tag = explode( ',', $info['doc_tag']) ;foreach ($tag as $value){?>
                            <a href="<?=site_url('tim-kiem-tai-lieu.html').'?tag='.$value?>">
                                <span class="badge mr-5 mb-5"><i class="glyphicon glyphicon-tag"></i> <?=$value?></span>
                            </a>
                        <?php } ?>
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div style="background: white; padding: 10px">
                    <div class="article">
                        <?= $info['doc_content'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-10"
         style="padding: 50px 0; text-align: center; background-color: #b51b06; color: white ">
        <div style="font-size: 1.4rem; display: inline-block" class="w-70 w-100-xs">
            <div>
                <p>ĐÃ CÓ <span style="color: #ffef00"><?= $info['doc_download'] ?></span> LƯỢT TẢI</p>
                <p style="font-size: 2rem"><?= $info['doc_name'] ?></p>
            </div>

            <?php if($info['doc_free']==1){?>
                <a href="download-document-<?=$info['doc_id']?>" >
                    <img src="/images/download-button.png">
                </a>
            <?php }else{?>
                <p>
                    HÃY <a href="<?=site_url('lien-he.html?type=document&id='.$info['doc_id'])?>"><span style="color: #ffef00">LIÊN HỆ </span> </a>
                    TÁC GIẢ  ĐỂ TẢI TÀI LIỆU NÀY
                </p>
            <?php }?>

            <div class="mt-20">
                <div class="fb-like"
                     data-href="<?= toURLFriendly($info['doc_name'], 'document', $info['doc_id']) ?>" data-width=""
                     data-layout="button" data-action="like" data-size="large" data-share="true"></div>
                <div class="fb-save"
                     data-uri="<?= toURLFriendly($info['doc_name'], 'document', $info['doc_id']) ?>"
                     data-size="large"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="home-title clearfix">
            <a href="<?= site_url('sach.html') ?>" title="DÂN SỰ ">Tài liệu liên quan</a>
        </h2>
        <div id="page-list-tai-lieu" class="row" style="margin-bottom: 20px; margin-top: 20px">
            <?php foreach ($doc_list as $doc) { ?>
                <div class="col-xs-12 col-sm-6 col-lg-3">
                    <div class="media mb-10 ribbon-holder">
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
                            <h3 class="media-heading h-70" style="font-size: 1rem; text-align: center">
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
    </div>
</main>