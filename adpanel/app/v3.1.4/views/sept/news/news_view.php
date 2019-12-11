<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Widgets</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Widgets</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <div class="input-group">
                            <input id="search" class="form-control" type="text" value="<?php echo $search != "" ? $search : ""; ?>" placeholder="Tìm theo tiêu đề..."  />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <div class="input-group">
                            <input id="tag" class="form-control" type="text" value="<?php echo $tag != "" ? $tag : ""; ?>" placeholder="Tìm theo từ khóa..."  />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2 col-xl-2">
                    <div class="form-group">
                        <select class="form-control" id="status">
                            <option value="-1" <?php echo $status == -1 ? 'selected' : '' ?> >Tất cả tin tức</option>
                            <option value="1" <?php echo $status == 1 ? 'selected' : '' ?>>Công khai</option>
                            <option value="0" <?php echo $status == 2 ? 'selected' : '' ?>>Tạm dừng</option>
                            <option value="0" <?php echo $status == 3 ? 'selected' : '' ?>>Thùng rác</option>
                            <option value="0" <?php echo $status == 4 ? 'selected' : '' ?>>Tin nháp</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                    <div class="form-group">
                        <button type="button"  class="btn btn-info"><i class="fa fa-search"></i>Tìm kiếm</button>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                    <div class="form-group pull-right">
                        <a href="<?= site_url('news/add', $langcode) ?>" class="btn btn-danger"><i class="fa fa-edit"></i> Đăng tin mới</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="padding:0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tiêu đề tin tức</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col" style="width: 150px" class="text-center">Ảnh</th>
                            <th scope="col" style="width: 100px" class="text-center">Trạng thái</th>
                            <th scope="col" style="width: 100px" class="text-right">Lượt xem</th>
                            <th scope="col" style="width: 120px" class="text-center">Ngày đăng</th>
                            <th scope="col" style="width: 120px" class="text-center">Sửa gần nhất</th>
                            <th scope="col" style="width: 100px" class="text-center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($list as $id => $new) { ?>
                        <tr>
                            <td class="ver-middle"><?php echo $id ?></td>
                            <td class="ver-middle"><?php echo $new['news_title'] ?></td>
                            <td class="ver-middle"><?php echo $new['news_sapo'] ?></td>
                            <td class="ver-middle text-center" >
                                <a href="/public/images/<?= $new['news_thumbs']?>" class="iframe-view-image">
                                    <img src="/public/thumbs/<?= $new['news_thumbs']?>" width="100" class="img-fluid" />
                                </a>
                            </td>
                            <td class="ver-middle text-center">
                                <?php if($new['news_status'] ==1){?>
                                    <span class="badge  badge-primary">Đang chạy</span>
                                <?php }else if($new['news_status'] ==2){?>
                                    <span class="badge  badge-warning">Tạm dừng</span>
                                <?php }else if($new['news_status'] ==3){?>
                                    <span class="badge badge-secondary">Lưu trữ</span>
                                <?php }else if($new['news_status'] ==4){?>
                                    <span class="badge badge-info">Tin nháp</span>
                                <?php }?>
                            </td>
                            <td class="ver-middle text-right">N/A</td>
                            <td class="ver-middle text-right">
                                <?= get_time_ago($new['news_create_time'])?>
                            </td>
                            <td class="ver-middle text-right">
                                <?= strtotime($new['news_update_time']) > 0 ? get_time_ago($new['news_update_time']) : ''?>
                            </td>
                            <td class="ver-middle text-center">
                                <a href="<?= base_url('news/edit/'.$id)?>" title="Sửa tin">
                                    <button type="button" class="cursor-pointer btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                </a>
                                <a href="<?= base_url('news/trash/'.$id)?>" title="Lưu tin vào thùng rác">
                                    <button type="button" class="cursor-pointer btn btn-dark btn-sm"><i class="fa fa-trash-o"></i></button>
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
</script>

