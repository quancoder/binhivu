<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <h2 class="home-title clearfix mt-10">
            <a href="<?=site_url('lien-he.html')?>" title="" style="float: left">Liên hệ với tác giả</a>
        </h2>
        <div class="alert alert-success" role="alert" style="display: <?= $success == TRUE ? 'block' : 'none'?>">
            <strong>Thành công!</strong>
            Bạn đã gửi thành công yêu câu
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div style="margin-bottom: 20px; margin-top: 20px" class="row">
            <div class="col-xs-12 col-sm-4 col-sm-4 <?=$type=='' || $id ==''? 'hide': '' ?>">
                <h3 class="post-title">
                   Sản phẩm
                </h3>
                <div id="page-list-sach">
                    <div class="media mb-10 ribbon-holder">
                        <?php if($type=='book'){?>
                        <div class="detail-des-image h-280 h-auto-xs">
                            <a href="<?= toURLFriendly($info['b_name'], 'book', $info['b_id'])?>">
                                <div class="detail-image">
                                    <?= $info['b_free']==1 ? '<span class="sale">Free</span>' : ''?>
                                    <img class="media-object img-doc h-280 h-auto-xs w-100" src="<?= $info['b_image']?>" alt="<?= $info['b_name']?>">
                                </div>
                                <div class="detail-des">
                                    <div class="text"><?= trim_text($info['b_des'], 77)?></div>
                                </div>
                            </a>
                        </div>
                        <div class="media-body" style="text-align: left;">
                            <h3 class="media-heading h-70" style="font-size: 1.4rem">
                                <a href="<?= toURLFriendly($info['b_name'], 'book', $info['b_id'])?>">
                                    <?= $info['b_name']?>
                                </a>
                            </h3>
                            <div style="width: 100%; margin: 10px; ">
                                <div style="width: 65%; float: left">
                                    <div class="" style="width: 100%;">
                                        <i class="glyphicon glyphicon-usd" style="color:#0092e0"></i>
                                        <span style="color: red"><?= number_format($info['b_price'])?></span>
                                        <span class="textstat">vnđ</span>
                                    </div>
                                    <div class="mt-5" style="width: 100%; color: #666666">
                                        <i class="glyphicon glyphicon-download"></i> <span class="pr-20"><?=number_format($info['b_download'])?></span>
                                        <i class="glyphicon glyphicon-eye-open"></i> <span><?=number_format($info['b_view'])?></span>
                                    </div>

                                    <div style="width: 100%; display:none;">
                                        <span style="color: #a6a6a6"><i class="glyphicon glyphicon-user"></i> binhivu</span>
                                        <br/>
                                        <span style="color: #a6a6a6"> <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($info['b_create_date']) ?></span>
                                    </div>
                                </div>
                                <div style="width: 30%; float: left">
                                    <a href="<?= toURLFriendly($info['b_name'], 'book', $info['b_id'])?>">
                                        <button type="button" class="btn btn-warning" style="background-color: #ff914d; float: right">Xem ngay</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php }else if($type=='document'){?>
                            <div class="detail-des-image h-280 h-auto-xs">
                                <a href="<?= toURLFriendly($info['doc_name'], 'document', $info['doc_id'])?>">
                                    <div class="detail-image">
                                        <?= $info['doc_free']==1 ? '<span class="sale">Free</span>' : ''?>
                                        <img class="media-object img-doc h-280 h-auto-xs w-100" src="<?= $info['doc_image']?>" alt="<?= $info['doc_name']?>">
                                    </div>
                                    <div class="detail-des">
                                        <div class="text"><?= trim_text($info['doc_des'], 77)?></div>
                                    </div>
                                </a>
                            </div>
                            <div class="media-body" style="text-align: left;">
                                <h3 class="media-heading h-70" style="font-size: 1.4rem">
                                    <a href="<?= toURLFriendly($info['doc_name'], 'document', $info['doc_id'])?>">
                                        <?= $info['doc_name']?>
                                    </a>
                                </h3>
                                <div style="width: 100%; margin: 10px; ">
                                    <div style="width: 65%; float: left">
                                        <div class="" style="width: 100%;">
                                            <i class="glyphicon glyphicon-usd" style="color:#0092e0"></i>
                                            <span style="color: red"><?= number_format($info['doc_price'])?></span>
                                            <span class="textstat">vnđ</span>
                                        </div>
                                        <div class="mt-5" style="width: 100%; color: #666666">
                                            <i class="glyphicon glyphicon-download"></i> <span class="pr-20"><?=number_format($info['doc_download'])?></span>
                                            <i class="glyphicon glyphicon-eye-open"></i> <span><?=number_format($info['doc_view'])?></span>
                                        </div>

                                        <div style="width: 100%; display:none;">
                                            <span style="color: #a6a6a6"><i class="glyphicon glyphicon-user"></i> binhivu</span>
                                            <br/>
                                            <span style="color: #a6a6a6"> <i class="glyphicon glyphicon-time"></i> <?=get_time_ago($info['doc_create_date']) ?></span>
                                        </div>
                                    </div>
                                    <div style="width: 30%; float: left">
                                        <a href="<?= toURLFriendly($info['doc_name'], 'document', $info['doc_id'])?>">
                                            <button type="button" class="btn btn-warning" style="background-color: #ff914d; float: right">Xem ngay</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-sm-8">
                <h3 class="post-title">
                    Thông tin liên hệ
                </h3>
                <div class="frm-contact clearfix">
                    <p>
                        Quý khách vui lòng điền thông tin theo mẫu form dưới đây để liên hệ với chúng tôi:
                    </p>
                    <div id="Main1_ctl00_valSumOrder" class="panel-summary" style="color:Red;display:none;">

                    </div>
                    <div class="row">
                        <form method="post" about="">
                            <div class="col-xs-12 col-sm-6 col-sm-6">
                                <p>
                                    <label class="col-form-label" for="name"><i class="fa fa-pencil"></i> Họ và tên</label>
                                    <input id="name" name="name" class="form-control" required=""/>
                                </p>
                                <p>
                                    <label class="col-form-label" for="address"><i class="fa fa-pencil"></i> Địa chỉ </label>
                                    <input id="address" name="address" class="form-control" >
                                </p>

                                <p>
                                    <label class="col-form-label" for="email"><i class="fa fa-pencil"></i> Email</label>
                                    <input id="email" name="email" class="form-control" type="email" required=""/>
                                </p>

                                <p>
                                    <label class="col-form-label" for="phone-number"><i class="fa fa-pencil"></i> Số điện thoại </label>
                                    <input id="phone-number" name="phone-number" class="form-control" required="" type="number"/>
                                </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-sm-6">
                                <p>
                                    <label class="col-form-label" for="title"><i class="fa fa-pencil"></i> Tiêu đề </label>
                                    <input id="title" name="title" class="form-control"  required=""/>
                                </p>
                                <p>
                                    <label class="col-form-label" for="des"><i class="fa fa-pencil"></i> Yêu cầu</label>
                                    <textarea id="des" name="des" class="form-control" required="" rows="6"></textarea>
                                </p>
                                <p>
                                    <input type="submit" class="btn btn-primary" value="Gửi đi">
                                    <input type="reset" class="btn btn-warning" value="Soạn lại">
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="map" class="mt-40">
            <div class="query-map">
                <h4 class="page_title" style="font-weight: 500; margin: 0 0 1em;">
                    Xem bản đồ chỉ dẫn địa chỉ của chúng tôi:</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29794.204754402574!2d105.85671947088626!3d21.02165602955614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x42bedb896d6f3ce9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBExrDhu6NjIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1428859071619" width="100%" height="600" frameborder="0" style="border:0"></iframe>
            </div>
        </div>
    </div>
</main>