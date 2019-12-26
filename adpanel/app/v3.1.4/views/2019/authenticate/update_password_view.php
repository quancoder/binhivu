<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Đổi mật khẩu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Đổi mật khẩu</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?= $isUpdate == TRUE ? 'block' : 'none'?>">
        <strong>Thành công!</strong>
        Bạn đã sửa thành công mật khẩu. <a href="<?=site_url('dashboard', $langcode)?>">Quay lại trang chủ.</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: <?= isset($error['fail_old_pass']) ? 'block' : 'none'?>">
        <strong>Thất bại!</strong>
        Mật khẩu cũ bạn nhập không đúng. <a href="<?=site_url('dashboard', $langcode)?>">Quay lại trang chủ.</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="login-box">
                <div class="card">
                    <div class="card-body login-card-body p-3">
                        <p class="login-box-msg">Thay đổi mật khẩu của bạn ngay bây giờ.</p>
                        <form action="<?= site_url('authenticate/change-password')?>" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?= $username?>" disabled>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user-alt"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="old_pw" class="form-control" placeholder="Mật khẩu cũ">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="new_pw" class="form-control" placeholder="Mật khẩu mới">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Thay đổi mật khẩu</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <p class="mt-3 mb-1">
                            <a href="<?= site_url('dashboard ')?>">Hủy</a>
                        </p>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
</div>