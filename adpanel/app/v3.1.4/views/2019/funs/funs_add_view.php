<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm câu chuyện</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=site_url()?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?=site_url('funs')?>">Câu chuyện</a></li>
                    <li class="breadcrumb-item active">Thêm bài viết</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container-fluid">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?= $funs_id > 0 ? 'block' : 'none'?>">
        <strong>Thành công!</strong>
        Bạn đã thêm thành công bài viết. <a href="<?=site_url('funs', $langcode)?>">Quay lại danh sách.</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <form method="post" action="<?= site_url('funs/add', $langcode)?>" id="form">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Thông tin cơ bản</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i> </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <label class="col-form-label" for="funs_title"><i class="fa fa-pencil"></i> Tiêu đề</label>
                        <div class="form-group">
                            <textarea id="funs_title" name="funs_title"  class="form-control" placeholder="Tiêu đề:" required><?= $funs_title?></textarea>
                        </div>

                        <label class="col-form-label" for="funs_sapo"><i class="fa fa-pencil"></i> Mô tả</label>
                        <div class="form-group">
                            <textarea id="funs_sapo" name="funs_sapo"  class="form-control" placeholder="Mô tả:" required><?= $funs_sapo?></textarea>
                        </div>

                        <label class="col-form-label" for="funs_tag"><i class="fa fa-pencil"></i> Từ khóa (cách nhau bởi dấu phẩy)</label>
                        <div class="form-group">
                            <input id="funs_tags" name="funs_tags" data-role="tagsinput"  value="<?= $funs_tags ?>" required />
                        </div>

                        <label class="col-form-label"><i class="fa fa-image"></i> Ảnh</label>

                        <div class="input-group">
                            <input type="text" class="form-control" id="funs_image" name="funs_image" value="<?= $funs_image?>" required/>
                            <div class="input-group-prepend">
                                <button class="quanlt-open-modal-filemanager btn btn-secondary" type="button"
                                        data-src="<?= FILEMANAGER_PATH.'type=1&field_id=funs_image&fldr=tin-tuc' ?>"> Chọn file </button>
                            </div>
                        </div>
                        <div style="margin: 10px 0; ">
                            <img id="image_preview"  alt="ảnh bài viết"
                                 src="<?= $funs_image?>" style="width:100%; background-color: white; text-align: center; display: <?= $funs_image=='' ? 'none' : 'block'?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit"></i> Nội dung bài viết</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <textarea id="funs-content" name="funs_content" class="form-control" ><?= $funs_content?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="funs_status_1" value="ok" class="btn btn-primary float-left"><i class="fa fa-pencil"></i> Đăng lên trang chủ</button>

                        <div class="float-right">
                            <button type="reset" class="btn btn-default"><i class="fa fa-pencil" ></i> Nhập lại</button>
                            <button type="submit" name="funs_status_4" value="ok" class="btn btn-default"><i class="fa fa-pencil"></i> Lưu nháp</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('.iframe-btn').fancybox({
        'width'		: 900,
        'height'	: 600,
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

