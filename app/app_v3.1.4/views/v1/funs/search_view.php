<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<main>
    <div class="container" style="background: #fff">
        <div class="row">
            <div class="col-sm-8" >
                <div class="zone-most-view">
                    <h2 class="home-title clearfix">
                        <a href="javascript:void(0)" title="TIN TỨC XEM NHIỀU NHẤT">TÌM KIẾM BÀI VIẾT GÓC THƯ GIÃN</a>
                    </h2>
                    <p>Kết quả tìm kiếm cho: "<?=$tag.' '.$search?>"</p>
                    <ul class="media-list main-list" style="margin-top: 20px; text-align: justify">
                        <?php foreach ($funs_list as $fun){ ?>
                            <li class="media" style="padding-bottom: 10px; border-bottom: 1px solid #eee">
                                <a class="pull-left pull-right-xs w-25 w-100-xs" href="<?= toURLFriendly($fun['funs_title'], 'tt', $fun['funs_id'])?>">
                                    <img class="media-object lazy w-100" src="<?php echo base_url() . 'images/'; ?>rolling.svg"
                                         data-src="<?= $fun['funs_image'] ?>" alt="<?= $fun['funs_title']?>" style="width: ">
                                </a>
                                <div class="media-body w-100-xs">
                                    <h3 class="media-heading" style="margin-top: 0; margin-bottom: 0;">
                                        <a href="<?= toURLFriendly($fun['funs_title'], 'gtg', $fun['funs_id'])?>" style="font-size: 1.2rem">
                                            <?= $fun['funs_title']?>
                                        </a>
                                    </h3>
                                    <a href="<?= site_url('goc-thu-gian.html')?>"><span class="category-name">Góc thư giãn</span></a> -
                                    <span class="author"><i class="glyphicon "></i> binhivu</span> -
                                    <span class="time"><i class="glyphicon glyphicon-eye-open"></i> Lượt xem <?= number_format($fun['funs_views'])?></span> -
                                    <span class="time"><i class="glyphicon glyphicon-time"></i> <?= get_time_ago($fun['funs_create_time'])?></span>
                                    <p style="margin-top: 10px; color: #1e1e1e"><?= $fun['funs_sapo']?></p>
                                    <div class="mb-10 pb-10" style="text-align: left">
                                        <?php $tag = explode(',', $fun['funs_tags']) ?>
                                        <?php foreach ($tag as $value){?>
                                            <a href="<?= site_url('tim-kiem-thu-gian.html').'?tag='.$value?>">
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
            <div class="col-sm-4">
                <div id="accordion-document" class="departments" style="margin-bottom: 25px;">
                    <h2 class="home-title clearfix">
                        <a href="javascript:void(0)" title="TÀI LIỆU">TÀI LIỆU HAY</a>
                    </h2>
                    <div id="box-tai-lieu" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php foreach ($doc_top_view as $doc){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-tai-lieu" href="#<?= 'document-'.$doc['doc_id'] ?>" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <i class="glyphicon glyphicon-file"></i> <strong><?= ucwords(trim_text($doc['doc_name'], 9)); ?></strong>
                                    </h4>
                                </a>
                                <div id="<?= 'document-'.$doc['doc_id'] ?>" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="<?= toURLFriendly($doc['doc_name'], 'document', $doc['doc_id'])?>" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                     data-src="<?= $doc['doc_image'] ?>" alt="">
                                            </a>
                                            <strong><?=$doc['doc_name']?></strong>
                                            <p>
                                                <?= substr($doc['doc_des'], 45)?>
                                            </p>
                                        </div>
                                        <div class="item-footer clearfix">
                                            <a class="btn-more" href="<?= toURLFriendly($doc['doc_name'], 'document', $doc['doc_id'])?>" title="">CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div id="accordion-book" class="departments" style="margin-bottom: 25px;">
                    <h2 class="home-title clearfix">
                        <a href="javascript:void(0)" title="TÀI LIỆU">SÁCH HAY</a>
                    </h2>
                    <div id="box-book" class="accordion" role="tablist" aria-multiselectable="true">
                        <?php foreach ($book_top_view as $book){?>
                            <div class="panel">
                                <a style="display: block" class="panel-heading " role="button" data-toggle="collapse" data-parent="#box-book" href="#<?= 'book-'.$book['b_id'] ?>" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="panel-title">
                                        <i class="glyphicon glyphicon-book"></i> <strong><?= ucwords(trim_text($book['b_name'], 9)); ?></strong>
                                    </h4>
                                </a>
                                <div id="<?= 'book-'.$book['b_id'] ?>" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <div class="item-content clearfix">
                                            <a class="thumb-image" href="<?= toURLFriendly($book['b_name'], 'book', $book['b_id'])?>" title="">
                                                <img width="100" src="<?php echo base_url() . 'images/'; ?>tai-lieu.png" class="lazy"
                                                     data-src=" <?= $book['b_image'] ?>" alt="">
                                            </a>
                                            <strong><?= $book['b_name']; ?></strong>
                                            <p>
                                                <?= trim_text($book['b_des'], 45)?>
                                            </p>
                                        </div>
                                        <div class="item-footer clearfix">
                                            <span class="time mr-20"><i class="glyphicon glyphicon-download"></i> <?= number_format($doc['doc_download'])?> Lượt tải </span>
                                            <span class="time"><i class="glyphicon glyphicon-eye-open"></i> <?= number_format($doc['doc_view'])?> Lượt xem </span>
                                            <a class="btn-more" href="<?= toURLFriendly($book['b_name'], 'book', $book['b_id'])?>" title="">CHI TIẾT <i class="glyphicon glyphicon-menu-right"></i></a>
                                        </div>
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