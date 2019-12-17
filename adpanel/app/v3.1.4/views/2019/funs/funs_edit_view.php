<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Start content -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa tin tức</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?=site_url('Funs')?>">Góc thư giãn</a></li>
                    <li class="breadcrumb-item active">Sửa bài viết</li>
                    <li class="ml-3 float-right">
                        <a href="<?= site_url('funs/add', $langcode) ?>" class="btn btn-danger btn-sm"><i class="fa fa-edit"></i> Đăng tin mới</a>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?= $isupdate == TRUE ? 'block' : 'none'?>">
        <strong>Thành công!</strong>
        Bạn đã sửa thành công bài viết. <a href="<?=site_url('Funs', $langcode)?>">Quay lại danh sách.</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: <?= !empty($error)  ? 'block' : 'none'?>">
        <strong>Thất bại!</strong>
        <a href="<?=site_url('funs', $langcode)?>">Quay lại danh sách.</a>
        <p>Đang có lỗi:</p>
        <?php var_dump($error)?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <form method="post" action="<?= site_url('funs/edit/'.$info['funs_id'], $langcode)?>" id="form">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Thông tin cơ bản</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <label class="col-form-label" for="funs_status"><i class="fa fa-pencil"></i> Chuyển trạng thái</label>
                        <div class="form-group">
                            <select class="form-control" name="funs_status">
                                <option value="1" <?= $info['funs_status']==1 ? 'selected': ''?>>Hiển thị ra trang chủ</option>
                                <option value="2" <?= $info['funs_status']==2 ? 'selected': ''?>>Dừng hiển thị</option>
                                <option value="3" <?= $info['funs_status']==3 ? 'selected': ''?>>Lưu trữ thùng rác</option>
                                <option value="4" <?= $info['funs_status']==4 ? 'selected': ''?>>Lưu vào nháp</option>
                            </select>
                        </div>
                        <label class="col-form-label" for="funs_image"><i class="fa fa-pencil"></i> Chọn ảnh</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="funs_image" name="funs_image" value="<?= ROOT_DOMAIN.$info['funs_image']?>" required/>
                            <div class="input-group-prepend">
                                <button class="quanlt-open-modal-filemanager btn btn-secondary" type="button"
                                        data-src="<?= FILEMANAGER_PATH.'type=1&field_id=funs_image&fldr=tin-tuc' ?>"> Chọn ảnh </button>
                            </div>
                        </div>
                        <div style="margin: 10px 0; ">
                            <img id="image_preview"  alt="ảnh bài viết" src="<?=$info['funs_image']?>"
                                 style="width:100%; background-color: white; text-align: center;    border: 4px solid #eee; border-radius: 8px;"/>
                        </div>

                        <label class="col-form-label" for="funs_title"><i class="fa fa-pencil"></i> Tiêu đề</label>
                        <div class="form-group">
                            <textarea id="funs_title" name="funs_title"  class="form-control" placeholder="Tiêu đề:" required><?= $info['funs_title']?></textarea>
                        </div>

                        <label class="col-form-label" for="funs_sapo"><i class="fa fa-pencil"></i> Mô tả</label>
                        <div class="form-group">
                            <textarea id="funs_sapo" name="funs_sapo"  class="form-control" placeholder="Mô tả:" required><?= $info['funs_sapo']?></textarea>
                        </div>

                        <label class="col-form-label" for="funs_tags"><i class="fa fa-pencil"></i> Từ khóa (cách nhau bởi dấu phẩy)</label>
                        <div class="form-group">
                            <input id="funs_tags" name="funs_tags" data-role="tagsinput"  value="<?= $info['funs_tags']?>" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Nội dung bài viết</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea id="funs-content" name="funs_content" class="form-control" ><?= $info['funs_content']?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" value="1" class="btn btn-primary"><i class="fa fa-pencil"></i> Cập nhật thay đổi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('.iframe-btn').fancybox({
        'width'		: 900,
        'height'	: 700,
        'type'		: 'iframe',
        'autoScale'    	: false,
        'autoDimensions'    : true,
        'transitionIn'      : 'elastic',
        'transitionOut'     : 'elastic',
        'overlayShow'       : true,
        'centerOnScroll'    : true,
        'easingIn'          : 'easeOutBack',
        'easingOut'         : 'easeInBack',
    });
    function responsive_filemanager_callback(field_id){
        var url=jQuery('#'+field_id).val();
        $("#image_preview").attr('src', url).show();
    }

    $('#content img').addClass('img-fluid');

    tinymce.init({
        selector: '#funs-content',
        menubar: true,
        width: '100%',
        theme: 'silver',
        language: 'vi',
        plugins: [
            "autoresize advlist autolink lists link image charmap print preview anchor visualblocks code fullscreen insertdatetime media table paste code help filemanager responsivefilemanager"
        ],
        toolbar1: 'insertfile undo redo | styleselect | forecolor backcolor emoticons| bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview fullscreen media print',
        image_advtab: true,
        relative_urls: false,
        external_filemanager_path: "<?php echo base_url(); ?>plugins/filemanager/",
        filemanager_title: "Quản lý tài nguyên ",
        external_plugins: {
            "responsivefilemanager": "<?php echo base_url(); ?>plugins/tinymce/plugins/responsivefilemanager/plugin.min.js",
            "filemanager": "<?php echo base_url(); ?>plugins/filemanager/plugin.min.js"
        }
    });
</script>

