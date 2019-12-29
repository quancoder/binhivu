<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div style="margin-bottom: 20px" class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <h2 class="home-title clearfix mt-10">
                    <a href="<?=site_url('gioi-thieu.html')?>" title="" style="float: left">Giới thiệu</a>
                </h2>
                <div class="article">
                    <?=$intro['intro']?>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-6">
                <h2 class="home-title clearfix mt-10">
                    <a href="<?=site_url('gioi-thieu.html')?>" title="" style="float: left">Bản quyền sở hữu</a>
                </h2>
                <div class="article">
                    <?=$intro['copyright']?>
                </div>
            </div>
        </div>
        <h2 class="home-title clearfix mt-10">
            <a href="#" title="" style="float: left"> Xem bản đồ chỉ dẫn địa chỉ của chúng tôi</a>
        </h2>
        <div id="map" class="mt-20">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29794.204754402574!2d105.85671947088626!3d21.02165602955614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x42bedb896d6f3ce9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBExrDhu6NjIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1428859071619" width="100%" height="600" frameborder="0" style="border:0"></iframe>
        </div>
    </div>
</main>