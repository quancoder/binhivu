<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Start content -->
<div class="content">
    <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Quản lý tin tức
            <small>Thêm mới</small>
        </h1>
        <ol class="breadcrumb float-right">
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item">Tin tức</li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <div class="container-fluid">
        <!-- end row -->
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?= $news_id > 0 ? 'block' : 'none'?>">
            <strong>Thành công!</strong>
            Bạn đã thêm thành công bài viết. <a href="<?=site_url('Funs', $langcode)?>">Quay lại danh sách.</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <form method="post" action="<?= site_url('news/add', $langcode)?>" id="form">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin bài viết</h3>
                        </div>
                        <div class="box-body">
                            <label class="col-form-label" for="news_title"><i class="fa fa-pencil"></i> Tiêu đề</label>
                            <div class="form-group">
                                <textarea id="news_title" name="news_title"  class="form-control" placeholder="Tiêu đề:" required><?= $news_title?></textarea>
                            </div>

                            <label class="col-form-label" for="news_sapo"><i class="fa fa-pencil"></i> Mô tả</label>
                            <div class="form-group">
                                <textarea id="news_sapo" name="news_sapo"  class="form-control" placeholder="Mô tả:" required><?= $news_sapo?></textarea>
                            </div>

                            <label class="col-form-label" for="news_tag"><i class="fa fa-pencil"></i> Từ khóa (cách nhau bởi dấu phẩy)</label>
                            <div class="form-group">
                                <textarea  id="news_tag" name="news_tag" class="form-control" placeholder="Từ khóa: bộ đội, biên phòng, hải đảo" required><?= $news_tag?></textarea>
                            </div>

                            <label class="col-form-label"><i class="fa fa-image"></i> Ảnh</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-btn">
                                    <a href="<?= base_url() ?>plugins/filemanager/dialog.php?type=1&field_id=news_image" class="btn btn-info iframe-btn">Chọn ảnh</a>
                                </span>
                                <input type="text" class="form-control" id="news_image" name="news_image" value="<?= $news_image?>" required/>
                            </div>
                            <div style="margin: 10px 0; ">
                                <img id="image_preview"  alt="ảnh bài viết"
                                     src="<?= $news_image?>" style="width:100%; background-color: white; text-align: center; display: <?= $news_image=='' ? 'none' : 'block'?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nội dung bài viết</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <textarea id="news-content" name="news_content" class="form-control" ><?= $news_content?></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="reset" class="btn btn-default"><i class="fa fa-pencil" ></i> Nhập lại</button>
                                <button type="submit" name="news_status_4" value="4" class="btn btn-default"><i class="fa fa-pencil"></i> Lưu nháp</button>
                            </div>
                            <button type="submit" name="news_status_1" value="1" class="btn btn-primary" ><i class="fa fa-pencil"></i> Đăng lên trang chủ</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /. box -->
                </div>
            </div>
        </form>
    </div>
    <!-- END container-fluid -->

</div>
<!-- END content -->
<script src="<?php echo base_url() . "js/" . $template_f; ?>/tinymce/tinymce.min.js"></script>
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
        selector: '#news-content',
        height: 700,
        menubar: true,
        width: '100%',
        theme: 'silver',
        language: 'vi',
        plugins: [
            "advlist autolink lists link image charmap print preview anchor visualblocks code fullscreen insertdatetime media table paste code help filemanager responsivefilemanager"
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

