<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Giải trí</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Giải trí</li>
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
                    <form method="get" action="<?= site_url('Funs', $langcode)?>">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="search" name="search" class="form-control" type="search"  value="<?php echo $search; ?>" placeholder="Tìm theo tiêu đề..."  />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="tag" name="tag" type="text" placeholder="Tìm kiếm theo từ khóa..." class="form-control" data-role="tagsinput" value="<?php echo $tag?>"  style="display: none"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
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

                            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <button type="submit"  class="btn btn-info"><i class="fa fa-search"></i>Tìm kiếm</button>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                                <div class="form-group float-right">
                                    <a href="<?= site_url('funs/add', $langcode) ?>" class="btn btn-danger"><i class="fa fa-edit"></i> Đăng tin mới</a>
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
                            <th style="width: 15%" class="text-center">Ảnh</th>
                            <th>Tiêu đề tin tức</th>
                            <th style="width: 10%" class="text-center">Trạng thái</th>
                            <th style="width: 5%" class="text-right">View</th>
                            <th style="width: 10%" class="text-center">Ngày đăng</th>
                            <th style="width: 10%" class="text-center">Sửa gần nhất</th>
                            <th style="width: 20%;">Từ khóa </th>
                            <th style="width: 10%" class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $id => $fun) { ?>
                            <tr>
                                <td class="align-middle"><?php echo $id ?></td>
                                <td class="align-middle text-center" >
                                    <a href="/public/images/<?= $fun['funs_thumbs']?>" class="iframe-view-image">
                                        <img src="/public/thumbs/<?= $fun['funs_thumbs']?>" width="100" class="img-fluid" />
                                    </a>
                                </td>
                                <td class="align-middle"><?php echo $fun['funs_title'] ?></td>
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
                                <td class="align-middle text-right">0</td>
                                <td class="align-middle text-right">
                                    <?= get_time_ago($fun['funs_create_time'])?>
                                </td>
                                <td class="align-middle text-right">
                                    <?= strtotime($fun['funs_update_time']) > 0 ? get_time_ago($fun['funs_update_time']) : ''?>
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
    tinymce.init({
        selector: 'textarea.mceEditor',
        height: 400,
        menubar: true,
        width: '100%',
        theme: 'silver',
        language: 'vi',
        plugins: [
            "advlist autolink link image media filemanager code responsivefilemanager"
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        relative_urls: false,
        external_filemanager_path:"<?php echo base_url(); ?>plugins/filemanager/",
        filemanager_title:"Quản lý file " ,
        external_plugins: {
            "responsivefilemanager": "<?php echo base_url(); ?>plugins/tinymce/plugins/responsivefilemanager/plugin.min.js",
            "filemanager" : "<?php echo base_url(); ?>plugins/filemanager/plugin.min.js"
        }
    });

    $('.input_tag').tagsinput({
    });
    $('#table_funs .bootstrap-tagsinput').find("span > span").remove();
    $('#table_funs .bootstrap-tagsinput').find("input").remove();
</script>

