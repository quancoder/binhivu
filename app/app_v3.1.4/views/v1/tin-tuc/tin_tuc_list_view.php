<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Owl Stylesheets -->
<script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="home-title hide">
                    <a href="<?= site_url('tin-tuc.html')?>" title="TIN TỨC">TIN TỨC</a>
                </h2>

                <div style="margin: 10px 0px">
                    <a href="<?= site_url()?>">Trang Chủ</a> ➝ Tin tức
                </div>
                <h2 class="line-title clearfix">
                        <a href="javascript:void(0)" title="DÂN SỰ ">Tin tức mới</a>
                </h2>
                <div class="row" style="margin-bottom: 20px; margin-top: 20px">
                    <!--row1 left-->
                    <div class="col-md-6 col-lg-6">
                        <div class="featured-article">
                            <a href="<?= toURLFriendly($news_list[0]['news_title'], 'tt', $news_list[0]['news_id'])?>">
                                <img class="thumb" src="<?php echo base_url(); ?>public/images/<?= $news_list[0]['news_image']?>"
                                     alt="<?= $news_list[0]['news_title'] ?>">
                            </a>
                            <div class="block-title" style="padding: 8px; background-color: rgba(0, 0, 0,0.8);color: white;">
                                <h3 class="media-heading" style="font-size: 17px" >
                                    <a href="<?= site_url($news_list[0]['news_title'])?>" style="color: #fb7e31;" class="archive-i">
                                        <?= $news_list[0]['news_title'] ?></a>
                                </h3>
                                <p>
                                    <a href="<?= site_url('tin-tuc.html')?>">
                                        <span class="category">Tin tức</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($news_list[0]['news_update_time'])?></span>
                                </p>

                                <p style="font-size: 1.3rem; margin-bottom: 0; text-align: justify">
                                    (Tin tức)  <?= $news_list[0]['news_sapo']?>
                                </p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <ul class="news-list">
                            <?php $i=1?>
                            <?php foreach ($news_list as $new){?>
                                <?php if($i >= 6 and $i <=10){?>
                                    <li>
                                        <h3>
                                            <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>"
                                               title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
                                        </h3>
                                    </li>
                                <?php } ?>
                            <?php $i++;} ?>
                        </ul>
                    </div>
                    <!--row1 right-->
                    <div class="col-md-6 col-lg-6">
                        <ul class="media-list main-list">
                            <?php $i= 2; foreach ($news_list as $new){ ?>
                                <?php if($i >=2 and $i <=5){?>
                                <li class="media" style="width: 48%; float: left; margin-right: 10px; margin-bottom: 10px; margin-top: 0; height: 300px">
                                    <img class="media-object lazy" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                         data-src="<?php echo base_url()?>public/images/<?= $new['news_thumbs']?>"
                                         alt="<?= $new['news_title']?>" style="width: 100%; height: 150px">

                                    <div class="media-body">
                                        <h3 class="media-heading">
                                            <a href="<?= toURLFriendly($new['news_title'], 'tt', $new['news_id'])?>"
                                               title="<?= $new['news_title']?>"><?= $new['news_title']?></a>
                                        </h3>
                                        <p>
                                            <a href="<?= site_url('tin-tuc.html')?>"><span class="category">Tin tức</span></a> -
                                            <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                            <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($new['news_update_time'])?></span>
                                        </p>
                                        <p class="sapo">
                                            (Tin tức)  <?= htmlentities($news_list[0]['news_sapo'])?>
                                        </p>
                                    </div>
                                </li>
                                <?php } ?>
                            <?php $i++;} ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div id="myCarousel" class="owl-carousel owl-theme owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-1144px, 0px, 0px); transition: all 0s ease 0s; width: 4578px;">
                                    <div class="owl-item active" style="width: 381.5px;">
                                        <div class="item">
                                            <img class="lazyOwl" src="./file/nguoi-linh.jpg" data-src="./file/nguoi-linh.jpg" alt="Vân Nam"/>
                                            <h3 class="media-heading">
                                                <a href="">Chuyện về những người lính cứu hoả không sợ chết, chỉ sợ không cứu được người</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 381.5px;">
                                        <div class="item">
                                            <img class="lazyOwl" src="./file/nguoi-linh.jpg" data-src="./file/nguoi-linh.jpg" alt="Vân Nam">
                                            <h3 class="media-heading">
                                                <a href="">Chuyện về những người lính cứu hoả không sợ chết, chỉ sợ không cứu được người</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 381.5px;">
                                        <div class="item">
                                            <img class="lazyOwl" src="./file/nguoi-linh.jpg" data-src="./file/nguoi-linh.jpg" alt="Vân Nam">
                                            <h3 class="media-heading">
                                                <a href="">Chuyện về những người lính cứu hoả không sợ chết, chỉ sợ không cứu được người</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 381.5px;">
                                        <div class="item">
                                            <img class="lazyOwl" src="./file/nguoi-linh.jpg"  data-src="./file/nguoi-linh.jpg" alt="Vân Nam">
                                            <h3 class="media-heading">
                                                <a href="">Chuyện về những người lính cứu hoả không sợ chết, chỉ sợ không cứu được người</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 381.5px;">
                                        <div class="item">
                                            <img class="lazyOwl" src="./file/nguoi-linh.jpg"  data-src="./file/nguoi-linh.jpg" alt="Vân Nam">
                                            <h3 class="media-heading">
                                                <a href="">Chuyện về những người lính cứu hoả không sợ chết, chỉ sợ không cứu được người</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 381.5px;">
                                        <div class="item">
                                            <img class="lazyOwl" src="./file/nguoi-linh.jpg"  data-src="./file/nguoi-linh.jpg" alt="Vân Nam">
                                            <h3 class="media-heading">
                                                <a href="">Chuyện về những người lính cứu hoả không sợ chết, chỉ sợ không cứu được người</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 381.5px;">
                                        <div class="item">
                                            <img class="lazyOwl" src="./file/nguoi-linh.jpg" data-src="./file/nguoi-linh.jpg" alt="Vân Nam">
                                            <h3 class="media-heading">
                                                <a href="">Chuyện về những người lính cứu hoả không sợ chết, chỉ sợ không cứu được người</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled">
                                <div class="owl-prev">◀</div>
                                <div class="owl-next">▶</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h2 class="line-title clearfix">
                            <a href="https://binhivu.com/dan-su" title="DÂN SỰ ">TIN TỨC XEM NHIỀU NHẤT</a>
                        </h2>
                        <div class="two-block well">
                            <div class="media">
                                <h3  class="media-heading visible-xs">
                                    <a href="https://binhivu.com/hat-nhep-co-bi-phat-khong"
                                       title="Hát nhép có bị phạt không?"> Chuyện về những người lính cứu hoả
                                        không sợ chết, chỉ sợ không cứu được người</a>
                                </h3>
                                <a class="pull-left" href="https://binhivu.com/hat-nhep-co-bi-phat-khong">
                                    <img class="media-object lazy" src="./file/rolling.svg"
                                         data-src="./file/nguoi-linh.jpg"
                                         alt="Hát nhép có bị phạt không?">
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading hidden-xs">
                                        <a href="https://binhivu.com/hat-nhep-co-bi-phat-khong"
                                           title="Hát nhép có bị phạt không?"> Chuyện về những người lính cứu hoả
                                            không sợ chết, chỉ sợ không cứu được người</a>
                                    </h3>
                                    <p> Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện
                                        lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                    <span style="color: #41455e; font-family: SFD-SemiBold"> binhivu</span> - <span style="color: gray">1 giờ trước</span>
                                </div>
                            </div>
                        </div>

                        <div class="two-block well">
                            <div class="media">
                                <a class="pull-left" href="https://binhivu.com/hat-nhep-co-bi-phat-khong">
                                    <img class="media-object lazy" src="./file/rolling.svg"
                                         data-src="./file/nguoi-linh.jpg"
                                         alt="Hát nhép có bị phạt không?">
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="https://binhivu.com/hat-nhep-co-bi-phat-khong"
                                           title="Hát nhép có bị phạt không?"> Chuyện về những người lính cứu hoả
                                            không sợ chết, chỉ sợ không cứu được người</a>
                                    </h3>
                                    <p> Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện
                                        lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                </div>
                            </div>
                        </div>

                        <div class="two-block well">
                            <div class="media">
                                <a class="pull-left" href="https://binhivu.com/hat-nhep-co-bi-phat-khong">
                                    <img class="media-object lazy" src="./file/rolling.svg"
                                         data-src="./file/nguoi-linh.jpg"
                                         alt="Hát nhép có bị phạt không?">
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="https://binhivu.com/hat-nhep-co-bi-phat-khong"
                                           title="Hát nhép có bị phạt không?"> Chuyện về những người lính cứu hoả
                                            không sợ chết, chỉ sợ không cứu được người</a>
                                    </h3>
                                    <p> Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện
                                        lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                </div>
                            </div>
                        </div>

                        <div class="two-block well">
                            <div class="media">
                                <a class="pull-left" href="https://binhivu.com/hat-nhep-co-bi-phat-khong">
                                    <img class="media-object lazy" src="./file/rolling.svg"
                                         data-src="./file/nguoi-linh.jpg"
                                         alt="Hát nhép có bị phạt không?">
                                </a>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="https://binhivu.com/hat-nhep-co-bi-phat-khong"
                                           title="Hát nhép có bị phạt không?"> Chuyện về những người lính cứu hoả
                                            không sợ chết, chỉ sợ không cứu được người</a>
                                    </h3>
                                    <p> Giữa những gian khó của nhiệm vụ nhưng hình ảnh về người lính cứu hỏa hiện
                                        lên chân chất và quả cảm trong bộ ảnh Người lính của bạn...</p>
                                </div>
                            </div>
                        </div>

                        <ul class="news-list">
                            <li>
                                <h3><a href="https://binhivu.com/song-thu-co-hop-phap-hay-khong"
                                       title="Sống thử có hợp pháp hay không?">Chuyện về những người lính cứu hoả
                                    không sợ chết, chỉ sợ không cứu được người</a>
                                </h3>
                            </li>
                            <li>
                                <h3><a href="https://binhivu.com/07-truong-hop-giao-dich-dan-su-vo-hieu"
                                       title="07 trường hợp giao dịch dân sự vô hiệu">Chuyện về những người lính cứu
                                    hoả không sợ chết, chỉ sợ không cứu được người</a></h3>
                            </li>
                            <li>
                                <h3>
                                    <a href="https://binhivu.com/tai-san-cua-nguoi-vang-mat-tai-noi-cu-tru-duoc-quan-ly-nhu-the-nao"
                                       title="Tài sản của người vắng mặt tại nơi cư trú được quản lý như thế nào?">Chuyện
                                        về những người lính cứu hoả không sợ chết, chỉ sợ không cứu được người</a>
                                </h3>
                            </li>
                            <li>
                                <h3><a href="https://binhivu.com/giay-to-co-gia-la-gi"
                                       title="Giấy tờ có giá là gì?">Chuyện về những người lính cứu hoả không sợ
                                    chết, chỉ sợ không cứu được người</a></h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        $('#myCarousel').owlCarousel({
            items: 2,
            loop: true,
            nav: false,
            dots: true,
            responsiveClass:true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                991: {
                    items: 4
                }
            },
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });
    })
</script>