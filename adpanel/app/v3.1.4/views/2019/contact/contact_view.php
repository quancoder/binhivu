<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hòm thư đến</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Hòm thư đến</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>

                <div class="info-box-content">
                    <h3 class="info-box-text">Chờ xử lý</h3>
                    <span class="info-box-number"> <h4><?=$report['_all_unread']?> </h4></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="far fa-envelope-open"></i></span>

                <div class="info-box-content">
                    <h3 class="info-box-text">Chấp nhận</h3>
                    <span class="info-box-number"> <h4><?=$report['_all_accept']?></h4></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="far fa-envelope-open"></i></span>

                <div class="info-box-content">
                    <h3 class="info-box-text">Từ chối</h3>
                    <span class="info-box-number"> <h4><?=$report['_all_reject']?></h4></span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="far fa-plus-square"></i></span>

                <div class="info-box-content">
                    <h3 class="info-box-text">Tổng số</h3>
                    <span class="info-box-number"> <h4><?=$report['_all']?> </h4></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Folders</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item <?=$type=='download'?'bg-primary':'' ?>">
                            <a href="<?=site_url('contact/view/download')?>" class="nav-link">
                                <i class="fas fa-download"></i> Yêu cầu download
                                <span class="badge bg-warning float-right"><?=$report['_download_unread']?></span>
                            </a>
                        </li>
                        <li class="nav-item <?=$type=='email'?'bg-primary':'' ?>">
                            <a href="<?=site_url('contact/view/email')?>" class="nav-link">
                                <i class="far fa-address-book"></i> Yêu cầu nhận bài viết
                                <span class="badge bg-warning float-right"><?=$report['_email_unread']?></span>
                            </a>
                        </li>
                        <li class="nav-item <?=$type=='suggest'?'bg-primary':'' ?>">
                            <a href="<?=site_url('contact/view/suggest')?>" class="nav-link">
                                <i class="far fa-file-alt"></i> Yêu cầu liên hệ
                                <span class="badge bg-warning float-right"><?=$report['_suggest_unread']?></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Chưa xử lý</h4>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped ">
                            <tbody>
                            <?php foreach ($contact_0 as $item){?>
                                <tr>
                                    <td class="mailbox-star align-middle"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                    <td class="mailbox-name align-middle" style="width: 15%">
                                        <?=$item['c_email']?>
                                    </td>
                                    <td class="mailbox-subject align-middle">
                                        <?=$item['c_phone']?>
                                    </td>
                                    <td class="mailbox-subject align-middle">
                                        <?=$item['c_content']?>
                                    </td>
                                    <td class="mailbox-date align-middle">
                                        <?= date('H:m - d/m/Y', strtotime($item['c_create_time'])) ?>
                                    </td>
                                    <td class="align-middle text-right">
                                        <a class="btn btn-sm btn-danger" href="<?=site_url('contact/detail/'.$item['c_id'])?>"><i class="fas fa-edit"></i> Phản hồi </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Đã xử lý</h4>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped ">
                            <tbody>
                            <?php foreach ($contact_1_2 as $item){?>
                                <tr>
                                    <td class="mailbox-star align-middle"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                    <td class="mailbox-name align-middle" style="width: 15%">
                                        <?=$item['c_email']?>
                                    </td>
                                    <td class="mailbox-subject align-middle">
                                        <?=$item['c_phone']?>
                                    </td>
                                    <td class="mailbox-subject align-middle">
                                        <?=$item['c_content']?>
                                    </td>
                                    <td class="mailbox-date align-middle">
                                        <?= date('H:m - d/m/Y', strtotime($item['c_create_time'])) ?>
                                    </td>
                                    <td class="align-middle text-right">
                                        <a href="<?=site_url('contact/detail/'.$item['c_id'])?>">
                                            <?php if($item['c_status']==2){?>
                                                <span class="badge badge-warning">Đã từ chối</span>
                                            <?php }else  if($item['c_status']==1){?>
                                                <span class="badge badge-info">Chấp nhận</span>
                                            <?php }?>
                                        </a>
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

