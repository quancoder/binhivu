<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Start content -->
<div class="content">
    <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Quản lý tin tức
            <small>Cập nhật</small>
        </h1>
        <ol class="breadcrumb float-right">
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item">Tin tức</li>
            <li class="breadcrumb-item active">Cập nhật</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <div class="container-fluid">
        <!-- end row -->
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: <?= $isupdate == TRUE ? 'block' : 'none'?>">
            <strong>Thành công!</strong>
            Bạn đã sửa thành công bài viết. <a href="<?=site_url('Funs', $langcode)?>">Quay lại danh sách.</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="card22">
            <div class="card-body22">
                <form method="post" action="<?= site_url('news/edit/'.$info['news_id'], $langcode)?>" id="form">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="col-form-label"><i class="fa fa-image"></i> Ảnh</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-btn">
                                    <a href="<?= base_url() ?>plugins/filemanager/dialog.php?type=1&field_id=news_image" class="btn btn-info iframe-btn">Chọn ảnh</a>
                                </span>
                                <input type="text" class="form-control" id="news_image" name="news_image" value="<?= HTTP_PROTOCOL . '://' . $_SERVER['HTTP_HOST'] .'/public/images/'.$info['news_image']?>" required/>
                            </div>
                            <div style="margin: 10px 0; ">
                                <img id="image_preview"  alt="ảnh bài viết"
                                     src="/public/images/<?=$info['news_image']?>" style="width:100%; background-color: white; text-align: center;"/>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1"><i class="fa fa-pencil"></i> Trạng thái</label>
                                <select class="form-control" name="news_status">
                                    <option value="1" <?= $info['news_status']==1 ? 'selected': ''?>>Hiện thị</option>
                                    <option value="2" <?= $info['news_status']==2 ? 'selected': ''?>>Tạm dừng</option>
                                    <option value="3" <?= $info['news_status']==3 ? 'selected': ''?>>Lưu trữ</option>
                                    <option value="4" <?= $info['news_status']==4 ? 'selected': ''?>>Nháp</option>
                                </select>
                            </div>
                            <label class="col-form-label" for="news_title"><i class="fa fa-pencil"></i> Tiêu đề</label>
                            <div class="form-group">
                                <textarea id="news_title" name="news_title"  class="form-control" placeholder="Tiêu đề:" required><?= $info['news_title']?></textarea>
                            </div>

                            <label class="col-form-label" for="news_sapo"><i class="fa fa-pencil"></i> Mô tả</label>
                            <div class="form-group">
                                <textarea id="news_sapo" name="news_sapo"  class="form-control" placeholder="Mô tả:" required><?= $info['news_sapo']?></textarea>
                            </div>

                            <label class="col-form-label" for="news_tag"><i class="fa fa-pencil"></i> Từ khóa (cách nhau bởi dấu phẩy)</label>
                            <div class="form-group">
                                <textarea  id="news_tag" name="news_tag" class="form-control" placeholder="Từ khóa: bộ đội, biên phòng, hải đảo" required><?= $info['news_tags']?></textarea>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="box box-primary">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <label class="col-form-label"><i class="fa fa-pencil"></i> Nội dung bài viết</label>
                                    <div class="form-group">
                                        <textarea id="news-content" name="news_content" class="form-control" ><?= $info['news_content']?></textarea>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="submit" value="1" class="btn btn-primary"><i class="fa fa-pencil"></i> Hoàn thành</button>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /. box -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END container-fluid -->

</div>
<!-- END content -->
<script src="<?php echo base_url() . "js/" . $template_f; ?>/tinymce/tinymce.min.js"></script>
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
        filemanager_title: "Quản lý file ",
        external_plugins: {
            "responsivefilemanager": "<?php echo base_url(); ?>plugins/tinymce/plugins/responsivefilemanager/plugin.min.js",
            "filemanager": "<?php echo base_url(); ?>plugins/filemanager/plugin.min.js"
        }
    });
</script>

