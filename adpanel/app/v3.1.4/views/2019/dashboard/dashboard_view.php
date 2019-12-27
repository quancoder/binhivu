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
<div class="content">
    <div class="container-fluid">
        <h2>Thống kê</h2>
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <a href="<?= site_url('news')?>" class="small-box-footer">Tin tức <i class="fas fa-arrow-circle-right"></i></a>
                    <div class="inner">
                        <h4><?=$news['total_public']?> <span style="font-size: 20px">Công khai</span></h4>
                        <h4><?=$news['total_private']?> <span style="font-size: 20px">Riêng tư</span></h4>
                        <h4><?=$news['total_archive']?> <span style="font-size: 20px">Lưu trữ</span></h4>
                        <h4><?=$news['total_draft']?> <span style="font-size: 20px">Nháp</span></h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                </div>
                <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fas fa-eye"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Lượt xem</span>
                        <span class="info-box-number"><?=number_format($news['total_view'])?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <a href="<?= site_url('funs')?>" class="small-box-footer">Góc thư giãn <i class="fas fa-arrow-circle-right"></i></a>
                    <div class="inner">
                        <h4><?=$funs['total_public']?> <span style="font-size: 20px">Công khai</span></h4>
                        <h4><?=$funs['total_private']?> <span style="font-size: 20px">Riêng tư</span></h4>
                        <h4><?=$funs['total_archive']?> <span style="font-size: 20px">Lưu trữ</span></h4>
                        <h4><?=$funs['total_draft']?> <span style="font-size: 20px">Nháp</span></h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-coffee"></i>
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
                        <h4><?=$document['total_public']?> <span style="font-size: 20px">Công khai</span></h4>
                        <h4><?=$document['total_private']?> <span style="font-size: 20px">Riêng tư</span></h4>
                        <h4><?=$document['total_archive']?> <span style="font-size: 20px">Lưu trữ</span></h4>
                        <h4><?=$document['total_draft']?> <span style="font-size: 20px">Nháp</span></h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-alt"></i>
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
                        <h4><?=$book['total_public']?> <span style="font-size: 20px">Công khai</span></h4>
                        <h4><?=$book['total_private']?> <span style="font-size: 20px">Riêng tư</span></h4>
                        <h4><?=$book['total_archive']?> <span style="font-size: 20px">Lưu trữ</span></h4>
                        <h4><?=$book['total_draft']?> <span style="font-size: 20px">Nháp</span></h4>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-book"></i>
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
</div>
<section class="content" style="margin-top: 20px">
    <h2>Phản hồi khách hàng</h2>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-inbox"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Chưa xử lý</span>
                    <span class="info-box-number"> <h4><?=count($contact)?> </h4></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="far fa-envelope"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Đã xử lý</span>
                    <span class="info-box-number"> <h4><?=count($contact)?> </h4></span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tổng số</span>
                    <span class="info-box-number"> <h4><?=count($contact)?> </h4></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Yêu cầu chưa xử lý</h4>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search Mail">
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                            <?php foreach ($contact as $item){?>
                                <tr>
                                    <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                    <td class="mailbox-name"><a href="read-mail.html"><?=$item['c_name']?></a></td>
                                    <td class="mailbox-subject">
                                        <?=$item['c_content']?>
                                    </td>
                                    <td class="mailbox-name">
                                        <?=$item['c_type']?><br>
                                        <?=$item['c_req_id']?>
                                    </td>
                                    <td class="mailbox-name" style="width: 15%">
                                        <?=$item['c_phone']?><br>
                                        <?=$item['c_email']?>
                                    </td>
                                    <td class="mailbox-date"  style="width: 15%">
                                        <?= get_time_ago($item['c_create_time'])?>
                                        <p style="color: #8c8c8c; font-weight:normal">
                                            <?= date('d/m/Y - h:m', strtotime($item['c_create_time'])) ?>
                                        </p>
                                    </td>
                                    <td class="" style="width: 10%">
                                       <a class="btn btn-sm btn-danger" href="#">Phản hồi lại</a>
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Yêu cầu đã xử lý</h4>

                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search Mail">
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                            <?php foreach ($contact as $item){?>
                                <tr>
                                    <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                    <td class="mailbox-name"><a href="read-mail.html"><?=$item['c_name']?></a></td>
                                    <td class="mailbox-subject">
                                        <?=$item['c_content']?>
                                    </td>
                                    <td class="mailbox-name">
                                        <?=$item['c_type']?><br>
                                        <?=$item['c_req_id']?>
                                    </td>
                                    <td class="mailbox-name" style="width: 15%">
                                        <?=$item['c_phone']?><br>
                                        <?=$item['c_email']?>
                                    </td>
                                    <td class="mailbox-date"  style="width: 15%">
                                        <?= get_time_ago($item['c_create_time'])?>
                                        <p style="color: #8c8c8c; font-weight:normal">
                                            <?= date('d/m/Y - h:m', strtotime($item['c_create_time'])) ?>
                                        </p>
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
</section>
<script type="text/javascript">
</script>

