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
                    <li class="breadcrumb-item active">Phản hồi khách hàng</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Chờ xử lý</span>
                    <span class="info-box-number"> <h4><?=count($contact_0)?> </h4></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="far fa-envelope-open"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Đã xử lý</span>
                    <span class="info-box-number"> <h4><?=count($contact_1) + count($contact_2)?> </h4></span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tổng số</span>
                    <span class="info-box-number"> <h4><?=count($contact_0) + count($contact_1) + count($contact_2)?> </h4></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title"><i class="far fa-envelope"></i> Chờ xử lý</h4>

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
                                    <td class="mailbox-name align-middle"><a href="read-mail.html"><?=$item['c_name']?></a></td>
                                    <td class="mailbox-subject align-middle">
                                        <?=$item['c_content']?>
                                    </td>
                                    <td class="mailbox-name align-middle">
                                        <?=$item['c_product_name']?><br>
                                        <span style="color: #8c8c8c"><?=$item['c_type_name']?></span>
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
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title"><i class="far fa-envelope-open"></i> Đã xử lý</h4>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped align-middle">
                            <tbody>
                            <?php $contact_done = array_merge($contact_1, $contact_2)?>
                            <?php foreach ($contact_done as $item){?>
                                <tr>
                                    <td class="mailbox-star align-middle"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                    <td class="mailbox-name align-middle"><a href="read-mail.html"><?=$item['c_name']?></a></td>
                                    <td class="mailbox-subject align-middle">
                                        <?=$item['c_content']?>
                                    </td>
                                    <td class="mailbox-name align-middle">
                                        <?=$item['c_product_name']?><br>
                                        <span style="color: #8c8c8c"><?=$item['c_type_name']?></span>
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

                                    <td class="mailbox-name align-middle" style="width: 10%">
                                        <?php if($item['c_status']==2){?>
                                            <span class="badge badge-warning">Từ chối</span>
                                        <?php }else  if($item['c_status']==1){?>
                                            <span class="badge badge-info">Chấp nhận</span>
                                        <?php }?>
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

