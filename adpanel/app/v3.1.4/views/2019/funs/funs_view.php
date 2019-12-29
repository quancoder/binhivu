<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Góc giải trí</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Góc giải trí</li>
                    <li class="ml-3 float-right">
                        <a href="<?= site_url('funs/add', $langcode) ?>" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Thêm bài viết</a>
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
                    <form method="get" action="<?= site_url('funs', $langcode)?>">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <label class="col-form-label" for="search"> Nhập tên sách</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="search" name="search" class="form-control" type="search"  value="<?php echo $search; ?>" placeholder="Tìm theo tiêu đề..."  />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <label class="col-form-label" for="tag"> Nhập từ khóa</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="tag" name="tag" type="text" placeholder="Tìm kiếm theo từ khóa..." class="form-control" data-role="tagsinput" value="<?php echo $tag?>"  style="display: none"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                <label class="col-form-label" for="status">Chọn trạng thái</label>
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

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                <label class="col-form-label">&nbsp;</label>
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-info w-100"><i class="fa fa-search"></i>Tìm kiếm</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card" id="table_funs">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th style="width: 3%">ID</th>
                        <th style="width: 10%" class="text-center">Ảnh</th>
                        <th>Tiêu đề</th>
                        <th style="width: 10%" class="text-center">Trạng thái</th>
                        <th style="width: 5%" class="text-right">Xem</th>
                        <th style="width: 10%" class="text-right">Sửa gần nhất</th>
                        <th style="width: 20%;">Từ khóa </th>
                        <th style="width: 5%" class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $id => $fun) { ?>
                        <tr>
                            <td class="align-middle"><?php echo $id ?></td>
                            <td class="align-middle text-center" >
                                <a href="<?= $fun['funs_thumbs']?>" class="iframe-view-image">
                                    <img src="<?=$fun['funs_thumbs']?>" class="img-fluid" />
                                </a>
                            </td>
                            <td class="align-middle font-weight-bold">
                                <?php echo $fun['funs_title'] ?>
                                <p style="color: #8c8c8c; font-weight:normal">
                                    <?= get_time_ago($fun['funs_create_time'])?> <br>
                                    <?= date('d/m/Y - h:m', strtotime($fun['funs_create_time'])) ?>
                                </p>
                            </td>
                            <td class="align-middle text-center">
                                <?php if($fun['funs_status'] ==1){?>
                                    <span class="badge badge-primary">Hiển thị</span>
                                <?php }else if($fun['funs_status'] ==2){?>
                                    <span class="badge  badge-warning">Tạm dừng</span>
                                <?php }else if($fun['funs_status'] ==3){?>
                                    <span class="badge badge-secondary">Lưu trữ</span>
                                <?php }else if($fun['funs_status'] ==4){?>
                                    <span class="badge badge-info">Tin nháp</span>
                                <?php }?>
                                <select class="form-control" onclick="" style="display: none">
                                    <option value="1" <?= $fun['funs_status']==1 ? 'selected' : ''?> >Đang chạy</option>
                                    <option value="2" <?= $fun['funs_status']==2 ? 'selected' : ''?> >Tạm dùng</option>
                                    <option value="3" <?= $fun['funs_status']==3 ? 'selected' : ''?> >Lưu trữ</option>
                                    <option value="4" <?= $fun['funs_status']==4 ? 'selected' : ''?> >Thùng rác</option>
                                </select>
                            </td>
                            <td class="align-middle text-right"><?=$fun['funs_views']?></td>
                            <td class="align-middle text-right">
                                <?= strtotime($fun['funs_update_time']) > 0 ? get_time_ago($fun['funs_update_time']) : ''?>
                                <p style="color: #8c8c8c">
                                    <?= strtotime($fun['funs_update_time']) > 0 ?date('h:m - d/m/Y', strtotime($fun['funs_create_time'])): '' ?>
                                </p>
                            </td>
                            <td class="align-middle">
                                <input value="<?php echo $fun['funs_tags'] ?>" data-role="tagsinput" class="input_tag">
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?= base_url('funs/edit/'.$id)?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('funs/trash/'.$id)?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

    $('.input_tag').tagsinput({
    });
    $('#table_funs .bootstrap-tagsinput').find("span > span").remove();
    $('#table_funs .bootstrap-tagsinput').find("input").remove();
</script>

