<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container-fluid" style="background: #fff; margin: 0; padding: 0">
        <div class="row">
            <div class="row">
                <div class="col-sm-12">
                    <div style="margin: 10px 0px">
                        <a href="">Trang Chủ</a>
                        ➝ <a href="<?=site_url('tai-lieu.html')?>">Tài liệu</a>
                        ➝ <?= $info['doc_name']?>
                    </div>
                    <h2 class="home-title clearfix">
                        <a href="" title="DÂN SỰ " style="float: left">CHI Tiết tài liệu</a>
                    </h2>
                    <div style="text-align: center; width: 100%; height: 500px; position: relative">
                        <div class="scrollblock-img" style="background-image:url('https://tailieu.vn/image/gdocsection/2019/20190330/155487833945.jpg');"></div>
                        <DIV STYLE="z-index: 9;position: relative">
                            <div>TÀI LIỆU</div>
                            <h1><?= $info['doc_name']?></h1>
                            <div><?= $info['doc_download']?> tải xuống</div>
                            <div>
                                <div class="fb-like" data-href="<?=toURLFriendly($info['doc_name'], 'document', $info['doc_id'])?>" data-width="" data-layout="button" data-action="like" data-size="large" data-share="true"></div>
                                <div class="fb-save" style="float: right" data-uri="<?=toURLFriendly($info['doc_name'], 'document', $info['doc_id'])?>" data-size="small"></div>
                            </div>
                        </DIV>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>