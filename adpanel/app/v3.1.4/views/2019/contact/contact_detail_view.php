<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Phản hồi khách hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url() ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Phản hồi khách hàng</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Khách hàng</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <h3 class=""> Thông tin</h3>
                    <div class="row">
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Khách hàng</span>
                                    <span class="info-box-number text-center text-muted mb-0"><?= $info['c_name'] ?> <span></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Email</span>
                                    <span class="info-box-number text-center text-muted mb-0"><?= $info['c_email'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Phone</span>
                                    <span class="info-box-number text-center text-muted mb-0"><?= $info['c_phone'] ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">IP</span>
                                    <span class="info-box-number text-center text-muted mb-0"><?= $info['c_log'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Yêu cầu của khách</h4>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/default-150x150.png"
                                         alt="user image">
                                    <span class="username">
                                    <a href="#"><?= $info['c_name'] ?></a>
                                    </span>
                                    <span class="description"><?=get_time_ago($info['c_create_time'])?></span>
                                </div>
                                <p>
                                    <?=$info['c_content']?>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 mb-3">
                        <button class="btn btn-sm btn-primary" onclick="ajax_set_status_contact(1)">Chấp nhận</button>
                        <button class="btn btn-sm btn-warning" onclick="ajax_set_status_contact(2)">Từ chối</button>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <?php if (isset($product)) { ?>
                        <a href="<?=site_url($info['c_type'].'/edit/'.$product['id']) ?>">
                            <h3 class="text-primary"> <?=$info['c_type_name']?>: <?= $product['name'] ?></h3>
                        </a>
                        <p class="text-muted"><?= $product['des'] ?></p>
                        <div class="text-muted">
                            <p class="text-sm" style="float: left; margin-right:30px">Lượt xem
                                <b class="d-block"><?= number_format($product['view']) ?></b>
                            </p>
                            <p class="text-sm" style="float: left;; margin-right: 30px">Lượt tải
                                <b class="d-block"><?= number_format($product['download']) ?></b>
                            </p>
                            <p class="text-sm" style="float: left">Giá
                                <b class="d-block"><?= number_format($product['price']) ?> VNĐ</b>
                            </p>
                        </div>
                        <img src="<?= $product['image'] ?>" class="img-fluid" style="border: 1px solid #eeeeee">
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>

<script>
    function ajax_set_status_contact(status)
    {
        var params = {
            'id':'<?=$info['c_id']?>',
            'status':status
        };
        var _onSuccess = function (data) {
            if(data == 'success')
                alert('Thành công');
            else if(data == 'NOT_LOGIN')
                window.location.href = '<?=site_url()?>';
            else
                alert('Thành công');
        };

        getAjax('<?=site_url('contact/ajax_set_status', $langcode); ?>', params, 'POST', _onSuccess);
    }
</script>
