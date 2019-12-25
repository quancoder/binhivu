<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-md-8" >
                <div class="zone-most-view">
                    <h2 class="home-title clearfix">
                        <a href="javascript:void(0)" title="TIN TỨC XEM NHIỀU NHẤT">TÌM KIẾM TÀI LIỆU</a>
                    </h2>
                    <p>Kết quả tìm kiếm cho: "<?=$tag.' '.$search?>"</p>
                    <ul class="media-list main-list" style="margin-top: 20px; text-align: justify">
                        <?php foreach ($list as $doc){ ?>
                            <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                <a class="pull-left pull-right-xs w-15 w-100-xs" href="<?= toURLFriendly($doc['doc_name'], 'book', $doc['doc_id'])?>">
                                    <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                         data-src="<?= $doc['doc_image'] ?>" alt="<?= $doc['doc_name']?>" style="width: ">
                                </a>
                                <div class="media-body w-100-xs">
                                    <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                        <a href="<?= toURLFriendly($doc['doc_name'], 'book', $doc['doc_id'])?>" style="font-size: 2rem">
                                            <?= $doc['doc_name']?>
                                        </a>
                                    </h3>
                                    <a href="<?= site_url('tai-lieu.html')?>"><span class="category-name">Tài liệu</span></a> -
                                    <span class="author mr-20"><i class="glyphicon glyphicon-user "></i> binhivu</span>
                                    <span class="time mr-20"><i class="glyphicon glyphicon-eye-open"></i> <?= number_format($doc['doc_view'])?> Lượt xem</span>
                                    <span class="time mr-20"><i class="glyphicon glyphicon-download"></i> <?= number_format($doc['doc_download'])?> Lượt tải</span>
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($doc['doc_create_date'])?></span>
                                    <p style="margin-top: 10px; color: #1e1e1e"><?= $doc['doc_des']?></p>

                                    <div class="mb-10 pb-10">
                                        <?php $tag = explode(',', $doc['doc_tag']) ?>
                                        <?php foreach ($tag as $value){?>
                                            <a href="<?= site_url('tim-kiem-tai-lieu.html').'?tag='.$value?>">
                                                <span class="badge mr-5 mb-5"><i class="glyphicon glyphicon-tag"></i> <?=$value?></span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>