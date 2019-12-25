<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tài liệu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Tài liệu</li>
                    <li class="ml-3 float-right">
                        <a href="<?= site_url('document/add', $langcode) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Thêm tài liệu</a>
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
                    <form method="get" action="<?= site_url('document', $langcode)?>">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <label class="col-form-label" for="search"><i class="fa fa-pencil"></i> Nhập tên tài liệu</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="search" name="search" class="form-control" type="search"  value="<?php echo $search; ?>" placeholder="Tìm theo tên tài liệu..."  />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <label class="col-form-label" for="tag"><i class="fa fa-pencil"></i> Nhập từ khóa</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="tag" name="tag" type="text" placeholder="Tìm kiếm theo từ khóa..." class="form-control" data-role="tagsinput" value="<?php echo $tag?>"  style="display: none"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                <label class="col-form-label" for="status"><i class="fa fa-pencil"></i> Chọn trạng thái</label>
                                <div class="form-group">
                                    <select class="form-control" id="status" name="status">
                                        <option value="-1" <?php echo $status == '-1' ? 'selected' : '' ?> >Tất cả tin tức</option>
                                        <option value="1" <?php echo $status == 1 ? 'selected' : '' ?> >Hiển thị ra trang chủ</option>
                                        <option value="2" <?php echo $status == 2 ? 'selected' : '' ?> >Dừng hiển thị</option>
                                        <option value="3" <?php echo $status == 3 ? 'selected' : '' ?> >Lưu vào thùng rác</option>
                                        <option value="4" <?php echo $status == 4 ? 'selected' : '' ?> >Lưu vào nháp</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                                <label class="col-form-label" for="search"><i class="fa fa-pencil"></i>&nbsp;</label>
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-info w-100"><i class="fa fa-search"></i>Tìm kiếm</button>
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
                            <th>Tên tài liệu</th>
                            <th style="width: 5%" class="text-center">Status</th>
                            <th style="width: 10%" class="text-right">Giá</th>
                            <th style="width: 5%" class="text-right">Xem</th>
                            <th style="width: 5%" class="text-right">Tải</th>
                            <th style="width: 10%" class="text-right">Ngày tạo</th>
                            <th style="width: 20%;">Từ khóa </th>
                            <th style="width: 5%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $id => $item) { ?>
                            <tr>
                                <td class="align-middle"><?php echo $id ?></td>
                                <td class="align-middle text-center" >
                                    <a href="<?= $item['doc_image']?>" class="iframe-view-image">
                                        <img src="<?=$item['doc_image']?>" class="img-fluid" />
                                    </a>
                                </td>
                                <td class="align-middle font-weight-bold"><?php echo $item['doc_name'] ?></td>
                                <td class="align-middle text-center">
                                    <?php if($item['doc_status'] ==1){?>
                                        <span class="badge badge-primary">Hiển thị</span>
                                    <?php }else if($item['doc_status'] ==2){?>
                                        <span class="badge  badge-warning">Tạm dừng</span>
                                    <?php }else if($item['doc_status'] ==3){?>
                                        <span class="badge badge-secondary">Lưu trữ</span>
                                    <?php }else if($item['doc_status'] ==4){?>
                                        <span class="badge badge-info">Tin nháp</span>
                                    <?php }?>
                                    <select class="form-control" onclick="" style="display: none">
                                        <option value="1" <?= $item['doc_status']==1 ? 'selected' : ''?> >Đang chạy</option>
                                        <option value="2" <?= $item['doc_status']==2 ? 'selected' : ''?> >Tạm dùng</option>
                                        <option value="3" <?= $item['doc_status']==3 ? 'selected' : ''?> >Lưu trữ</option>
                                        <option value="4" <?= $item['doc_status']==4 ? 'selected' : ''?> >Thùng rác</option>
                                    </select>
                                </td>
                                <td class="align-middle text-right">
                                    <?= number_format($item['doc_price'])?> VNĐ<br>
                                    <?= $item['doc_free']==1 ? '<span class="badge badge-primary">Free</span>' : ''?>
                                </td>
                                <td class="align-middle text-right"><?= $item['doc_view'] ?></td>
                                <td class="align-middle text-right"><?= $item['doc_download'] ?></td>
                                <td class="align-middle text-right">
                                    <span><?= get_time_ago($item['doc_create_date'])?></span>
                                    <p style="color: #8c8c8c"><?= date('h:m - d/m/Y', strtotime($item['doc_create_date'])) ?></p>
                                </td>
                                <td class="align-middle">
                                    <input value="<?php echo $item['doc_tag'] ?>" data-role="tagsinput" class="input_tag">
                                </td>
                                <td class="align-middle text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url('document/edit/'.$id)?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('document/trash/'.$id)?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

