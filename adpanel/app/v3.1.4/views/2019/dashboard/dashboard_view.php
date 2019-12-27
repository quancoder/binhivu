<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark hidden"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"></a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container-fluid">
    <h2>Thống kê</h2>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <a href="<?= site_url('news')?>" class="small-box-footer">Tin tức <i class="fas fa-arrow-circle-right"></i></a>
                <div class="inner">
                    <h3>Công khai<span style="float: right"><?=$news['total_public']?> </span></h3>
                    <h4>Dừng hiển thị<span style="float: right"><?=$news['total_private']?> </span></h4>
                    <h5>Lưu trữ<span style="float: right"><?=$news['total_archive']?> </span></h5>
                    <h6>Nháp<span style="float: right"><?=$news['total_draft']?> </span></h6>
                </div>
            </div>
            <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="fas fa-eye"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tổng lượt xem</span>
                    <span class="info-box-number"><?=number_format($news['total_view'])?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <a href="<?= site_url('funs')?>" class="small-box-footer">Góc thư giãn <i class="fas fa-arrow-circle-right"></i></a>
                <div class="inner">
                    <h3>Công khai<span style="float: right"><?=$funs['total_public']?> </span></h3>
                    <h4>Dừng hiển thị<span style="float: right"><?=$funs['total_private']?> </span></h4>
                    <h5>Lưu trữ<span style="float: right"><?=$funs['total_archive']?> </span></h5>
                    <h6>Nháp<span style="float: right"><?=$funs['total_draft']?> </span></h6>
                </div>
            </div>
            <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="fas fa-eye"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tổng lượt xem</span>
                    <span class="info-box-number"><?=number_format($funs['total_view'])?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <a href="<?= site_url('document')?>" class="small-box-footer">Tài liệu<i class="fas fa-arrow-circle-right"></i></a>
                <div class="inner">
                    <h3>Công khai<span style="float: right"><?=$document['total_public']?> </span></h3>
                    <h4>Dừng hiển thị<span style="float: right"><?=$document['total_private']?> </span></h4>
                    <h5>Lưu trữ<span style="float: right"><?=$document['total_archive']?> </span></h5>
                    <h6>Nháp<span style="float: right"><?=$document['total_draft']?> </span></h6>
                </div>
            </div>
            <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-eye"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tổng lượt xem</span>
                    <span class="info-box-number"><?=number_format($document['total_view'])?></span>
                </div>
                <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tổng lượt tải</span>
                    <span class="info-box-number"><?=number_format($document['total_download'])?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <a href="<?= site_url('book')?>" class="small-box-footer">Sách <i class="fas fa-arrow-circle-right"></i></a>
                <div class="inner">
                    <h3>Công khai<span style="float: right"><?=$book['total_public']?> </span></h3>
                    <h4>Dừng hiển thị<span style="float: right"><?=$book['total_private']?> </span></h4>
                    <h5>Lưu trữ<span style="float: right"><?=$book['total_archive']?> </span></h5>
                    <h6>Nháp<span style="float: right"><?=$book['total_draft']?> </span></h6>
                </div>
            </div>
            <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-eye"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tổng lượt xem</span>
                    <span class="info-box-number"><?=number_format($book['total_view'])?></span>
                </div>
                <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tổng lượt tải</span>
                    <span class="info-box-number"><?=number_format($book['total_download'])?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h2>Phản hồi khách hàng</h2>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-inbox"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Chờ xử lý</span>
                    <span class="info-box-number"> <h4><?=count($contact_0)?> </h4></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="far fa-envelope"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Đã xử lý</span>
                    <span class="info-box-number"> <h4><?=count($contact_1)+ count($contact_2)?> </h4></span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tổng số</span>
                    <span class="info-box-number"> <h4><?=count($contact_0) + count($contact_1)+ count($contact_2)?> </h4></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Chờ xử lý</h4>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                            <?php foreach ($contact_0 as $item){?>
                                <tr>
                                    <td class="mailbox-star align-middle"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                    <td class="mailbox-name align-middle"><a href="read-mail.html"><?=$item['c_name']?></a></td>
                                    <td class="mailbox-subject align-middle">
                                        <?=$item['c_content']?>
                                    </td>
                                    <td class="mailbox-name align-middle">
                                        <?=$item['c_product_name']?><br>
                                        <span style="color: #8c8c8c"><?=$item['c_type']?></span>
                                    </td>
                                    <td class="mailbox-name align-middle" style="width: 15%">
                                        <?=$item['c_phone']?><br>
                                        <?=$item['c_email']?>
                                    </td>
                                    <td class="mailbox-date align-middle"  style="width: 15%">
                                        <?= get_time_ago($item['c_create_time'])?>
                                        <p style="color: #8c8c8c; font-weight:normal">
                                            <?= date('d/m/Y - h:m', strtotime($item['c_create_time'])) ?>
                                        </p>
                                    </td>
                                    <td class="align-middle" style="width: 10%">
                                        <a class="btn btn-sm btn-danger" href="<?=site_url('contact/detail/'.$item['c_id'])?>"><i class="fas fa-edit"></i> Phản hồi lại</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
</script>

