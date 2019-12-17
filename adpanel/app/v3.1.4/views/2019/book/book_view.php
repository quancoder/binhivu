<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sách</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sách</li>
                    <li class="ml-3 float-right">
                        <a href="<?= site_url('book/add', $langcode) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Thêm sách</a>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body" style="padding: 1rem 0.5rem 0 0.5rem">
                    <form method="get" action="<?= site_url('Book', $langcode)?>">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                <label class="col-form-label" for="search"><i class="fa fa-pencil"></i> Nhập tên sách</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="search" name="search" class="form-control w-25" type="search"  value="<?php echo $search; ?>" placeholder="Tìm theo tên sách..."  />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                <label class="col-form-label" for="tag"><i class="fa fa-pencil"></i> Nhập từ khóa </label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="tag" name="tag" type="text" placeholder="Tìm kiếm theo từ khóa..." class="form-control" data-role="tagsinput" value="<?php echo $tag?>"  style="display: none"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                <label class="col-form-label" for="author"><i class="fa fa-pencil"></i> Nhập tên tác giả</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="author" name="author" type="text" placeholder="Tìm kiếm tác giả..." class="form-control" data-role="tagsinput" value="<?php echo $author?>"  style="display: none"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                <label class="col-form-label" for="nxb"><i class="fa fa-pencil"></i> Nhập tên NXB</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="nxb" name="nxb" type="text" placeholder="Tìm kiếm theo NXB..." class="form-control" data-role="tagsinput" value="<?php echo $nxb?>"  style="display: none"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-1 col-xl-2">
                                <label class="col-form-label" for="status"><i class="fa fa-pencil"></i> Chọn trạng thái</label>
                                <div class="form-group">
                                    <select class="form-control" id="status" name="status">
                                        <option value="-1" <?php echo $status == '-1' ? 'selected' : '' ?> >Tất cả loại sách</option>
                                        <option value="1" <?php echo $status == 1 ? 'selected' : '' ?> >Đang ngoài trang chủ</option>
                                        <option value="2" <?php echo $status == 2 ? 'selected' : '' ?> >Dừng hiển thị</option>
                                        <option value="3" <?php echo $status == 3 ? 'selected' : '' ?> >Đang ở thùng rác</option>
                                        <option value="4" <?php echo $status == 4 ? 'selected' : '' ?> >Đang soạn thảo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2">

                                <label class="col-form-label" for="search"><i class="fa fa-pencil"></i>&nbsp;</label>
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-info"><i class="fa fa-search"></i>Tìm kiếm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card" id="table_news">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 3%">ID</th>
                            <th style="width: 5%" class="text-center">Ảnh</th>
                            <th>Tên Sách</th>
                            <th style="width: 5%" class="text-center"></th>
                            <th style="width: 10%" class="text-right">Giá</th>
                            <th style="width: 5%" class="text-right">Xem</th>
                            <th style="width: 5%" class="text-right">Tải</th>
                            <th style="width: 10%" class="">Ngày tạo</th>
                            <th style="width: 10%" class="">TG/NXB</th>
                            <th style="width: 20%;">Từ khóa </th>
                            <th style="width: 5%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $id => $item) { ?>
                            <tr>
                                <td class="align-middle"><?php echo $id ?></td>
                                <td class="align-middle text-center" >
                                    <a href="<?= $item['b_image']?>" class="iframe-view-image">
                                        <img src="<?=$item['b_image']?>" class="img-fluid" />
                                    </a>
                                </td>
                                <td class="align-middle font-weight-bold"><?php echo $item['b_name'] ?></td>
                                <td class="align-middle text-center">
                                    <?php if($item['b_status'] ==1){?>
                                        <span class="badge badge-primary">Hiển thị</span>
                                    <?php }else if($item['b_status'] ==2){?>
                                        <span class="badge  badge-warning">Tạm dừng</span>
                                    <?php }else if($item['b_status'] ==3){?>
                                        <span class="badge badge-secondary">Lưu trữ</span>
                                    <?php }else if($item['b_status'] ==4){?>
                                        <span class="badge badge-info">Tin nháp</span>
                                    <?php }?>
                                </td>
                                <td class="align-middle text-right">
                                    <?= number_format($item['b_price'])?> VNĐ<br>
                                    <?= $item['b_free']==1 ? '<span class="badge badge-primary">Free</span>' : ''?>
                                </td>
                                <td class="align-middle text-right"><?= $item['b_view'] ?></td>
                                <td class="align-middle text-right"><?= $item['b_download'] ?></td>
                                <td class="align-middle">
                                    <span><?= get_time_ago($item['b_create_date'])?></span>
                                    <p style="color: #8c8c8c"><?= date('h:m - d/m/Y', strtotime($item['b_create_date'])) ?></p>
                                </td>
                                <td class="align-middle">
                                    <?= $item['b_author'] ?><br>
                                    <p style="color: #8c8c8c"><?= $item['b_nxb'] ?></p>
                                </td>
                                <td class="align-middle">
                                    <input value="<?php echo $item['b_tag'] ?>" data-role="tagsinput" class="input_tag">
                                </td>
                                <td class="align-middle text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url('book/edit/'.$id)?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('book/trash/'.$id)?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
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
<!-- END container-fluid -->
<!-- END content -->
<script type="text/javascript">
    $('.iframe-view-image').fancybox({
        'width'		: 900,
        'height'	: 600,
        'type'		: 'image',
        'autoScale'    	: false,
        'autoDimensions'    : true,
        'transitionIn'      : 'elastic',
        'transitionOut'     : 'elastic',
        'overlayShow'       : true,
        'centerOnScroll'    : true,
        'easingIn'          : 'easeOutBack',
        'easingOut'         : 'easeInBack',
    });
    $('#content img').addClass('img-fluid');
    $('.input_tag').tagsinput({
    });
    $('#table_news .bootstrap-tagsinput').find("span > span").remove();
    $('#table_news .bootstrap-tagsinput').find("input").remove();
    $('#table_news .bootstrap-tagsinput').css('min-height', '38px');
</script>

